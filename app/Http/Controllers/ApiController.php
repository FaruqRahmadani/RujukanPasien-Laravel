<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kecamatan;
use App\Spesialis;
use App\Dokter;
use App\Kota;

use HRujukan;

class ApiController extends Controller
{
  public function Kota(){
    $Kota = Kota::all();
    return $Kota;
  }

  public function Kecamatan($Id = 0){
    $Kecamatan = $Id ? Kecamatan::where('kota_id',$Id)->get() : Kecamatan::all();
    return $Kecamatan;
  }

  public function Spesialis(){
    $Spesialis = Spesialis::all();
    return $Spesialis;
  }

  public function Dokter($Id = 0){
    $Dokter = $Id ? Dokter::where('spesialis_id', $Id)->get() : Dokter::all();
    return $Dokter;
  }

  public function Rujukan(){
    $Rujukan['Data'] = HRujukan::Data();
    $Rujukan['Count'] = HRujukan::Count();
    return $Rujukan;
  }
}
