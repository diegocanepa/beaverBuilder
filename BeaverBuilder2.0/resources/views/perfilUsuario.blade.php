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

      <div class="row pb-10" id="row">
          <div class="col-sm-12">
            <div class="card card-block text-xs-left p-3" id="card">
              <h5><i class="fa fa-user fa-fw"></i>Biography</h5>

                <p>Rick Sanchez C-137 is the father of Beth Smith, and the grandfather of Morty and Summer Smith. Aged 60 years old, he is said to have been away from the family for around fourteen years prior to the events of the show's first episode, "Pilot". He frequently travels on adventures through space and other planets and dimensions with his grandson Morty.</p>
              </div>
          </div>
      </div>

      <div class="row" id="row">
          <div class="col-sm-12 pb-10">
            <div class="card card-block text-xs-left p-3" id="card">
              <h5><i class="fa fa-user fa-fw"></i>Biography</h5>

                <p>Rick Sanchez C-137 is the father of Beth Smith, and the grandfather of Morty and Summer Smith. Aged 60 years old, he is said to have been away from the family for around fourteen years prior to the events of the show's first episode, "Pilot". He frequently travels on adventures through space and other planets and dimensions with his grandson Morty.</p>
              </div>
          </div>
      </div>


  </div>
</div>
@endsection
