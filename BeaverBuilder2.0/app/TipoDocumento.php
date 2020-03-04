<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public $table = 'tipodocumento';
    public $primaryKey = 'idTipoDocumento';
    public $timestamps = false;
    public $guarded = [];
}
