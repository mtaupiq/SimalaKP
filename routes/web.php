<?php

Route::group(['domain' => config('app.domain')], function () {
    Route::get('/', function () {
        return redirect(route('login'));
    });
    Auth::routes();
});

Route::group(['domain' => 'dashboard.' . config('app.domain')], function () {
    Route::resource('data_mahasiswa', 'Mahasiswa\DataMahasiswaController');
    Route::get('/{vue_capture?}', 'Mahasiswa\DashboardController@index')->where('vue_capture', '[\/\w\.-]*')->name('dashboard.mahasiswa');
});

Route::group(['domain' => 'administrator.' . config('app.domain')], function () {
    Route::get('/', 'Admin\AdminDashboardController@index')->name('dashboard.admin');
    Route::get('login', 'Admin\AdminLoginController@showLoginForm');
    Route::post('login', 'Admin\AdminLoginController@login')->name('login.admin');
    Route::get('logout', 'Admin\AdminLoginController@logout')->name('logout.admin');
    Route::resource('mahasiswa', 'Admin\MahasiswaController');
    Route::resource('dospem', 'Admin\DospemController');
    Route::resource('pemlap', 'Admin\PemlapController');
    Route::resource('instansi', 'Admin\InstansiController');
});

Route::group(['domain' => 'dospem.' . config('app.domain')], function () {
    Route::get('/', 'Dospem\DospemDashboardController@index')->name('dashboard.dospem');
    Route::post('login', 'Dospem\DospemLoginController@login')->name('login.dospem');
    Route::get('logout', 'Dospem\DospemLoginController@logout')->name('logout.dospem');
    Route::get('mhsdp', 'Dospem\MhsDospemController@index')->name('mhsdp');
    Route::resource('laporandp', 'Dospem\LaporanDospemController');
});

Route::group(['domain' => 'pemlap.' . config('app.domain')], function () {
    Route::get('/', 'Pemlap\PemlapDashboardController@index')->name('dashboard.pemlap');
	Route::post('login', 'Pemlap\PemlapLoginController@login')->name('login.pemlap');
	Route::get('logout', 'Pemlap\PemlapLoginController@logout')->name('logout.pemlap');
    Route::get('mhspl', 'Pemlap\MhsPemlapController@index')->name('mhspl');
    Route::resource('laporanpl', 'Pemlap\LaporanPemlapController');
});