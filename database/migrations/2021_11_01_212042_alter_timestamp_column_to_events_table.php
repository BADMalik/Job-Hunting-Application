<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTimestampColumnToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //
            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
            if (Schema::hasColumn('events', 'updated_at'))
            {
                Schema::table('events', function (Blueprint $table)
                {
                    $table->dropColumn('updated_at');
                });
            }
            if (Schema::hasColumn('events', 'created_at'))
            {
                Schema::table('events', function (Blueprint $table)
                {
                    $table->dropColumn('created_at');
                });
            }
        });
    }
}
