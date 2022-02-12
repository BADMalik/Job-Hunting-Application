<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companyTypes = ['IT Company','Architchture Company','Researcher Organization','Independent Organization','Crown Funded Organization','Auto Parts Manufacturing Company','Government Organization'];
        $indexOfCompany=array_rand($companyTypes);
        $finalCompanyType=$companyTypes[$indexOfCompany];
        return
        [
            'name'=>$this->faker->jobTitle,
            'description'=>$this->faker->realText(),
            // 'country'=>$this->faker->country,
            'type'=>$finalCompanyType,
            'location'=>$this->faker->address,
            'employees_count'=>rand(0,1000)
            //
        ];
    }
}
