<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
  public $table = 'cobro';
  public $primaryKey = 'idCobro';
  public $timestamps = false;
  public $guarded = [];
}
