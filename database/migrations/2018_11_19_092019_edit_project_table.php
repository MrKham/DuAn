<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_slide')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_slide')->nullable();
        });

        Schema::create('subcribers', function(Blueprint $table)
        {
            $table->char('id', 32);
            $table->primary('id');
            $table->string('email');
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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_slide');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_slide');
        });

        Schema::dropIfExists('subcribers');
    }
}
