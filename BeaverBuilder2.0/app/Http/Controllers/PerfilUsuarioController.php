<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Direccion;
use App\Provincia;
use App\Tarjeta;
use App\Pais;
use App\TipoDocumento;
use App\User;
use App\Rol;
use App\Pedido;
use App\DetallePedido;

class PerfilUsuarioController extends Controller
{
    public function listadoComprasRealizadas(){
      $rolPersona = Rol::find(auth()->user()->rol);
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $comprasRealizadas = Pedido::Where('User_idUser', '=', auth()->user()->id)->get();

      $vac = compact('documentoPersona', 'rolPersona', 'comprasRealizadas');
      return view('perfilUsuario', $vac);
    }

    public function cambiarImagenPerfil(){
      if($_FILES['imagen']['error'] != 0){
        dd('Hubo un error');
      }
      else {
        $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        if ($ext != 'jpg' &&  $ext != 'jpeg' && $ext != 'png') {
          dd('formatoIncorrecto');
        }
        else {
          $ubicacionArchivo = 'ImagenesPerfil/imagen'. auth()->user()->email . '.'.$ext;
          move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionArchivo);
        }
      }

      auth()->user()->imagen = $ubicacionArchivo;
      auth()->user()->save();


      $rolPersona = Rol::find(auth()->user()->rol);
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $vac = compact('documentoPersona', 'rolPersona');
      return view('perfilUsuario', $vac);
    }



    public function actualizacionDatosPerfilUsuario(Request $request){
      $usuario = User::find(auth()->user()->id);

      $usuario->name = $request['name'];
      $usuario->email = $request['email'];
      $usuario->tipoDoc_idDoc = $request['nombreDocumento'];
      $usuario->nroDocumento = $request['nroDocumento'];
      $usuario->save();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
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
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
    }

    public function eliminarTarjeta(Request $request){
      $tarjeta = Tarjeta::find($request['id']);
      $tarjeta -> delete();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
    }

    public function eliminarDireccion(Request $request){
      $direccion = Direccion::find($request['id']);
      $direccion->delete();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
    }

    public function agregarDireccion(Request $request){
      $direccion = Direccion::Where('calle', '=', $request['calle'])
                              ->Where('numero', '=', $request['numero'])
                              ->Where('users_id', '=', auth()->user()->id) ->exists();
      if (!$direccion) {
        $direccion = new Direccion();
        $direccion->calle = $request['calle'];
        $direccion->numero = $request['numero'];
        $direccion->codigoPostal = $request['calcodigoPostal'];
        $direccion->Ciudad_idCiudad = $request['idCiudad'];
        $direccion->barrio = $request['barrio'];
        $direccion->users_id = auth()->user()->id;
        $direccion->save();
      }else {
        dd('ya existe esta direccion');
      }


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
    }

    public function agregarTarjeta(Request $request){
      $tarjeta = Tarjeta::where('nroTarjeta', '=',$request['nroTarjeta'])
                          ->where('users_id', '=', auth()->user()->id)->exists();
      if (!$tarjeta) {
        $tarjeta = new Tarjeta();
        $tarjeta->nroTarjeta = $request['nroTarjeta'];
        $tarjeta->nombre = $request['nombre'];
        $tarjeta->cvv = $request['cvv'];
        $tarjeta->fechaVencimiento = $request['fechaVencimiento'];
        $tarjeta->users_id = auth()->user()->id;
      } else {
        dd('ya existe tarjeta');
      }
      $tarjeta->save();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);

    }

    public function editarTarjeta(Request $request){
      $tarjeta = Tarjeta::find($request['id']);
      $tarjeta->nombre = $request['nombre'];
      $tarjeta->cvv = $request['cvv'];
      $tarjeta->fechaVencimiento = $request['fechaVencimiento'];
      $tarjeta->users_id = auth()->user()->id;
      $tarjeta->save();


      $tarjetas = Tarjeta::where('users_id','=', auth()->user()->id)->Where('borrado','=', 'N')->get();
      $direcciones = Direccion::Join('ciudad', 'direccion.Ciudad_idCiudad', '=', 'ciudad.idCiudad')
                                ->Join('provincia', 'ciudad.Provincia_idProvincia', '=', 'provincia.idProvincia')
                                ->Join('pais', 'provincia.Pais_idPais', '=', 'pais.idPais')
                                ->where('users_id','=', auth()->user()->id)
                                ->where('borrado','=', 'N')->get();
      $paises = Pais::all();
      $provincias = Provincia::all();
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);
    }



    public function editarDireccion(Request $request){
      $direccion = Direccion::find($request['id']);
      $direccion->calle = $request['calle'];
      $direccion->numero = $request['numero'];
      $direccion->codigoPostal = $request['calcodigoPostal'];
      $direccion->Ciudad_idCiudad = $request['idCiudad'];
      $direccion->barrio = $request['barrio'];
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
      $documentos = TipoDocumento::all();
      $documentoPersona = TipoDocumento::find(auth()->user()->tipoDoc_idDoc);
      $rolPersona = Rol::find(auth()->user()->rol);
      $ciudades = Ciudad::all();
      $vac = compact('tarjetas','direcciones', 'paises','provincias','ciudades', 'documentos', 'documentoPersona', 'rolPersona');
      return view('perfilUsuarioEdit', $vac);

    }


}
