<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 31/07/2017
 * Time: 2:36 PM
 */
$this->layout('public/public_master_dev', [
    'monstrar_banners' => $monstrar_banners
]);

?>


<?php $this->start('page_content') ?>
<div class="container" id="categorias_wraper">
    <h1>Productos en liquidación</h1>
    <div class="row">
        <div class="col-md-3 categorias_col" id="categorias_col">
            <h2 class="categorias_title">Categorías</h2>
            <?php

            //print_contenido($categorias->result());
            if ($categorias) { ?>
                <ul class="list-group" id="lista_categorias">
                    <?php foreach ($categorias->result() as $categoria) { ?>
                        <a href="<?php echo base_url() . 'productos/categoria/' . $categoria->categoria ?>"
                           class="list-group-item list-group-item-action"
                           catergoria="<?php echo $categoria->categoria ?>">
                            <?php echo $categoria->categoria ?>
                        </a>
                        <!--<li class="list-group-item"><?php /*echo $categoria->categoria */ ?></li>-->
                    <?php } ?>
                </ul>
            <?php }
            ?>

        </div>
        <div class="col-md-9">
            <div class="row">
                <nav aria-label="Page navigation example">
                    <?php echo $links; ?>
                </nav>
            </div>
            <div class="row productos_cards">
                <?php if ($productos) { ?>

                    <?php
                    foreach ($productos->result() as $producto) {
                        //obtenemos imagenes de producto
                        $imagenes_producto = get_imgenes_producto_public($producto->producto_id);
                        ?>
                        <?php if ($imagenes_producto) { ?>
                            <div class="col-md-4">
                                <div class="card animated  zoomIn ">


                                    <div id="carrusel_producto_<?php echo $producto->producto_id; ?>"
                                         class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $start_banner = 0;
                                            foreach ($imagenes_producto->result() as $imagen) { ?>
                                                <div class="carousel-item <?php if ($start_banner < 1) {
                                                    echo 'active';
                                                } ?>">
                                                    <img class="d-block w-100 img_producto_lista"
                                                         src="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>"
                                                         alt="<?php echo $producto->nombre_producto; ?>">
                                                </div>
                                                <?php $start_banner++ ?>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev"
                                           href="#carrusel_producto_<?php echo $producto->producto_id; ?>" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next"
                                           href="#carrusel_producto_<?php echo $producto->producto_id; ?>" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                    <div class="card-body">
                                        <?php //print_contenido($imagenes_producto); ?>
                                        <h5 class="card-title"><?php echo $producto->nombre_producto; ?></h5>
                                        <p class="card-text tienda"><span
                                                    class="badge badge-secondary">Tienda: <?php echo tienda_id_to_nombre($producto->tienda_actual) ?></span>
                                            <a href="<?php echo base_url() . 'Productos/ver/' . $producto->producto_id; ?>"
                                               class="btn btn-success btn-sm">
                                                ver producto
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!--<img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                                 alt="Card image cap">-->
                        <?php } ?>


                    <?php }
                } ?>
            </div>
            <div class="row">
                <nav aria-label="Page navigation example">
                    <?php echo $links; ?>
                </nav>
            </div>
        </div>
    </div>

</div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>


    $(document).ready(function () {
        $("#lista_categorias").find("a[catergoria='<?php echo $categoria_actual; ?>']").addClass('active');
    });
</script>
<?php $this->stop() ?>

