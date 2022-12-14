<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterViewToKiteMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kite_menus', function (Blueprint $table) {
            $table->smallInteger('tpl_type')->comment('模板类型 1自定义 2 avue')->default(1);
            $table->text('options')->comment('页面内容')->nullable();
            $table->char('options_type', 1)->comment('页面类型 1 表格 2表单')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kite_menus', function (Blueprint $table) {
            $table->dropColumn('tpl_type');
            $table->dropColumn('options');
            $table->dropColumn('options_type');
        });
    }
}
