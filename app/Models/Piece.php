<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Piece extends Model
{
  use Userstamps;
  protected $table = 'pieces';
  protected $guarded = ['id'];

}
