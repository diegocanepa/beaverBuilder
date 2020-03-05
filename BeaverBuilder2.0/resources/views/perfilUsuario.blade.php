@extends('layouts.app')

@section('content')
<div class="perfilUsuario">
  <header class="headerProfile">
      <div class="container">
        <div class="teacher-name pt-3">
          <div class="row" id="row">
          <div class="col-sm-9">
            <h2><strong>{{auth()->user()->name}}</strong></h2>
          </div>
          <div class="col-sm-3">
            <div class="button pull-right float-right">
              <a href="{{ Route('perfilUsuarioEdit') }}" class="btn btn-outline-success btn-sm">Editar Perfil  <i class="fa fa-pencil"></i></a>
            </div>
          </div>
          </div>
        </div>

        <div class="row" id="row" style="margin-top:20px;">
          <div class="col-sm-3">
            <div class="profile">
                <img id="blah" src="{{auth()->user()->imagen}}">
              <div class="overlay">
                <form class="" action="{{ Route('perfilUsuario')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input id="imgInp" type="file" name="imagen">
                  <p>Cambiar Imagen</p>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-link">Actualizar</button>
              </div>

              </form>
          </div>

          <div class="col-sm-6">
            <h6>Una mejor forma de administrar tu cuenta, <small>{{auth()->user()->name}}</small></h6>

            <span class="number">Email: <strong>{{auth()->user()->email}}</strong></span>
            <br>
            <span class="number">Rol: <strong>{{$rolPersona['nombreRol']}}</strong></span>
            <br>
            @if ($documentoPersona)
              <span class="number">{{$documentoPersona['nombreDoc']}}: <strong>{{auth()->user()->nroDocumento}}</strong></span>
            @endif

          </div>

          <div class="col-sm-3 text-center social">
            <div class="button-email">
              <a href="mailto:diego_canepa241198@gmail.com" class="btn btn-outline-success btn-block"><i class="fa fa-envelope-o"></i>  Enviar mail</a>
            </div>
            <div class="social-icons">
              <a href="#">
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x" ></i>
                <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
              </span></a>
              <a href="#">
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
              </span></a>
              <a href="#">
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
              </span></a>
              <a href="#">
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-slideshare fa-stack-1x fa-inverse"></i>
              </span></a>

            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        @foreach ($comprasRealizadas as $compra)
            <div class="col-md-4 pt-3">
              <div class="card mb-4 shadow-sm">
                <i class="fa fa-shopping-cart fa-2x p-2 fluid" aria-hidden="true"></i>
                <div class="card-body">
                  <h4 class="card-title"><strong>Nro Compra: {{$compra['idPedido']}}</strong></h4>
                  <p class="card-text">Esto es un resumen de la compra realizada el dia <strong>{{substr($compra['fechaPedido'],0,10)}}</strong></p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><span><strong>Importe: </strong> {{$compra['total']}}</span></li>
                  <li class="list-group-item"><span><strong>Descuento: </strong>@if ($compra['descuento_codigoDescuento'])SI @else NO @endif</span><br></li>
                  <li class="list-group-item"><span><strong>Importe: </strong> {{$compra['total']}}</span></li>
                </ul>
                <div class="card-body">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-success">Ver mas</button>
                    <button type="button" class="btn btn-outline-info">Seguir Envio</button>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    </div>


  </div>
</div>
@endsection
