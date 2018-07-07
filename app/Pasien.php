<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Pasien extends Model
{
  protected $fillable = ['nomor', 'nama', 'nomor_rm', 'alamat', 'kota_id', 'kecamatan_id', 'tempat_lahir', 'tanggal_lahir', 'status_menikah', 'pekerjaan_id', 'keluhan', 'diagnosa', 'telah_diberikan', 'dokter_id'];

  public function Dokter(){
    return $this->belongsTo('App\Dokter')->withTrashed();
  }

  public function Respon(){
    return $this->hasOne('App\Respon');
  }

  public function getUmurAttribute()
  {
    $Lahir = $this->tanggal_lahir;
    $Umur = Carbon::now()->diffInYears($Lahir);
    return $Umur;
  }

  public function getStatusAttribute(){
    if (!$this->Respon) {
      return '<span class="btn-oval btn-info btn-sm">Menunggu Respon</span>';
    }
    if ($this->Respon->status == 1) {
      return '<span class="btn-oval btn-success btn-sm">Diterima</span>';
    }
    if ($this->Respon->status == 0) {
      return '<span class="btn-oval btn-warning btn-sm">Ditolak</span>';
    }
  }

}
