<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi__tokos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nama_instansi');
            $table->String('notlp');
            $table->String('kode_pos');
            $table->String('deskripsi');
            $table->String('alamat');
            $table->String('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi__tokos');
    }
}
