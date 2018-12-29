<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birthdays',function(Blueprint $table){
            $table->increments('id')->comment('id');
            $table->char('name',20)->comment('姓名');
            $table->char('group',20)->comment('分组');
            $table->char('animals',10)->comment('生肖');
            $table->char('horoscope',50)->comment('生辰八字');
            $table->date('solar_calendar')->comment('阳历生日');
            $table->date('lunar_calendar')->comment('阴历生日');
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
        //
    }
}
