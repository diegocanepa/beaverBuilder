<?php
require_once("./codigoReutilizable/funciones.php");


$errores = [];

if ($_POST) {
  if (isset($_POST["cancelar"])) {
    header('Location: productos.php');
  }
  //Recibo todos los errores de las validaciones
  $errores = validarFormRegistrar();

  //Si no hay errores, entonces registro al usuario
  if (count($errores) == 0) {

    if (file_exists("usuarios.json")) {
      $json = file_get_contents("usuarios.json");
      $usuarios = json_decode($json, true);
      //var_dump($usuarios);
      //primero guardo los datos del usuario
      $usuarios[] = [
        "nombre" => trim($_POST["nombre"]),
        "e-mail" => trim($_POST["e-mail"]),
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
      ];

      $jsonFinal = json_encode($usuarios);
      file_put_contents("usuarios.json", $jsonFinal);
      header("Location: productos.php");
      exit;
    } else {
      $usuario = [
        0 => [
          "nombre" => trim($_POST["nombre"]),
          "e-mail" => trim($_POST["e-mail"]),
          "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
        ]
      ];
      //despues lo convierto en json
      $usuarioJson = json_encode($usuario);
      //por ultimo lo guardo
      file_put_contents("usuarios.json", $usuarioJson);
      //Redirijo a productos.php
      header("Location: productos.php");
      exit;
    }

    /*
    $usuario = [
      "nombre" => trim($_POST["nombre"]),
      "email" => trim($_POST["e-mail"]),
      "password" => password_hash($_POST["password"],PASSWORD_DEFAULT)
    ];
    //despues lo convierto en json
    $usuarioJson = json_encode($usuario);
    //por ultimo lo guardo
    file_put_contents("usuarios.json", $usuarioJson, FILE_APPEND);
    //Redirijo a productos.php
    header("Location: productos.php");
    exit;
    */
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
require_once("codigoReutilizable/head.php") ?>
<!-- Navigation -->
<?php require_once("codigoReutilizable/nav.php") ?>

<body id="body-register">
  <div class="container-register">
    <form class="form-register" action="" method="post" enctype="multipart/form-data">
      <h1 class="h1-registro">Registro</h1>
      <div class="container campos-reg">
        <div class="row">
          <div class="col-lg-12">
            <label class="lbl-register-nom" for="Nombre">Nombre</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input class="input-name" type="Nombre" name="nombre" placeholder="Escribe tu nombre aqui..." value="<?= persistirDato("nombre", $errores) ?>">
            <?= imprimirErrores("nombre", $errores) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label class="lbl-register-email" for="E-mail">E-mail</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input class="input-mail" type="E-mail" name="e-mail" placeholder="Escribe tu e-mail..." value="<?= persistirDato("e-mail", $errores) ?>">
            <?= imprimirErrores("e-mail", $errores) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label class="lbl-register-pass" for="Password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input class="input-pass" type="password" name="password" placeholder="Ingresa tu contraseña" value="">
            <?= imprimirErrores("password", $errores) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label class="lbl-register-repass" for="Re-password">Re-password</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input class="input-repass" type="password" name="re-password" placeholder="Vuelve a ingresar tu contraseña" value="">
            <?= imprimirErrores("re-password", $errores) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <label for="photo-prof">Foto de perfil</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <input class="input-photo" type="file" name="photo-prof">
          </div>
        </div>
      </div>
      <div class="row btn-canc-reg">
        <div class="col-lg-6 div-btn-reg">
          <button class="register-btn" type="submit">Registrar</button>
        </div>
        <div class="col-lg-6 div-btn-cancel">
          <button class="cancel-btn" type="submit" name="cancelar">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
  <?php include_once("codigoReutilizable/footer.php") ?>
</body>

</html>