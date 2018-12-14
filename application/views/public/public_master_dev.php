<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 31/07/2017
 * Time: 2:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Compro empeño -Tu solución inmediata- </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/ui/admin/dist/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php echo $this->section('css_p') ?>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>node_modules/animate.css/animate.min.css">
    <!-- public parsed CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/public/css/style.css">

</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<header>
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="/ui/public/images/logo_top.png" id="logo_top">
                </div>
                <div class="col">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/pd">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>home/productos">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>">Tiendas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>">Anticipos</a>
                                </li>

                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a type="button" id="ver_categorias_btn" class="btn btn-success ">ver categorias</a>
    </div>
    <?php if ($monstrar_banners) { ?>
        <div id="banner">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/ui/public/images/banner_1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/ui/public/images/banner_2.jpg" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php } ?>
</header>
<!-- Content Wrapper. Contains page content -->
<?php echo $this->section('page_content') ?>
<!-- /.content-wrapper -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div id="logo_footer_conteiner">
                    <img src="/ui/public/images/logo.png" class="img-fluid">
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Compro Empeño Centra Sur</h4>
                        <p class="direccion_footer">
                            23 CALLE 1-55 LOCAL 74PB INTERIOR CENTRAL DE MAYOREO ZONA 12, VILLA
                            NUEVA, GUATEMALA</p>
                        <p class="telefono_footer">24771855</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Compro Empeño Centra Norte</h4>
                        <p class="direccion_footer">
                            RUTA AL ATLANTICO 4-26, ZONA 17, CENTRA NORTE, LOCAL U-15,  GUATEMALA, GUATEMALA</p>
                        <p class="telefono_footer">2233-1050</p>
                    </div>
                    <div class="col-md-4">
                        <div class="fb-page" data-href="https://www.facebook.com/ComproEmpe%C3%B1o-613630508847711/"
                             data-tabs="photos,timeline" data-height="200px" data-small-header="true"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/ComproEmpe%C3%B1o-613630508847711/"
                                        class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/ComproEmpe%C3%B1o-613630508847711/">ComproEmpeño</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $("#ver_categorias_btn").click(function () {
        //alert('click');
        $("#categorias_col").removeClass("categorias_col");
        $("#categorias_col").addClass("categorias_col_active");

        console.log('clicked');
    });
    $("#cerrar_categorias").click(function () {
        //alert('click');
        $("#categorias_col").removeClass("categorias_col_active");
        $("#categorias_col").addClass("categorias_col");

        console.log('clicked cerrar');
    });
</script>
<?php echo $this->section('js_p') ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'wzO0w1chmy';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
