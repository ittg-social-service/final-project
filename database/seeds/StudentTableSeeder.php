<?php

use Illuminate\Database\Seeder;
use App\Student;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=10 ; $i++) {
          Student::create([
            'period_id' => 1,
            'group_id' => 1,
            'user_id' =>$i,
            'career_id' => 1,
            'semester_id' => 1,
          ]);
        }
        for ($j=11; $j <=20 ; $j++) {
          Student::create([
            'period_id' => 1,
            'group_id' => 2,
            'user_id' =>$i,
            'career_id' => 1,
            'semester_id' => 1,
          ]);
        }
    }
}
