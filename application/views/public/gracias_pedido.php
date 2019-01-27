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
$categoria_d = $categoria;
$tienda='todas';
$categoria_actual='Todas';
?>


<?php $this->start('page_content') ?>
<div class="container" id="categorias_wraper">
    <h1>Productos en liquidación</h1>
    <div class="row">
        <div class="col-md-3 categorias_col" id="categorias_col">
            <h2 class="categorias_title">
                Categorías
            </h2>
            <?php
            //print_contenido($categorias->result());
            if ($categorias) { ?>
                <ul class="list-group" id="lista_categorias">
                    <a href="#" id="cerrar_categorias" class="list-group-item list-group-item-action flex-column align-items-start d-block d-sm-none">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Cerrar Catgorías</h5>
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </a>
                    <?php foreach ($categorias->result() as $categoria) { ?>
                        <a href="<?php echo base_url() . 'productos/filtro/' . $categoria->categoria.'/'. $tienda?>"
                           class="list-group-item list-group-item-action"
                           catergoria="<?php echo $categoria->categoria ?>">
                            <?php echo $categoria->categoria ?>
                            <span class="badge badge-primary badge-pill">
                                <?php echo productops_en_categoria($categoria->categoria);?>
                            </span>
                        </a>
                        <!--<li class="list-group-item"><?php /*echo $categoria->categoria */ ?></li>-->
                    <?php } ?>
                </ul>
            <?php }
            ?>

        </div>
        <div class="col-md-9">
            <div class="row " id="gracias_pedido">
                <div id="gracias_icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
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

