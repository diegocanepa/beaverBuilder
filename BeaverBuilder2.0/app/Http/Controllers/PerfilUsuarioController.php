<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Direccion;
use App\Provincia;
use App\Tarjeta;
use App\Pais;

class PerfilUsuarioController extends Controller
{
    public function listadoComprasRealizadas(){
      return view('perfilUsuario');
    }



    public function informacionPerfilUsuarioEdit(){
      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades');
      return view('perfilUsuarioEdit', $vac);
    }

    public function eliminarTarjeta(Request $request){
      $tarjeta = Tarjeta::find($request['id']);
      $tarjeta -> borrado = 'S';
      $tarjeta -> save();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades');
      return view('perfilUsuarioEdit', $vac);


    }

    public function eliminarDireccion(Request $request){
      $tarjeta = Tarjeta::find($request['id']);
      $tarjeta->borrado = 'S';
      $tarjeta->save();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades');
      return view('perfilUsuarioEdit', $vac);
    }

    public function agregarDireccion(Request $request){
      $direccion = new Direccion();
      $direccion->calle = $request['calle'];
      $direccion->numero = $request['numero'];
      $direccion->codigoPostal = $request['calcodigoPostal'];
      $direccion->Ciudad_idCiudad = $request['Ciudad_idCiudad'];
      $direccion->users_id = auth()->user()->id;

      $direccion->save();

      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades');
      return view('perfilUsuarioEdit', $vac);
    }

    public function agregarTarjeta(Request $request){
      $tarjeta = Tarjeta::where('nroTarjeta', '=',$request['id'])->get();
      if ($tarjeta->isEmpty()) {
        $tarjeta = new Tarjeta();
        $tarjeta->nroTarjeta = $request['nroTarjeta'];
        $tarjeta->nombre = $request['nombre'];
        $tarjeta->cvv = $request['cvv'];
        $tarjeta->fechaVencimiento = $request['fechaVencimiento'];
        $tarjeta->users_id = auth()->user()->id;

        $tarjeta->save();



      } else {
        dd('tarjeta no valida');
      }

      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades');
      return view('perfilUsuarioEdit', $vac);

    }
}
