<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // \App\Models\Job::factory(1)->create();
        $user_id = $this->faker->unique()->numberBetween(1, \App\Models\User::count());
        // var_dump($user_id);die;
        $titles= ['PHP Developer',"Laravel Developer",'Codeigniter Deveoper','Full Stack Developer','MERN Stack Developer','MEAN Stack Developer','IOS Developer','Wordpress Developer','CMS Developer','UI/UX Designer','Front End Engineer','Principal Front End Developer','Chief Front End Engineer','.NET Developer','Python/Django Developer','Machine Learning Engineer','Data Science Engineer','Associate SQA','Manual SQAE','Automated SQAE'];
        $jobSelectedIndex = array_rand($titles);
        $required_skills=['MERN','Laravel','MEAN','Cloud AWS','IOS Development','HTML','CSS','PSD to HTML','.NET','Node','LAMP','ML','Data Science','JS','jQuery','ExpressJs','MySQL','AJAX','Bootstrap','Web Sockets','API','Payment Gateways','Apache','NGNIX','NoSQL','MongoDB','ReactJS','AngularJS','Tensorflow','VueJs','Symphony','C#','React Native','Redux','Flutter','Dart','Reponsive Design'];
        $finalSkills = [];
        for($i=0;$i<5;$i++)
        {
            $index = array_rand($required_skills);
            array_push($finalSkills,$required_skills[$index]);
            unset($required_skills[$index]);
        }
        $listOfSkills="";
        foreach($finalSkills as $skill)
        {
            $listOfSkills.=$skill.",";
        }
        $listOfSkills=rtrim($listOfSkills,',');
        // var_dump($listOfSkills);die;
        $jobSelected =$titles[$jobSelectedIndex];
        // echo ($jobSelected);die;
        $positions = ['Associate SE','SE','Senio SE','Cheif SE','Principal SE'];
        $postionSelectedIndex = array_rand($positions);
        $positionSelected = $positions[$postionSelectedIndex];
        // echo $this->faker->paragraph.$this->faker->paragraph;die;
        $locations=['PK','US','UK'];
        $locationsIndex=array_rand($locations);
        $finalLocation=$locations[$locationsIndex];
        $experience = [1,2,3,4,5];
        $experienceIndex = array_rand($experience);
        $finalExperience = $experience[$experienceIndex];
        $shifts=['morning','evening'];
        $shiftsIndex=array_rand($shifts);
        $finalShift=$shifts[$shiftsIndex];

        $companies = \App\Models\Company::all();

        return [
            'title'=>$jobSelected,
            'description'=>$this->faker->paragraph,
            'position'=>$positionSelected,
            'required_skills'=>$listOfSkills,
            'location'=>$finalLocation,
            'shift'=>$finalShift,
            'Experience'=>$finalExperience,
            'employer_id'=>$user_id,
            'designation_category'=>$positionSelected
        ];
    }
}
