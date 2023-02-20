<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiteAttachmentManage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //附件表
        Schema::create('kite_attachment_manage', function (Blueprint $table) {
            $table->id();
            $table->string('mode_name')->comment('模块关键字')->index();
            $table->string('file_url')->comment('文件路径');
            $table->string('file_ext', 50)->comment('mime类型');
            $table->string('file_size')->comment('文件大小,kb');
            $table->integer('admin_id')->comment('上传管理员')->index();
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
        Schema::dropIfExists('table_attachment_manage');
    }
}
