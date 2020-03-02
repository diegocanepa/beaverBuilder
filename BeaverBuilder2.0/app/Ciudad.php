<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public $table = 'ciudad';
    public $primaryKey = 'idCiudad';
    public $timestamps = false;
    public $guarded = [];
}
