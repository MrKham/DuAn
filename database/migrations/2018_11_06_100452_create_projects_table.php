<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->string('name');
            $table->char('category_id', 32)->nullable();
            $table->float('expense', 30, 4)->nullable();
            $table->integer('plan_days')->nullable();
            $table->dateTime('open_port_date')->nullable();
            $table->string('user_type')->nullable();
            $table->string('user_company_name')->nullable();
            $table->string('user_position')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phone_number')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_bank_owner')->nullable();
            $table->string('user_bank_number')->nullable();
            $table->string('user_bank_name')->nullable();
            $table->string('user_bank_branch')->nullable();
            $table->string('user_tax_number')->nullable();
            $table->longText('user_introduce_member')->nullable();
            $table->char('avatar_id', 32)->nullable();
            $table->string('headline')->nullable();
            $table->string('video_url')->nullable();
            $table->longText('about_project')->nullable();
            $table->longText('project_plan')->nullable();
            $table->longText('project_use')->nullable();
            $table->string('status')->nullable();

            $table->char('created_by', 32)->nullable();
            $table->char('updated_by', 32)->nullable();
            $table->timestamps();
        });

        Schema::create('backers', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->char('project_id', 32);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->float('amount', 30, 4)->nullable();
            $table->timestamps();
        });

        Schema::create('p_updates', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->char('project_id', 32);
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->timestamps();
        });

        Schema::create('p_rewards', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->char('project_id', 32);
            $table->float('cost', 30, 4)->nullable();
            $table->string('description')->nullable();
            $table->date('delivery_date')->nullable();
            $table->boolean('is_limited')->nullable();
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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('backers');
        Schema::dropIfExists('p_updates');
        Schema::dropIfExists('p_rewards');
    }
}
