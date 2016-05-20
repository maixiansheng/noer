<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
     /**获取所有分类**/
    public static function getAllCate(){
      return DB::table('cates')->get();
    }


    
    /**递归方式提取数据**/
    public function getCatesByPidArr($arr,$pid)
    {
        $data = [];
      //遍历
      foreach($cates as $key=>$value ){
        if($value['pid'] = $pid)
        {
          $value['sub'] =self::getCatesByPidArr($cates,$value['id']);
          $data[] = $value;
        }
      }
      return $data;
    }
    /**获取所有分类**/
    public function getCatess(){
      $arr = self::getAllCate();
      /***通过父级id获取元素*/
      $res = self::getCatesByPidArr($arr,0);
      // dd($res);  
      return $res;
      }




   public static function getCatesByPid($pid)
   {
      //读取数据库
      $res= DB::table('cates')->where('pid','=',$pid)->get();
      //遍历
      $data = [];
      foreach($res as $key => $value)
      {
        $value['sub']=self::getCatesByPid($value['id']);
        $data[] = $value;
      }
      return $data;
   }
   /**声明为静态变量的好处在于后面使用分类信息时可以直接用catecontroller::getcates()**/
    public static function getCates()
     {
        $res = DB::table('cates')
        ->select(DB::raw('*,concat(path,",",id)as paths'))
        ->orderBy('paths')
        ->get();
        // dd($res);
        foreach($res as $key=>$value){
            //拆分数组
            $tmp = explode(',',$value['path']);

            $len = count($tmp)-1;
            //修改分类名称
            $res[$key]['name']= str_repeat('|----',$len).$value['name'];

        }
        return $res;
        // var_dump($res);die();
     }
      public function getAdd()
      {
       $cates =  self::getCates();
        //读取所有分类数据
        // $cates = DB::table('cates')->get();
        // dd($cates);
        return view('cate.add',['cates'=>$cates]);
      }
    

      /**添加分类**/
      public function postInsert(Request $request)
      {

         $this->validate($request,[
                'name'=>'required'
                ],[
                'name.required' => '分类名不能为空',
                
            ]);
        
        //获取父级分类
        $data= array();
        $pid = $request->input('pid');
         $data= $request->except('_token');
        if($pid == 0){
            $data['path'] ='0';
        }else{
            /**获取pid并读取分类信息**/
            $info = DB::table('cates')->where('id','=',$pid)->first();
            $data['path'] = $info['path'].','.$info['id'];
        }

        $res =  DB::table('cates')->insert($data);
        if($res){
            return redirect('/admin/cate/index')->with('success','添加成功');
        }else{
            return back('/admin/cate/add')->with('error','添加分类失败');
        }


      }

       /**分类列表**/
      public function getIndex()
      {
        // dd(self::getCatesByPid(0));
        //读取分类
        $cates  = self::getCates();
        // dd($cates);
        return view('cate.index',['cates'=>$cates]);
      }

      /**分类编辑**/
      public function getEdit($id)
      {
        //读取当前id分类信息
        $info = DB::table('cates')->where('id',$id)->first();
        //分配变量解析模版
        return view('cate.edit',['cates'=>self::getCates(),'info'=>$info]);
      }
      /**分类更新操作**/
      public function postUpdate(Request $request)
      {
        // dd($request->all());
        //获取参数
        $data= array();
        $pid = $request->input('pid');
         $data= $request->except('_token','id');
        if($pid == 0){
            $data['path'] ='0';
        }else{
            /**获取pid并读取分类信息**/
            $info = DB::table('cates')->where('id','=',$pid)->first();
            $data['path'] = $info['path'].','.$info['id'];
        }
        // dd($data);
        $res = DB::table('cates')->where('id','=',$request->input('id'))->update($data);
        // dd($res);
        if($res){
            return redirect('/admin/cate/index')->with('success','修改成功');

        }else{
            return back('/admin/cate/edit')->with('error','修改失败');
      }
  }
    /**分类删除操作**/
    public function getDelete($id)
    {
        //检测当前分类下是否包含自分类
        $data = DB::table('cates')->where('pid','=',$id)->count();
        if($data >0){
            return back()->with('error','当前分类下有子分类,不允许删除');
        }
        $res = DB::table('cates')->where('id','=',$id)->delete();
        if($res){
            return redirect('/admin/cate/index')->with('success','删除成功');
        }else{
            return  back('/admin/cate/edit')->with('error','删除失败');
        }
    }
}
