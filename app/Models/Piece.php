<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Piece extends Model
{
  use Userstamps;
  protected $table = 'pieces';
  protected $guarded = ['id'];



  public function colis()
  {
    return $this->belongsToMany('App\Models\Colis','colis_piece','id_piece','id_colis');
  }

}
