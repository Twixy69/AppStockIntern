<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class BL extends Model
{

  use Userstamps;
  protected $table = 'b_ls';
  protected $guarded = ['id'];

  public function address()
  {
    return $this->belongsTo('App\Models\Adresse','id_address');
  }

  public function colis()
  {
    return $this->hasMany('App\Models\Colis','id_b_l');
  }

  public function updateState(int $idState)
  {

    switch ($idState) {
      case 1:
        $this->state ='created';
        break;

      case 2:
        $this->state ='ready';
        break;

      case 3:
        $this->state ='sent';
        break;

      case 4:
        $this->state ='receipt';
        break;

      default:
        $this->state ='noInfo';
        break;
    }

    $colis_s = $this->colis();

    foreach ($colis_s as $colis)
    {
      $colis->updateState($idState);
    }

    return true;
  }
}
