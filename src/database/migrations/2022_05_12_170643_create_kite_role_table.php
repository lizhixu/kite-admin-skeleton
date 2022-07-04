<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_role', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->comment('角色名称');
            $table->integer('parent_id')->comment('父级');
            $table->integer('sort')->comment('排序');
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
        Schema::dropIfExists('kite_role');
    }
}
