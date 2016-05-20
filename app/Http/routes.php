<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'login'],function(){
	Route::get('/admin','AdminController@index');
	//后台用户管理
	Route::controller('/admin/user','UserController');
	//后台分类管理
	Route::controller('/admin/cate','CateController');
	//后台文章管理
	Route::controller('/admin/article','ArticleController');
});
//后台登陆
Route::get('/admin/login','LoginController@login');
Route::post('/admin/login','LoginController@dologin');
//友情链接后台管理
Route::controller('/admin/friendlink','FriendLinkController');
//前台的注册
Route::get('/register','LoginController@register');
Route::post('/register','LoginController@doregister');
//验证码显示得路由
Route::get('/vcode','CommonController@createVcode');
Route::get('/send','LoginController@send');
//发送邮件测试
Route::get('/send','LoginController@send');
//邮件激活
// Route::get('/jihuo','LoginController@jihuo');