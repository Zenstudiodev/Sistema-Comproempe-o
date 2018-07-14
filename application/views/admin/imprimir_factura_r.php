<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 1:50 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

if ($cliente) {
    $cliente = $cliente->row();
}

if ($contrato) {
    $contrato = $contrato->row();
}


if ($factura) {
    $factura = $factura->row();
}


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/dist/css/contrato.css"
      type="text/css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <?php if (true) { ?>

    <div id="imprimir_recibo">
        <div class="col-xs-12 table-responsive">
            <!-- Table row -->
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png"
                                                              class="img-responsive"></td>
                        <td>
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE SERIE R</td>
                        <td style="text-align: right">No.<?php echo $factura->factura_id ?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $factura->fecha ?></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><?php echo $cliente->direccion; ?></td>
                        <td>Nit</td>
                        <td><?php echo $cliente->nit; ?></td>
                    </tr>
                </table>


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th colspan="2">Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo $factura->detalle; ?>
                    <tr>
                        <td></td>
                        <td colspan="2" class="total_en_letras"></td>
                        <td class="total"><?php echo $factura->total; ?></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <p class="text-center">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- /.col -->
            </div>
            <br>
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png"
                                                              class="img-responsive"></td>
                        <td>
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE SERIE R</td>
                        <td style="text-align: right">No.<?php echo $factura->factura_id ?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $factura->fecha ?></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><?php echo $cliente->direccion; ?></td>
                        <td>Nit</td>
                        <td><?php echo $cliente->nit; ?></td>
                    </tr>
                </table>


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th colspan="2">Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo $factura->detalle; ?>
                    <tr>
                        <td></td>
                        <td colspan="2" class="total_en_letras"></td>
                        <td class="total"><?php echo $factura->total; ?></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <p class="text-center">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- /.col -->
            </div>
            <br>
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png"
                                                              class="img-responsive"></td>
                        <td>
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE SERIE R</td>
                        <td style="text-align: right">No.<?php echo $factura->factura_id ?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $factura->fecha ?></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><?php echo $cliente->direccion; ?></td>
                        <td>Nit</td>
                        <td><?php echo $cliente->nit; ?></td>
                    </tr>
                </table>


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th colspan="2">Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo $factura->detalle; ?>
                    <tr>
                        <td></td>
                        <td colspan="2" class="total_en_letras"></td>
                        <td class="total"><?php echo $factura->total; ?></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <p class="text-center">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- /.col -->
            </div>
        </div>
        <br>
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div><!-- /#xcontrato -->
<?php }
else {
    echo 'El producto que busca no existe';
} ?>
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/dist/js/numeros_a_letras.js"></script>
<script>

    var total_en_letras;


    $(document).ready(function () {
        total_en_letras = parseFloat('<?php echo $factura->total; ?>').toFixed(2);

        total_en_letras_texto = covertirNumLetras(total_en_letras);
        $(".total_en_letras").html('Total en letras: ' + total_en_letras_texto);


        window.print();
    });


</script>
<?php $this->stop() ?>
