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
        /*

        // $this->call(UsersTableSeeder::class);
       $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(CareerTableSeeder::class);
        $this->call(CoordinatorTableSeeder::class);
        $this->call(DepartmentManagerTableSeeder::class);
        $this->call(PeriodTableSeeder::class);
        $this->call(TutorTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(StudentTableSeeder::class);

        */
        
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SemestersTableSeeder::class);
        $this->call(CareersTableSeeder::class);
        $this->call(CoordinatorsTableSeeder::class);
        $this->call(DepartmentManagersTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(TutorsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);

        //$this->call(StudentsTableSeeder::class);

    }
}
