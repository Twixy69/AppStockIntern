<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    public $timestamps = false;
    protected $table = 'lots';
    protected $guarded = ['id'];
}
