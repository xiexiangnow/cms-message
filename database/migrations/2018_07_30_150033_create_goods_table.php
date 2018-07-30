<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods',function(Blueprint $table){
            $table->increments('id')->comment('id');
            $table->string('pic_path')->comment('图片地址');
            $table->integer('cate_id')->comment('分类id');
            $table->char('title')->comment('商品标题');
            $table->decimal('money')->comment('价格');
            $table->decimal('postage')->comment('邮费');
            $table->text('description')->comment('描述');
            $table->longText('content')->comment('内容');
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
        Schema::drop('goods');
    }
}
