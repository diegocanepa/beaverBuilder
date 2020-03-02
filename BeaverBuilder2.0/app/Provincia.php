<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public $table = 'provincia';
    public $primaryKey = 'idProvincia';
    public $timestamps = false;
    public $guarded = [];
}
