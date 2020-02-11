<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/barang', function () {
    return view('admin.barang.index');
});





Route::get('/superadmin', function () {
    return view('superadmin.index');
});
*/





/*Route::prefix('transaksi')->group(function(){
    Route::get('/', 'TransaksiController@index');
    });*/
/*Route::prefix('datatransaksi')->group(function(){
    Route::get('/', 'DatatransaksiController@index');
    });*/


Route::prefix('loginuser')->group(function(){
    Route::get('/', 'PageController@login');
    Route::get('/register', 'PageController@register');
    Route::get('/logout', 'PageController@logout');
    Route::post('/proses-login', 'PageController@proses_login');
    Route::post('/proses-register', 'PageController@proses_register');
});


Route::group(['middleware' => 'superadmin'], function(){

    Route::get('/superadmin', function () { return view('superadmin.index');});

    Route::prefix('toko')->group(function(){
    Route::get('/', 'TokoController@index');
    Route::post('/update', 'TokoController@update');
    
    });

Route::prefix('pengguna')->group(function(){
        Route::get('/', 'PenggunaController@pengguna')->name('pengguna');
        Route::get('/tambah', 'PenggunaController@tambah')->name('pengguna_tambah');
        Route::post('/proses-tambah', 'PenggunaController@proses_tambah')->name('pengguna_proses_tambah');
        Route::get('/detail/{id}', 'PenggunaController@detail')->name('pengguna_detail');
        Route::get('/hapus/{id}', 'PenggunaController@hapus')->name('pengguna_hapus');
    });

});




Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function () { return view('admin.index');});
    Route::get('/laporan_barang', function () { return view('admin.laporan_barang.index');});
    Route::get('/laporan_transaksi', function () { return view('admin.laporan_transaksi.index');});

    Route::prefix('cur')->group(function(){
    Route::get('/', 'CurController@index');
    Route::post('/add', 'CurController@add');
    Route::get('/edit/{id}', 'CurController@edit');
    Route::post('/update', 'CurController@update');
    Route::get('/delete/{id}', 'CurController@delete');
    });
Route::prefix('diskon')->group(function(){
    Route::get('/', 'DiskonController@index');
    Route::post('/add', 'DiskonController@add');
    Route::get('/edit/{id}', 'DiskonController@edit');
    Route::post('/update', 'DiskonController@update');
    Route::get('/delete/{id}', 'DiskonController@delete');
    });
Route::prefix('unit')->group(function(){
    Route::get('/', 'UnitController@index');
    Route::post('/add', 'UnitController@add');
    Route::get('/edit/{id}', 'UnitController@edit');
    Route::post('/update', 'UnitController@update');
    Route::get('/delete/{id}', 'UnitController@delete');
    });
Route::prefix('kategori')->group(function(){
    Route::get('/', 'KategoriController@index');
    Route::post('/add', 'KategoriController@add');
    Route::get('/edit/{id}', 'KategoriController@edit');
    Route::post('/update', 'KategoriController@update');
    Route::get('/delete/{id}', 'KategoriController@delete');
    });
Route::prefix('laba')->group(function(){
    Route::get('/', 'LabaController@index');
    Route::post('/add', 'LabaController@add');
    Route::get('/edit/{id}', 'LabaController@edit');
    Route::post('/update', 'LabaController@update');
    Route::get('/delete/{id}', 'LabaController@delete');
    });
Route::prefix('stokppn')->group(function(){
    Route::get('/', 'StokppnController@index');
    Route::post('/add', 'StokppnController@add');
    Route::get('/edit/{id}', 'StokppnController@edit');
    Route::post('/update', 'StokppnController@update');
    Route::get('/delete/{id}', 'StokppnController@delete');
    });
Route::prefix('barang')->group(function(){
    Route::get('/', 'BarangController@index');
    Route::get('/tambah', 'BarangController@tambah');
    Route::post('/add', 'BarangController@add');
    Route::get('/edit/{id}', 'BarangController@edit');
    Route::post('/update', 'BarangController@update');
    Route::get('/delete/{id}', 'BarangController@delete');

    Route::get('/detail/{barcode}', 'BarangController@detail')->name('detail');
    Route::post('/proses-detail/', 'BarangController@proses_detail')->name('proses_detail');
    });



});



Route::group(['middleware' => 'kasir'], function(){

    Route::get('/kasir', function () { return view('kasir.index');});
    Route::get('/datatransaksi', function () { return view('kasir.datatransaksi.index');});
    Route::get('/kasir', function () { return view('kasir.index');});

    Route::prefix('transaksi')->group(function(){
        Route::get('/', 'TransaksiController@transaksi')->name('transaksi');
        Route::post('/proses-transaksi', 'TransaksiController@proses_transaksi')->name('transaksi_proses_transaksi');
        Route::get('/proses_hapus/{id}', 'TransaksiController@proses_hapus')->name('transaksi_hapus');
        Route::get('/proses_hapusall', 'TransaksiController@proses_hapus_all')->name('transaksi_hapus_all');
        Route::get('/checkout', 'TransaksiController@checkout')->name('transaksi_checkout');
        Route::post('/proses_checkout', 'TransaksiController@proses_checkout')->name('transaksi_proses_checkout');
        Route::get('/kode_unik', 'TransaksiController@kode_unik')->name('kode_unik');
        Route::get('/invoice', 'TransaksiController@invoice')->name('invoice');
    });
    
});