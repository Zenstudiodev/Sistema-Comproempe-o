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
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/iCheck/all.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Lote de facturas
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de serie</h3>
            </div>
            <!-- /.box-header -->

			<?php
			$correlativo_del = array(
				'type'        => 'number',
				'name'        => 'correlativo_del',
				'id'          => 'correlativo_del',
				'class'       => 'form-control',
				'placeholder' => 'Correlativo del',
				'required'    => 'required'

			);
			$correlativo_al  = array(
				'type'        => 'number',
				'name'        => 'correlativo_al',
				'id'          => 'correlativo_al',
				'class'       => 'form-control',
				'placeholder' => 'Correlativo al',
				'required'    => 'required'
			);
			$cantidad        = array(
				'type'        => 'number',
				'name'        => 'cantidad',
				'id'          => 'cantidad',
				'class'       => 'form-control',
				'placeholder' => 'Cantidad',
				'required'    => 'required'
			);

			$usadas            = array(
				'type'        => 'number',
				'name'        => 'usadas',
				'id'          => 'usadas',
				'class'       => 'form-control',
				'placeholder' => 'Usadas',
				'required'    => 'required'
			);
			$serie             = array(
				'type'        => 'text',
				'name'        => 'serie',
				'id'          => 'serie',
				'class'       => 'form-control',
				'placeholder' => 'Serie',
				'required'    => 'required'
			);
			$fecha_vencimiento = array(
				'type'        => 'text',
				'name'        => 'fecha_vencimiento',
				'id'          => 'fecha_vencimiento',
				'class'       => 'form-control pull-right',
				'placeholder' => 'Fecha de vencimiento',
				'required'    => 'required'
			);

			?>
            <!-- form start -->
            <form role="form" action="<?php echo base_url() ?>/factura/guardar_lote_fcturas" method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Correlativo del </label>
								<?php echo form_input($correlativo_del); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Correlativo del </label>
		                        <?php echo form_input($correlativo_al); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Cantidad </label>
		                        <?php echo form_input($cantidad); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Usadas</label>
		                        <?php echo form_input($usadas); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Serie</label>
		                        <?php echo form_input($serie); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Fecha vencimiento</label>
		                        <?php echo form_input($fecha_vencimiento); ?>
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
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/iCheck/icheck.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    $(function () {
        //Date picker
        $('#fecha_vencimiento').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });
</script>
<?php $this->stop() ?>
