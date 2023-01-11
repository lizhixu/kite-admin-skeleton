<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteIconCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_icon_categorys', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->comment('分类名称');
            $table->string('category_alias')->comment('分类标识')->unique();
            $table->integer('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('kite_icon_categorys');
    }
}
