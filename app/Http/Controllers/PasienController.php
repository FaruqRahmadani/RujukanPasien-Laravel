<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\PoliTujuan;
use App\Pekerjaan;
use App\PoliDari;
use App\Diagnosa;
use App\Pasien;
use App\Dokter;
use App\Respon;
use PDF;

class PasienController extends Controller
{
  public function Data(){
    $Pasien = Pasien::orderBy('id', 'desc')->get();
    return view('Pasien.Data', ['Pasien' => $Pasien, 'Filter' => 'Semua']);
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

    return view('Pasien.Data', ['Pasien' => $Pasien, 'Filter' => $request->filter]);
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

    $pdf = PDF::loadview('Cetak.Puskesmas.DataPasien', ['Pasien' => $Pasien]);
    return $pdf->setPaper('a4', 'landscape')->stream();
  }

  public function Tambah(){
    $Dokter = Dokter::all();
    $PoliDari = PoliDari::all();
    $Diagnosa = Diagnosa::all();
    $Pekerjaan = Pekerjaan::all();
    $PoliTujuan = PoliTujuan::all();
    return view('Pasien.Tambah', ['Dokter' => $Dokter, 'Pekerjaan' => $Pekerjaan, 'PoliDari' => $PoliDari, 'PoliTujuan' => $PoliTujuan, 'Diagnosa' => $Diagnosa]);
  }

  public function submitTambah(Request $request){
    $Pasien = new Pasien;
    $Pasien->fill($request->all());
    $Pasien->save();

    return redirect()->Route('Data-Pasien')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Dokter = Dokter::all();
    $PoliDari = PoliDari::all();
    $Diagnosa = Diagnosa::all();
    $Pekerjaan = Pekerjaan::all();
    $PoliTujuan = PoliTujuan::all();
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);

    return view('Pasien.Edit', ['Pasien' => $Pasien, 'Dokter' => $Dokter, 'Pekerjaan' => $Pekerjaan, 'PoliDari' => $PoliDari, 'PoliTujuan' => $PoliTujuan, 'Diagnosa' => $Diagnosa]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);
    $Pasien->fill($request->all());
    $Pasien->save();

    return redirect()->Route('Data-Pasien')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Info($Id){
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);

    return view('Pasien.Info', ['Pasien' => $Pasien]);
  }
}
