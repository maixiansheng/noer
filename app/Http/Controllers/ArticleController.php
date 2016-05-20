<?php

namespace App\Http\Controllers;
use Config;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\InsertArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**文章添加页面**/
    public function getAdd()
    {   
        /**把分类信息拿过来  **/
        $cates = CateController::getCates();
        // dd($cates);
        return view('article.add',['cates'=>CateController::getCates()]);
    }
    /**文章内容添加**/
    public function postInsert(InsertArticleRequest $request)
    {
       
           $data = $request->except(['_token']);
           // dd($data);
           // dd($data);
           /**文件上传**/
           if($request->hasFile('pic'));
           {
            //拼接文件名称
            $pathname = time().rand(10000,99999).'.'.$request->file('pic')->getClientOriginalExtension();
            // dd($pathname)
            //上传文件
            $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
            //拼接路口
            $data['pic'] = trim(Config::get('app.upload_dir').$pathname,'.');
            // dd($data);
            $data['user_id'] = 1;
            $data['created_at']= time('Y-m-d H:i:s');
            //写入数据库
            if(DB::table('article')->insert($data))
            {
                return redirect('/admin/article/index')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
            
        }
          

    }
    public function getIndex(Request $request)
    {
        $articles = DB::table('article')
        ->where(function($query)use($request){
            if($request->input('keywords')){
             $query->where('title','like','%'.$request->input('keywords').'%');
             }
        })->paginate($request->input('num',10));
        return view('article.index',['articles'=>$articles,'request'=>$request->all()]);

    }
    public function getEdit($id)
    {
        $article = DB::table('article')->where('id','=',$id)->first();
        // dd($article);
        return view('article.edit',[
            'article'=>$article,
            'cates'=>CateController::getCates()

            ]);
    }
    public function postUpdate(InsertArticleRequest $request)
    {

         $data = $request->except(['_token']);
           // dd($data);
           // dd($data);
           /**文件上传**/
           if($request->hasFile('pic'));
           {
            //拼接文件名称
            $pathname = time().rand(10000,99999).'.'.$request->file('pic')->getClientOriginalExtension();
            //上传文件
            $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
            //拼接路口
            $data['pic'] = trim(Config::get('app.upload_dir').$pathname,'.');
            // dd($data);
            $data['user_id'] = 1;
            $data['created_at']= time('Y-m-d H:i:s');
            //写入数据库
            if(DB::table('article')->where('id',$request->input('id'))->update($data))
            {
                return redirect('/admin/article/index')->with('success','更新成功');
            }else{
                return back()->with('error','更新失败');
            }
            
        }
          
    }
    public function getDelete($id)
    {
        $arc = DB::table('article')->where('id',$id)->first();
        //检图片
        $path = '.'.$arc['pic'];
        if(file_exists($path)){
            unlink($path);
        }
        if(DB::table('article')->where('id',$id)->delete()){
            return redirect('/admin/article/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}

