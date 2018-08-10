<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;
use Carbon\Carbon;
use App\Spesialis;
use App\Dokter;

class DokterController extends Controller
{
  public function Data(){
    $Dokter = Dokter::all();
    return view('Dokter.Data',['Dokter' => $Dokter]);
  }

  public function Tambah(){
    return view('Dokter.Tambah');
  }

  public function submitTambah(Request $request){
    $Dokter = new Dokter;
    $Dokter->fill($request->all());
    $GambarExt  = $request->gambar_ttd->getClientOriginalExtension();
    $NamaGambar = Carbon::now()->format('dmYHis');
    $Gambar = "{$request->nama}|{$NamaGambar}.$GambarExt";
    $request->gambar_ttd->move(public_path('img/ttd_dokter'), $Gambar);
    $Dokter->gambar_ttd = $Gambar;
    $Dokter->save();

    return redirect()->Route('Data-Dokter')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Tambah']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Dokter = Dokter::findOrFail($Id);

    return view('Dokter.Edit', ['Dokter' => $Dokter]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Dokter = Dokter::findOrFail($Id);
    $Dokter->fill($request->all());
    if ($request->gambar_ttd) {
      $GambarExt  = $request->gambar_ttd->getClientOriginalExtension();
      $NamaGambar = Carbon::now()->format('dmYHis');
      $Gambar = "{$request->nama}|{$NamaGambar}.$GambarExt";
      $request->gambar_ttd->move(public_path('img/ttd_dokter'), $Gambar);
      $Dokter->gambar_ttd = $Gambar;
    }
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
