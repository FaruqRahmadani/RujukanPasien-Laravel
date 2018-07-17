<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;
use App\Diagnosa;

class DiagnosaController extends Controller
{
  public function Data(){
    $Diagnosa = Diagnosa::all();
    return view('Diagnosa.Data', ['Diagnosa' => $Diagnosa]);
  }

  public function Tambah(){
    return view('Diagnosa.Tambah');
  }

  public function submitTambah(Request $request){
    $Diagnosa = new Diagnosa;
    $Diagnosa->fill($request->all());
    $Diagnosa->save();

    return redirect()->Route('Data-Diagnosa')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Diagnosa = Diagnosa::findOrFail($Id);

    return view('Diagnosa.Edit', ['Diagnosa' => $Diagnosa]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Diagnosa = Diagnosa::findOrFail($Id);
    $Diagnosa->fill($request->all());
    $Diagnosa->save();

    return redirect()->Route('Data-Diagnosa')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Diagnosa = Diagnosa::findOrFail($Id);
    $Diagnosa->delete();

    return redirect()->Route('Data-Diagnosa')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
