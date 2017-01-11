<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create([
          'role_id' => 1,
        ]);
        factory(App\User::class,3)->create([
          'role_id' => 2,
        ]);
        factory(App\User::class,1)->create([
          'role_id' => 3,
        ]);
        factory(App\User::class,1)->create([
          'role_id' => 4,
        ]);
    }
}
