<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CoordinatorsTableSeeder::class);
         $this->call(DepartmentManagersTableSeeder::class);
         $this->call(TutorsTableSeeder::class);
         $this->call(PeriodsTableSeeder::class);
         $this->call(GroupsTableSeeder::class);
         $this->call(CareersTableSeeder::class);
         $this->call(SemestersTableSeeder::class);
    }
}
