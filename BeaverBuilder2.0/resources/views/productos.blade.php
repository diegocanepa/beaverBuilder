@extends('layouts.app')

@section('content')
<div class="page-products">
  <section class="text-center">
    <div class="container">
      <h1>Productos</h1>
      <p class="lead text-muted">
        Desde siempre, los productos de Beaver Builder han sido diseñados pensando no sólo en cómo vivimos, sino también en cómo trabajamos.
        Hoy estos productos ayudan a los empleados a trabajar de forma más simple y productiva, resolver problemas de forma creativa y colaborar para alcanzar
        un objetivo común. Además, están pensados para trabajar juntos de una forma maravillosa.
      </p>
    </div>
  </section>


  <div class="container">

      <div class="row">
      @foreach ($productosListado as $producto)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="imagen-productos" src="<?php echo $producto["imagen"]; ?>" alt="">
            <div class="card-body">
              <h4><?php echo $producto["nombre"]; ?></h4>
              <p class="card-text"><?php echo substr($producto["descripcion"],0,50); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="productos/{{ $producto["idProductos"] }}"><button type="button" class="btn btn-sm btn-outline-secondary">Ver mas</button></a>
                    <a href="agregar/{{ $producto["idProductos"] }}"><button type="button" class="btn btn-sm btn-outline-secondary">Agregar al carrito</button></a>
                </div>
                <small class="text-muted"><?php echo "$".$producto["precio"]; ?></small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>

  </div>
</div>

@endsection
