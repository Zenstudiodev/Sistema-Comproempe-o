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
            Crear proveedor
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de Proveedor</h3>
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
                'required' => 'required'

            );
            $direccion = array(
	            'type' => 'text',
	            'name' => 'direccion',
	            'id' => 'direccion',
	            'class' => 'form-control',
	            'placeholder' => 'Dirección',
	            'data-validate-length-range'=>'6',
	            'data-validate-words'=>'2',
	            'required' => 'required'

            );
            $telefono = array(
	            'type' => 'text',
	            'name' => 'telefono',
	            'id' => 'telefono',
	            'class' => 'form-control',
	            'placeholder' => 'Teléfono',
	            'data-validate-length-range'=>'6',
	            'data-validate-words'=>'2',
	            'required' => 'required'

            );
            $nit = array(
                'type' => 'text',
                'name' => 'nit',
                'id' => 'nit',
                'class' => 'form-control',
                'placeholder' => 'NIT',
                'data-validate-length-range'=>'6',
                'data-validate-words'=>'2',
                'required' => 'required'

            );

            $razon_social = array(
                'type' => 'text',
                'name' => 'razon_social',
                'id' => 'razon_social',
                'class' => 'form-control',
                'placeholder' => 'Razoón social',
                'required' => 'required'

            );
            $email = array(
                'type' => 'text',
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => 'required'

            );


            ?>
            <!-- form start -->
            <form role="form" action="<?php echo base_url()?>/proveedores/Guardar" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <?php echo form_input($nombre);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">Dirección</label>
                        <?php echo form_input($direccion);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">Teléfono</label>
                        <?php echo form_input($telefono);?>
                    </div>
                    <div class="form-group">
                        <label for="razon_social">Razón social</label>
                        <?php echo form_input($razon_social);?>
                    </div>
                    <div class="form-group">
                        <label for="dpi">Email</label>
		                <?php echo form_input($email);?>
                    </div>
                    <div class="form-group">
                        <label for="nit">NIT</label>
		                <?php echo form_input($nit);?>
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
</script>
<?php $this->stop() ?>
