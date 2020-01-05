<!DOCTYPE html>
<?php session_start();?>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("codigoReutilizable/head.php") ?>
  </head>
  <body class="mi-perfil">
    <?php require_once("codigoReutilizable/nav.php") ?>
    <div class="customer-form text-center">
      <div class="container">
        <div class="py-5 text-center">
          <h2>Perfil de Usuario</h2>
        </div>

        <div class="container">
          <div class="col-12 text-center" >
            <input type="image" src="img/messi-perfil.jpg" value="" class="img imagen-perfil">
          </div>
        </div>
              <div class="mb-3">
                <label for="username">Nombre de Usuario</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Username" required>
                  <div class="invalid-feedback" style="width: 100%;">
                    Campo Obligatorio
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Campo Obligatorio)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Porfavor ingrese un email valido.
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Porfavor ingrese su direccion actual.
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Dirección 2 <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country">País</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Eliga...</option>
                    <option>Estados Unidos</option>
                    <option>Argentina</option>
                    <option>Bolivia</option>
                    <option>Peru</option>
                    <option>Ecudor</option>
                  </select>
                  <div class="invalid-feedback">
                    Porfavor seleccione un pais valido.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">Cuidad</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Eliga...</option>
                    <option>California</option>
                    <option>Cordoba</option>
                    <option>Buenos Aires</option>
                    <option>Rosario</option>
                  </select>
                  <div class="invalid-feedback">
                    Porfavor seleccione una ciudad valido.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">Codigo Postal</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>

              <hr class="mb-4">
              <h4 class="mb-3">Medio de Pago</h4>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Tarejeta de Credito</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Tarejeta de Debito</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Nombre de la tarjeta</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Nombre completo de la tarjeta</small>
                  <div class="invalid-feedback">
                    El nombre de la tarjeta es obligatorio.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Numero de la tarjeta</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    El numero de la tarjeta es obligatorio.
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Vencimiento</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Vencimiento obligatorio.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Codigo de seguridad obligatorio.
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Guardar Datos</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                  <button class="btn btn-primary  btn-block" type="submit">Cancelar</button>
                </div>
              </div>
            </form>
          </div>
          </div>
    <?php include_once("codigoReutilizable/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
