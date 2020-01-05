<?php 
//$usuarios = [
 // "usuario" => "admin",
 // "password" => "admin"
  //]
// $json = json_encode($usuarios);
// $json = json_encode($auto);
// json_decode($json, true);
   ?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
require_once("codigoReutilizable/head.php") ?>

<body>
    <!-- Navigation -->
    <?php require_once("codigoReutilizable/nav.php") ?>
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" id="div-carrousel-img">
                <img src="img/header-p1.jpg" class="d-block w-100" id="img-carr" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-carousel">Las mejores oportunidades</h5>
                    <p class="text-carousel">Precios tan esperados como el verano</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/header-p2.jpg" class="d-block w-100" id="img-carr" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-carousel">La mejor opción para tu bolsillo</h5>
                    <p class="text-carousel">Grandes planes para la mejor financiacion</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/header-p3.jpg" class="d-block w-100" id="img-carr" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-carousel">¿Qué estás esperando?</h5>
                    <p class="text-carousel">Comenzá a remodelar eso que tanto querías</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Servicios -->

    <section class="page-section-services" id="about-services">
        <h2 id="h2-services">Nuestros servicios <?php echo($_SESSION["id-email"]); var_dump($_SESSION)?></h2>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="cont-service"><img class="img-section" src="img/shopping-cart.png" alt=""></div>
                    <h4 class="service-heading">E-Commerce</h4>
                    <p class="text-muted">Compra todo lo que necesites sin moverte de tu casa.</p>
                </div>
                <div class="col-md-4">
                    <div class="cont-service"><img class="img-section" src="img/logistics-delivery-truck-in-movement.png" alt=""></div>
                    <h4 class="service-heading">Envío a domicilio</h4>
                    <p class="text-muted">¡Hace tu pedido que nosotros te lo enviamos sin cargo!.</p>
                </div>
                <div class="col-md-4">
                    <div class="cont-service"> <img class="img-section" src="img/configuration.png" alt=""></div>
                    <h4 class="service-heading">Insatalación y armado</h4>
                    <p class="text-muted">¡Nosotros lo hacemos por vos!<br />¿Conocés todos nuestros servicios de instalación?</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" id="history">
                    <h2 class="section-heading">NUESTRA HISTORIA</h2>
                    <h3 class="section-subheading text-muted">La calidad de nuestros servicios para su satisfacción es nuestro principal objetivo.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/equipo-de-trabajo.jpg" alt="falta imagen">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>1980</h4>
                                    <h4 class="subheading">Nuestros comienzos</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/Empresa-.jpg" alt="falta imagen">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>1998</h4>
                                    <h4 class="subheading">Nace una futura empresa</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/Empresa-responsable.jpg" alt="falta imagen">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2012</h4>
                                    <h4 class="subheading">La consolidacion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/Foto-construir-una-gran-empresa-6.png" alt="falta imagen">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2019</h4>
                                    <h4 class="subheading">Seguimos creciendo</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("codigoReutilizable/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
