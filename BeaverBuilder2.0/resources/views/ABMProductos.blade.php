@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Ventas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="{{ route('ABMProductos') }}">
                <span data-feather="shopping-cart"></span>
                Productos <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Clientes
              </a>
            </li>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">ABM Productos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn  btn-outline-secondary pl-5 pr-5" data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo Producto</button>
              <!-- Modal -->
              <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Producto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="" action="{{ Route('NuevoProducto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Codigo</label>
                            <input type="text" name="codigo" class="form-control" id="inputEmail4">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="inputPassword4">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3">
                            <label for="inputEmail4">Precio</label>
                            <input type="number" class="form-control" name="precio" id="inputEmail4">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputEmail4">Stock</label>
                            <input type="number" name="stock" class="form-control" id="inputEmail4">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputPassword4">Marca</label>
                            <select class="custom-select" name='marca'>
                              @foreach ($marcas as $marca)
                                <option value="{{ $marca['idMarca'] }}">{{ $marca['nombre'] }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputPassword4">Categoria</label>
                            <select class="custom-select" name='categoria'>
                              @foreach ($categorias as $categoria)
                                <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="button-wrapper">
                              <span class="label">
                                Subir Imagen
                              </span>
                                <input type="file" name="imagen" id="upload" class="upload-box" placeholder="Upload File">
                            </div>
                          </div>
                          <div class="col-md-6 pt-2 pl-4">
                            <div class="form-check form-group col-md-3">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="oferta">
                              <label class="form-check-label" for="exampleCheck1">Oferta</label>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="inputAddress">Descripcion</label>
                          <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Prodcuto</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                          <form action="{{ route('ABMProductos') }}" method="post">
                            @csrf
                            <div class="form-group row">
                              <label for="codigoProducto" class="col-sm-2 col-form-label">Codigo:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="codigoProducto" name="codigoProducto" placeholder="Ingrese el codigo del producto">
                                <small id="emailHelp" class="form-text text-muted">Tambien se buscara los codigos similares</small>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="nombreProducto" class="col-sm-2 col-form-label">Nombre:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nombreProducto" id="nombreProducto" aria-describedby="emailHelp" placeholder="Ingrese el nombre del producto">
                                <small id="emailHelp" class="form-text text-muted">Tambien se buscara los nombre similares</small>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="precioDesde" class="col-sm-2 col-form-label">Precio Desde:</label>
                              <div class="col-sm-3">
                                <input type="number" class="form-control form-control-sm" name="precioDesde" id="precioDesde" aria-describedby="emailHelp" placeholder="Ingrese precio desde">
                              </div>
                              <label for="precioHasta" class="col-sm-2 col-form-label">Precio Hasta:</label>
                              <div class="col-sm-3">
                                <input type="number" class="form-control form-control-sm" name="precioHasta" id="precioHasta" aria-describedby="emailHelp" placeholder="Ingrese precio hasta">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="categoria" class="col-sm-2 col-form-label">Categoria:</label>
                              <div class="col-sm-3">
                                <select class="custom-select" name='categoria'>
                                  <option value="0">Seleccione</option>
                                  @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <label for="marca" class="col-sm-2 col-form-label">Marca:</label>
                              <div class="col-sm-3">
                                <select class="custom-select" name="marca">
                                  <option value="0">Seleccione</option>
                                  @foreach ($marcas as $marca)
                                    <option value="{{ $marca['idMarca'] }}">{{ $marca['nombre'] }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                          </form>
                        </div>
                      </div>
                      <div class="table-responsive pt-5">
                        <table class="table table-striped table-sm" width="100%">
                            <tbody>
                              <thead>
                                <tr>
                                  <th  class="columnasABMProductos" scope="col"></th>
                                  <th  class="columnasABMProductos" scope="col"></th>
                                  <th  class="columnasABMProductos" id="numero" scope="col">Codigo</th>
                                  <th  class="columnasABMProductos" scope="col">Nombre</th>
                                  <th  class="columnasABMProductos" scope="col">Categoria</th>
                                  <th  class="columnasABMProductos" scope="col">Marca</th>
                                  <th  class="columnasABMProductos" scope="col">Oferta</th>
                                  <th  class="columnasABMProductos" scope="col">Precio</th>
                                </tr>
                              </thead>



                              @foreach ($productos as $i => $value)
                                <tr>
                                  <td class="filasABMProductos text-center pl-0 pr-0">
                                    <!-- Button trigger modal -->
                                    <input class="botonEliminar" type="image" src="Iconos/eliminar2.png" name=""  data-toggle="modal" data-target="#modal-producto-{{$i}}">

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-producto-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Importante!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            ¿Esta seguro que desea eliminar este producto por completo de la base de datos?
                                            {{ 'codigo producto: '. $value["codigo"]  }}
                                            <form action="{{ route('BajaProducto' )}}" method="POST">
                                              @csrf
                                              <input type="hidden" name="idProducto" id="caja_valor" value="{{$value["idProductos"]}}">
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="filasABMProductos text-center pl-0 pr-0">
                                    <!-- Button trigger modal -->
                                    <input class="botonEliminar" type="image" src="Iconos/modificar2.png" name=""  data-toggle="modal" data-target="#modal-producto-editar-{{$i}}">

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="modal-producto-editar-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edicion Producto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="" action="{{ Route('ModificarProducto')}}" method="post">
                                              @csrf
                                              <input type="hidden" name="idProducto" value="{{$value["idProductos"] }}">
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Codigo</label>
                                                  <input type="text" name="codigo" class="form-control" id="inputEmail4" value="{{$value["codigo"] }}" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Nombre</label>
                                                  <input type="text" name="nombre" class="form-control" id="inputPassword4" value="{{$value["nombre"] }}">
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-3">
                                                  <label for="inputEmail4">Precio</label>
                                                  <input type="number" class="form-control" name="precio" id="inputEmail4" value="{{$value["precio"] }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <label for="inputEmail4">Stock</label>
                                                  <input type="number" name="stock" class="form-control" id="inputEmail4" value="{{$value["stock"] }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <label for="inputPassword4">Marca</label>
                                                  <select class="custom-select" name='marca'>
                                                    <option value="{{$value['Marca_idMarca']}}">{{$value['nombreMarca']}}</option>
                                                    @foreach ($marcas as $marca)
                                                      <option value="{{ $marca['idMarca'] }}">{{ $marca['nombre'] }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <label for="inputPassword4">Categoria</label>
                                                  <select class="custom-select" name='categoria'>
                                                    <option value="{{$value['Categoria_idCategoria']}}">{{$value['nombreCategoria']}}</option>
                                                    @foreach ($categorias as $categoria)
                                                      <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="custom-file form-group col-md-6">
                                                  <input type="file" name="imagen" class="custom-file-input" id="customFileLang" lang="es">
                                                  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                                </div>
                                                <div class="form-check form-group col-md-3">
                                                  @if ($value['oferta'] = 'S')
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                                                  @else
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                  @endif
                                                  <label class="form-check-label" for="gridCheck">
                                                    Oferta
                                                  </label>
                                                </div>
                                              </div>
                                              <br>
                                              <div class="form-group">
                                                <label for="inputAddress">Descripcion</label>
                                                <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$value["descripcion"] }}</textarea>
                                              </div>
                                              <button type="submit" class="btn btn-success">Modificar</button>
                                              <button type="button" class="btn btn-danger">Eliminar</button>
                                              <button type="button" class="btn btn-primary">Nuevo Poducto</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["codigo"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombre"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombreCategoria"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombreMarca"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["oferta"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    ${{ $value["precio"] }}
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>

      </main>
    </div>
  </div>
@endsection
