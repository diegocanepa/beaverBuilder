@extends('layouts.app')

@section('content')

          <div class="page-login">
              <div class="container-login">
                  <div class="left-login">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h4 class="titulo-login">Beaver Builders</h4>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <p class="subtitulo-login">Login</p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <p class="texto-login">Ingresa a nuestra pagina y conoce ofertas exclusivas!. Ademas podes llevar un control especifico de tus compras y recibir novedades cada semana.</p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="right-login">
                      <div class="formlogin">
                          <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div class="box-email">
                                  <label class="label-login" for="email">Email</label>
                                  <input id="email" type="email" placeholder="Escribe tu E-mail aqui..." class="input-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="box-pass">
                                  <label class="label-login" for="password">Password</label>
                                  <input id="password" type="password" class="input-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Escribe tu contraseña aqui...">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                              <div class="form-group row">
                                  <div class="col-md-12 text-center pt-2">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                          <label class="form-check-label" for="remember">
                                              {{ __('Recordarme') }}
                                          </label>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group row mb-0 text-center">
                                  <div class="col-md-12">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Login') }}
                                      </button>

                                      @if (Route::has('password.request'))
                                          <a class="btn btn-link col-md-12" href="{{ route('password.request') }}">
                                              {{ __('¿Olvidaste tu contraseña?') }}
                                          </a>
                                      @endif
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
@endsection
