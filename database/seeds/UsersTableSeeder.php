<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = new User;
    	$user->name = 'Rafael Leme';
    	$user->email = 'rafaelleme_2@hotmail.com';
    	$user->password = bcrypt('123');

    	$user->save();
    }
}
