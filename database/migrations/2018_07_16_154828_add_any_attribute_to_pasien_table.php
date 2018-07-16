<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnyAttributeToPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('pasiens', function($table){
        $table->string('tb')->after('tanggal_lahir');
        $table->string('bb')->after('tanggal_lahir');
        $table->string('suhu_badan')->after('tanggal_lahir');
        $table->string('anamnesa')->after('telah_diberikan');
        $table->string('alergi')->after('telah_diberikan');
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
        $table->dropColumn('tb');
        $table->dropColumn('bb');
        $table->dropColumn('suhu_badan');
        $table->dropColumn('anamnesa');
        $table->dropColumn('alergi');
      });
    }
}
