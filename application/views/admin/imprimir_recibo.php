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

if ($cliente)
{
	$cliente = $cliente->row();
}

if ($recibo)
{
	$recibo = $recibo->row();
}

if ($contrato)
{
	$contrato = $contrato->row();
}


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/dist/css/contrato.css"
      type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.min.css"
      type="text/css">
<link rel="stylesheet"
      href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.themes.min.css"
      type="text/css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/datepicker/datepicker3.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php if ($recibo) { ?>
	<?php
	setlocale(LC_TIME, "es_ES");
	$fecha = new DateTime();
	setlocale(LC_ALL, 'es_GT.UTF-8');
	?>
    <div id="imprimir_recibo">
        <div class="col-xs-12 table-responsive">
            <!-- Table row -->
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png" class="img-responsive"></td>
                        <td >
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE CAJA</td>
                        <td style="text-align: right">No.<?php echo $recibo->recibo_id?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $recibo->fecha_recibo ?></td>
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
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><?php echo $recibo->detalle;?></td>
                        <td>
                            <?php echo $recibo->monto; ?>
                        </td>
                    </tr>
                    <?php if ($recibo->tipo == 'abono') {?>
                    <tr>
                        <td> </td>
                        <td>Nuevo saldo</td>
                        <td>
		                    <?php echo $contrato->total_mutuo; ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>Total en letras</td>
                        <td colspan="2">
							<?php echo $recibo->monto_en_letras; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.col -->
            </div>
        </div>
        <br>
        <hr>
        <div class="col-xs-12 table-responsive">
            <!-- Table row -->
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png" class="img-responsive"></td>
                        <td >
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE CAJA</td>
                        <td style="text-align: right">No.<?php echo $recibo->recibo_id?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $recibo->fecha_recibo ?></td>
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
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><?php echo $recibo->detalle;?></td>
                        <td>
						    <?php echo $recibo->monto; ?>
                        </td>
                    </tr>
                    <?php if ($recibo->tipo == 'abono') {?>
                        <tr>
                            <td> </td>
                            <td>Nuevo saldo</td>
                            <td>
			                    <?php echo $contrato->total_mutuo; ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Total en letras</td>
                        <td colspan="2">
						    <?php echo $recibo->monto_en_letras; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.col -->
            </div>
        </div>
        <br>
        <hr>
        <div class="col-xs-12 table-responsive">
            <!-- Table row -->
            <div class="row">

                <table class="table">
                    <tr>
                        <td id="logo_recibo" rowspan="2"><img src="<?php echo base_url() ?>/ui/public/images/logo.png" class="img-responsive"></td>
                        <td >
                            <p>GRUPO DE INVERSION Y SERVICIOS, V & S, SOCIEDAD ANONIMA</p>
                            <p>23 calle 1-55, Centro Comercial CentraSur Local 74PB, Zona 12 Villa Nueva</p>
                            <p>Teléfono 2477-1855</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">RECIBO DE CAJA</td>
                        <td style="text-align: right">No.<?php echo $recibo->recibo_id?></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $cliente->nombre ?></td>
                        <td>Fecha</td>
                        <td><?php echo $recibo->fecha_recibo ?></td>
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
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><?php echo $recibo->detalle;?></td>
                        <td>
						    <?php echo $recibo->monto; ?>
                        </td>
                    </tr>
                    <?php if ($recibo->tipo == 'abono') {?>
                        <tr>
                            <td> </td>
                            <td>Nuevo saldo</td>
                            <td>
			                    <?php echo $contrato->total_mutuo; ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Total en letras</td>
                        <td colspan="2">
						    <?php echo $recibo->monto_en_letras; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.col -->
            </div>
        </div>
        <br>
        <hr>

    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div><!-- /#xcontrato -->
<?php }
else
{
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
        window.print();
    });


</script>
<?php $this->stop() ?>
