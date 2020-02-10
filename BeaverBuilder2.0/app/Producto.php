<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = 'productos';
    public $primaryKey = 'idProductos';
    public $timestamps = false;
    public $guarded = [];
}
