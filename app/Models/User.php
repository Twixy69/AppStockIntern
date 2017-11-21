<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{

  protected $table = 'users2';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];


}
