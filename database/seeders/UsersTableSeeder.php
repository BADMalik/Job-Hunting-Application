<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name'=>'Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'name'=>'Argon Admin',
            'updated_at' => now(),
            'role_name'=>'admin',
            'user_name'=>'BAD_Malik18',
            'address'=>'Green House Sialkot',
            'phone_no'=>'+923356605565',
            // 'city'=>'Sialkot',
            'designation'=>'admin',
            'qualification'=>'Masters',
            'employment_status'=>'employeed',
            'country'=>'Pakistan',
            "gender"=>'male',
            'skills'=>'html,css'
        ]);
    }
}
