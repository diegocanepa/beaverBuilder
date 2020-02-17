<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
  public $table = 'detallepedido';
  public $primaryKey = 'idDetallePedido';
  public $timestamps = false;
  public $guarded = [];
}
