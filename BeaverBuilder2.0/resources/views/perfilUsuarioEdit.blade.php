@extends('layouts.app')

@section('content')
  <div class="customer-form text-center">
      <div class="container">
        <div class="py-5 text-center">
          <h2>Perfil de Usuario</h2>
        </div>

        <div class="container">
          <div class="col-12 text-center" >
            <input type="image" src="img/messi-perfil.jpg" value="" class="img imagen-perfil">
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

              <div class="mb-3">
                <label for="address">Direcciones</label>
                <table class="table table-striped table-sm">
                    <tbody>
                      <thead>
                        <tr>
                          <th  class="columnasABMProductos" scope="col">Calle</th>
                          <th  class="columnasABMProductos" scope="col">Numero</th>
                          <th  class="columnasABMProductos" scope="col">Provincia</th>
                          <th  class="columnasABMProductos" scope="col">Localidad</th>
                          <th  class="columnasABMProductos" scope="col">Barrio</th>
                          <th  class="columnasABMProductos" scope="col"></th>

                        </tr>
                      </thead>
                      <tr>
                          <td class="filasABMProductos">Ricardo Pedroni</td>
                          <td class="filasABMProductos">1958</td>
                          <td class="filasABMProductos">Cordoba</td>
                          <td class="filasABMProductos">Cordoba</td>
                          <td class="filasABMProductos">Villa Cabrera</td>
                          <td class="filasABMProductos" align="right" >
                            <button type="button" title="Editar" class="btn btn-success  icon-only btn_editar"><i class="fa fa-pencil"></i></button>
                            <button  type="button" title="Eliminar" class="btn btn-danger icon-only btn_eliminar"><i class="fa fa-trash-o"></i></button>
                          </td>

                      </tr>
                      <tr>
                        <td class="filas text-center" colspan="6">

                        <!-- Button trigger modal -->
                        <a href="#"></a>
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">
                          Agregar Direccion
                        </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            <form class="" action="index.html" method="post">
                              <div class="modal-body">
                                  <div class="form-row">
                                      <div class="form-group col-md-8 text-left">
                                        <label for="inputEmail4">Direccion</label>
                                        <input type="text" class="form-control" id="inputEmail4">
                                  </div>
                                  <div class="form-group col-md-4 text-left">
                                        <label for="inputPassword4">Numero</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="form-row">
                                      <div class="form-group col-md-6 text-left">
                                        <label for="inputEmail4">Provincia</label>
                                        <input type="text" class="form-control" id="inputEmail4">
                                  </div>
                                  <div class="form-group col-md-6 text-left">
                                        <label for="inputPassword4">Localidad</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                      </div>
                                  </div>

                                  <div class="form-row">
                                      <div class="form-group col-md-6 text-left">
                                        <label for="inputEmail4">Barrio</label>
                                        <input type="text" class="form-control" id="inputEmail4">
                                  </div>
                                  <div class="form-group col-md-6 text-left">
                                        <label for="inputPassword4">Codigo Postal</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Agregar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </tr>

                    </tbody>
                  </table>




                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>

                <div class="invalid-feedback">
                  Porfavor ingrese su direccion actual.
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Dirección 2 <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country">País</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Eliga...</option>
                    <option>Estados Unidos</option>
                    <option>Argentina</option>
                    <option>Bolivia</option>
                    <option>Peru</option>
                    <option>Ecudor</option>
                  </select>
                  <div class="invalid-feedback">
                    Porfavor seleccione un pais valido.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">Cuidad</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Eliga...</option>
                    <option>California</option>
                    <option>Cordoba</option>
                    <option>Buenos Aires</option>
                    <option>Rosario</option>
                  </select>
                  <div class="invalid-feedback">
                    Porfavor seleccione una ciudad valido.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">Codigo Postal</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Guardar Datos</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Cancelar</button>
                </div>
              </div>
            </form>
          </div>
          </div>
@endsection
