<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvoxSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convox_settings', function (Blueprint $table) {
            $table->id();
            $table->string('port');
            $table->string('ip_address');
            $table->string('homepage_url');
            $table->string('callback_url');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('access_token');
            $table->string('session_timeout');
            $table->string('frequency');
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
        Schema::dropIfExists('convox_settings');
    }
}
