<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
  public $table = 'pais';
  public $primaryKey = 'idPais';
  public $timestamps = false;
  public $guarded = [];
}
