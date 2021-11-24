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
            $table->integer('parent_id')->comment('父级id')->default(0);
            $table->text('content')->comment('菜单内容');
            $table->string('keyword')->comment('关键字')->unique();
            $table->enum('page_type', [0, 1, 2])->comment('页面类型')->default(0);
            $table->text('component_object')->comment('组件对象')->nullable();
            $table->string('select_url')->comment('select链接')->default('');
            $table->string('insert_url')->comment('insert链接')->default('');
            $table->string('update_url')->comment('update链接')->default('');
            $table->string('delete_url')->comment('delete链接')->default('');
            $table->string('search_url')->comment('search链接')->default('');
            $table->string('row_edit_url')->comment('row_edit链接')->default('');
            $table->string('save_url')->comment('save链接')->default('');
            $table->timestamps();
            $table->charset = 'utf8mb4';
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
