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
if ($producto_data)
{
	$producto = $producto_data->row();
}



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
	<?php if ($producto_data) { ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Producto ID:<?php echo $producto->producto_id; ?> - <?php echo $producto->nombre_producto; ?>
                <small></small>
            </h1>
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
				$cliente = array(
					'type' => 'text',
					'name' => 'cliente',
					'id' => 'cliente',
					'class' => 'form-control',
					'placeholder' => 'Cliente',
					'required' => 'required'

				);
				$cliente_id = array(
					'type' => 'text',
					'name' => 'cliente_id',
					'id' => 'cliente_id',
					'class' => 'form-control',
					'placeholder' => 'Cliente id',
					'required' => 'required'

				);

				$precio_venta = array(
					'type'        => 'number',
					'name'        => 'precio_venta',
					'id'          => 'precio_venta',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Precio',
					'required'    => 'required',
					'step'        => 'any',
					'value'       => $producto->avaluo_ce
				);
				$descuento    = array(
					'type'        => 'number',
					'name'        => 'descuento',
					'id'          => 'descuento',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Descuento',
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
					'placeholder' => 'Factura'
				);
				?>
                <!-- form start -->
                <form role="form" action="<?php echo base_url() . 'productos/guardar_liquidacion' ?>" method="post"
                      id="producto_venta_form"
                      name="producto_form">
					<?php echo form_hidden('producto_id', $producto->producto_id); ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
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
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de cliente</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Precio de venta</label>
                                    <div class="input-group">
				                        <?php echo form_input($cliente); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Precio de venta</label>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Precio de venta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
										<?php echo form_input($precio_venta); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Descuento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
										<?php echo form_input($descuento); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Precio de venta</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
										<?php echo form_input($precio_final); ?>
                                    </div>
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
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //variables
    var precio_venta;
    var descuento;
    var precio_final;
    moment.locale('es');
    $("#producto_venta_form").change(function () {

        precio_venta = parseFloat($("#precio_venta").val());
        descuento = parseFloat($("#descuento").val());
        precio_final = precio_venta - descuento;
        $("#precio_final").val(precio_final);
        console.log(precio_final);

    });

    var options = {

        url: "<?php echo base_url()?>index.php/cliente/clientes_json",

        theme: "square",

        getValue: function(element) {
            return element.nombre;
        },

        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function() {
                var selectedItemValue = $("#cliente").getSelectedItemData().id;

                $("#cliente_id").val(selectedItemValue).trigger("change");
            },
            onHideListEvent: function() {
               // $("#cliente_id").val("").trigger("change");
            }
        }
    };

    $("#cliente").easyAutocomplete(options);


    var optionsy = {

        url: "<?php echo base_url()?>index.php/cliente/clientes_json",

        getValue: "nombre",

        list: {
            match: {
                enabled: true
            }
        },

        theme: "square"
    };

   // $("#cliente").easyAutocomplete(options);
</script>
<?php $this->stop() ?>
