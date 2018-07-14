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

if($cliente){
$cliente = $cliente->row();
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

				$monto_abono = array(
					'type'        => 'number',
					'name'        => 'monto_abono',
					'id'          => 'monto_abono',
					'class'       => 'form-control pull-right',
					'placeholder' => 'Abono',
					'required'    => 'required',
					'step'        => 'any',
					'min'         => '',
					'value'       => ''//TODO sumar precios
				);



				?>

                <!-- form start -->

                <form role="form" action="<?php echo base_url() . 'productos/guardar_abono_apartado' ?>" method="post"
                      id="producto_venta_form"
                      name="producto_form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Fecha de abono:</label>

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
                                        <label for="avaluo">Precio de venta</label>
                                        <p>Q.<?php echo $producto->precio_venta; ?></p>
                                        <div class="form-group">
                                            <label for="avaluo">Abono apartado</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <?php echo form_input($monto_abono);?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avaluo">Monto de apartado</label>
                                        <p>Q.<?php echo $producto->apartado; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="avaluo">Saldo pendiente</label>
                                        <?php $saldo_pendiente = $producto->precio_venta - $producto->apartado?>
                                        <p>Q.<?php echo $saldo_pendiente ;?></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="producto_<?php echo $producto_numero ?>"
                                   id="producto_<?php echo $producto_numero ?>"
                                   value="<?php echo $producto->producto_id ?>">
                            <input type="hidden" name="contrato_id" value="<?php echo $producto->contrato_id;?>">
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


                    <div class="box-footer">
                        <input type="hidden" name="cliente_id" value="<?php echo $cliente->id; ?>">
                        <input type="hidden" name="monto_recibo_letras" id="monto_recibo_letras">
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
    var valor_abono;
    var valor_abono_en_letras;

    $(document).ready(function () {

    });

    //console.log(precio_venta);
    $("#producto_venta_form").change(function () {
        precio_venta = 0;
        valor_abono = parseFloat($("#monto_abono").val()).toFixed(2);
        valor_abono_en_letras =covertirNumLetras(valor_abono);
        console.log(valor_abono_en_letras);
        $("#monto_recibo_letras").val(valor_abono_en_letras);
    });



</script>
<?php $this->stop() ?>
