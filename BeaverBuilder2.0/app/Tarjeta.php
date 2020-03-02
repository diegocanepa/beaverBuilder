<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
  public $table = 'tarjeta';
  public $primaryKey = 'id';
  public $timestamps = false;
  public $guarded = [];
}
