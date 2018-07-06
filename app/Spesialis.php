<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spesialis extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nama'
  ];
}
