<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_id');
            $table->string('trip_name');
            $table->string('triplist_id');
            $table->string('triplist_name');
            $table->integer('user_id');
            $table->string('user_name');
            $table->text('child_info');
            $table->unsignedTinyInteger('is_payed')->default(0);
            $table->decimal('need_total',10,2);
            $table->decimal('total',10,2)->default(0.00);
            $table->string('enjoin')->nullable();
            $table->unsignedTinyInteger('is_bed')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
