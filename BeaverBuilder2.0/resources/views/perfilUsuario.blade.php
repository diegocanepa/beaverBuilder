@extends('layouts.app')

@section('content')
<div class="perfilUsuario">
  <header class="headerProfile">
      <div class="container">
        <div class="teacher-name pt-3">
          <div class="row" id="row">
          <div class="col-sm-9">
            <h2><strong>Rick Sanchez</strong></h2>
          </div>
          <div class="col-sm-3">
            <div class="button pull-right float-right">
              <a href="{{ Route('perfilUsuarioEdit') }}" class="btn btn-outline-success btn-sm">Edit Profile <i class="fa fa-pencil"></i></a>
            </div>
          </div>
          </div>
        </div>

        <div class="row" id="row" style="margin-top:20px;">
          <div class="col-sm-3">
            <a href="#"> <img class="rounded-circle" src="//images.weserv.nl/?url=i.imgur.com/Md9jS0Ib.jpg" alt="Rick" ></a>
          </div>

          <div class="col-sm-6">
            <h5Associate Professor, <small>Dept. of Alien Agriculture, Jaarvlar-3 University</small></h5>
            <p>PhD on Molecular Shwanky Physics</p>
            <p>Address: 123 Cuba str Tampa, Fl, Earth 137</p>
          </div>

          <div class="col-sm-3 text-center social">
            <span class="number">Phone:<strong>+0001732226402</strong></span>
            <div class="button-email">
              <a href="mailto:arick@yahoo.com" class="btn btn-outline-success btn-block"><i class="fa fa-envelope-o"></i> Send Email</a>
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
