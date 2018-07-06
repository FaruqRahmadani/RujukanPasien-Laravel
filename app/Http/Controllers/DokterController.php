<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\Spesialis;
use App\Dokter;

class DokterController extends Controller
{
  public function Data(){
    $Dokter = Dokter::all();
    return view('Dokter.Data',['Dokter' => $Dokter]);
  }

  public function Tambah(){
    $Spesialis = Spesialis::all();
    return view('Dokter.Tambah', ['Spesialis' => $Spesialis]);
  }

  public function submitTambah(Request $request){
    $Dokter = new Dokter;
    $Dokter->fill($request->all());
    $Dokter->save();

    return redirect()->Route('Data-Dokter')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Dokter = Dokter::findOrFail($Id);
    $Spesialis = Spesialis::all();

    return view('Dokter.Edit', ['Dokter' => $Dokter, 'Spesialis' => $Spesialis]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Dokter = Dokter::findOrFail($Id);
    $Dokter->fill($request->all());
    $Dokter->save();

    return redirect()->Route('Data-Dokter')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Dokter = Dokter::findOrFail($Id);
    $Dokter->delete();

    return redirect()->Route('Data-Dokter')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
