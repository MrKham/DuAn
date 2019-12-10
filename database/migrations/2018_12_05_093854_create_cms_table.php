<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->string('title');
            $table->char('menu_code', 20)->nullable();
            $table->char('slug', 255);
            $table->longText('content')->nullable();
            $table->char('type', 20)->nullable();
            $table->char('avatar_id', 32)->nullable();
            $table->char('created_by', 32);
            $table->char('updated_by', 32);
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
        Schema::dropIfExists('cms');
    }
}
