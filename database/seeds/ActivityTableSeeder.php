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
        DB::table('activities')->insert([
            [ 
              'title' => 'Actividad 1 - LLenado de ficha de indentificación del tutorado.',
              'description' => 'LLenar todos los campos.',
              'file'=>'/pdf/semestre_1/actividad_1.docx',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 2 - La línea de la vida.',
              'description' => 'OBJETIVO: Observar tu vida como si fueras una persona ajena a ella, con el fin de identificar patrones y etapas (capítulos) de tu vida hasta el día de hoy. Cada participante describa su desarrollo o su trayectoria personal en el tiempo; es decir, marcará los sucesos desde su nacimiento hasta el día de la aplicación y como estos eventos han sido representativos para el en su vida.',
                'file'=>'/pdf/semestre_1/actividad_2.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 3 - Análisis FODA.',
              'description' => 'OBJETIVO:
                Identifica lo que tiene que construir en el siguiente capítulo de tu vida. Toma conciencia de qué recursos, capacidades y cualidades conforman tus fortalezas principales.',
              'file'=>'/pdf/semestre_1/actividad_3.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 4 - Administración de tiempo.',
              'description' => 'Es una herramienta para conocer la situación real y actual en que se encuentra una persona, organización, empresa o proyecto analizando sus características internas (Debilidades y Fortalezas) y su situación externa (Amenazas y Oportunidades) y planificar una estrategia de mejora a futuro.',
              'file'=>'/pdf/semestre_1/actividad_4.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 5 - Desarrollo humano integral (Dimensión física).',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_5.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 6 - Desarrollo humano integral (Dimensión cognitiva).',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_6.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 7 - Habilidades de estudio efectivo.',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_7.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 8 - La memoria.',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_8.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 9 - Habilidades básicas de pensamiento.',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_9.pdf',
              'semester_id' => 1,
            ],

            [ 
              'title' => 'Actividad 10 - Actividad Integradora.',
              'description' => 'Realizar las actividades del documento.',
              'file'=>'/pdf/semestre_1/actividad_10.pdf',
              'semester_id' => 1,
            ],
        ]);
    }
}
