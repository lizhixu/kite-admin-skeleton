<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_icons', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->comment('分类id')->index();
            $table->string('icon_name')->comment('图标名称');
            $table->string('icon_class')->comment('图标类名');
            $table->integer('admin_id')->comment('管理员id')->index();
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
        Schema::dropIfExists('kite_icons');
    }
}
