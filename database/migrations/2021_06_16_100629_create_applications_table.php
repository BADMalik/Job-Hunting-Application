<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('applicant_id');
            $table->string('description');
            $table->string('applicant_cv');
            // $table->string('title');
            $table->string('designation_category');
            // $table->string('designation_sub_category');
            $table->integer('job_id');
            $table->enum('status',['submitted','reviewed','shortlisted','rejected','hired']);
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
        Schema::dropIfExists('applications');
    }
}
