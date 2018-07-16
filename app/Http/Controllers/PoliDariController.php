<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;

use App\PoliDari;

class PoliDariController extends Controller
{
  public function Data(){
    $PoliDari = PoliDari::all();
    return view('PoliDari.Data', ['PoliDari' => $PoliDari]);
  }

  public function Tambah(){
    return view('PoliDari.Tambah');
  }

  public function submitTambah(Request $request){
    $PoliDari = new PoliDari;
    $PoliDari->fill($request->all());
    $PoliDari->save();

    return redirect()->Route('Data-Poli-Dari')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliDari = PoliDari::findOrFail($Id);

    return view('PoliDari.Edit', ['PoliDari' => $PoliDari]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliDari = PoliDari::findOrFail($Id);
    $PoliDari->fill($request->all());
    $PoliDari->save();

    return redirect()->Route('Data-Poli-Dari')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliDari = PoliDari::findOrFail($Id);
    $PoliDari->delete();

    return redirect()->Route('Data-Poli-Dari')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
