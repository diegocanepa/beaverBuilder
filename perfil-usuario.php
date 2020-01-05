<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<?php require_once("codigoReutilizable/head.php") ?>

<body class="mi-perfil">
    <!-- Navigation -->
    <?php require_once("codigoReutilizable/nav.php") ?>
    <section id="wrapper">
        <div class="container">
            <div>
                <div id="content-wrapper">
                    <section id="main-perfil">
                        <section id="content-perfil" class="page-content">
                            <aside id="notifications">
                                <div class="container">
                                </div>
                            </aside>
                            <form action="" id="customer-form" class="js-customer-form" method="post">
                                <header class="page-header-perfil">
                                    <h1>
                                        Mi Perfíl
                                    </h1>
                                </header>
                                <section>
                                    <input type="hidden" name="id_customer" value="">
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label">
                                            Sexo
                                        </label>
                                        <div class="col-md-6 form-control-valign">
                                            <label class="radio-inline">
                                                <span class="custom-radio">
                                                    <input name="id_gender" type="radio" value="1" checked="">
                                                    <span></span>
                                                </span>
                                                Masculino
                                            </label>
                                            <label class="radio-inline">
                                                <span class="custom-radio">
                                                    <input name="id_gender" type="radio" value="2">
                                                    <span></span>
                                                </span>
                                                Femenino
                                            </label>
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label required">
                                            Nombre
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="firstname" type="text" value="Gaston" required="">
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label required">
                                            Apellidos
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="lastname" type="text" value="Favre Salas" required="">
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label required">
                                            Dirección de correo electrónico
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="email" type="email" value="gastonfavre@outlook.com" required="">
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label required">
                                            Contraseña
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" pattern=".{5,}" required="">
                                                <span class="input-group-btn">
                                                    <button class="btn" type="button" data-action="show-password" data-text-show="Mostrar" data-text-hide="Ocultar">
                                                        Mostrar
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-muted">

                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label">
                                            Nueva contraseña
                                            <small class="form-control-comment">
                                                (Opcional)
                                            </small>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password" name="new_password" type="password" value="" pattern=".{5,}">
                                                <span class="input-group-btn">
                                                    <button class="btn" type="button" data-action="show-password" data-text-show="Mostrar" data-text-hide="Ocultar">
                                                        Mostrar
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label">
                                            Fecha de nacimiento
                                            <small class="form-control-comment">
                                                (Opcional)
                                            </small>
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" value="" placeholder="DD/MM/YYYY">
                                            <span class="form-control-comment">
                                                (Ejemplo: 31/05/1970)
                                            </span>
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row  ">
                                        <label class="col-md-12 text-left form-control-label">
                                        </label>
                                        <div class="col-md-6">
                                            <span class="custom-checkbox">
                                                <input name="newsletter" type="checkbox" value="1">
                                                <span><i class="material-icons checkbox-checked"></i></span>
                                                <label>Suscribirse a nuestro boletín de noticias<br><em>Puede darse de baja en cualquier momento.</em></label>
                                            </span>
                                        </div>
                                        <div class="col-md-6 text-muted">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 text-muted"></div>
                                    </div>
                                </section>
                                <footer class="form-footer clearfix">
                                    <input type="hidden" name="submitCreate" value="1">
                                    <button class="btn btn-primary form-control-submit float-xs-right" data-link-action="save-customer" type="submit">
                                        Guardar
                                    </button>
                                </footer>
                            </form>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </section>
</body>

</html>