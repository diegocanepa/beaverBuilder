<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  public $table = 'pedido';
  public $primaryKey = 'idPedido';
  public $timestamps = false;
  public $guarded = [];
}
