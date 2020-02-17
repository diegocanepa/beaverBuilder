<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
  public $table = 'descuento';
  public $primaryKey = 'codigoDescuento';
  public $timestamps = false;
  public $guarded = [];
}
