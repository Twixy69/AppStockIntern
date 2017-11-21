<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    public $timestamps = false;
    protected $table = 'lots';
    protected $guarded = ['id'];

    public function affaire(){
      return $this->belongsTo('App\Models\Affaire','id_affaire');
    }

    public function pieces(){
      return $this->hasMany('App\Models\piece','id_lot');
    }

    public function updateWeightNumber(int $newState, int $oldState, float $weight, int $quantity){
      addSubstract($oldState,$weight,$quantity,false);
      addSubstract($newState,$weight,$quantity,true);
    }

    public function updateState(int $newState){
      switch ($newState) {
    case 0:
    echo "i egal 0";
        break;
    case 1:
        echo "i égal 1";
        break;
    case 2:
        echo "i égal 2";
        break;
}

    }

    private function addSubstract(int $state, float $weight, int $quantity,bool $addSub){

    }
}
