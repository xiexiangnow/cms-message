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

    //- 商品管理
    Route::resource('goods','GoodsController',['only'=>['index','create','store','edit','update','destroy','show']]);

    // -商品结算页面
    Route::get('settlement/{id}','GoodsController@settlement');

    // - 商品创建订单/下单操作
    Route::get('order/{id}','GoodsController@order');

    // -订单列表页面
    Route::get('orders','GoodsController@orders');

    // - 订单删除
    Route::delete('deleteOrder','GoodsController@deleteOrder');

    //商品图片上传
    Route::any('upload','GoodsController@upload');

    //签到
    Route::any('checkin','CommonController@checkIn');

    //充值积分页面
    Route::get('integral','UserController@Integral');

    //ipr管理员信息
    Route::resource('manager','ManagerController',['only' => ['index','show']]);


    // - 阿里云支付页面
    Route::any('payPage','AlipayController@payPage');

    Route::get('send','ArticleController@sendSMS');

    Route::get('queue','QueueController@queue');

});




