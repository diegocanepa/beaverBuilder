<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Beaver Builders - Materiales de construccion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


    <script src="{{ asset('js/app.js')}}" defer></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <link href="/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/animation.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.5/assets/owl.carousel.min.css'>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/08a1b164fc.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="icon" href=" https://assets.jumpseller.com/store/bootstrap/themes/215975/favicon.png?1571644467 ">
</head>
<body>
@if (auth::guest())
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fadeInDown" id="navbar-respon">
              <div class="container">
                  <a class="navbar-brand" href="{{ route('login') }}" id="navbar-brand">Beaver Builder</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="{{ route('productos') }}">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="home.php#about-services">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="home.php#footer-section">Contactanos</a>
                            </li>
                        </ul>
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          <li class="nav-item">
                              <a class="nav-link" id="nav-li"  href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" id="nav-li"  href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      </ul>
                  </div>
              </div>
          </nav>
@elseif ( auth()->user()->rol == 2)
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fadeInDown" id="navbar-respon">
              <div class="container">
                  <a class="navbar-brand" href="{{ route('login') }}" id="navbar-brand">Beaver Builder</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="{{ route('productos') }}">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="home.php#about-services">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-li" href="home.php#footer-section">Contactanos</a>
                            </li>
                        </ul>
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          <li class="nav-item dropdown">
                              <a id="nav-li" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item nav-link" id="nav-li" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                  <a class="nav-link" id="nav-li" href="{{ route('perfilUsuario') }}">Mi Perfil</a>
                              </div>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="nav-li-carrito" href="{{ route ('carritoCompras') }}"><img id="carrito-compras-img" src="/Iconos/carrito-compras2.png" alt="">

                              </a>
                          </li>
                      </ul>
                    </div>
                </div>
      </nav>
@else
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand" href="{{ route('login') }}" id="navbar-brand">Beaver Builder</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="dropdown-item nav-link" id="nav-li" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </nav>
@endif

<main>
  @yield('content')
</main>

@guest
  <footer id="footer-section">
              <div class="container"  id="footer-top">
                  <div class="row">
                      <div class="col-lg-4">
                          <div class="categorias-foot">
                              <p class="parr-footer">Categorias</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li>
                                      <a class="tag-footer" href="">Envio</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Pagos</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="{{ route('productos') }}">Ofertas</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Lo mas vendido</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Novedades</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Preguntas Precuentes</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="contact-foot">
                              <p class="parr-footer">Contactanos</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li class="li-beaver-buil">Beaver Builders</li>
                                  <li><img class="img-footer" src="resources/placeholder.png" alt=""> Juan Pablo Monjes 5404, Cordoba</li>
                                  <li><img class="img-footer" src="resources/whatsapp.png" alt=""> 0351 15-659-4587</li>
                                  <li><img class="img-footer" src="resources/gmail.png" alt=""> info@bebuilders.com</li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="social-media-foot">
                              <p class="parr-footer">Redes Sociales</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li><a class="tag-footer" href="https://facebook.com"><img class="img-footer" src="resources/facebook.png" alt=""> Seguinos en Facebook</a></li>
                                  <li><a class="tag-footer" href="https://instagram.com"><img class="img-footer" src="resources/instagram.png" alt=""> Seguinos en Instagram</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
      </footer>
@elseif (auth()->user()->rol == 2)
  <footer id="footer-section">
              <div class="container"  id="footer-top">
                  <div class="row">
                      <div class="col-lg-4">
                          <div class="categorias-foot">
                              <p class="parr-footer">Categorias</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li>
                                      <a class="tag-footer" href="">Envio</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Pagos</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Ofertas</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Lo mas vendido</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="">Novedades</a>
                                  </li>
                                  <li>
                                      <a class="tag-footer" href="{{ route ('faqs')}}">Preguntas Precuentes</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="contact-foot">
                              <p class="parr-footer">Contactanos</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li class="li-beaver-buil">Beaver Builders</li>
                                  <li><img class="img-footer" src="resources/placeholder.png" alt=""> Juan Pablo Monjes 5404, Cordoba</li>
                                  <li><img class="img-footer" src="resources/whatsapp.png" alt=""> 0351 15-659-4587</li>
                                  <li><img class="img-footer" src="resources/gmail.png" alt=""> info@bebuilders.com</li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="social-media-foot">
                              <p class="parr-footer">Redes Sociales</p>
                              <hr style="border-color:white">
                              <ul class="footer-list">
                                  <li><a class="tag-footer" href="https://facebook.com"><img class="img-footer" src="resources/facebook.png" alt=""> Seguinos en Facebook</a></li>
                                  <li><a class="tag-footer" href="https://instagram.com"><img class="img-footer" src="resources/instagram.png" alt=""> Seguinos en Instagram</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
      </footer>
@endguest
  <script src="/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
