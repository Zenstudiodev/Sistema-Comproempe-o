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


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ingresar producto
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


                //Tipo de factura
                $tipo_factura_select         = array(
	                'name'     => 'factura_tipo',
	                'id'       => 'factura_tipo',
	                'class'    => ' form-control',
	                'required' => 'required'
                );
                $tipo_factura_select_options = array(
	                'local' => 'Local',
	                'importacion' => 'Importacion',
	                'especial' => 'Especial',
                );


                // TODO categorias select desde tabla de productos
                $categoria_select = array(
                    'type' => 'text',
                    'name' => 'categoria',
                    'id' => 'categoria',
                    'class' => 'form-control',
                    'placeholder' => 'Categoría',
                    'required' => 'required'

                );
                //TODO descripcion textarea
                $descripcion = array(
                    'type' => 'text',
                    'name' => 'descripcion',
                    'id' => 'descripcion',
                    'class' => 'form-control',
                    'placeholder' => 'Descripción'
                );
                $descripcion_t = array(
	                'type' => 'text',
	                'name' => 'descripcion_t',
	                'id' => 'descripcion_t',
	                'class' => 'form-control',
	                'placeholder' => 'Descripción',
	                'required' => 'required'

                );
                $nombre_producto = array(
                    'type' => 'text',
                    'name' => 'nombre_producto',
                    'id' => 'nombre_producto',
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del producto',
                    'data-validate-length-range' => '6',
                    'data-validate-words' => '2',
                    'required' => 'required'

                );
                $no_serie = array(
                    'type' => 'text',
                    'name' => 'no_serie',
                    'id' => 'no_serie',
                    'class' => 'form-control',
                    'placeholder' => 'No. de serie',
                    'required' => 'required'

                );
                $modelo = array(
                    'type' => 'text',
                    'name' => 'modelo',
                    'id' => 'modelo',
                    'class' => 'form-control',
                    'placeholder' => 'Modelo',
                    'required' => 'required'

                );
                $marca = array(
                    'type' => 'text',
                    'name' => 'marca',
                    'id' => 'marca',
                    'class' => 'form-control',
                    'placeholder' => 'Marca',
                    'required' => 'required'

                );
                $avaluo_comercial = array(
                    'type' => 'text',
                    'name' => 'avaluo_comercial',
                    'id' => 'avaluo_comercial',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Avaluo',
                    'required' => 'required'

                );
                $avaluo_ce = array(
                    'type' => 'text',
                    'name' => 'avaluo_ce',
                    'id' => 'avaluo_ce',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Avaluo',
                    'required' => 'required'

                );
                $mutuo = array(
                    'type' => 'text',
                    'name' => 'mutuo',
                    'id' => 'mutuo',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Motuo',
                    'required' => 'required'
                );
                $almacenaje = array(
                    'type' => 'text',
                    'name' => 'almacenaje',
                    'id' => 'almacenaje',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Almacenaje',
                    'required' => 'required'
                );
                $gastos_administrativos = array(
                    'type' => 'text',
                    'name' => 'gastos_administrativos',
                    'id' => 'gastos_administrativos',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Gastos administrativos',
                    'required' => 'required'
                );
                $observaciones = array(
                    'type' => 'text',
                    'name' => 'observaciones',
                    'id' => 'observaciones',
                    'class' => 'form-control',
                    'placeholder' => 'Observaciones',
                    'data-validate-length-range' => '6',
                    'data-validate-words' => '2'

                );
                $plazo = array(
                    'type' => 'text',
                    'name' => 'plazo',
                    'id' => 'plazo',
                    'class' => 'form-control',
                    'placeholder' => 'Plazo',
                    'required' => 'required'

                );
                $tasa_interes = array(
                    'type' => 'text',
                    'name' => 'tasa_interes',
                    'id' => 'tasa_interes',
                    'class' => 'form-control',
                    'placeholder' => 'Tasa de interes',
                    'required' => 'required'

                );
                $pago_interes = array(
                    'type' => 'text',
                    'name' => 'pago_interes',
                    'id' => 'pago_interes',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                $costo_almacenaje = array(
                    'type' => 'text',
                    'name' => 'costo_almacenaje',
                    'id' => 'costo_almacenaje',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                $pago_iva = array(
                    'type' => 'text',
                    'name' => 'pago_iva',
                    'id' => 'pago_iva',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                $referendo = array(
                    'type' => 'text',
                    'name' => 'referendo',
                    'id' => 'referendo',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                $desempeno = array(
                    'type' => 'text',
                    'name' => 'desempeno',
                    'id' => 'desempeno',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                $fecha_pago = array(
                    'type' => 'text',
                    'name' => 'fecha_pago',
                    'id' => 'fecha_pago',
                    'class' => 'form-control',
                    'placeholder' => '',
                    'required' => 'required'

                );
                ?>
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>/Productos/guardar_producto" method="post" id="producto_form"
                      name="producto_form">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Tipo de factura</label>
		                            <?php echo form_dropdown($tipo_factura_select, $tipo_factura_select_options) ?>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php $fecha = new DateTime(); ?>
                                        <input type="text" class="form-control pull-right" id="fecha" name="fecha"
                                               value="<?php echo $fecha->format('Y-m-d') ?>" >
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <?php echo form_input($categoria_select); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Nombre del producto</label>
                                    <?php echo form_input($nombre_producto); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_serie">No de serie</label>
                                    <?php echo form_input($no_serie); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
                                    <?php echo form_input($modelo); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modelo">Marca</label>
                                    <?php echo form_input($marca); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
		                    <?php echo form_textarea($descripcion_t); ?>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <?php echo form_textarea($descripcion); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de avaluó:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php $fecha_avaluo = new DateTime(); ?>
                                        <input type="text" class="form-control pull-right" id="avaluopicker"
                                               value="<?php echo $fecha_avaluo->format('Y-m-d') ?>" name="fecha_avaluo">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Avalúo comercial</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($avaluo_comercial); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Avalúo Compro Empeño</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($avaluo_ce); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Mutuo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($mutuo); ?>
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
    var nombre_producto;
    var no_serie;
    var modelo;
    var marca;
    var descipcion;
    var fecha_avaluo;
    var avaluo_comercial;
    var avaluo_ce;
    var motuo_minimo
    var motuo;
    var descripcion_dp;
    var descripcion;

    moment.locale('es');


    $("#nombre_producto").change(function () {
        descripcion_dp = 'Nombre: '+ nombre_producto+' No de serie: '+no_serie +' Modelo: '+modelo +' Marca: '+marca;
    });

    $("#producto_form").change(function () {
        fecha_avaluo = $("#fecha_avaluo").val();
        plazo = $("#plazo").val();
        avaluo_comercial = $("#avaluo_comercial").val();
        avaluo_ce = $("#avaluo_ce").val();
        motuo_minimo = (avaluo_comercial / 2);
        //el valor del mutuo debe ser mayor a 50% de avaluo comercial

        motuo = $("#mutuo").val();
        if (motuo >= motuo_minimo) {
            $("#mutuo").val(motuo_minimo);
            console.log(motuo + ' es mayor');
        } else {

            console.log(motuo + ' es menor');
        }
        nombre_producto = $("#nombre_producto").val();
        no_serie = $("#no_serie").val();
        modelo = $("#modelo").val();
        marca = $("#marca").val();
        descripcion = $("#descripcion_t").val();

        descripcion_dp = 'Nombre: '+ nombre_producto+' No de serie: '+no_serie +' Modelo: '+modelo +' Marca: '+marca;
        descipcion_text = descripcion_dp +'\n'+descripcion;
        $("#descripcion").val(descipcion_text);
    });


    var options = {

        url: "<?php echo base_url()?>index.php/Productos/categorias_json",

        getValue: "categoria",

        list: {
            match: {
                enabled: true
            }
        },

        theme: "square"
    };

    $("#categoria").easyAutocomplete(options);
    $(function () {
        //Date picker
        $('#avaluopicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });
</script>
<?php $this->stop() ?>
