<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_projects', function (Blueprint $table) {
            $table->char('id', 32);
            $table->char('project_id', 32)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = gọi vốn thành công, 1 = gọi vốn thất bại');
            $table->tinyInteger('mail_status')->default(0)->comment('0 = chưa gửi, 1 = đã gửi');
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
        Schema::dropIfExists('report_projects');
    }
}
