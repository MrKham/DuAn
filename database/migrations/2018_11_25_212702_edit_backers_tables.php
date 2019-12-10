<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBackersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backers', function (Blueprint $table) {
            $table->string('address')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('category_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backers', function (Blueprint $table) {
            $table->dropColumn('address');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('social_id');
            $table->dropColumn('social_type');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category_name');
        });
    }
}
