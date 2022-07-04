<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_admin', function (Blueprint $table) {
            $table->id();
            $table->string('username', 11)->comment('登录名');
            $table->string('password')->comment('密码');
            $table->string('name', 12)->comment('用户名');
            $table->string('avatar')->nullable()->comment('头像');
            $table->timestamp('last_login_time')->comment('最后一次登录时间');
            $table->tinyInteger('status')->default(1)->comment('管理员状态');
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
        Schema::dropIfExists('kite_admin');
    }
}
