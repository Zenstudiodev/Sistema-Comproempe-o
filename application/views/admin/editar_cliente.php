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
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url()?>/ui/admin/plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php base_url()?>/ui/admin/plugins/iCheck/all.css">

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar cliente
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	    <?php if ($cliente) {

		    $cliente = $cliente->row();
	        ?>

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de cliente <?php echo  $cliente->nombre;?></h3>
            </div>
            <!-- /.box-header -->

            <?php
            $nombre = array(
                'type' => 'text',
                'name' => 'nombre',
                'id' => 'nombre',
                'class' => 'form-control',
                'placeholder' => 'Nombre completo',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required',
                'value' => $cliente->nombre

            );
            $dpi = array(
                'type' => 'text',
                'name' => 'dpi',
                'id' => 'dpi',
                'class' => 'form-control',
                'placeholder' => 'DPI',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required',
                'value' => $cliente->dpi

            );
            $nit = array(
                'type' => 'text',
                'name' => 'nit',
                'id' => 'nit',
                'class' => 'form-control',
                'placeholder' => 'NIT',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required',
                'value' => $cliente->nit

            );
            $direccion = array(
                'type' => 'text',
                'name' => 'direccion',
                'id' => 'direccion',
                'class' => 'form-control',
                'placeholder' => 'Dirección',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required',
                'value' => $cliente->direccion

            );
            $fecha_nacimiento = array(
                'type' => 'text',
                'name' => 'fecha_nacimiento',
                'id' => 'fecha_nacimiento',
                'class' => 'form-control pull-right',
                'placeholder' => 'Fecha de nacimiento',
                'required' => 'required',
                'value' => $cliente->fecha_nacimiento

            );
            $telefono = array(
                'type' => 'text',
                'name' => 'telefono',
                'id' => 'telefono',
                'class' => 'form-control',
                'placeholder' => 'Teléfono',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required',
                'value' => $cliente->telefono

            );
            $celular = array(
                'type' => 'text',
                'name' => 'celular',
                'id' => 'celular',
                'class' => 'form-control',
                'placeholder' => 'Celular',
                'required' => 'required',
                'value' => $cliente->celular

            );
            $email = array(
                'type' => 'text',
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => 'required',
                'value' => $cliente->email
            );
            $ciudad = array(
                'type' => 'text',
                'name' => 'ciudad',
                'id' => 'ciudad',
                'class' => 'form-control',
                'placeholder' => 'Ciudad',
                'required' => 'required',
                'value' => $cliente->ciudad
            );
            $zona = array(
                'type' => 'number',
                'name' => 'zona',
                'id' => 'zona',
                'class' => 'form-control',
                'placeholder' => 'Zona',
                'required' => 'required',
                'value' => $cliente->zona
            );
            $colonia = array(
                'type' => 'text',
                'name' => 'colonia',
                'id' => 'coloinia',
                'class' => 'form-control',
                'placeholder' => 'Colonia',
                'required' => 'required',
                'value' => $cliente->colonia
            );


            ?>
            <!-- form start -->
            <form role="form" action="<?php echo base_url()?>/cliente/Actualizar" method="post">
                <div class="box-body">

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <?php echo form_input($nombre);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">DPI</label>
                        <?php echo form_input($dpi);?>
                    </div>
                    <div class="form-group">
                        <label for="nit">NIT</label>
                        <?php echo form_input($nit);?>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <?php echo form_input($direccion);?>
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php echo form_input($fecha_nacimiento);?>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label for="dpi">Teléfono</label>
                        <?php echo form_input($telefono);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">Celular</label>
                        <?php echo form_input($celular);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">Email</label>
                        <?php echo form_input($email);?>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dpi">Ciudad</label>
                                <?php echo form_input($ciudad);?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dpi">Zona</label>
                                <?php echo form_input($zona);?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dpi">Colonia</label>
                                <?php echo form_input($colonia);?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dpi">Autorización: los datos personales pueden utilizarse para mercadeo</label>
                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="publicidad" class="minimal" value="Si" <?if ($cliente->publicidad == 'Si'){echo 'checked';}?> >Si
                            </label>
                            <label>
                                <input type="radio" name="publicidad" class="minimal" value="No" <?if ($cliente->publicidad == 'No'){echo 'checked';}?>> No
                            </label>
                        </div>
                    </div>
	                <?php
	                echo form_hidden('cliente_id', $cliente->id);
	                ?>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
<?php }?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>/ui/admin/plugins/iCheck/icheck.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    $(function () {
        //Date picker
        $('#fecha_nacimiento').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });
    var ciudades = {
        url: "<?php echo base_url()?>index.php/cliente/ciudad_json/",
        getValue: "ciudad",

        list: {
            match: {
                enabled: true
            }
        },
        theme: "square"
    };
    $("#ciudad").easyAutocomplete(ciudades);
    var colonias = {
        url: "<?php echo base_url()?>index.php/cliente/colonia_json/",
        getValue: "colonia",

        list: {
            match: {
                enabled: true
            }
        },
        theme: "square"
    };
    $("#coloinia").easyAutocomplete(colonias);
</script>
<?php $this->stop() ?>
