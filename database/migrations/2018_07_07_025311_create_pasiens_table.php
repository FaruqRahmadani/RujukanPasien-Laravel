<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pasiens', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nomor');
      $table->string('nomor_rm');
      $table->string('alamat');
      $table->integer('kota_id');
      $table->integer('kecamatan_id');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->integer('status_menikah');
      $table->integer('pekerjaan_id');
      $table->text('keluhan');
      $table->text('diagnosa');
      $table->text('telah_diberikan');
      $table->integer('dokter_id');
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
    Schema::dropIfExists('pasiens');
  }
}
