<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteApiResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_api_resource', function (Blueprint $table) {
            $table->id();
            $table->enum('api_method', [0, 1, 2, 3, 4])->comment('请求方式')->default(0);
            $table->string('api_url')->comment('api')->default('');
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
        Schema::dropIfExists('kite_api_resource');
    }
}
