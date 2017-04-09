<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{

  protected $table = 'adresses';
  protected $guarded = ['id'];

  public function colis()
	{
		return $this->hasMany('App\Models\Colis','id_address');
	}

  public function b_ls()
  {
    return $this->hasMany('App\Models\BL','id_address');
  }
}
