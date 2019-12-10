<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProjectTableForLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // add column
            $table->string('headline_en', 1000)->after('headline')->nullable();
            $table->longText('about_project_en')->after('about_project')->nullable();
            $table->longText('project_plan_en')->after('project_plan')->nullable();
            $table->longText('project_use_en')->after('project_use')->nullable();
            $table->longText('user_introduce_member_en')->after('user_introduce_member')->nullable();

            // change name
            $table->renameColumn('headline', 'headline_vi');
            $table->renameColumn('about_project', 'about_project_vi');
            $table->renameColumn('project_plan', 'project_plan_vi');
            $table->renameColumn('project_use', 'project_use_vi');
            $table->renameColumn('user_introduce_member', 'user_introduce_member_vi');
        });

        Schema::table('p_rewards', function (Blueprint $table) {
            // add column
            $table->string('description_en', 1000)->after('description')->nullable();

            // change name
            $table->renameColumn('description', 'description_vi');
        });

        Schema::table('p_updates', function (Blueprint $table) {
            // add column
            $table->string('title_en', 1000)->after('title')->nullable();
            $table->string('content_en', 1000)->after('content')->nullable();

            // change name
            $table->renameColumn('title', 'title_vi');
            $table->renameColumn('content', 'content_vi');
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
            $table->dropColumn(['headline_en', 'about_project_en', 'project_plan_en', 'project_use_en', 'user_introduce_member_en']);

            $table->renameColumn('headline_vi', 'headline');
            $table->renameColumn('about_project_vi', 'about_project');
            $table->renameColumn('project_plan_vi', 'project_plan');
            $table->renameColumn('project_use_vi', 'project_use');
            $table->renameColumn('user_introduce_member_vi', 'user_introduce_member');
        });

        Schema::table('p_rewards', function (Blueprint $table) {
            $table->dropColumn(['description_en']);

            $table->renameColumn('description_vi', 'description');
        });

        Schema::table('p_updates', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'content_en']);

            $table->renameColumn('title_vi', 'title');
            $table->renameColumn('content_vi', 'content');
        });
    }
}
