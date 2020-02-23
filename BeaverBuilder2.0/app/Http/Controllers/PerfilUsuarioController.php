<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilUsuarioController extends Controller
{
    public function listadoComprasRealizadas(){
      return view('perfilUsuario');
    }
}
