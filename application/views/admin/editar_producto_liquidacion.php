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
if ($producto_data) {
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
                Editar producto ID:<?php echo $producto->producto_id; ?> - <?php echo $producto->nombre_producto; ?>
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

                // TODO categorias select desde tabla de productos
                $categoria_select = array(
                    'type' => 'text',
                    'name' => 'categoria',
                    'id' => 'categoria',
                    'class' => 'form-control',
                    'placeholder' => 'Categoría',
                    'data-validate-length-range' => '6',
                    'data-validate-words' => '2',
                    'required' => 'required',
                    'value' => $producto->categoria,
                    'readonly'=>'readonly'

                );
                //TODO descripcion textarea
                $descripcion = array(
                    'type' => 'text',
                    'name' => 'descripcion',
                    'id' => 'descripcion',
                    'class' => 'form-control',
                    'placeholder' => 'Descripción',
                    'data-validate-length-range' => '6',
                    'data-validate-words' => '2',
                    'required' => 'required',
                    'value' => $producto->descripcion,
                    'readonly'=>'readonly'

                );
                $nombre_producto = array(
                    'type' => 'text',
                    'name' => 'nombre_producto',
                    'id' => 'nombre_producto',
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del producto',
                    'data-validate-length-range' => '6',
                    'data-validate-words' => '2',
                    'required' => 'required',
                    'value' => $producto->nombre_producto,
                    'readonly'=>'readonly'

                );
                $no_serie = array(
                    'type' => 'text',
                    'name' => 'no_serie',
                    'id' => 'no_serie',
                    'class' => 'form-control',
                    'placeholder' => 'No. de serie',
                    'required' => 'required',
                    'value' => $producto->no_serie,
                    'readonly'=>'readonly'

                );
                $modelo = array(
                    'type' => 'text',
                    'name' => 'modelo',
                    'id' => 'modelo',
                    'class' => 'form-control',
                    'placeholder' => 'Modelo',
                    'required' => 'required',
                    'value' => $producto->modelo,
                    'readonly'=>'readonly'

                );
                $marca = array(
                    'type' => 'text',
                    'name' => 'marca',
                    'id' => 'marca',
                    'class' => 'form-control',
                    'placeholder' => 'Marca',
                    'required' => 'required',
                    'value' => $producto->marca,
                    'readonly'=>'readonly'

                );
                $avaluo_comercial = array(
                    'type' => 'text',
                    'name' => 'avaluo_comercial',
                    'id' => 'avaluo_comercial',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Avaluo',
                    'required' => 'required',
                    'value' => $producto->avaluo_comercial,
                    'readonly'=>'readonly'

                );
                $avaluo_ce = array(
                    'type' => 'text',
                    'name' => 'avaluo_ce',
                    'id' => 'avaluo_ce',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Avaluo',
                    'required' => 'required',
                    'value' => $producto->avaluo_ce,
                    'readonly'=>'readonly'

                );
                $mutuo = array(
                    'type' => 'text',
                    'name' => 'mutuo',
                    'id' => 'mutuo',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Motuo',
                    'required' => 'required',
                    'value' => $producto->mutuo
                );
                ?>
                <!-- form start -->
                <form role="form" action="<?php echo base_url() ?>Productos/actualizar_producto" method="post" id="producto_form"
                      name="producto_form">
                    <?php echo form_hidden('producto_id', $producto->producto_id); ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <!--<div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php /*$fecha = new DateTime(); */?>
                                        <input type="text" class="form-control pull-right" id="fecha" name="fecha"
                                               value="<?php /*echo $fecha->format('Y-m-d') */?>" >
                                    </div>
                                    <!-- /.input group --
                                </div>
                            </div>-->
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
                            <?php echo form_textarea($descripcion); ?>
                        </div>
                        <div class="row">
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
    <?php } else {
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
    var fecha_avaluo;
    var avaluo_comercial;
    var avaluo_ce;
    var motuo_minimo
    var motuo;
    moment.locale('es');
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
    });


    var options = {
        data: [
            <?php

            foreach ($categorias->result() as $categoria) {
                echo '"' . $categoria->nombre . '",';
            }
            ?>
        ]
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
