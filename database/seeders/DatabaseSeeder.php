<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call([UserTableSeeder::class]);
        // $this->call([jobTableSeeder::class]);


        \App\Models\Company::factory(10)->create();
        // $this->call([ApplicationSeed::class]);
        // $this->call([EventsTableSeeder::class]);

        // $this->call([QualificationSeed::class]);
        // $this->call([RolesTableSeeder::class]);
        // $this->call([SkillSeeder::class]);

    }
}
