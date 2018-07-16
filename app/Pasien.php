<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Pasien extends Model
{
  protected $fillable = ['nomor', 'nama', 'nomor_rm', 'alamat', 'kota_id', 'kecamatan_id', 'tempat_lahir', 'tanggal_lahir', 'tb', 'bb', 'suhu_badan', 'status_menikah', 'pekerjaan_id', 'keluhan', 'diagnosa', 'telah_diberikan', 'anamnesa', 'alergi', 'dokter_id', 'poli_dari_id', 'poli_tujuan_id'];

  public function Dokter(){
    return $this->belongsTo('App\Dokter')->withTrashed();
  }

  public function Respon(){
    return $this->hasOne('App\Respon');
  }

  public function Pekerjaan(){
    return $this->belongsTo('App\Pekerjaan');
  }

  public function Kota(){
    return $this->belongsTo('App\Kota');
  }

  public function Kecamatan(){
    return $this->belongsTo('App\Kecamatan');
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

  public function getMenikahTextAttribute(){
    switch ($this->status_menikah) {
      case 1:
        return 'Belum Menikah';
        break;
      case 2:
        return 'Sudah Menikah';
        break;
      default:
        return '-';
        break;
    }
  }

}
