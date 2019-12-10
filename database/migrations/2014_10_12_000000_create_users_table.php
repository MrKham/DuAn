<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', 32);
            // general info
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('nickname')->nullable();
            $table->dateTime('birth_day')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_date')->nullable();
            $table->string('email')->unique();
            $table->char('avatar_id', 32)->nullable();
            $table->string('password')->nullable();
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();
            $table->string('company')->nullable();
            $table->longText('information')->nullable();
            //address info
            $table->string('address')->nullable();
            $table->string('other_address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('home_number')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            //bank info
            $table->string('bank_name')->nullable();
            $table->string('bank_owner')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('tax_number')->nullable();
            //social
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->enum('status', ['active', 'delete', 'freeze'])->default('freeze');
            $table->char('created_by', 32)->nullable();
            $table->char('updated_by', 32)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
