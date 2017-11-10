<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles',function(Blueprint $table){
            $table->increments('id')->comment('id');
            $table->integer('cate_id')->comment('分类id');
            $table->char('title')->comment('文章标题');
            $table->char('thumb')->comment('缩略图');
            $table->text('description')->comment('描述');
            $table->longText('content')->comment('内容');
            $table->char('keyword',255);
            $table->integer('sort');
            $table->char('author',50);
            $table->tinyInteger('is_top');
            $table->integer('view')->comment('查看次数');
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
        Schema::drop('articles');
    }
}

