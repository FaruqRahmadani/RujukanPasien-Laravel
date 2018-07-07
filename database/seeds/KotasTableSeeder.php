<?php

use Illuminate\Database\Seeder;

class KotasTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $Kota = [
      array('id' => '6301','nama' => 'KABUPATEN TANAH LAUT'),
      array('id' => '6302','nama' => 'KABUPATEN KOTA BARU'),
      array('id' => '6303','nama' => 'KABUPATEN BANJAR'),
      array('id' => '6304','nama' => 'KABUPATEN BARITO KUALA'),
      array('id' => '6305','nama' => 'KABUPATEN TAPIN'),
      array('id' => '6306','nama' => 'KABUPATEN HULU SUNGAI SELATAN'),
      array('id' => '6307','nama' => 'KABUPATEN HULU SUNGAI TENGAH'),
      array('id' => '6308','nama' => 'KABUPATEN HULU SUNGAI UTARA'),
      array('id' => '6309','nama' => 'KABUPATEN TABALONG'),
      array('id' => '6310','nama' => 'KABUPATEN TANAH BUMBU'),
      array('id' => '6311','nama' => 'KABUPATEN BALANGAN'),
      array('id' => '6371','nama' => 'KOTA BANJARMASIN'),
      array('id' => '6372','nama' => 'KOTA BANJAR BARU'),
    ];

    DB::table('kotas')->insert($Kota);
  }
}
