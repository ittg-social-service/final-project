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
	            'nc' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	            'role_id' => 3
	         ],
	         [// fake coordinator
	            'nc' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	            'role_id' => 4
	         ],
	         [// fake tutor
	            'nc' => str_random(10),
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => str_random(10),
	            'role_id' => 2
	         ],
         	[//real department manager
	            'nc' => '13270550',
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => 'jefe1@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => bcrypt('13270550'),
	            'role_id' => 3
	         ],
	         [//real coordinator
	         	'nc' => '132705501',
	            'name' => str_random(10),
	            'first_lastname' => str_random(10),
	            'second_lastname' => str_random(10),
	            'email' => 'coord1@gmail.com',
	            'phone' => str_random(10),
	            'avatar' => '/img/avatars/default.png',
	            'password' => bcrypt('13270551'),
	            'role_id' => 4
	         ]
        ]);
    }
}

