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
    <h1>Productos recientes</h1>
    <div class="row" id="productos_card">
        <?php if ($productos) { ?>
            <?php foreach ($productos->result() as $producto) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="/ui/public/images/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto->nombre_producto?></h5>
                            <p class="card-text"><?php echo $producto->descripcion?></p>
                            <p class="card-text">Tienda: <?php echo $producto->tienda_actual?></p>
                            <p class="card-text">Precio: <?php echo $producto->avaluo_comercial * 1.15?></p>
                            <a href="#" class="btn btn-success">ver producto</a>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>
<?php $this->stop() ?>
