<?php

use Illuminate\Database\Seeder;
use App\Activity;
class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
          'title'=> 'Actividad 1',
          'description'=> 'Esta es la descripcion para la actividad 1',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 2',
          'description'=> 'Esta es la descripcion para la actividad 2',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 3',
          'description'=> 'Esta es la descripcion para la actividad 3',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 4',
          'description'=> 'Esta es la descripcion para la actividad 4',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 5',
          'description'=> 'Esta es la descripcion para la actividad 5',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 6',
          'description'=> 'Esta es la descripcion para la actividad 6',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 7',
          'description'=> 'Esta es la descripcion para la actividad 7',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 8',
          'description'=> 'Esta es la descripcion para la actividad 8',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 9',
          'description'=> 'Esta es la descripcion para la actividad 9',
          'semester_id'=>1,
        ]);
        Activity::create([
          'title'=> 'Actividad 10',
          'description'=> 'Esta es la descripcion para la actividad 10',
          'semester_id'=>1,
        ]);
    }
}
