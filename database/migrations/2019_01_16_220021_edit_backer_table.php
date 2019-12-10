<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backers', function (Blueprint $table) {
            $table->string('transaction_no')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->string('status')->nullable();
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
            $table->dropColumn('transaction_no');
            $table->dropColumn('transaction_ref');
            $table->dropColumn('status');
        });
    }
}
