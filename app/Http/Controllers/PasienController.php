<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\Pekerjaan;
use App\Pasien;
use App\Dokter;

class PasienController extends Controller
{
  public function Data(){
    $Pasien = Pasien::all();
    return view('Pasien.Data', ['Pasien' => $Pasien]);
  }

  public function Tambah(){
    $Dokter = Dokter::all();
    $Pekerjaan = Pekerjaan::all();
    return view('Pasien.Tambah', ['Dokter' => $Dokter, 'Pekerjaan' => $Pekerjaan]);
  }

  public function submitTambah(Request $request){
    $Pasien = new Pasien;
    $Pasien->fill($request->all());
    $Pasien->save();

    return redirect()->Route('Data-Pasien')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Dokter = Dokter::all();
    $Pekerjaan = Pekerjaan::all();
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);

    return view('Pasien.Edit', ['Pasien' => $Pasien, 'Dokter' => $Dokter, 'Pekerjaan' => $Pekerjaan]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Pasien = Pasien::findOrFail($Id);
    $Pasien->fill($request->all());
    $Pasien->save();

    return redirect()->Route('Data-Pasien')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }
}
