<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HCrypt;

use App\User;

class UserController extends Controller
{
  public function Data(){
    $User = User::all();
    return view('User.Data', ['User' => $User]);
  }

  public function Tambah(){
    return view('User.Tambah');
  }

  public function submitTambah(Request $request){
    $User = new User;
    $User->fill($request->all());
    $User->password = bcrypt($request->password);
    $User->save();

    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Simpan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);

    return view('User.Edit', ['User' => $User]);
  }

  public function submitEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->fill($request->except('password'));
    if ($request->password) {
      $User->password = bcrypt($request->password);
    }
    $User->save();

    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Edit']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);
    $User->delete();

    return redirect()->Route('Data-User')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil di Hapus']);
  }
}
