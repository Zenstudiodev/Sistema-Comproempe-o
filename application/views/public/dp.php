<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 31/07/2017
 * Time: 2:36 PM
 */

$this->layout('public/public_master_dev',[
    'monstrar_banners' => $monstrar_banners
]);

?>



<?php $this->start('page_content') ?>
<div class="container">
    <h1>Productos con descuento</h1>
    <div class="row productos_cards">
        <?php if ($productos_descuento) { ?>

            <?php
            foreach ($productos_descuento->result() as $producto) {
                //obtenemos imagenes de producto
                $imagenes_producto = get_imgenes_producto_public($producto->producto_id);


                ?>

                <div class="col-md-3">
                    <div class="card animated  zoomIn ">
                        <?php if ($imagenes_producto) { ?>

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
                        <?php } else { ?>
                            <img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                                 alt="Card image cap">
                        <?php } ?>

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
            <?php }
        } ?>
    </div>
    <h1>Productos recientes</h1>
    <div class="row productos_cards">
        <?php if ($productos) { ?>

            <?php
            foreach ($productos->result() as $producto) {
                //obtenemos imagenes de producto
                $imagenes_producto = get_imgenes_producto_public($producto->producto_id);


                ?>

                <div class="col-md-3">
                    <div class="card animated  zoomIn ">
                        <?php if ($imagenes_producto) { ?>

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
                        <?php } else { ?>
                            <img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                                 alt="Card image cap">
                        <?php } ?>

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
            <?php }
        } ?>
    </div>
</div>
<?php $this->stop() ?>
