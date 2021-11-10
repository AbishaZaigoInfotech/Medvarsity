<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('role_id');
            $table->bigInteger('profile_id');
            $table->bigInteger('zuid')->nullable();
            $table->string('profile_name')->nullable();
            $table->string('role_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('name_format')->nullable();
            $table->string('reporting_to')->nullable();
            $table->string('alias')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('street')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_locale')->nullable();
            $table->string('signature')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('language')->nullable();
            $table->string('locale')->nullable();
            $table->boolean('microsoft')->nullable();
            $table->boolean('personal_account')->nullable();
            $table->boolean('is_online')->nullable();
            $table->Integer('default_tab_group')->nullable();
            $table->boolean('sandbox_developer')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('crm_users');
    }
}
