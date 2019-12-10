<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByBackers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backers', function (Blueprint $table) {
            $table->char('created_by', 32)->nullable();
            $table->char('updated_by', 32)->nullable();
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
            $table->dropColumn(['created_by', 'updated_by']);
        });
    }
}
