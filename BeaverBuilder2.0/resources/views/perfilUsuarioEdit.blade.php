@extends('layouts.app')

@section('content')
<div class="mi-perfil">
  <div class="customer-form text-center">
      <div class="container">
        <div class="py-5 text-center">
          <h2>Perfil de Usuario</h2>
        </div>

        <div class="container">
          <div class="col-12 text-center" >

          </div>
        </div>
              <div class="mb-3">
                <label for="username">Nombre de Usuario</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Username" required>
                  <div class="invalid-feedback" style="width: 100%;">
                    Campo Obligatorio
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Campo Obligatorio)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Porfavor ingrese un email valido.
                </div>
              </div>

              <div class="form-row">
                  <div class="col-md-3 mb-3">
                    <label for="tipoDoc">Tipo Documento</label>
                    <select class="custom-select d-block w-100" id="tipoDoc" required>
                      <option value="">Eliga...</option>
                      <option>DNI</option>
                      <option>Pasaporte</option>
                    </select>
                  </div>
                  <div class="col-md-7 mb-3">
                    <label for="numDoc">Documento</label>
                    <input type="text" class="form-control" id="numDoc" value="" required>
                  </div>
              </div>

              <div class="mb-3">
                <label for="address">Direcciones</label>
                <table class="table table-striped table-sm">
                    <tbody>
                      <thead>
                        <tr>
                          <th  class="" scope="col">Calle</th>
                          <th  class="" scope="col">Numero</th>
                          <th  class="" scope="col">Provincia</th>
                          <th  class="" scope="col">Ciudad</th>
                          <th  class="" scope="col">Barrio</th>
                          <th  class="" scope="col"></th>
                        </tr>
                      </thead>
                      <tr>
                        @foreach ($direcciones as $i => $direccion)
                          <td class="">{{$direccion['calle']}}</td>
                          <td class="">{{$direccion['numero']}}</td>
                          <td class="">{{$direccion['nombreProvincia']}}</td>
                          <td class="">{{$direccion['nombreCiudad']}}</td>
                          <td class="">{{$direccion['barrio']}}</td>
                          <td class="" align="right" >
                            <button type="button" title="Editar" class="btn btn-success  icon-only btn_editar" data-toggle="modal" data-target="#EditarDireccion-{{$i}}"><i class="fa fa-pencil"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="EditarDireccion-{{$i}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                <form class="" action="{{ Route('editarDireccion')}}" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="id" value="{{$direccion['id']}}">
                                  <div class="modal-body">
                                      <div class="form-row">
                                          <div class="form-group col-md-8 text-left">
                                            <label for="inputEmail4">Direccion</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="calle" value="{{$direccion['calle']}}">
                                          </div>
                                      <div class="form-group col-md-4 text-left">
                                            <label for="inputPassword4">Numero</label>
                                            <input type="text" class="form-control" id="inputPassword4" name="numero" value="{{$direccion['numero']}}">
                                          </div>
                                      </div>
                                      <br>
                                      <div class="form-row">
                                          <div class="form-group col-md-6 text-left">
                                            <label for="pais">Pais</label>
                                            <select class="custom-select d-block w-100" id="pais" required name="idPais">
                                              <option value="{{$direccion['idPais']}}" selected>{{$direccion['nombrePais']}}</option>
                                              @foreach ($paises as $pais)
                                                <option value="{{$pais['idPais']}}">{{$pais['nombrePais']}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="form-group col-md-6 text-left">
                                            <label for="provincia">Provincia</label>
                                            <select class="custom-select d-block w-100" id="provincia" required name="idProvincia">
                                              <option value="{{$direccion['idProvincia']}}" selected>{{$direccion['nombreProvincia']}}</option>
                                              @foreach ($provincias as $provincia)
                                                <option value="{{$provincia['idProvincia']}}">{{$provincia['nombreProvincia']}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-6 text-left">
                                            <label for="cuidad">Cuidad</label>
                                            <select class="custom-select d-block w-100" id="cuidad" required name="idCiudad">
                                              <option value="{{$direccion['idCiudad']}}" selected>{{$direccion['nombreCiudad']}}</option>
                                              @foreach ($ciudades as $ciudad)
                                                <option value="{{$ciudad['idCiudad']}}">{{$ciudad['nombreCiudad']}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="form-group col-md-6 text-left">
                                            <label for="inputEmail4">Barrio</label>
                                            <input type="text" class="form-control" id="inputEmail4" name="barrio" value="{{$direccion['barrio']}}">
                                          </div>
                                      </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                            <!-- Button trigger modal -->
                            <button  type="button" title="Eliminar" class="btn btn-danger icon-only btn_eliminar" data-toggle="modal" data-target="#EliminarDireccion-{{$i}}"><i class="fa fa-trash-o"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="EliminarDireccion-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Direccion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    ¿Esta seguro que desea eliminar este direccion?
                                    <br>
                                    Direccion: {{$direccion['calle']}}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form class="" action="{{Route('eliminarDireccion')}}" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="id" value="{{$direccion['id']}}">
                                      <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td class="filas text-center" colspan="6">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#agregarDireccion">
                            Agregar Direccion
                          </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="agregarDireccion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            <form class="" action="{{ route('agregarDireccion')}}" method="post">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                  <div class="form-row">
                                      <div class="form-group col-md-8 text-left">
                                        <label for="inputEmail4">Direccion</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="calle">
                                  </div>
                                  <div class="form-group col-md-4 text-left">
                                        <label for="inputPassword4">Numero</label>
                                        <input type="text" class="form-control" id="inputPassword4" name="numero">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="form-row">
                                      <div class="form-group col-md-6 text-left">
                                        <label for="pais">Pais</label>
                                        <select class="custom-select d-block w-100" id="pais" required name="idPais">
                                          @foreach ($paises as $pais)
                                            <option value="{{$pais['idPais']}}">{{$pais['nombrePais']}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6 text-left">
                                        <label for="provincia">Provincia</label>
                                        <select class="custom-select d-block w-100" id="provincia" required name="idProvincia">
                                          @foreach ($provincias as $provincia)
                                            <option value="{{$provincia['idProvincia']}}">{{$provincia['nombreProvincia']}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-6 text-left">
                                        <label for="cuidad">Ciudad</label>
                                        <select class="custom-select d-block w-100" id="cuidad" required name="idCiudad">
                                          <option value="27291">Rio Cuarto</option>
                                          @foreach ($ciudades as $ciudad)
                                            <!--<option value="{{$ciudad['idCiudad']}}">{{$ciudad['nombreCiudad']}}</option>-->
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6 text-left">
                                        <label for="inputEmail4">Barrio</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="barrio">
                                      </div>
                                  </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>
                  </tbody>
                </table>

              <div class="mb-3">
                <label for="address">Tarjetas</label>
                <table class="table table-striped table-sm">
                    <tbody>
                      <thead>
                        <tr>
                          <th  class="columnasABMProductos" scope="col">Nombre</th>
                          <th  class="columnasABMProductos" scope="col">Numero</th>
                          <th  class="columnasABMProductos" scope="col">Fecha Vencimiento</th>
                          <th  class="columnasABMProductos" scope="col"></th>

                        </tr>
                      </thead>
                      <tr>
                        @foreach ($tarjetas as $i => $value)
                          <td class="filasABMProductos">{{$value['nombre']}}</td>
                          <td class="filasABMProductos">{{$value['nroTarjeta']}}</td>
                          <td class="filasABMProductos">{{$value['fechaVencimiento']}}</td>
                          <td class="filasABMProductos" align="right" >
                              <button type="button" title="Editar" class="btn btn-success  icon-only btn_editar" data-toggle="modal" data-target="#EditarTarjeta-{{$i}}"><i class="fa fa-pencil"></i></button>


                              <!-- Modal -->
                              <div class="modal fade" id="EditarTarjeta-{{$i}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Edicion de Tarjeta</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  <form class="" action="{{ Route('editarTarjeta')}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$value['id']}}">
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-md-12 text-left">
                                          <label for="cc-number">Numero de la tarjeta</label>
                                          <input type="text" class="form-control" id="cc-number" placeholder="" required name="nroTarjeta" value="{{$value['nroTarjeta']}}" disabled>
                                          <div class="invalid-feedback">
                                            El numero de la tarjeta es obligatorio.
                                          </div>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-12 text-left">
                                          <label for="cc-name">Nombre de la tarjeta</label>
                                          <input type="text" class="form-control" id="cc-name" placeholder="" required name="nombre" value="{{$value['nombre']}}">
                                          <div class="invalid-feedback">
                                            El nombre de la tarjeta es obligatorio.
                                          </div>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-6 text-left">
                                          <label for="cc-expiration">Vencimiento</label>
                                          <input type="date" class="form-control" id="cc-expiration" placeholder="" required name="fechaVencimiento" value="{{$value['fechaVencimiento']}}">
                                          <div class="invalid-feedback">
                                            Vencimiento obligatorio.
                                          </div>
                                        </div>
                                        <div class="col-md-3 mb-3 text-left">
                                          <label for="cc-cvv">CVV</label>
                                          <input type="text" class="form-control" id="cc-cvv" placeholder="" required name="cvv" value="{{$value['cvv']}}">
                                          <div class="invalid-feedback">
                                            Codigo de seguridad obligatorio.
                                          </div>
                                        </div>
                                      </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button  type="button" title="Eliminar" class="btn btn-danger icon-only btn_eliminar" data-toggle="modal" data-target="#eliminarTarjeta-{{$i}}"><i class="fa fa-trash-o"></i></button>


                            <!-- Modal -->
                            <div class="modal fade" id="eliminarTarjeta-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    ¿Esta seguro que desea eliminar este tarjeta?
                                    <br>
                                    Numero de Tarjeta: {{$value['nroTarjeta']}}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form class="" action="{{ route('eliminarTarjeta')}}" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="id" value="{{$value['id']}}">
                                      <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td class="filas text-center" colspan="6">
                        <!-- Button trigger modal -->
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#AgregarTarjeta">
                            Agregar Tarjeta
                          </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="AgregarTarjeta" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            <form class="" action="{{ Route ('agregarTarjeta')}}" method="post">
                              {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12 text-left">
                                    <label for="cc-name">Nombre de la tarjeta</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required name="nombre">
                                    <div class="invalid-feedback">
                                      El nombre de la tarjeta es obligatorio.
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12 text-left">
                                    <label for="cc-number">Numero de la tarjeta</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required name="nroTarjeta">
                                    <div class="invalid-feedback">
                                      El numero de la tarjeta es obligatorio.
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-6 text-left">
                                    <label for="cc-expiration">Vencimiento</label>
                                    <input type="date" class="form-control" id="cc-expiration" placeholder="" required name="fechaVencimiento">
                                    <div class="invalid-feedback">
                                      Vencimiento obligatorio.
                                    </div>
                                  </div>
                                  <div class="col-md-3 mb-3 text-left">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required name="cvv">
                                    <div class="invalid-feedback">
                                      Codigo de seguridad obligatorio.
                                    </div>
                                  </div>
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>
                  </tbody>
                </table>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Guardar Datos</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Cancelar</button>
                </div>
              </div>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
