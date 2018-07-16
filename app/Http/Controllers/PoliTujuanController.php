<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;

use App\PoliTujuan;

class PoliTujuanController extends Controller
{
  public function Data(){
    $PoliTujuan = PoliTujuan::all();
    return view('PoliTujuan.Data', ['PoliTujuan' => $PoliTujuan]);
  }

  public function Tambah(){
    return view('PoliTujuan.Tambah');
  }

  public function submitTambah(Request $request){
    $PoliTujuan = new PoliTujuan;
    $PoliTujuan->fill($request->all());
    $PoliTujuan->save();

    return redirect()->Route('Data-Poli-Tujuan')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliTujuan = PoliTujuan::findOrFail($Id);

    return view('PoliTujuan.Edit', ['PoliTujuan' => $PoliTujuan]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliTujuan = PoliTujuan::findOrFail($Id);
    $PoliTujuan->fill($request->all());
    $PoliTujuan->save();

    return redirect()->Route('Data-Poli-Tujuan')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $PoliTujuan = PoliTujuan::findOrFail($Id);
    $PoliTujuan->delete();

    return redirect()->Route('Data-Poli-Tujuan')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
