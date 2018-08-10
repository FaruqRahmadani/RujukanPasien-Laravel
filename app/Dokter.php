<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nip','nama','tempat_lahir','tanggal_lahir','alamat','no_telepon','gambar_ttd'
  ];
}
