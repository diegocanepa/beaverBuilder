@extends('layouts.app')

@section('content')
  <div class="div-general-detalle-producto">
        <!-- Navigation -->

        <div class="titulo-detalle-producto">
          <h3><?php echo $producto["nombre"];  ?></h3>
        </div>

        <div class="container-fluid">

          <form class="" action="productos.php" method="post">
            <div class="row">
              <div class="col-lg-5 text-center contenedor-datos-producto ">
                <img class="img-fluid" src=<?php echo $producto["imagen"];  ?> alt="Imagen">
              </div>
              <div class="col-lg-7 contenedor-datos-producto">

                <div class="form-group price_elem row">
                  <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Codigo:</label>
                  <div class="col-sm-8 col-md-9">
                    <span class="product-form-price" id="product-form-price"><?php echo $producto["codigo"];  ?></span>
                  </div>
                </div>
                <div class="form-group price_elem row">
                  <label class="col-sm-3 col-md-3 form-control-label nopaddingtop">Price:</label>
                  <div class="col-sm-8 col-md-9">
                    <span class="product-form-price" id="product-form-price">$ <?php echo $producto["precio"];  ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">Quantity:</label>
                  <div class="col-sm-8 col-md-9">
                    <input type="number" class="qty form-control" id="input-qty" name="qty" maxlength="5" value="1" >
                  </div>
                </div>

                <div class="form-group qty-select row">
                  <label for="Quantity" class="col-sm-3 col-md-3 form-control-label">color:</label>
                    <div class="col-sm-8 col-md-9">
                        <select id="206919" name="206919" class="form-control prod-options">
                            <option data-variant-stock="999" data-variant-id="2478882" value="687718">Grey</option>
                            <option data-variant-stock="999" data-variant-id="2478882" value="687719">Black</option>
                        </select>
                    </div>
                </div>

                <div class="form-group product-stock product-available row visible">
                  <label class="col-sm-3 col-md-3 form-control-label"></label>
                  <div class="col-sm-8 col-sm-offset-3 col-md-9 col-md-offset-3">
                    <input type="submit" class="adc btn btn-primary" name="sssssssssssssssssssssssssss"  value="Agregar al Carrito" /><img src="img/icono-carrito.png" alt="">
                    <a href="javascript:history.back()" class="btn btn-link btn-sm" title="Continue Shopping">&larr; Continuar Comprando</a>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-md-3 form-control-label">Description:</label>
                  <div class="col-sm-8 col-md-9 description">
                    <p><?php echo $producto["descripcion"];  ?></p>
                  </div>
                </div>


                <div id="product-sharing" class="row">
                  <label class="col-sm-3 col-md-3 ">Share:</label>
                  <ul class="list-inline social-networks col-sm-9 col-md-9">
                      <li class="list-inline-item">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://bootstrap.jumpseller.com/wacom-tablet" class="has-tip tip-top radius button tiny button-facebook trsn" title="Share on Facebook" target="_blank" data-tooltip>
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="https://twitter.com/share?url=https://bootstrap.jumpseller.com/wacom-tablet&text=Check this product Wacom Bamboo Tablet" class="has-tip tip-top radius button tiny button-twitter trsn" title="Share on Twitter" target="_blank" data-tooltip>
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="https://pinterest.com/pin/create/bookmarklet/?media=https://images.jumpseller.com/store/bootstrap/224300/Wacom_Bamboo2.JPG?1439529365&url=https://bootstrap.jumpseller.com/wacom-tablet&is_video=false&description=Wacom Bamboo Tablet: Just getting going with your art? Transitioning from paper to computer-based work? The Bamboo Splash is a great way to explore your interests, with a premium feel of the pen tablet and everything you need to get started in the box.Start something fun! Sketch, draw, paint, all on your computer with the new Bamboo Splash. You'll work both digitally and naturally, thanks to the feel of the Bamboo pen in your hand. Whenever your art and your computer come together, a Bamboo pen tablet is a must have!You can replicate pencils, chalks, oils and watercolors as you move the Bamboo pen naturally across the tablet. Create your own effects, experiment, and share your stuff with others digitally. Most of all, have some fun! " class="has-tip tip-top radius button tiny button-pinterest trsn" title="Share on Pinterest" target="_blank" data-tooltip>
                          <i class="fab fa-pinterest"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="has-tip tip-top radius button tiny button-tumblr trsn" title="Share on Tumblr" href="http://tumblr.com/widgets/share/tool?canonicalUrl=https://bootstrap.jumpseller.com/wacom-tablet">
                          <i class="fab fa-tumblr"></i>
                        </a>
                      </li>
                      <script id="tumblr-js" async src="https://assets.tumblr.com/share-button.js"></script>
                      <li class="list-inline-item">
                        <a id="whatsapp" class="has-tip tip-top radius button tiny button-whats trsn" href="https://api.whatsapp.com/send?text=Check this product Wacom Bamboo Tablet | https://bootstrap.jumpseller.com/wacom-tablet">
                          <i class="fab fa-whatsapp"></i>
                        </a>
                      </li>
                  </ul>
              </div>
              </div>
            </div>
          </form>

        </div>
        <br>
        <br>
        <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                DESCRIPCION PRODUCTO
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <?php echo $producto["descripcion"];  ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                MEDIDAS PRODUCTOS
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <ul class="items-datos-products">
                <li>Ancho: <?php  ?></li>
                <li>Largo: <?php  ?></li>
                <li>Peso: <?php  ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>


@endsection
