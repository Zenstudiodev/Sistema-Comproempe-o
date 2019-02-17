<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 05/02/2019
 * Time: 3:14 PM
 */

$this->layout('public/public_master_dev',[
    'monstrar_banners' => $monstrar_banners
]);

?>



<?php $this->start('page_content') ?>
<div id="nosotros_weaper">
    <h1 class="text-center">COMPROEMPEÑO</h1>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6 bg_green visio_mision " >
                <h2>MISIÓN</h2>
                <p>Ser una empresa comprometida en entregar las mejores soluciones y servicio a nuestros clientes, esmerándonos por ser la mejor  alternativa en la compraventa de prendas nuevas y usadas, la mejor opción en  el servicio de empeño, la opción más ágil en el anticipo de sueldos y prestamos fiduciarios, proporcionando beneficios adicionales a nuestros clientes, para poder solucionar de forma económica y consiente una emergencia, generando la mayor satisfacción de las necesidades de nuestros clientes.</p>
            </div>
            <div class="col-md-6 bg_yellow visio_mision">
                <h2>Visión</h2>
                <p>Ser la mejor solución inmediata para los guatemaltecos en los primeros cinco años de operación, atendiendo los 5 principales ejes comerciales de la ciudad, cuando necesiten cubrir una necesidad de dinero y cuando necesiten comprar y vender productos de calidad al mejor precio.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url()?>ui/public/images/familia%20junt.png" id="familia_img" class="rounded mx-auto d-block">
            </div>
            <div class="col-md-8 visio_mision">
                <h2>VALORES Institucionales</h2>
                <ul id="valores">
                    <li><b>Confiabilidad:</b>   Vamos a cuidar sus prendas como si fueran nuestras.
                    </li>
                    <li><b>Responsabilidad:</b> Cumpliremos con nuestros compromisos.
                    </li>
                    <li><b>Integridad:</b> Haremos las cosas correctamente desde cualquier perspectiva.
                    </li>
                    <li><b>Solidarios:</b> Seremos consientes y sensibles, solucionando tu  una necesidad.
                    </li>
                    <li><b>Respetuosos:</b> Cumpliremos nuestros valores institucionales y compromisos adquiridos de forma genuina y transparente.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
