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
<link rel="stylesheet" href="<?php echo base_url() ?>node_modules/lightbox2/dist/css/lightbox.min.css">
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
                                        <a href="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>"
                                           data-lightbox="<?php echo 'prod_' . $producto->producto_id; ?>"
                                           data-title="<?php echo $producto->nombre_producto; ?>">
                                            <img class=" img_producto img-fluid <?php if ($start_banner >= 1) {
                                                echo 'thumb';
                                            } ?>"
                                                 src="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>"
                                                 alt="<?php echo $producto->nombre_producto; ?>">
                                        </a>
                                        <?php $start_banner++ ?>
                                    <?php } ?>

                                <?php } else { ?>
                                    <img class="card-img-top img-responsive" src="/ui/public/images/logo.png"
                                         alt="Card image cap">
                                <?php } ?>
                            </div>
                            <div class="col-md-5">
                                <h3 class="producto_data_tittle">Detalles del producto</h3>
                                <?php
                                $precio_producto = mostrar_precio_producto($producto->avaluo_comercial, $producto->precio_venta);

                                ?>

                                <p><span class="producto_data_spec">Marca:</span> <?php echo $producto->marca; ?></p>
                                <p><span class="producto_data_spec">Modelo:</span> <?php echo $producto->modelo; ?></p>
                                <p><span class="producto_data_spec">Serie:</span> <?php echo $producto->no_serie; ?></p>
                                <p class="producto_data_price">Precio:
                                    Q.<?php echo display_formato_dinero_return($precio_producto); ?></p>
                                <?php if ($producto->precio_descuento != '0') { ?>
                                    <p class="producto_data_price_descuento">Precio descuento:
                                        Q.<?php echo display_formato_dinero_return($producto->precio_descuento); ?></p>
                                <?php } ?>
                                <p>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#solicitar_producto">
                                        Estoy interesado
                                    </button>
                                </p>


                                <!-- Modal -->
                                <div class="modal fade" id="solicitar_producto" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Comprar producto</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="nombre_cliente">Nombre</label>
                                                        <input type="text" class="form-control"
                                                               id="nombre_cliente" name="nombre_cliente" placeholder="Nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                               aria-describedby="emailHelp" placeholder="Correo electrónico">
                                                        <small id="emailHelp" class="form-text text-muted">Este correo se usara para coordinar el envio del producto
                                                        </small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre_cliente">Teléfono</label>
                                                        <input type="text" class="form-control"
                                                               id="nombre_cliente" name="nombre_cliente" placeholder="Teléfono">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nombre_cliente">Dirección</label>
                                                        <input type="text" class="form-control"
                                                               id="direccion_cliente" name="direccion_cliente" placeholder="Dirección de envío">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                                <button type="button" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><?php echo $producto->descripcion ?></p>
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
<script src="<?php echo base_url(); ?>/node_modules/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
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

