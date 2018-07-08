<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HCrypt;

use App\Pasien;
use App\Respon;

class RujukanController extends Controller
{
  public function Data(){
    $Pasien = Pasien::doesntHave('respon')->get();

    return view('Rujukan.Data', ['Pasien' => $Pasien]);
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
}
