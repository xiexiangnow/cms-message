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


use Dingo\Api\Facade\Route as DRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    echo '欢迎！';
});

 // - api测试
DRoute::version('v1', [
    'namespace'  => 'App\\Http\\Controllers\\Api\V1',
    //'middleware' => ['auth'],
], function () {

    DRoute::group([
        'namespace' => 'User',
    ], function () {
        //DRoute::get('users/all', 'UserController@all');
        DRoute::resource('users', 'UserController');
    });

    // - 项目管理
    DRoute::group([
        'namespace' => 'Project',
    ],function(){
        DRoute::resource('projects','ProjectController',['only' => ['index']]);
    });
});

/**
 *  后台
 * */
Route::group([
    'namespace' => 'Admin',
    //'middleware' => ['auth'],
], function () {
    // - 登录界面
    Route::any('admin/login','LoginController@login');

    // - 测试请求
    Route::get('projects','HttpController@projects');

});


Route::group([
    'namespace'  => 'Admin',
    'middleware' => ['admin.login'],
    'prefix'     => 'admin'
], function () {
    // - 后台首页
    Route::get('index','IndexController@index');

    // - 网站信息页面
    Route::get('info','IndexController@info');

    // - 退出
    Route::get('login_out','LoginController@loginOut');

    // - 修改密码
    Route::any('modify_pass','IndexController@modifyPass');

    // - 分类
    Route::resource('category','CategoryController',['only'=>['index','create','store','edit','update','destroy']]);

    // - 分类排序
    Route::post('cate/cate_order','CategoryController@cateOrder');

    // - 文章管理
    Route::resource('article','ArticleController',['only'=>['index','create','edit','update','destroy','store','show']]);

    // - 图片上传
    Route::any('article/upload','ArticleController@upload');

    // - tag管理
    Route::resource('tag','TagController',['only'=>['index','create','store','edit','update','destroy']]);

    // - 用户管理
    Route::resource('user','UserController',['only'=>['index','create','store','edit','update','destroy']]);

    Route::get('send','ArticleController@sendSMS');

    Route::get('queue','QueueController@queue');

});




