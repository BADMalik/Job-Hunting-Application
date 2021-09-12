<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert(
            [
                'name'=>'html',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'css',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'bootstrap',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'js',
            ]);DB::table('skills')->insert(
        [
            'name'=>'jquery',
        ]);
        DB::table('skills')->insert(
            [
                'name'=>'php',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'reactjs',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'vuejs',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'angularjs',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'laravel',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'codeigniter',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'nodejs',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'c#',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'mysql',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'nosql',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'mongodb',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'expressjs',
            ]);
        DB::table('skills')->insert(
            [
                'name'=>'mssql',
            ]);
        //
    }
}
