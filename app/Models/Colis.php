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


  public function pieces()
  {
  	return $this->belongsToMany('App\Models\Piece','colis_piece','id_colis','id_piece')->withPivot('quantity');
  }

  public function b_l()
  {
    return $this->belongsTo('App\Models\BL','id_b_l');
  }

}
