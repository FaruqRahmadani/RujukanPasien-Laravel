<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosa extends Model
{
  use SoftDeletes;
  
  protected $fillable = [
    'kode', 'keterangan'
  ];
}
