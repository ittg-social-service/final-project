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
        $this->call(role_userTableSeeder::class);
        $this->call(SemestersTableSeeder::class);
        $this->call(CareersTableSeeder::class);
        $this->call(CoordinatorsTableSeeder::class);
        $this->call(DepartmentManagersTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(TutorsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        //$this->call(StudentsTableSeeder::class);

    }
}
