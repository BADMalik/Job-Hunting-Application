<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->string('skills')->nullable()->change();
            $table->string('designation')->nullable()->default('UnEmployeed')->change();
//            $table->string('employment_status')->dropColumn();
            // $table->
            // $table->string('cv')->nullable()
            // $table->unsignedBigInteger('company_id')->nullable();
            // $table->foreign('company_id')->reference('id')->on('companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
