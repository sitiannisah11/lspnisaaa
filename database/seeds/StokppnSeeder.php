<?php

use Illuminate\Database\Seeder;

class StokppnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stok__ppns')->insert([
        	'stok' => '1',
        	'ppn' => '10',
        	]);
    }
}
