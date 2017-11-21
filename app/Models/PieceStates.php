<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceStates extends Model
{

  protected $table = 'states_pieces';
  protected $guarded = ['id'];



  public function piece()
  {
    return $this->belongsTo('App\Models\Piece','id_piece');
  }

  public function updateState(int $newState, int $quantity, (optional) int $oldState )
  {
    $piece = $this->piece();

    $this->quantity -= $quantity;

    //si quantité nulle on supprime le champ

// update le champ du nouveau state sinon, le crée

    // if ( !PieceStates::get()->with())
    // ;

    $this->piece()->lot()->updateState($newState,$oldState,$piece->unit_weight,$quantity);

  }

}
