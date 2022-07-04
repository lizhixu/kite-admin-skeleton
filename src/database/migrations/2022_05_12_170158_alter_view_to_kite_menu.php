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
            $table->char('tpl_type', 1)->comment('模板类型 1自定义 2 avue')->default(1);
            $table->text('options')->comment('页面内容');
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
        });
    }
}
