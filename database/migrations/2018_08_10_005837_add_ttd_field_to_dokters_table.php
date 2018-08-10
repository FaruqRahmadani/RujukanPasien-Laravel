<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTtdFieldToDoktersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('dokters', function (Blueprint $table) {
      $table->string('gambar_ttd')->after('no_telepon')->default('null.jpg');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('dokters', function (Blueprint $table) {
      $table->dropColumn('gambar_ttd');
    });
  }
}
