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


    Route::prefix('spesialis')->group(function () {
      Route::GET('', 'SpesialisController@Data')->name('Data-Spesialis');
      Route::GET('tambah', 'SpesialisController@Tambah')->name('Tambah-Spesialis');
      Route::POST('tambah', 'SpesialisController@submitTambah')->name('submitTambah-Spesialis');
      Route::GET('{id}/edit', 'SpesialisController@Edit')->name('Edit-Spesialis');
      Route::POST('{id}/edit', 'SpesialisController@submitEdit')->name('submitEdit-Spesialis');
      Route::GET('{id}/hapus', 'SpesialisController@Hapus')->name('Hapus-Spesialis');
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
      Route::GET('tambah', 'PasienController@Tambah')->name('Tambah-Pasien');
      Route::POST('tambah', 'PasienController@submitTambah')->name('submitTambah-Pasien');
      Route::GET('{id}/edit', 'PasienController@Edit')->name('Edit-Pasien');
      Route::POST('{id}/edit', 'PasienController@submitEdit')->name('submitEdit-Pasien');
      Route::GET('{id}/info', 'PasienController@Info')->name('Info-Pasien');
      Route::GET('{id}/cetak', 'CetakController@Rujukan')->name('Cetak-Rujukan');
    });
  });

  Route::group(['middleware' => ['RSMiddleware']], function () {
    Route::prefix('rujukan')->group(function () {
      Route::GET('', 'RujukanController@Data')->name('Data-Rujukan');
      Route::GET('{id}/respon', 'RujukanController@Respon')->name('Respon-Rujukan');
      Route::POST('{id}/respon', 'RujukanController@submitRespon')->name('submitRespon-Rujukan');
      Route::GET('{id}/edit', 'RujukanController@Edit')->name('Edit-Rujukan');
      Route::POST('{id}/edit', 'RujukanController@submitEdit')->name('submitEdit-Rujukan');
    });
  });
});

Route::get('/home', 'HomeController@index')->name('home');
