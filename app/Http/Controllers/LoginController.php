<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Crypt;
use Mail;
use App\Http\Requests\RegisterRequest;
class LoginController extends Controller
{
   public function login()
   {
    return view('admin.login');
   }
   /**用户的登录操作**/
   public function dologin(LoginRequest $request)
   {
    // dd($request->all());
    //获取用户信息
    $user = DB::table('users')->where('username',$request->input('username'))->first();
    //获取用户密码是否一直
    if(Hash::check($request->input('password'),$user['password']))
    {
       session(['id'=>$user['id']]);
        if($request->input('memb')){
        //     $str = 'zhangyue2020|zhangyue2020';
            // $auth_user = Crypt::encrypt($str);
            // if($request->input('password'),$user['password']){
            $str  = $request->input('password');
            $pass = $user['password'];
            $data = Crypt::encrypt($pass);

              if($request->input['username'] == $user[
                'username'] && $str == $data){
                \Cookie::queue('data',$data,60*24*30);
                \Cookie::queue('username',$request->input('username'));
        }
            return redirect('/admin')->with('success','登陆成功');
        }else{
            return back('/admin/login')->with('error','登录失败');
        }
        
    }
     
  }

        /**前台用户注册**/
        public function register()
        {
            return view('login.register');
        }
        /**前台用户注册**/
        public function doregister(RegisterRequest $request)
        {
            // dd($request->all());
            /**首先判断验证码是否一致**/
            $code  = $request->input('vcode');
            // dd(session('vcode'));
            // dd($code);
            if($code != session('vcode'))
            {
              return back()->with('error','验证码错误');
            }
           //执行插入操作
           // dd($request->all());
            //执行插入操作
            $data = $request->only('email','password');
            $data['password'] = Hash::make($data['password']);

            $data['token']=str_random(50);
            // dd($data);
           if($id = DB::table('users')->insertGetId($data)){
             // $this->sendJiHuoMail($data['email'],$id,$data['token']);
              return view('login.success');
           }else{
            return back()->with('error','注册失败');
           }
        }
        public function send()
        {  
          Mail::raw('恭喜你注册成功', function ($message) {
              $message->subject('提醒激活邮件');
              $message->to('649106883@qq.com');
          });
        }
       /**向用户发送激活邮件
       **/
       // private function sendJiHuoMail($email,$id,$token)
       // {

       //    // Mail::raw('恭喜你注册成功请点击连接完成激活<a href="http:://www.lamp136.com/jihuo?'.$id.'&token='.$token.'"></a>', function ($message) use ($email){
       //    //     $message->from('649106883@qq.com');
       //    //     $message->subject('注册成功提醒邮件');
       //    //     $message->to($email);
       //    // });
       //  Mail::send('email.jihuo',['email'=>$email,'id'=>$id,'token'=>$token],function(){
       //    $message->to($email)->subject('注册成功提醒邮件');
       //  });
       // }
       
}


  
