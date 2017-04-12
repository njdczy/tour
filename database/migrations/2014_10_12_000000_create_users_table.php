<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email',100)->nullable()->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->tinyInteger('subscribe')->default(1)->index()->comment('是否关注');
            $table->string('remark')->nullable()->comment('备注');
            $table->string('groupid')->nullable()->comment('分组ID');
            $table->string('tagid_list')->nullable()->comment('标签ID列表');
            $table->string('phone_number')->nullable()->comment('手机号');
            $table->string('real_name')->nullable()->comment('真实姓名');
            $table->string('register_source')->default('后台添加')->index();
            $table->timestamp('last_actived_at')->nullable();
            $table->string('openid')->nullable()->comment('openid')->index();
            $table->string('unionid')->nullable()->comment('unionid');
            $table->string('wx_nickname')->nullable()->comment('昵称');
            $table->string('wx_id')->nullable()->comment('wx_id');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('sex')->nullable()->comment('性别');
            $table->string('city')->nullable()->comment('城市');
            $table->string('country')->nullable()->comment('国家');
            $table->string('province')->nullable()->comment('省');
            $table->string('address')->nullable()->comment('地址');
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
        Schema::dropIfExists('users');
    }
}
