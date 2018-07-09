<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;
use PDF;

use App\Pasien;

class CetakController extends Controller
{
  public function Rujukan($Id){
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);
    $pdf = PDF::loadview('Cetak.Rujukan', ['Pasien' => $Pasien]);
    return $pdf->setPaper('a4', 'potrait')->stream();
  }
}
