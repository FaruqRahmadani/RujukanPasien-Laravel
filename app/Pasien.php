<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Pasien extends Model
{
  protected $fillable = ['nomor', 'nama', 'nomor_rm', 'alamat', 'kota_id', 'kecamatan_id', 'tempat_lahir', 'tanggal_lahir', 'status_menikah', 'pekerjaan_id', 'keluhan', 'diagnosa', 'telah_diberikan', 'dokter_id'];

  public function getUmurAttribute()
  {
    $Lahir = $this->tanggal_lahir;
    $Umur = Carbon::now()->diffInYears($Lahir);
    return $Umur;
  }

  public function getStatusAttribute(){
    return 'Belum Lagi';
  }

  public function Dokter(){
    return $this->belongsTo('App\Dokter')->withTrashed();
  }
}
