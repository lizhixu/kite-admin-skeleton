<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteMenusTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('kite_menus', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [0, 1, 2, 3, 4])->comment('页面类型')->default(0);
            $table->integer('parent_id')->comment('父级id')->default(0);
            $table->string('path')->comment('路由地址')->default('');
            $table->string('redirect')->comment('路由跳转地址')->default('');
            $table->string('name')->comment('别名')->default('');
            $table->string('component')->comment('视图')->default('');
            $table->string('title')->comment('显示名称')->default('');
            $table->string('icon')->comment('菜单图标')->default('');
            $table->enum('isHide', [0, 1])->comment('是否隐藏')->default(0);
            $table->enum('isKeepAlive', [0, 1])->comment('是否缓存')->default(1);
            $table->enum('isAffix', [0, 1])->comment('是否固定')->default(0);
            $table->timestamps();
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kite_menus');
    }
}
