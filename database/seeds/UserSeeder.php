<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Super Admin',
        	'email' => 'superadmin@gmail.com',
        	'password' => bcrypt('superadmin'),
        	'role' => '2',
        	]);
    }
}
