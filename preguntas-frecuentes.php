<!DOCTYPE html>
<?php session_start();?>

<html lang="en" dir="ltr">
  <?php require_once("codigoReutilizable/head.php");?>
  <body class="body-preg">
    <?php require_once("codigoReutilizable/nav.php"); ?>
    <div class="container">
    <!-- For demo purpose -->
      <div class="row py-5">
          <div class="col-lg-9 mx-auto  text-center">
              <h1 class="display-4">PREGUNTAS FRECUENTES</h1>
              <p class="lead mb-0">Para obtener una respuesta inmediata, podés entrar a las siguientes preguntas frecuentes, donde encontrarás información sobre las cuestiones más consultadas:</p>
          </div>
      </div><!-- End -->


      <div class="row contenedor-preguntas">
          <div class="col-lg-9 mx-auto">
              <!-- Accordion -->
              <div id="accordionExample" class="accordion shadow">

                  <!-- Accordion item 1 -->
                  <div class="card">
                      <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="btn btn-link text-dark font-weight-bold text-uppercase collapsible-link">¿Como se realiza una compra?</button>
                          </h2>
                      </div>
                      <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          </div>
                      </div>
                  </div><!-- End -->

                  <!-- Accordion item 2 -->
                  <div class="card">
                      <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Condiciones generales del sitio</button>
                          </h2>
                      </div>
                      <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0">Las fotos son a modo ilustrativo. Los productos no incluyen decoración.
                                      <br><br>
                                      Los precios exhibidos son exclusivos para la PAGINA WEB, no aplican en el local de venta.
                                      Las promociones, publicaciones o descuentos que se comunican en los locales de venta pueden
                                      sufrir variaciones o no aplicarse en la página web. Las promociones no son acumulables.
                                      <br><br>
                                      La disponibilidad de los productos ofrecidos está sujeta al movimiento diario
                                      de stock de la sucursal que arma el pedido, en caso de que los mismos no se encuentren disponibles
                                      será contactado por el call center. Por lo tanto el producto seleccionado puede no encontrarse en
                                      stock en la sucursal al momento de llegar el pedido a la misma. A su vez, es posible que no estén
                                      disponibles en easy.com.ar algunos artículos que sí lo están en la sucursal.
                                      <br><br>
                                      En caso de presentarse algún inconveniente con el medio de pago proporcionado, el pedido podrá ser
                                      anulado directamente, sin generar ningún tipo de cargo en la tarjeta de crédito del cliente.
                                      El cliente recibirá una constancia de dicha anulación por e-mail.</p>
                          </div>
                      </div>
                  </div><!-- End -->

                  <!-- Accordion item 3 -->
                  <div class="card">
                      <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">¿Que encuentro en mi carrito de compras?</button>
                          </h2>
                      </div>
                      <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0">Aquí podrás visualizar el listado de productos agregados hasta el momento.
                                Si contás con un Cupón de Descuento, podrás ingresarlo en éste paso.
                                <br><br>
                                También deberás seleccionar la modalidad de entrega del producto (Envío a Domicilio o Retiro en Tienda).
                                Sólo podrás seleccionar Retiro en Tienda si todos los productos en tu carrito tienen esta opción habilitada
                                (se encuentran detalladas debajo de cada producto).
                                <br><br>
                                Los productos con la opción Retiro en Constructor no podrán ser comprados en el mismo pedido con los de Retiro
                                en Tienda; para estos casos deberás generar los pedidos por separado.
                                <br><br>
                                Los artículos de Pedido Especial o Venta por Pedido deben ser adquiridos en una órden separada al resto de los productos.
                                El sistema te informará si tenés esta combinación de productos en tu carrito mediante un mensaje.
                                <br><br>
                                Para continuar al siguiente paso, deberás iniciar sesión o registrarte si es tu primera vez en el sitio.</p>
                          </div>
                      </div>
                  </div><!-- End -->
                  <div class="card">
                      <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">¿Cómo utilizo mi cupón de descuento?</button>
                          </h2>
                      </div>
                      <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0">Una vez que elegiste tu producto al cual puede aplicarse el cupón, hacé click en el botón 'Comprar'
                                y en el paso Carrito de compras deberás seleccionar la opción 'Tengo cupón de descuento' para ingresar el código.
                                ¡Es importante que respetes las mayúsculas y minúsculas! Una vez aplicado el cupón continuá tu compra con normalidad.</p>
                          </div>
                      </div>
                  </div>

                  <div class="card">
                      <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">¿Todos los productos tienen devolución?</button>
                          </h2>
                      </div>
                      <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0">Si. Sin embargo, al momento de recibir el producto tenés que chequear el estado del mismo, ya que,
                                una vez firmado el remito en conformidad se considerará la entrega en buen estado.</p>
                          </div>
                      </div>
                  </div>

                  <div class="card">
                      <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                          <h2 class="mb-0">
                              <button type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Inconvenientes con la entrega</button>
                          </h2>
                      </div>
                      <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                          <div class="card-body p-5">
                              <p class="font-weight-light m-0"> En el caso que no podamos concretar la entrega te contactaremos para pactar una nueva visita.
                                <br><br>
                              - Recordá que si el producto no se encuentra en condiciones o no cumple con tus expectativas podés rechazarlo en el momento de la entrega.
                              En este caso deberás firmar el remito indicando los motivos del rechazo y luego te contactaremos para coordinar una nueva entrega.
                              <br><br>
                              Si el inconveniente es otro o aún te quedan dudas podés contactarnos a través de nuestro Chat o comunicarte al 0810-444-0018 opción 1.</p>
                          </div>
                      </div>
                  </div>

              </div><!-- End -->
          </div>
      </div>
    </div>

<!-- Footer-->
<?php require_once("codigoReutilizable/footer.php"); ?>

  </body>
</html>
