<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDiagnosaFieldPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('pasiens', function (Blueprint $table) {
        $table->integer('diagnosa_id')->after('diagnosa');
        $table->dropColumn('diagnosa');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('pasiens', function (Blueprint $table) {
        $table->string('diagnosa')->after('diagnosa_id');
        $table->dropColumn('diagnosa_id');
      });
    }
}
