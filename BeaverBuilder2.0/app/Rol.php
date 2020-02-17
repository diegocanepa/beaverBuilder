<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  public $table = 'rol';
  public $primaryKey = 'idRol';
  public $timestamps = false;
  public $guarded = [];
}
