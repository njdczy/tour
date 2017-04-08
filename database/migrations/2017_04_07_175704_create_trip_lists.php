<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('times')->comment('期数');
            $table->timestamp('date_start')->nullable()->comment('开始时间');
            $table->timestamp('date_end')->nullable()->comment('结束时间');
            $table->text('pictures')->nullable()->comment('图片');
            $table->text('title1')->nullable()->comment('标题1');
            $table->text('content1')->nullable()->comment('文字1');
            $table->text('title2')->nullable()->comment('标题2');
            $table->text('content2')->nullable()->comment('文字2');
            $table->text('title3')->nullable()->comment('标题3');
            $table->text('content3')->nullable()->comment('文字3');
            $table->integer('trip_id');
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
        Schema::dropIfExists('trip_lists');
    }
}
