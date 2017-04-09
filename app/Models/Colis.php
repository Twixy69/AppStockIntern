<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Colis extends Model
{

  use Userstamps;
  protected $table = 'colis';
  protected $guarded = ['id'];


  public function address()
  {
  	return $this->belongsTo('App\Models\Adresse','id_address');
  }


}
