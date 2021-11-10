<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_email')->nullable();
            $table->bigInteger('lead_id')->nullable();
            $table->string('company')->nullable();
            $table->string('industry')->nullable();
            $table->string('state_status')->nullable();
            $table->integer('no_of_employees')->nullable();
            $table->string('description')->nullable();
            $table->integer('rating')->nullable();
            $table->string('salutation')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('approved_status')->nullable();
            $table->boolean('approval_delegate')->nullable();
            $table->boolean('approval_approve')->nullable();
            $table->boolean('approval_reject')->nullable();
            $table->boolean('approval_resubmit')->nullable();
            $table->string('approval_state')->nullable();
            $table->boolean('editable_status')->nullable();
            $table->boolean('review_process_approve')->nullable();
            $table->boolean('review_process_reject')->nullable();
            $table->boolean('review_process_resubmit')->nullable();
            $table->boolean('in_merge')->nullable();
            $table->string('review')->nullable();
            $table->string('email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->boolean('email_opt_out')->nullable();
            $table->string('skype_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            $table->json('tag')->nullable();
            $table->string('fax')->nullable();
            $table->string('street')->nullable();
            $table->bigInteger('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('record_image')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->bigInteger('annual_revenue')->nullable();
            $table->string('designation')->nullable();
            $table->string('lead_source')->nullable();
            $table->string('lead_status')->nullable();
            $table->string('unsubscribed_mode')->nullable();
            $table->boolean('converted_status')->nullable();
            $table->json('converted_detail')->nullable();
            $table->boolean('process_flow_status')->nullable();
            $table->boolean('orchestration')->nullable();
            $table->string('last_activity_time')->nullable();
            $table->string('unsubscribed_time')->nullable();
            $table->string('created_time')->nullable();
            $table->string('modified_time')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
