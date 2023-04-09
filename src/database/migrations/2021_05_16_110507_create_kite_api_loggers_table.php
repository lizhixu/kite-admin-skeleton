<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteApiLoggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kite_api_loggers', function (Blueprint $table) {
            $table->id();
            $table->string('api_url');
            $table->string('request_full_url');
            $table->string('request_method');
            $table->longText('request_body')->nullable();
            $table->longText('request_header')->nullable();
            $table->string('request_ip')->nullable();
            $table->longText('request_agent')->nullable();
            $table->longText('response_content')->nullable();
            $table->integer('response_status_code')->nullable();
            $table->integer('admin_id')->nullable();
            $table->index('admin_id', '管理员');
            $table->index('api_url');
            $table->index('created_at');
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
        Schema::dropIfExists('kite_api_loggers');
    }
}
