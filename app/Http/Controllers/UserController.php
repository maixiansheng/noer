<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
			/**后台用户的添加页面**/
	 public function getAdd()
	 {
	 	return view('user.add');
	 }
	 /***添加用户的方法*/
	 public function postInsert(Request $request)
	 {		 
	 		//自动验证方式
	 		$this->validate($request,[
	 			'username'=>'required|alpha_dash|between:6,12',
	 				'password'=>'required|between:6,12',
	 				'repassword'=>'required|same:password',
	 				'email'=>'required|email'
	 			],[
	 				'username.required'=>'用户名字段不能为空',
	 				'username.between'=>'用户名必须是6-12位的字母数字下划线',
	 				'password.required'=>'密码不能为空',
	 				'password.required'=>'密码必须是6-12位的字母数字下划线',
	 				'repassword.required'=>'确认密码不能为空',
	 				'repassword.same'=>'确认密码必须与密码一致',
	 				'email.required'=>'邮箱不能为空',
	 				'email.email'=>'邮箱格式不正确'
	 			
	 			]);
	//  		$data['username']=$request->input('username');
	// $data['password']=$request->input('password');
	// $data['email']=$request->input('email');
	// dd($data);
	 //提取部分参数
	 	$data = $request->only(['username','password','email']);
	 	$data['password']=Hash::make($data['password']);
	 	$data['token'] = str_random(50);
	 	// dd($data);
		//执行数据添加
		$res = DB::table('users')->insert($data);
		if($res){
			return redirect('admin/user/index')->with('info','添加成功');
		}else{
			return back()->with('info','添加失败');
		}
	} 
	//用户列表页
	public function getIndex(Request $request)
	{	
		//闭包语法 在函数内部使用外层变量
		$users=DB::table('users')
		->where(function($query) use ($request) {
			$query->where('username','like','%'.$request->input('keywords').'%');
		})->paginate($request->input('num',10));
	
		return view('user.index',['users'=>$users,'request'=>$request->all()]);
	}	
	/**用户修改**/
	public function getEdit($id)
	{
		//读取数据库
		$res = DB::table('users')->where('id',$id)->first();

		 // dd($res);
	
		//显示模版
		return view('user.edit',['userInfo'=>$res]);
	}
	public function postUpdate(Request $request)
	{
		$data = $request->only('username','email');
		$res = DB::table('users')->where('id','=',$request->input('id'))->update($data);
		if($res){
			return redirect('/admin/user/index')->with('info','更新成功');
		}else{
			return back('/admin/user/edit')->with('info','更新失败');
		}
	}
	public function getDelete($id)
	{

		$res = DB::table('users')->where('id','=',$id)->delete();
		if($res){
			return redirect('/admin/user/index')->with('success','删除成功');
		}else{
			return back('/admin/user/edit')->with('error','删除失败');
		}
	}
	
}