<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',function(Blueprint $table){
            $table->increments('id')->comment('id');
            $table->integer('user_id')->comment('与用户的关联id');
            $table->integer('goods_id')->comment('与商品关联的id');
            $table->string('order_no')->comment('订单号');
            $table->integer('goods_num')->comment('商品数量');
            $table->integer('status')->comment('1:待付款；2：待发货；3、待收货；4；订单完成');
            $table->decimal('order_money')->comment('订单金额');
            $table->text('description')->comment('描述');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
