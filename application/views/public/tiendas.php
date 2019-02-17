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
<div id="tiendas_wraper">
    <h1 class="text-center">COMPROEMPEÑO</h1>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6 bg_green visio_mision " >
                <h2>CENTRA SUR</h2>
                <p>23 CALLE 1-55 LOCAL 74PB INTERIOR CENTRAL DE MAYOREO ZONA 12, VILLA NUEVA, GUATEMALA</p>

            </div>
            <div class="col-md-6 bg_yellow visio_mision">
                <h2>METRO NORTE</h2>
                <p>KM 5 CARRETERA AL ALTRANTICO, XONA 17 LOCAL 107, GUATEMALA, GUATEMALA</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
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
