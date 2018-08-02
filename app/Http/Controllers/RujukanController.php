<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\Pasien;
use App\Respon;
use PDF;

class RujukanController extends Controller
{
  public function Data(){
    $Pasien = Pasien::orderBy('id', 'desc')->get();

    return view('Rujukan.Data', ['Pasien' => $Pasien, 'Filter' => 'Semua']);
  }

  public function DataFilter(Request $request){
    if ($request->filter == "Semua") {
      $Pasien = Pasien::orderBy('id', 'desc')->get();
    }else if ($request->filter == "Menunggu") {
      $Pasien = Pasien::doesnthave('Respon')->orderBy('id', 'desc')->get();
    }else{
      $PasienId = Respon::where('status', $request->filter)->pluck('pasien_id');
      $Pasien = Pasien::whereIn('id', $PasienId)->orderBy('id', 'desc')->get();
    }

    return view('Rujukan.Data', ['Pasien' => $Pasien, 'Filter' => $request->filter]);
  }

  public function Cetak($Filter){
    if ($Filter == "Semua") {
      $Pasien = Pasien::all();
    }else if ($Filter == "Menunggu") {
      $Pasien = Pasien::doesnthave('Respon')->get();
    }else{
      $PasienId = Respon::where('status', $Filter)->pluck('pasien_id');
      $Pasien = Pasien::whereIn('id', $PasienId)->get();
    }

    $pdf = PDF::loadview('Cetak.RumahSakit.DataPasien', ['Pasien' => $Pasien]);
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function Respon($Id){
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);

    return view('Rujukan.Respon', ['Pasien' => $Pasien]);
  }

  public function submitRespon(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Respon = new Respon;
    $Respon->fill($request->all());
    $Respon->pasien_id = $Id;
    $Respon->save();

    return redirect()->Route('Data-Rujukan')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Respon berhasil dikirimkan']);
  }

  public function Redirect($Id){
    $Id = HCrypt::Encrypt($Id);
    return redirect()->route('Respon-Rujukan', ['Id' => $Id]);
  }
}
