<?php

use Illuminate\Database\Seeder;

class CurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata__uangs')->insert([
        	'nama' => 'IDR',
        	]);
    }
}
