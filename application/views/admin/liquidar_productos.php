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


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
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
	<?php if ($productos) { ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del producto</h3>
                </div>
                <!-- /.box-header -->

				<?php
				$fecha          = new DateTime();
				$fecha_contrato = array(
					'type'        => 'text',
					'name'        => 'fecha',
					'id'          => 'fecha',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Fecha del contrato',
					'required'    => 'required',
					'value'       => $fecha->format('Y-m-d'),
					'readonly'    => 'readonly'
				);
				$cliente        = array(
					'type'        => 'text',
					'name'        => 'cliente',
					'id'          => 'cliente',
					'class'       => 'form-control',
					'placeholder' => 'Cliente',
					//'required' => 'required'
				);

				$nit        = array(
					'type'        => 'text',
					'name'        => 'nit_cliente',
					'id'          => 'nit_cliente',
					'class'       => 'form-control',
					'placeholder' => 'NIT',
					//'required' => 'required'
				);
				$cliente_id = array(
					'type'        => 'text',
					'name'        => 'cliente_id',
					'id'          => 'cliente_id',
					'class'       => 'form-control',
					'placeholder' => 'Cliente id',
					'required'    => 'required'

				);

				$precio_venta = array(
					'type'        => 'number',
					'name'        => 'precio_venta',
					'id'          => 'precio_venta',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Precio',
					'required'    => 'required',
					'step'        => 'any',
					'min'         => '',
					'value'       => ''//TODO sumar precios
				);
				$descuento    = array(
					'type'        => 'number',
					'name'        => 'descuento',
					'id'          => 'descuento',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Descuento',
					'value'       => '0',
					'required'    => 'required',
					'step'        => 'any'
				);

                $total    = array(
                    'type'        => 'number',
                    'name'        => 'total',
                    'id'          => 'total',
                    'class'       => 'form-control pull-right',
                    'placeholder' => 'Descuento',
                    'value'       => '0',
                    'required'    => 'required',
                    'step'        => 'any'
                );
				$precio_final = array(
					'type'        => 'number',
					'name'        => 'precio_final',
					'id'          => 'precio_final',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Descuento',
					'required'    => 'required',
					'step'        => 'any'
				);
				$no_factura   = array(
					'type'        => 'number',
					'name'        => 'no_factura',
					'id'          => 'no_factura',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Factura',
					'required'    => 'required'
				);
				$serie_factura   = array(
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

                <!-- form start -->

                <form role="form" action="<?php echo base_url() . 'productos/guardar_liquidacion' ?>" method="post"
                      id="producto_venta_form"
                      name="producto_form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Fecha de liquidación:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
			                    <?php echo form_input($fecha_contrato); ?>
                            </div>
                            <!-- /.input group -->
                        </div>


						<?php
						$producto_numero = 1;
						$total_avaluos   = 0;
						$total_mutuos    = 0;
						foreach ($productos->result() as $producto)
						{
							?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <p>
											<?php echo $producto->categoria ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoria">Nombre del producto</label>
                                        <p><?php echo $producto->nombre_producto; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_serie">No de serie</label>
                                        <p><?php echo $producto->no_serie; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        <p><?php echo $producto->modelo; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modelo">Marca</label>
                                        <p><?php echo $producto->marca; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <p><?php echo $producto->descripcion ?></p>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avaluo">Avalúo comercial</label>
                                        <p>Q.<?php echo $producto->avaluo_comercial; ?></p>
                                        <div class="form-group">
                                            <label for="avaluo">Precio de venta</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <input type="number" class="form-control pull-right precio_venta"
                                                       placeholder="Precio de venta"
                                                       name="producto_<?php echo $producto_numero ?>_p"
                                                       id="producto_<?php echo $producto_numero ?>_p"
                                                       value="<?php echo $producto->avaluo_comercial ?>"
                                                       min="<?php echo $producto->mutuo ?>" step="any">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avaluo">Avalúo Compro Empeño</label>
                                        <p>Q.<?php echo $producto->avaluo_ce; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avaluo">Mutuo</label>
                                        <p>Q.<?php echo $producto->mutuo; ?></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="producto_<?php echo $producto_numero ?>"
                                   id="producto_<?php echo $producto_numero ?>"
                                   value="<?php echo $producto->producto_id ?>">
                            <hr>
                            <input type="hidden" name="numero_productos" id="numero_productos"
                                   value="<?php echo $producto_numero; ?>">
							<?php
							$producto_numero = $producto_numero + 1;
							$total_avaluos   = $total_avaluos + $producto->avaluo_comercial;
							$total_mutuos    = $total_mutuos + $producto->mutuo;

							$sub_total = $total_avaluos - $total_mutuos;
						} ?>
                    </div>

                    <div class="box-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de cliente</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Nombre</label>
                                    <div class="input-group">
										<?php echo form_input($cliente); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">ID cliente</label>
                                    <div class="input-group">
										<?php echo form_input($cliente_id); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de venta</h3>
                        </div>

                        <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Precio de venta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
										<?php echo form_input($precio_venta); ?>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Descuento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
										<?php echo form_input($descuento); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead">Datos a facturar</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">Precio de venta:</th>
                                            <td>
                                                <span id="total_orecio_venta"><?php echo display_formato_dinero($total_avaluos) ?></span>
                                                <input type="hidden" name="precio_venta" id="precio_venta">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>liquidacion de empeños</th>
                                            <td><?php echo display_formato_dinero($total_mutuos) ?></td>
                                            <input type="hidden" name="total_mutuos" id="total_mutuos"
                                                   value="<?php echo $total_mutuos; ?>">
                                        </tr>
                                        <tr>
                                            <th>Sub total:</th>
                                            <td>
                                                <span id="sub_total_t"><?php echo display_formato_dinero($sub_total) ?></span>
                                            </td>
                                            <input type="hidden" name="sub_total" id="sub_total" value="">
                                            <input type="hidden" name="monto_recibo_letras" id="monto_recibo_letras">
                                        </tr>
                                        <tr>
                                            <th>Descuento:</th>
                                            <td><span id="descuento_t"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Q.</span>
                                                        <?php echo form_input($total); ?>
                                                    </div>
                                                </div>
                                                <span id="total_t"></span>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">No. Factura</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
										<?php echo form_input($no_factura); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Serie Factura</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
	                                    <?php echo form_dropdown($serie_factura, $serie_factura_options, 'A') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible" id="info_facturas">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Datos de facturas</h4>
                                    <p id="info_factura_text"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
	<?php }
	else
	{
		echo 'El cliente que busca no existe';
	} ?>
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/dist/js/numeros_a_letras.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //variables
    var precio_venta;
    var descuento;
    var precio_final;
    var precio_articulo;
    var serie_facturas;

    $(document).ready(function () {
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

    moment.locale('es');
    $(function () {
        //Date picker
         $('#fecha').datepicker({
			 autoclose: true,
			 format: "yyyy-mm-dd"
		 });
    });

    //console.log(precio_venta);
    $("#producto_venta_form").change(function () {
        precio_venta = 0;
        $(".precio_venta").each(function () {
            precio_articulo = $(this).val();
            if (precio_articulo === undefined) {
                precio_articulo = 0;
            }
            if (precio_venta === undefined) {
                precio_venta = 0;
            }
            //console.log(precio_articulo);
            precio_venta = precio_venta + parseFloat(precio_articulo);

        });
        console.log(precio_venta);
        precio_venta_string = numeral(precio_venta).format('0,0.00');

        $("#precio_venta").val(precio_venta);
        $("#total_orecio_venta").html(precio_venta_string);

        //descuento
        descuento = parseFloat($("#descuento").val());
        descuento_string = numeral(descuento).format('0,0.00');
        $("#descuento_t").html(descuento_string);


        suma_mutuos = parseFloat(<?php echo $total_mutuos?>).toFixed(2);
        suma_mutuos_letras = covertirNumLetras(suma_mutuos);

        console.log(suma_mutuos_letras);

        $("#monto_recibo_letras").val(suma_mutuos_letras);

        //sub total
        sub_total = precio_venta - suma_mutuos;
        sub_total_string = numeral(sub_total).format('0,0.00');
        $("#sub_total_t").html(sub_total_string);
        $("#sub_total").val(sub_total);
        console.log(precio_venta);
        console.log(descuento);

        //total_final = sub_total - descuento;
        total_final = precio_venta - descuento;

        if($("#total").val() == 0){
            precio_final_string = numeral(total_final).format('0,0.00');
            $("#total_t").html(precio_final_string);
            $("#total").val(total_final);
        }else{
            descuento = parseFloat($("#descuento").val()).toFixed(2);
            total_input = parseFloat($("#total").val()).toFixed(2);
            total_final = total_input - descuento;


            precio_final_string = numeral(total_final).format('0,0.00');
            $("#total_t").html(precio_final_string);
            $("#total").val(total_final);
        }
        //console.log(sub_total);
    });

    var options = {

        url: "<?php echo base_url()?>index.php/cliente/clientes_json",
        theme: "square",
        getValue: 'nombre',
        template: {
            type: "custom",
            method: function (value, item) {
                return "ID: " + item.id + " | " + "Nombre: " + item.nombre + " | " + "DPI:" + item.dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#cliente").getSelectedItemData().id;

                $("#cliente_id").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#cliente").easyAutocomplete(options);

</script>
<?php $this->stop() ?>
