<?php

use Illuminate\Database\Seeder;

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
         	[// fake department manager
	            'username' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	         ],
	         [// fake coordinator
	            'username' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	         ],
	         [// fake tutor
	            'username' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	         ],
         	[//real department manager
	            'username' => '13270550',
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => 'jefe1@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => bcrypt('13270550'),
	         ],
	         [//real coordinator
	         	'username' => '13270551',
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => 'coord1@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => bcrypt('13270551'),
	         ]
        ]);
    }
}

