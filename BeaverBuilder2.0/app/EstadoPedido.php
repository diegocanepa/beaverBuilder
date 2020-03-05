<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
  public $table = 'estadopedido';
  public $primaryKey = 'idEstadoPedido';
  public $timestamps = false;
  public $guarded = [];
}
