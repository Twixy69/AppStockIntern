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
  	return $this->belongsToMany('App\Models\Piece','colis_piece','id_colis','id_piece')->withPivot('quantity','state');
  }

  public function b_l()
  {
    return $this->belongsTo('App\Models\BL','id_b_l');
  }

  public function updateState(int $idState)
  {
    switch ($idState) {
      case 1:
        $this->state ='created';
        break;

      case 2:
        $this->state ='boxed';
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

    if ($idState == 4)
    {
      $pieces = $this->pieces();
      //on stoque l'adresse
      foreach ($pieces as $piece)
      {

        // on lit la provenance de l'etat

        // on update etat piece

        $piece->states->where('state',$piece->pivot->state);

      }
    }


    return true;
  }
}
