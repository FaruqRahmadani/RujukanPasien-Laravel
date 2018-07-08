<?php
namespace App\Helpers;

use App\Pasien;
use App\Respon;

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

  public static function Diterima(){
    $return = Respon::where('status', 1)->get();
    return $return;
  }

  public static function Ditolak(){
    $return = Respon::where('status', 0)->get();
    return $return;
  }

  public static function BelumDitanggap(){
    $return = Pasien::doesntHave('respon')->get();
    return $return;
  }

  public static function Pasien(){
    $return = Pasien::all();
    return $return;
  }
}
