<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    public $timestamps = false;
    protected $table = 'affaires';
    protected $guarded = ['id'];

    public function lot(){
      return $this->hasMany('App\Models\Lot','id_affaire');
    }
}
