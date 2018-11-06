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

if ($producto_data) {
    $producto = $producto_data->row();
}
?>
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url()?>node_modules/lightbox2/dist/css/lightbox.min.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="container" id="categorias_wraper">
    <h1>Productos en liquidación</h1>
    <div class="row">
        <div class="col-md-3">
            <h2 class="categorias_title">Catgorías</h2>
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
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Incio</a></li>
                            <li class="breadcrumb-item"><a
                                        href="<?php echo base_url() . 'productos/categoria/' . $producto->categoria; ?>"><?php echo $producto->categoria; ?></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <?php if ($producto_data) { ?>
                    <div class="col">
                        <h1><?php echo $producto->nombre_producto; ?></h1>
                        <div class="row">
                            <div class="col-md-7">
                                <?php
                                $imagenes_producto = get_imgenes_producto_public($producto->producto_id);
                                ?>
                                <?php if ($imagenes_producto) { ?>
                                    <?php
                                    $start_banner = 0;
                                    foreach ($imagenes_producto->result() as $imagen) { ?>
                                        <a href="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>" data-lightbox="<?php echo 'prod_'.$producto->producto_id; ?>" data-title="<?php echo $producto->nombre_producto; ?>">
                                            <img class=" img_producto img-fluid <?php if ($start_banner >= 1) {
                                                echo 'thumb';
                                            } ?>" src="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>" alt="<?php echo $producto->nombre_producto; ?>">
                                        </a>
                                        <?php $start_banner++ ?>
                                    <?php } ?>

                                <?php } else { ?>
                                    <img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                                         alt="Card image cap">
                                <?php } ?>
                            </div>
                            <div class="col-md-5">
                                Datos producto
                                <?php
                                $precio_producto = mostrar_precio_producto($producto->avaluo_comercial, $producto->precio_venta);

                                ?>

                                <p>Marca: <?php echo $producto->marca; ?></p>
                                <p>Modelo: <?php echo $producto->modelo; ?></p>
                                <p>Serie: <?php echo $producto->no_serie; ?></p>
                                <p>Precio: Q.<?php echo display_formato_dinero_return($precio_producto); ?></p>
                                <p><a class="btn btn-success" href="<?php echo base_url().'Carrito/agregar_producto/'.$producto->producto_id?>">Añadir al carrito</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><?php echo $producto->descripcion; ?></p>
                            </div>
                        </div>

                        <?php //print_contenido($producto); ?>
                    </div>


                <?php } else { ?>
                    <div class="alert alert-warning alert-dismissible fade show col" role="alert">
                        <strong>El producto</strong> Que busca no esta disponible.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script src="<?php echo base_url();?>/node_modules/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'showImageNumberLabel': false,
        'wrapAround': true,
    });
    $(document).ready(function () {

        $("#lista_categorias").find("a[catergoria='<?php echo $producto->categoria; ?>']").addClass('active');
    });
</script>
<?php $this->stop() ?>

