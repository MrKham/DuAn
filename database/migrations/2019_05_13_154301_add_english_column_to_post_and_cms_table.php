<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnglishColumnToPostAndCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->longText('content_en')->nullable();
            // $table->string('name_en')->nullable();
        });

        Schema::table('cms', function (Blueprint $table) {
            $table->longText('content_en')->nullable();
            // $table->string('title_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('content_en');
            // $table->dropColumn('name_en');
        });

        Schema::table('cms', function (Blueprint $table) {
            $table->dropColumn('content_en');
            // $table->dropColumn('title_en');
        });
    }
}
