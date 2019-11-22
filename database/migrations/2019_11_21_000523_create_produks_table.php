<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kategori_id')->unsigned();
            $table->bigInteger('mata_uang_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->string('nama');
            $table->string('barcode');
            $table->string('harga_beli');
            $table->string('stok');
            $table->string('harga_jual');
            $table->string('diskon')->nullable();
            $table->string('laba')->nullable();
            $table->string('ppn')->nullable();
            $table->text('keterangan');
            $table->timestamps();


            $table->foreign("kategori_id")->references("id")->on("kategoris")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("mata_uang_id")->references("id")->on("units")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("unit_id")->references("id")->on("mata__uangs")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
