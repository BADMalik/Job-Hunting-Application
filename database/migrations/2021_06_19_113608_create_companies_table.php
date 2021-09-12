<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Description');
            $table->string('Location');
            $table->string('type');
            $table->integer('employees_count');
            $table->timestamps();
        });
        Schema::table('companies',function(Blueprint $table)
        {
            $table->renameColumn('Description', 'description');
            $table->renameColumn('Location', 'location');
        });
        // Schema::rename(, $to);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
