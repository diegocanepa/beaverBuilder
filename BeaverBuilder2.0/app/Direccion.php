<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
  public $table = 'direccion';
  public $primaryKey = 'id';
  public $timestamps = false;
  public $guarded = [];
}
