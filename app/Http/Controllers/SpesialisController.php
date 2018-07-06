<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;

use App\Spesialis;

class SpesialisController extends Controller
{
  public function Data(){
    $Spesialis = Spesialis::all();
    return view('Spesialis.Data', ['Spesialis' => $Spesialis]);
  }

  public function Tambah(){
    return view('Spesialis.Tambah');
  }

  public function submitTambah(Request $request){
    $Spesialis = new Spesialis;
    $Spesialis->fill($request->all());
    $Spesialis->save();

    return redirect()->Route('Data-Spesialis')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Spesialis = Spesialis::findOrFail($Id);

    return view('Spesialis.Edit', ['Spesialis' => $Spesialis]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Spesialis = Spesialis::findOrFail($Id);
    $Spesialis->fill($request->all());
    $Spesialis->save();

    return redirect()->Route('Data-Spesialis')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Spesialis = Spesialis::findOrFail($Id);
    $Spesialis->delete();

    return redirect()->Route('Data-Spesialis')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
