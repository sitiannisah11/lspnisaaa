<?php

use Illuminate\Database\Seeder;

class LabaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labas')->insert([
        	'nama' => '10',
        	]);
    }
}
