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
                    <h3 class="box-title">Datos de Factura</h3>
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

                $categoria_select = array(
                    'type' => 'text',
                    'name' => 'categoria',
                    'id' => 'categoria',
                    'class' => 'form-control',
                    'placeholder' => 'Categoría',
                    'required' => 'required'

                );
                $proveedor        = array(
	                'type'        => 'text',
	                'name'        => 'proveedor',
	                'id'          => 'proveedor',
	                'class'       => 'form-control',
	                'placeholder' => 'Proveedor',
	                //'required' => 'required'
                );

                $proveedor_id        = array(
	                'type'        => 'text',
	                'name'        => 'proveedor_id',
	                'id'          => 'proveedor_id',
	                'class'       => 'form-control',
	                'placeholder' => 'Proveedor',
	                'required' => 'required'
                );


                $cantidad_productos = array(
	                'type' => 'nomber',
	                'name' => 'cantidad_productos',
	                'id' => 'cantidad_productos',
	                'class' => 'form-control',
	                'placeholder' => 'Cantidad de productos',
	                'required' => 'required'
                );

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

                ?>
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>/Productos/guardar_productos_inventario" method="post" id="producto_form"
                      name="producto_form">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Proveedor</label>
				                    <?php echo form_input($proveedor) ?>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label for="categoria">Proveedor_id</label>
		                                <?php echo form_input($proveedor_id) ?>
                                </div>
                            </div>
                        </div>
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

                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de Productos</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
			                        <?php echo form_input($categoria_select); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categoria">Nombre del producto</label>
			                        <?php echo form_input($nombre_producto); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_serie">No de serie</label>
			                        <?php echo form_input($no_serie); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
			                        <?php echo form_input($modelo); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="modelo">Marca</label>
			                        <?php echo form_input($marca); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
		                            <?php echo form_textarea($descripcion_t); ?>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">No de  productos</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Precio sin IVA</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Precio de venta</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success">Agregar Producto</button>
                            </div>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Cargos extra</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Flete sin iva</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Gastos no deducibles</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Flete sin iva</label>
				                    <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Seguro</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">DAI</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Multas</label>
			                        <?php echo form_input($cantidad_productos); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="categoria">Otros</label>
				                    <?php echo form_input($cantidad_productos); ?>
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

    });


    var options = {

        url: "<?php echo base_url()?>index.php/Productos/categorias_json",

        getValue: "categoria",

        list: {
            match: {
                enabled: true
            }
        },

        theme: "plate-dark"
    };

    $("#categoria").easyAutocomplete(options);



    var proveedores = {

        url: "<?php echo base_url()?>index.php/Proveedores/proveedores_json",
        theme: "plate-dark",
        getValue: 'nombre',
        template: {
            type: "custom",
            method: function (value, item) {
                return "ID: " + item.proveedor_id + " | " + "Nombre: " + item.nombre + " | "
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#proveedor").getSelectedItemData().proveedor_id;

                $("#proveedor_id").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#proveedor").easyAutocomplete(proveedores);

    $(function () {
        //Date picker
        $('#avaluopicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });
</script>
<?php $this->stop() ?>
