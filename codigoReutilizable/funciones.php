<?php

//valida los datos del formulario de registro
function validarFormRegistrar(){
  $arrayErrores = [];
  if (isset($_POST["nombre"])) {

    if (empty($_POST["nombre"])) {
      $arrayErrores["nombre"][] = "El campo nombre es obligatorio.";
    }else {
      if (strlen(trim($_POST["nombre"])) < 5) {
        $arrayErrores["nombre"][] = "El nombre debe tener 5 caracteres como minimo.";
      }
    }
  }

  if (isset($_POST["e-mail"])) {
    if (empty($_POST["e-mail"])) {
      $arrayErrores["e-mail"][] = "El campo email es obligatorio.";
    }else {
      if (!filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)) {
        $arrayErrores["e-mail"][] = "Este no es un email valido.";
      }else {
        if (file_exists("usuarios.json")) {
          $json = file_get_contents("usuarios.json");
          $usuarios = json_decode($json , true);
          if (usuarioRegistrado($usuarios)) {
            $arrayErrores["e-mail"][] = "El email ya esta registrado";
          }
        }
      }
    }
  }

  if (isset($_POST["password"])) {
    if (empty($_POST["password"])) {
      $arrayErrores["password"][] = "El campo password es obligatorio.";
    }else {
      if (strlen(trim($_POST["password"])) < 7) {
        $arrayErrores["password"][] = "La contraseña debe tener una longitud mayor a 7 caracteres.";
      }
    }
  }

  if (isset($_POST["re-password"])) {
    if (empty($_POST["re-password"])) {
      $arrayErrores["re-password"][] = "El campo re-password es obligatorio.";
    }else {
      if ($_POST["password"] != $_POST["re-password"]) {
        $arrayErrores["re-password"][] = "Ambas contraseñas deben coincidir.";
      }
    }
  }

  return $arrayErrores;
}

//valida los datos del formulario de Login
function validarFormLogin(){
  $arrayErrores = [];
  if (isset($_POST["e-mail"])) {
    if (empty($_POST["e-mail"])) {
      $arrayErrores["e-mail"][] = "El campo email es obligatorio.";
    }else {
      if (!filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)) {
        $arrayErrores["e-mail"][] = "Este no es un email valido.";
      }else {
        //controlo que verdaderamente exista el usuarios.
        if (file_exists("usuarios.json")) {
          $json = file_get_contents("usuarios.json");
          $usuarios = json_decode($json , true);
          if (!usuarioRegistrado($usuarios)) {
            $arrayErrores["e-mail"][] = "El email no está registrado";
          }
        }else {
          $arrayErrores["e-mail"][] = "El email no está registrado";
        }
      }
    }
  }

  if (isset($_POST["password"])) {
    if (empty($_POST["password"])) {
      $arrayErrores["password"][] = "El campo password es obligatorio.";
    }else {
      if (strlen(trim($_POST["password"])) < 7) {
        $arrayErrores["password"][] = "La contraseña debe tener una longitud mayor a 7 caracteres.";
      }else {
        if (file_exists("usuarios.json")) {
          $json = file_get_contents("usuarios.json");
          $usuarios = json_decode($json , true);
          foreach ($usuarios as $key => $usuario) {
              if ($usuario["e-mail"] == $_POST["e-mail"] && !password_verify($_POST["password"], $usuario["password"])) {
                $arrayErrores["password"][] = "La contraseña ingresada es incorrecta.";
              }
          }
        }
      }
    }
  }
  return $arrayErrores;
}


//mantener datos
function persistirDato($dato, $array){
  if (isset($array[$dato])) {
    return "";
  }else {
    if (isset($_POST[$dato])) {
      return $_POST[$dato];
    }else{
      return "";
    }
  }
}

//Devolver errores
function imprimirErrores($dato, $array){
  $strErrores = "";
  if (isset($array[$dato])) {
    foreach ($array[$dato] as $error) {
      $strErrores = $strErrores . '<small class="text-danger">' . $error . '</small><br>';
    }
  }
  return $strErrores;
}

function usuarioRegistrado($usuarios){
  foreach ($usuarios as $usuario) {
    if($usuario["e-mail"] == trim($_POST["e-mail"])){
      return true;
    }
  }
  return false;
}
 ?>
