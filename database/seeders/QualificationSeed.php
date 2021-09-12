<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QualificationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('qualifications')->insert(
            [
                'name'=>'MSC',
            ]);
            DB::table('qualifications')->insert(
            [
                'name'=>'MBA',
            ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BSCS',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'B.Com',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BBA',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'MA English',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'MA Urdu',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BS Electrical Engineering',
                ]);

            DB::table('qualifications')->insert(
            [
                'name'=>'BS Software Engineering',
            ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BS Math',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BS Data Sciences',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'M.Com',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'MS Data Sciences',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'MS Computer Sciences',
                ]);

            DB::table('qualifications')->insert(
                [
                    'name'=>'BSIT',
                ]);

            DB::table('qualifications')->insert(
            [
                'name'=>'MS IT',
            ]);
    }
}
