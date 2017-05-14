<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/bantuan', function () {
	    return view('/bantuan/index');
	});
Route::get('/cetakseleksi', function () {
	    return view('/cetak');
	});
Route::get('/spk/pdf',[
    'uses'  => 'SpkController@getPdf',
    'as'    => 'spk.pdf',
]);



Route::group(['middleware' => 'guest'], function () {
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('hasilseleksi', ['uses'  => 'SpkController@hasilseleksi', 'as' => 'spk.hasilseleksi']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home.index']);
    Route::resource('keluarga','KeluargaController');
	Route::resource('penduduk','PendudukController');

	Route::get('pengaturan', ['uses' => 'UserController@pengaturan', 'as' => 'user.pengaturan']);
	Route::put('sandi', ['uses' => 'UserController@sandi', 'as' => 'user.sandi']);
	Route::patch('sandi', ['uses' => 'UserController@sandi', 'as' => 'user.sandi']);

	Route::put('ubahuser', ['uses' => 'UserController@ubahuser', 'as' => 'user.ubahuser']);
	Route::patch('ubahuser', ['uses' => 'UserController@ubahuser', 'as' => 'user.ubahuser']);
	
	// Route::get('/spk/{id}', 'SpkController@show');
	Route::resource('spk','SpkController');
	Route::get('/kriteriaspk', 'SpkController@kriteria');
	Route::get('/perhitunganspk', 'SpkController@hitung');

	Route::get('/seleksi', ['uses'  => 'SpkController@seleksi', 'as' => 'spk.seleksi']);
	
	});

Route::group(['middleware' => 'superadmin'], function () {
	Route::resource('user','UserController');

	Route::get('resetpassword/{id}', ['uses' => 'UserController@resetpassword', 'as' => 'user.resetpassword']);
	Route::put('resetpassword/{id}', ['uses' => 'UserController@resetpassword', 'as' => 'user.resetpassword']);
	Route::patch('resetpassword/{id}', ['uses' => 'UserController@resetpassword', 'as' => 'user.resetpassword']);
});

Route::group(['middleware' => 'admin'], function () {
	Route::resource('kependudukan','KependudukanController');
	Route::resource('kuota','LimController');
	// Route::resource('spk','SpkController');
	Route::get('/masterspk',   ['uses'  => 'SpkController@masterspk', 'as' => 'spk.masterspk']);
	

	Route::resource('tempatlahir','TlController');
	Route::resource('agama','AgamaController');
	Route::resource('pendidikan','PendidikanController');
	Route::resource('pekerjaan','PekerjaanController');
	Route::resource('shdk','ShdkController');
	Route::resource('rt','RtController');
	Route::resource('rw','RwController');

	Route::resource('bobot','BobotController');
	Route::resource('variabel','VariabelController');
	Route::resource('kriteria','KriteriaController');

	Route::get('/tambahpenduduk/{id}', ['uses' => 'KeluargaController@penduduk', 'as' => 'keluarga.tambahpenduduk']);
	Route::post('/pendudukstore', ['uses' => 'KeluargaController@pendudukstore', 'as' => 'keluarga.pendudukstore']);
	Route::put('/pendudukstore', ['uses' => 'KeluargaController@pendudukstore', 'as' => 'keluarga.pendudukstore']);
	Route::patch('/pendudukstore', ['uses' => 'KeluargaController@pendudukstore', 'as' => 'keluarga.pendudukstore']);
});