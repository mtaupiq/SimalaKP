<?php
Route::group(['domain' => 'dashboard.' . config('app.domain')], function () {
	Route::get('laporans', 'Mahasiswa\LaporanController@index');
	Route::post('laporans', 'Mahasiswa\LaporanController@store');
	Route::get('laporans/{laporan}', 'Mahasiswa\LaporanController@show');
	Route::put('laporans/{laporan}', 'Mahasiswa\LaporanController@update');
	Route::delete('laporans/{laporan}', 'Mahasiswa\LaporanController@destroy');
});