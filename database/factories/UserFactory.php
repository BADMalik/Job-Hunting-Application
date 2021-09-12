<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name =$this->faker->name();
        $last_name = $this->faker->name();
        $full_name = $first_name." ".$last_name;
        $skills = ['MERN','Laravel','MEAN','Cloud AWS','IOS Development','HTML','CSS','PSD to HTML'];
        $ans_skills = [];
        for($i=0;$i<=1;$i++)
        {
            $key=array_rand($skills);
            array_push($ans_skills,$skills[$key]);
        }
        $skill_string = "";
        foreach($ans_skills as $key => $value){
            // echo $value;
            $skill_string.=$value.",";
        }
        $skill_string=rtrim($skill_string,',');
        // var_dump($full_name);die;
        // echo($skill_string);die;
        return [
            'name' => $full_name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'cv'=>NULL,
            'user_name'=>$this->faker->userName(),
            'address'=>$this->faker->address,
            'phone_no'=>$this->faker->phoneNumber,
            'city'=>$this->faker->city,
            'qualification'=>$this->faker->randomElement($array = array('BSCS',
            'MCS')),
            'employment_status'=>$this->faker->randomElement($array = array('unemployeed','employeed')),
            'gender'=>$this->faker->randomElement($array = array('Male','Female')),
            'designation'=>$this->faker->randomElement($array = array('HR','Assistant Manager','Seeking Job')),
            'country'=>$this->faker->country,
            'role_name'=>$this->faker->randomElement($array = array('candidate','employer')),
            'skills'=>$skill_string,
            'profile_picture'=> 'https://source.unsplash.com/random',
            'password' => bcrypt('admin123456'), // password
            'remember_token' => Str::random(10),
        ];
        // var_dump($data);die;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
