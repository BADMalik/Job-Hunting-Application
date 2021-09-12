<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cv')->nullable();
            $table->string('user_name')->unique();
            $table->string('address');
            $table->string('phone_no')->unique();
            $table->string('city');
            // $table->integer
            $table->string('qualification');
            $table->enum('employment_status',['unemployeed','employeed']);
            $table->string('country');
            $table->string('gender');
            $table->string('designation');
            $table->enum('role_name', ['admin', 'candidate','employer']);
            $table->string('skills');
            $table->string('profile_picture')->nullable();
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
