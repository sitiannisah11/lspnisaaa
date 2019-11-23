<?php

use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informasi__tokos')->insert([
        	'nama_instansi' => 'Pos Andrea',
        	'notlp' => '08958376634',
        	'kode_pos' => '13520',
        	'deskripsi' => 'Pos Mantap',
        	'alamat' => 'Jl.Batu Ampar',
        	'foto' => 'Pos.jpg'
        	]);
    }
}
