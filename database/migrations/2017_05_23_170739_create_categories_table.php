<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories',function(Blueprint $table){
            $table->increments('cate_id');
            $table->char('cate_name',100)->comment('分类名');
            $table->char('cate_title')->comment('分类标题');
            $table->char('cate_keywords')->comment('分类关键词');
            $table->char('cate_description')->comment('描述');
            $table->integer('cate_view')->comment('查看次数');
            $table->tinyInteger('cate_order')->comment('排序');
            $table->integer('cate_pid')->comment('父级id');
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
        Schema::drop('categories');
    }
}
