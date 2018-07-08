<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
  protected $fillable = ['catatan', 'status', 'pasien_id'];
}
