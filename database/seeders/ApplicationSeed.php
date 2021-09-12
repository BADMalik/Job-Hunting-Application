<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Generator;

class ApplicationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // $faker =  \/Container::getInstance()->make(Generator::class);
        //
        $titles= ['PHP Developer',"Laravel Developer",'Codeigniter Deveoper','Full Stack Developer','MERN Stack Developer','MEAN Stack Developer','IOS Developer','Wordpress Developer','CMS Developer','UI/UX Designer','Front End Engineer','Principal Front End Developer','Chief Front End Engineer','.NET Developer','Python/Django Developer','Machine Learning Engineer','Data Science Engineer','Associate SQA','Manual SQAE','Automated SQAE'];
        $index = array_rand($titles);
        $titleSelected = $titles[$index];
        DB::table('applications')->insert(
        [
            'title'=>$faker->jobTitle,
            'applicant_id'=>(\App\Models\User::all()->random()->id),
            'description'=>$faker->paragraph,
            'applicant_cv'=>'Dummy',
            'designation_category'=>$titleSelected,
            'job_id'=>\App\Models\Job::all()->random()->id,
            'status'=>'submitted'
        ]);
        //
    }
}
