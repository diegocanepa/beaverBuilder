<!DOCTYPE html>
<?php
session_start();
require_once("codigoReutilizable/productos.php");
 ?>

 <?php
 // Inicializo el array vacio
 $array = [];

 if ($_POST) {
   //Si existe una sesion previa obtengo todos los valores de id
   if (isset($_SESSION["idProductos"])) {
     foreach ($_SESSION["idProductos"] as $indice => $valor) {
       $array[] = $valor;
     }
   }

   //Agrego al arreglo el numero de id que se envia por post
   foreach ($_POST as $key => $value) {
     if($key === "qty" || $key === 206919){
       //Nada
     }else{
       $array[] = $key;
     }

   }

   $_SESSION["idProductos"] = $array;
   header("Location: carrito.php");
 }
 ?>

<html lang="en" dir="ltr">
  <?php require_once("codigoReutilizable/head.php") ?>
  <body>
    <?php require_once("codigoReutilizable/nav.php") ?>
      <section class="jumbotron text-center">
          <div class="container">
              <h1>Productos<?php echo($_SESSION["id-email"]); var_dump($_SESSION)?></h1>
              <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          </div>
      </section>


      <div class="container">
        <form class="form-agrupa" action="productos.php" method="post">
          <div class="row">

            <?php foreach ($productos as $key => $value): ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="imagen-productos" src="<?php echo $value["imagen"]; ?>" alt="">
                <div class="card-body">
                  <h4><?php echo $value["Nombre"]; ?></h4>
                  <p class="card-text"><?php echo $value["descripcion"]; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="detalleProducto.php?prod=<?php echo $key; ?>" ><button type="button" class="btn btn-sm btn-outline-secondary">Ver mas</button></a>
                      <input class="btn btn-sm btn-outline-secondary" type="submit" name="<?php echo $key; ?>" value="Agregar al Carrito">
                    </div>
                    <small class="text-muted"><?php echo "$".$value["precio"]; ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
        </form>

      </div>

    <?php require_once("codigoReutilizable/footer.php") ?>
  </body>
</html>
