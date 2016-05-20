<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertFriendLinkRequest;





class FriendLinkController extends Controller
{
   /**添加友情链接**/
   public function getAdd()
   {
    return view('friendlink.add');
   }
   /**友情链接的添加操作**/
   public function postInsert(InsertFriendLinkRequest $request)
   {
   	// dd($request->all());
   
   	$data = $request->except('_token');
   	// dd($data);
   	/**判断有没有图片上传**/
   	if($request->hasFile('logo'));
   	{
   		/**拼接文件名称**/
   		$pathname = time().rand(11111,99999).'.'.$request->file('logo')->getClientOriginalExtension();
   		// dd($pathname);
   		//上传文件
   		$request->file('logo')->move(Config::get('app.upload_dir'),$pathname);
        //拼接路口
        $data['logo'] = trim(Config::get('app.upload_dir').$pathname,'.');
        // dd($data);
        if(DB::table('friendlink')->insert($data))
        {
        	return redirect('/admin/friendlink/index')->with('success','友链添加成功');
        }else{
        	return back()->with('error','友链添加失败');
        }
       }
	}

	public function getIndex(Request $request)
	{
		$friendlink = DB::table('friendlink')->get();

		return view('friendlink.index',['friendlink'=>$friendlink,'request'=>$request->all()]);
	}
	public function getEdit($id){
		$friendlink = DB::table('friendlink')->where('id','=',$id)->first();
		// dd($friendlink);
		return view('friendlink.edit',['friendlink'=>$friendlink]);
	}

	/**网站更新**/
	public function postUpdate(InsertFriendLinkRequest $request){
		$data = $request->except('_token');

		// dd($data);
		if($request->hasFile('logo'));
   	{
   		/**拼接文件名称**/
   		$pathname = time().rand(11111,99999).'.'.$request->file('logo')->getClientOriginalExtension();
   		// dd($pathname);
   		//上传文件
   		$request->file('logo')->move(Config::get('app.upload_dir'),$pathname);
        //拼接路口
        $data['logo'] = trim(Config::get('app.upload_dir').$pathname,'.');

        
        if(DB::table('friendlink')->where('id',$request->input('id'))->update($data))
        {
        	return redirect('/admin/friendlink/index')->with('success','友链更新成功');
        }else{
        	return back()->with('error','友链更新失败');
        }
      }
	}
	/**网站删除**/
	public function getDelete($id)
	{
		$fd = DB::table('friendlink')->where('id',$id)->first();
		//检测有没有图片
		$path = '.'.$fd['logo'];
		if(file_exists($path)){
			unlink($path);
		}
		 if(DB::table('friendlink')->where('id',$id)->delete()){
            return redirect('/admin/friendlink/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
	}



}
