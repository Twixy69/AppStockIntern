<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Piece extends Model
{
  use Userstamps;
  protected $table = 'pieces';
  protected $guarded = ['id'];

  public function states()
  {
    return $this->hasMany('App\Models\PieceStates','id_piece');
  }

  public function colis()
  {
    return $this->belongsToMany('App\Models\Colis','colis_piece','id_piece','id_colis');
  }

  public function lot()
  {
    return $this->belongsTo('App\Models\Lot','id_lot');
  }


  public function updateState()
  {

//on ne va faire pour le moment que  N/A vers envoyé à termes on mettra les autres
// il nous faut donc juste la quantité arrivé. Idem pour les colis.
//on aura donc les colis prêt à envoyer on peut mettre un blocage sur les colis du BL de ne voir que les colis pret
// idem pour les BL on peut les ouvrir pui les mettre en envoie uniquement lorsqu'ils sont finis.
//différencier les adresses chantier des autres pour ne mettre à jour les pièce qua ce moment la

// il faut donc dabord traiter les bl avant de traiter les colis puis de traiter les PieceStates




// pour savoir ce que lon met a jour on doit savoir ce que lon envoie

    // mettre a jour table states_pieces

      // recuperer etat + nombres via adresse du colis
      //  donc recuperer colis
      // soustraire etat actuel

    // mettre a jour son parent Lot


    $lot = $this->lot();
    // supprimer son ancien etat des poids et piece de lots ( state )
    // ajouter son poids et pice a etat de lots
    $lot->updateWeightNumber($idstate,$this->unit_weight,$this);

    return true;
  }


}
