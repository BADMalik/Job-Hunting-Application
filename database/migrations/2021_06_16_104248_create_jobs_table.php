<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('position');
            $table->string('Experience');
            $table->integer('employer_id');

            $table->string('required_skills');
            $table->string('designation_category');
            $table->string('location');
            $table->string('company_id');
            $table->enum('shift',['morning','evening']);

            $table->timestamps();
        });
        Schema::table('jobs',function(Blueprint $table)
        {
            $table->unsignedBigInteger('company_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
