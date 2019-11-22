<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function unit()
	{
    	return $this->belongsTo(Unit::class, 'unit_id');
	}
	 public function kategori()
	{
    	return $this->belongsTo(Kategori::class, 'kategori_id');
	}
	 public function mata_uang()
	{
    	return $this->belongsTo(Mata_Uang::class, 'mata_uang_id');
	}
	public function diskon()
	{
    	return $this->belongsTo(Diskon::class, 'diskon_id');
	}
	public function laba()
	{
    	return $this->belongsTo(Laba::class, 'laba_id');
	}
	public function stokppn()
	{
    	return $this->belongsTo(Stok_Ppn::class, 'stokppn_id');
	}
}
