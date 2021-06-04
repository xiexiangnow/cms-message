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
        DRoute::resource('projects','ProjectController',['only' => ['buy_goods']]);
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

/**
 * 后端
 */
Route::group([
    'namespace'  => 'Admin',
    'middleware' => ['admin.login'],
    'prefix'     => 'admin'
], function () {
    // - 后台首页
    Route::get('buy_goods','IndexController@buy_goods');

    // - 网站信息页面
    Route::get('info','IndexController@info');

    // - 退出
    Route::get('login_out','LoginController@loginOut');

    // - 修改密码
    Route::any('modify_pass','IndexController@modifyPass');

    // - 分类
    Route::resource('category','CategoryController',['only'=>['buy_goods','create','store','edit','update','destroy']]);

    // - 分类排序
    Route::post('cate/cate_order','CategoryController@cateOrder');

    // - 文章管理
    Route::resource('article','ArticleController',['only'=>['buy_goods','create','edit','update','destroy','store','show']]);

    // - 图片上传
    Route::any('article/upload','ArticleController@upload');

    // - tag管理
    Route::resource('tag','TagController',['only'=>['buy_goods','create','store','edit','update','destroy']]);

    // - 用户管理
    Route::resource('user','UserController',['only'=>['buy_goods','create','store','edit','update','destroy']]);

    //- 商品管理
    Route::resource('goods','GoodsController',['only'=>['buy_goods','create','store','edit','update','destroy','show']]);

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
    Route::resource('manager','ManagerController',['only' => ['buy_goods','show']]);

    //美女图片
    Route::resource('spider','SpiderController',['only' => ['buy_goods','show']]);

    //美女图片首页显示
    Route::any('goIndex','SpiderController@goIndex');


    // - 阿里云支付页面
    Route::any('payPage','AlipayController@payPage');

    Route::get('send','ArticleController@sendSMS');

    Route::get('queue','QueueController@queue');

});

/**
 *  前端
 */
Route::group([
    'namespace'  => 'Front',
    'prefix'     => 'front'
], function () {
    //前端首页
    Route::resource('buy_goods','IndexController');

    //性感美女
    Route::resource('xinggan','XingGanController');


    //性感美女，数据执行（过滤图片分类）
    Route::get('exec_xinggan','ExecController@execXingGan');


    //gearmand测试
    Route::resource('gearmand','GearmandController');

    Route::any('worker','GearmandController@worker');

});

/**
 *  - 订购系统前端
 */

Route::group([
    'namespace' => 'Order',
    'prefix'     => 'order'
], function () {
    // - 登录界面
    Route::any('login','LoginController@login');

    //首页
    Route::resource('index','IndexController');

    // 订购页面
    Route::resource('buy_goods','BuyGoodsController');


});








