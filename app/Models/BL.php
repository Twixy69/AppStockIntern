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
}
