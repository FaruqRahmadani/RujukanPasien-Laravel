<?php
namespace App\Helpers;

use App\Pasien;

class RujukanHelper
{
  public static function Count(){
    $return = Pasien::doesntHave('respon')->count();
    return $return;
  }

  public static function Data(){
    $return = Pasien::doesntHave('respon')->get();
    return $return;
  }
}
