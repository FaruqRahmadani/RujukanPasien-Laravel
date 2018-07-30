<?php

Route::GET('login', 'Auth\LoginController@showLoginForm')->name('LoginForm');
Route::POST('login', 'Auth\LoginController@login')->name('Login');
Route::GET('logout', 'Auth\LoginController@logout')->name('Logout');

Route::group(['middleware' => ['AuthMiddleware']], function () {
  Route::GET('', 'DashboardController@Index')->name('Dashboard');

  Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::prefix('user')->group(function () {
      Route::GET('', 'UserController@Data')->name('Data-User');
      Route::GET('tambah', 'UserController@Tambah')->name('Tambah-User');
      Route::POST('tambah', 'UserController@submitTambah')->name('submitTambah-User');
      Route::GET('{id}/edit', 'UserController@Edit')->name('Edit-User');
      Route::POST('{id}/edit', 'UserController@submitEdit')->name('submitEdit-User');
      Route::GET('{id}/hapus', 'UserController@Hapus')->name('Hapus-User');
    });

    Route::prefix('diagnosa')->group(function () {
      Route::GET('', 'DiagnosaController@Data')->name('Data-Diagnosa');
      Route::GET('tambah', 'DiagnosaController@Tambah')->name('Tambah-Diagnosa');
      Route::POST('tambah', 'DiagnosaController@submitTambah')->name('submitTambah-Diagnosa');
      Route::GET('{id}/edit', 'DiagnosaController@Edit')->name('Edit-Diagnosa');
      Route::POST('{id}/edit', 'DiagnosaController@submitEdit')->name('submitEdit-Diagnosa');
      Route::GET('{id}/hapus', 'DiagnosaController@Hapus')->name('Hapus-Diagnosa');
    });

    Route::prefix('poli_dari')->group(function () {
      Route::GET('', 'PoliDariController@Data')->name('Data-Poli-Dari');
      Route::GET('tambah', 'PoliDariController@Tambah')->name('Tambah-Poli-Dari');
      Route::POST('tambah', 'PoliDariController@submitTambah')->name('submitTambah-Poli-Dari');
      Route::GET('{id}/edit', 'PoliDariController@Edit')->name('Edit-Poli-Dari');
      Route::POST('{id}/edit', 'PoliDariController@submitEdit')->name('submitEdit-Poli-Dari');
      Route::GET('{id}/hapus', 'PoliDariController@Hapus')->name('Hapus-Poli-Dari');
    });

    Route::prefix('poli_tujuan')->group(function () {
      Route::GET('', 'PoliTujuanController@Data')->name('Data-Poli-Tujuan');
      Route::GET('tambah', 'PoliTujuanController@Tambah')->name('Tambah-Poli-Tujuan');
      Route::POST('tambah', 'PoliTujuanController@submitTambah')->name('submitTambah-Poli-Tujuan');
      Route::GET('{id}/edit', 'PoliTujuanController@Edit')->name('Edit-Poli-Tujuan');
      Route::POST('{id}/edit', 'PoliTujuanController@submitEdit')->name('submitEdit-Poli-Tujuan');
      Route::GET('{id}/hapus', 'PoliTujuanController@Hapus')->name('Hapus-Poli-Tujuan');
    });

    Route::prefix('dokter')->group(function () {
      Route::GET('', 'DokterController@Data')->name('Data-Dokter');
      Route::GET('tambah', 'DokterController@Tambah')->name('Tambah-Dokter');
      Route::POST('tambah', 'DokterController@submitTambah')->name('submitTambah-Dokter');
      Route::GET('{id}/edit', 'DokterController@Edit')->name('Edit-Dokter');
      Route::POST('{id}/edit', 'DokterController@submitEdit')->name('submitEdit-Dokter');
      Route::GET('{id}/hapus', 'DokterController@Hapus')->name('Hapus-Dokter');
    });
  });

  Route::group(['middleware' => ['PuskesMiddleware']], function () {
    Route::prefix('pasien')->group(function () {
      Route::GET('', 'PasienController@Data')->name('Data-Pasien');
      Route::POST('', 'PasienController@DataFilter')->name('Data-Pasien-Filter');
      Route::GET('tambah', 'PasienController@Tambah')->name('Tambah-Pasien');
      Route::POST('tambah', 'PasienController@submitTambah')->name('submitTambah-Pasien');
      Route::GET('{id}/edit', 'PasienController@Edit')->name('Edit-Pasien');
      Route::POST('{id}/edit', 'PasienController@submitEdit')->name('submitEdit-Pasien');
      Route::GET('{id}/info', 'PasienController@Info')->name('Info-Pasien');
    });
  });

  Route::group(['middleware' => ['RSMiddleware']], function () {
    Route::prefix('rujukan')->group(function () {
      Route::GET('', 'RujukanController@Data')->name('Data-Rujukan');
      Route::GET('{id}/respon', 'RujukanController@Respon')->name('Respon-Rujukan');
      Route::POST('{id}/respon', 'RujukanController@submitRespon')->name('submitRespon-Rujukan');
      Route::GET('{id}/edit', 'RujukanController@Edit')->name('Edit-Rujukan');
      Route::POST('{id}/edit', 'RujukanController@submitEdit')->name('submitEdit-Rujukan');
      Route::GET('redirect/{id}', 'RujukanController@Redirect');
    });
  });
  Route::GET('pasien/{id}/cetak', 'CetakController@Rujukan')->name('Cetak-Rujukan');
});

Route::get('/home', 'HomeController@index')->name('home');
