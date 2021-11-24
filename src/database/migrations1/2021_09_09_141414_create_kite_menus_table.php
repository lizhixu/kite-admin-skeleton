<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent')->comment('父级id');
            $table->string('path')->comment('路径');
            $table->string('title')->comment('名称');
            $table->string('name')->comment('英文名称');
            $table->string('icon')->comment('icon名称');
            $table->enum('breadcrumb', [true, false])->comment('是否展示面包屑');
            $table->enum('sidebar', [true, false])->comment('是否在侧边栏展示');
            $table->string('activeMenu')->comment('菜单栏高亮路径');
            $table->string('redirect')->comment('跳转路径');
            $table->string('auth')->comment('权限组');
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
        Schema::dropIfExists('kite_menus');
    }
}
