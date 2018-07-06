<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'nama', 'username', 'password', 'tipe', 'foto'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function getTipeTextAttribute()
  {
    switch ($this->tipe) {
      case 1:
        $return = 'Admin';
      break;
      case 2:
        $return = 'Puskesmas';
      break;
      case 3:
        $return = 'Rumah Sakit';
      break;
      default:
        $return = '-';
    }
    return $return;
  }
}
