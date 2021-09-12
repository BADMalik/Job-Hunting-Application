<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            'role_name'=>'admin',
            'name'=>'Bilal Malik',
            'email'=>'malikzaman133@gmail.com',
            'password'=>bcrypt('admin123456'),
            'first_name'=>'Bilal',
            'last_name'=>'Malik',
            'user_name'=>'BAD_Malik',
            'address'=>'Green House Sialkot',
            'phone_no'=>'+923356705565',
            // 'city'=>'Sialkot',
            'designation'=>'admin',
            'qualification'=>'Masters',
            'employment_status'=>'employeed',
            'country'=>'Pakistan',
            "gender"=>'male',
            'skills'=>'html,css'
        ]);
        DB::table('users')->insert(
        [
            'name'=>'Bilal Malik Employer',
            'email'=>'malikzaman1999@gmail.com',
            'password'=>bcrypt('admin123456'),
            'first_name'=>'Bilal',
            'last_name'=>'Malik Employer',
            'user_name'=>'BAD_Malik_Employer',
            'designation'=>'HR',
            'address'=>'Green House Sialkot',
            'phone_no'=>'+923164140126',
            // 'city'=>'Sialkot',
            'qualification'=>'Masters',
            'employment_status'=>'employeed',
            'country'=>'Pakistan',
            'role_name'=>'employer',
            "gender"=>'male',
            'skills'=>'html,css'
        ]);
        DB::table('users')->insert(
        [
            'role_name'=>'candidate',
            'name'=>'Bilal Candidate',
            'email'=>'bilal@yourvteams.com',
            'password'=>bcrypt('admin123456'),
            'first_name'=>'Bilal',
            'last_name'=>'Malik Candidate',
            'user_name'=>'BAD_Malik_Candidate',
            'designation'=>'Seeking Job',
            'address'=>'Green House Sialkot',
            'phone_no'=>'+923164140125',
            // 'city'=>'Sialkot',
            // 'role_name'=>''
            'qualification'=>'Masters',
            'employment_status'=>'employeed',
            'country'=>'Pakistan',
            "gender"=>'male',
            'skills'=>'html,css'
        ]);
    }
}
