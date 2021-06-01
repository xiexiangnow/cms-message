<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2021-05-31
 * Time: 17:30
 */

class CreateOrderUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_users',function(Blueprint $table){
            $table->increments('id')->comment('id');
            $table->char('merchant_name',120)->comment('商家名称');
//            $table->char('phone',11)->comment('电话号码');
//            $table->char('password',50)->comment('密码');
//            $table->char('description',50)->comment('描述');
//            $table->date('last_login_time')->comment('阳历生日');
//            $table->integer('integral')->comment('积分');
//            $table->integer('num')->comment('登录次数');
//            $table->softDeletes();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}