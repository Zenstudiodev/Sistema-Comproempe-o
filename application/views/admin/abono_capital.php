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
	<?php
	/**
	 * variables para operaciones
	 **/
	$fecha     = new DateTime();
	$fecha_vencimiento     = new DateTime();
	$intereses = floatval($contrato->pago_interes);
	//interese + iva
	$intereses  = $intereses * 1.12;
	$almacenaje = floatval($contrato->costo_almacenaje);
	//almacenaje + iva
	$almacenaje              = $almacenaje * 1.12;
	$estado_contrato         = estado_contrato($contrato->fecha_pago);
	$plazo                   = $contrato->plazo;
	$nueva_fecha_vencimiento = $fecha_vencimiento->modify('+' . $plazo . ' days');
	//mora
	$mora      = false;
	$pago_mora = 0;
	if ($estado_contrato != 'normal')
	{
		//echo 'cargar mora';
		$dias_pasados = diferencia_en_dias($contrato->fecha_pago);
		$mora         = true;
		$pago_mora    = $intereses + $almacenaje;
		$pago_mora    = $pago_mora / $plazo;
		$pago_mora    = $pago_mora * $dias_pasados;


	}
	//recuperacion
	$recuperacion      = false;
	$pago_recuperacion = 0;
	if ($estado_contrato == 'vencido')
	{
		//echo 'cargar recuperacion';
		$recuperacion      = true;
		$pago_recuperacion = $contrato->referendo;
	}

	$total_factura = $intereses + $almacenaje + $pago_mora + $pago_recuperacion;

	$total_en_letras = NumeroALetras::convertir($total_factura);
	$mutuo           = $contrato->total_mutuo;
	?>

	<?php if ($productos) { ?>
        <!-- Main content -->
        <section class="invoice">
            <form action="<?php echo base_url() ?>recibo/guardar_recibo_abono" method="post">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <small class="pull-right">Fecha: <?php echo $fecha->format('Y-m-d'); ?></small>
                            <input type="hidden" name="fecha" value="<?php echo $fecha->format('Y-m-d'); ?>">
                            <div id="logo_refrendo">
                                <img src="<?php echo base_url() ?>/ui/public/images/logo.png" class="img-responsive">
                            </div>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-8 invoice-col">
                        <address>
                            <strong><?php echo $cliente->nombre; ?></strong><br>
							<?php echo $cliente->direccion; ?><br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Contrato: <?php echo $contrato->contrato_id ?></b><br>
                        <input type="hidden" name="contrato_id" value="<?php echo $contrato->contrato_id ?>">
                        <b>Plazo del contrato: <?php echo $plazo; ?> días</b><br>
                        <!--Fecha de pago: <?php /*echo $contrato->fecha_pago */?><br>-->
						<? diferencia_dias($contrato->fecha_pago); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- Table row -->
                <div class="row">
                    <h3 class="box-title">Abono a capital</h3>
                    <div class="col-xs-12 table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Mutuo</td>
                                <td><?php echo $contrato->total_mutuo; ?></td>
                            </tr>
                            <tr>
                                <td>Abono</td>
                                <td>
                                    <input class="form-control " type="number" id="descuento" name="descuento"
                                           value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Nuevo saldo</td>
                                <td><span id="nuevo_saldo"></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <input type="hidden" name="cliente_id"  value="<?php echo $cliente->id?>">
                <div class="row">
                    <h3 class="box-title">Recibo de caja</h3>
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Nombre</td>
                                <td><?php echo $cliente->nombre ?></td>
                                <td>Fecha</td>
                                <td><?php echo $fecha->format('Y-m-d'); ?></td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td><?php echo $cliente->direccion; ?></td>
                                <td>Nit</td>
                                <td><?php echo $cliente->nit; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12 table-responsive">

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
                                <td>Abono a capital a contrato: <?php echo $contrato->contrato_id;?></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
												<span class="abono"></span>
                                                <input type="hidden" name="monto_recibo" id="monto_recibo"
                                                       value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="abono"></span>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td>Total en letras</td>
                                <td colspan="2">
                                    <span id="total_en_letras_recibo"></span>
                                    <input type="hidden" name="total_en_letras_recibo_i" id="total_en_letras_recibo_i"  value="">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>
							 Imprimir</a>-->
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </section>


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

    var fecha_contrato;
    var fecha_actual;
    var nueva_fecha_vencimiento
    var plazo;
    var total_en_letras;

    moment.locale('es');

    $(document).ready(function () {


    });

    $("#descuento").change(function () {
        var descuento;
        descuento = $("#descuento").val();
        $(".abono").html('Q.'+descuento);
        $("#monto_recibo").val(descuento);
        console.log(descuento);
        total = parseFloat(descuento).toFixed(2);
        //total = parseInt(descuento) + 1;
        console.log(total);
        descuento = parseFloat(total).toFixed(2);
        console.log('descuento'+descuento);

        total_en_letras = covertirNumLetras(descuento);

        $("#total_en_letras_recibo").html(total_en_letras);
        $("#total_en_letras_recibo_i").val(total_en_letras);
    });


</script>
<?php $this->stop() ?>
