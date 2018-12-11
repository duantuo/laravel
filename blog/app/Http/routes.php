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

Route::group(['middleware'=>['web']], function (){
	Route::get('/','Home\IndexController@index');
	Route::get('/cate/{cate_id}','Home\IndexController@cate');
	Route::get('/a/{art_id}','Home\IndexController@article');

	//定义后台登陆界面路由 any可以获取到post get 等提交过来的数据
	Route::any('admin/login', 'Admin\LoginController@login');
	//定义验证码路由
	Route::get('admin/code' , 'Admin\LoginController@code' );
	Route::get('admin/config/putfile' , 'ConfigController@putFile');
	//通过session获取验证码的值
	//Route::get('admin/getcode' , 'Admin\LoginController@getcode');
});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function (){
	//后台首页路由
	Route::get('/' , 'IndexController@index' );
	//首页主模块路由
	Route::get('info' , 'IndexController@info' );
	//退出路由
	Route::get('quit' , 'LoginController@quit' );
	//修改admin密码路由
	Route::any('pass' , 'IndexController@pass');
	//分类排序路由
	Route::post('cate/changeorder' , 'CategoryController@changeOrder');
	//分类路由
	Route::resource('category', 'CategoryController');
	//文章资源路由
	Route::resource('article', 'ArticleController');
	//友情链接路由
	Route::resource('links', 'LinksController');
	//友情链接排序路由
	Route::post('links/changeorder' , 'LinksController@changeOrder');	
	//导航栏接路由
	Route::resource('navs', 'NavsController');
	//导航栏排序路由
	Route::post('navs/changeorder' , 'NavsController@changeOrder');	
	//网站配置路由
	Route::resource('config', 'ConfigController');
	//网站配置排序路由
	Route::post('config/changeorder' , 'ConfigController@changeOrder');
	//网站配置首页提交路由
	Route::post('config/changecontent' , 'ConfigController@changeContent');
	//生成网站配置文件路由
	Route::get('config/putfile' , 'ConfigController@putFile');
	//缩略图上传路由
	Route::any('upload','CommonController@upload');
});
Route::any('admin/login', 'Admin\LoginController@login');