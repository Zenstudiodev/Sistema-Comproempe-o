<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 1:50 PM
 */

$this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
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
	$fecha_factura = new DateTime();
	$fecha     = new DateTime();
	$intereses = floatval($contrato->pago_interes);
	//interese + iva
	$intereses  = $intereses * 1.12;
	$almacenaje = floatval($contrato->costo_almacenaje);
	//almacenaje + iva
	$almacenaje              = $almacenaje * 1.12;
	$estado_contrato         = estado_contrato($contrato->fecha_pago);
	$plazo                   = $contrato->plazo;
	$nueva_fecha_vencimiento = $fecha->modify('+' . $plazo . ' days');
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

	$total = floatval($intereses + $almacenaje + $pago_mora + $pago_recuperacion);

	$total_en_letras = NumeroALetras::convertir($total);

	$descuento = array(
		'type'        => 'number',
		'name'        => 'descuento',
		'id'          => 'descuento',
		'class'       => 'form-control',
		'placeholder' => 'Descuento',
		'required'    => 'required',
		'value'       => '0',
		'step'        => 'any'
		//'disabled'    => 'disabled'
	);

	$serie_factura         = array(
		'type'        => 'text',
		'name'        => 'serie_factura',
		'id'          => 'serie_factura',
		'class'       => 'form-control ',
		'placeholder' => 'Serie',
		'required'    => 'required'
	);
	$serie_factura_options = array();
	foreach ($facturas_activas->result() as $serie)
	{
		$serie_factura_options[$serie->serie] = $serie->serie;
	}

	?>

	<?php if ($productos) { ?>
        <!-- Main content -->
        <section class="invoice">
            <form action="<?php echo base_url() ?>contrato/guardar_factura" method="post">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <small class="pull-right">Fecha: <?php echo $fecha_factura->format('Y-m-d'); ?></small>
                            <input type="hidden" name="fecha" value="<?php echo $fecha_factura->format('Y-m-d'); ?>">
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
                        Fecha de pago: <?php echo $contrato->fecha_pago ?><br>
						<? diferencia_dias($contrato->fecha_pago); ?>
                        Nueva fecha de pago: <?php echo $nueva_fecha_vencimiento->format('Y-m-d'); ?><br>
                        <input type="hidden" name="nueva_fecha"
                               value="<?php echo $nueva_fecha_vencimiento->format('Y-m-d'); ?>">
                        Estado de contrato : <?php echo $estado_contrato; ?><br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- Table row -->
                <div class="row">
                    <h3 class="box-title">Factura por refrendo</h3>
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
                                <td>Intereses por refrendo</td>
                                <td>
									<?php display_formato_dinero($intereses); ?>
                                    <input type="hidden" name="interese"
                                           value="<?php display_formato_dinero($intereses); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Servicio de almacenaje</td>
                                <td>
									<?php display_formato_dinero($almacenaje); ?>
                                    <input type="hidden" name="almacenaje"
                                           value="<?php display_formato_dinero($almacenaje); ?>">

                                </td>
                            </tr>
							<?php
							if ($mora)
							{
								?>
                                <tr>
                                    <td>Mora</td>
                                    <td>
										<?php display_formato_dinero($pago_mora); ?>
                                        <input type="hidden" name="mora"
                                               value="<?php display_formato_dinero($pago_mora); ?>">
                                    </td>
                                </tr>
							<?php } ?>
							<?php
							if ($recuperacion)
							{
								?>
                                <tr>
                                    <td>Gastos de recuperación</td>
                                    <td>
										<?php display_formato_dinero($pago_recuperacion); ?>
                                        <input type="hidden" name="recuperacion"
                                               value="<?php display_formato_dinero($pago_recuperacion); ?>">
                                    </td>
                                </tr>
							<?php } ?>
                            <tr>
                                <td>Sub total</td>
                                <td>
									<?php display_formato_dinero($total); ?>
                                    <input type="hidden" name="sub_total"
                                           value="<?php display_formato_dinero($total); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Descuento</td>
                                <td><?php echo form_input($descuento); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <span id="total"></span>
                                    <input type="hidden" name="total_i" id="total_i">
                                </td>
                            </tr>
                            <tr>
                                <td>Total en letras</td>
                                <td>
                                    <span id="total_enLetras"></span>
                                    <input type="hidden" name="total_en_letras" id="total_en_letras">
                                </td>
                            </tr>
                            <tr>
                                <td>Nueva fecha de contrato</td>
                                <td><?php echo $nueva_fecha_vencimiento->format('Y-m-d'); ?></td>
                            </tr>
                            <tr>
                                <td>No. factura</td>
                                <td>
                                    <span id="total_enLetras"></span>
                                    <input class="form-control " type="number" id="no_factura" name="no_factura"
                                           value="" required>
                                </td>
                                <td>Serie</td>
                                <td><?php echo form_dropdown($serie_factura, $serie_factura_options) ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="alert alert-info alert-dismissible" id="info_facturas">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-info"></i> Datos de facturas</h4>
                            <p id="info_factura_text"></p>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <input type="hidden" name="cliente_id" value="<?php echo $cliente->id ?>">
                <input type="hidden" name="tipo" value="refrendo">


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
    var serie_facturas;

    moment.locale('es');

    $(document).ready(function () {
        $("#info_facturas").hide();


        $("#fecha_contrato_h").val(fecha_contrato);
        plazo = $("#plazo").val();
        tasa_interes = $("#tasa_interes").val();
        almacenaje = $("#almacenaje").val();
        console.log(plazo);
        //fecha de pago =
        fecha_contrato = moment(fecha_contrato);
        fecha_pago = fecha_contrato.add(plazo, 'days').format('YYYY-MM-DD');
        $(".fecha_pago").val(fecha_pago);
        $("#fecha_pago").val(fecha_pago);
        fecha_pago = moment(fecha_pago);
        dias_gracia = fecha_contrato.add(7, 'days').format('YYYY-MM-DD');
        $("#dias_gracia").val(dias_gracia);

        var descuento = $("#descuento").val();
        var subtotal = parseFloat(<?php echo($total); ?>);
        var total;
        total = subtotal - descuento;
        total = parseFloat(total).toFixed(2);
        $("#total").html(total);
        $("#total_i").val(total);
        console.log(total);
        total_en_letras = covertirNumLetras(total);
        $("#total_enLetras").html(total_en_letras);
        $("#total_en_letras").val(total_en_letras);

        serie_facturas = $("#serie_factura").val();
        //$('#marca_carro option').remove();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Factura/datos_serie?serie=' + serie_facturas,
            success: function (data) {
                $("#info_facturas").show();
                var data_factura =
                    '<p>Facturas del ' + data[0].correlativo_del + ' al ' + data[0].correlativo_al + '</p>' +
                    '<p> ' + data[0].usadas + ' usadas de ' + data[0].cantidad + '</p>' +
                    '<p> Fecha de vencimiento ' + data[0].fecha_vencimiento + '</p>';
                $("#info_factura_text").html(data_factura);
            }
        });

    });
    $("#serie_factura").change(function () {
        serie_facturas = $("#serie_factura").val();
        //$('#marca_carro option').remove();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>index.php/Factura/datos_serie?serie=' + serie_facturas,
            success: function (data) {
                $("#info_facturas").show();
                var data_factura =
                    '<p>Facturas del ' + data[0].correlativo_del + ' al ' + data[0].correlativo_al + '</p>' +
                    '<p> ' + data[0].usadas + ' usadas de ' + data[0].cantidad + '</p>' +
                    '<p> Fecha de vencimiento ' + data[0].fecha_vencimiento + '</p>';
                $("#info_factura_text").html(data_factura);
                console.log(data);
            }
        });
    });


    $("#descuento").change(function () {
        var descuento = $("#descuento").val();
        var subtotal = parseFloat(<?php echo($total); ?>);
        var total;
        total = subtotal - descuento;
        total = parseFloat(total).toFixed(2);
        $("#total").html(total);
        $("#total_i").val(total);
        total_en_letras = covertirNumLetras(total);
        $("#total_enLetras").html(total_en_letras);
        $("#total_en_letras").val(total_en_letras);
    });


</script>
<?php $this->stop() ?>
