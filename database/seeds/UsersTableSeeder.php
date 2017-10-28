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
        App\User::create([
          'name' => 'casthra',
          'username' => 'admincast',
          'email'=> 'thepinkcassie@gmail.com',
          'slug' => 'admincast' ,
          'password'=> bcrypt('cassiecast1')   
        ]);
    }
}
