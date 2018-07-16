<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoliFieldToPasienTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('pasiens', function($table){
      $table->integer('poli_tujuan_id')->after('dokter_id');
      $table->integer('poli_dari_id')->after('dokter_id');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('pasiens', function($table){
      $table->dropColumn('poli_dari_id');
      $table->dropColumn('poli_tujuan_id');
    });
  }
}
