<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 10/03/2019
 * Time: 02:38 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario


$monto = array(
    'type' => 'number',
    'name' => 'monto',
    'id' => 'monto',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monto',
    'required' => 'required',
    'step' => 'any',
    'min' => '0'
);
$documento = array(
    'type' => 'text',
    'name' => 'documento',
    'id' => 'documento',
    'class' => 'form-control pull-right',
    'placeholder' => 'Documento',
    'required' => 'required',
);

?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ingreso de Saldo de caja
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <form id="ingresar_deposito" method="post" action="<?php echo base_url() . 'caja/guardar_saldo_caja' ?>">
                <div class="box-header">
                    Saldo de caja - <?php $ayer = New DateTime();
                    $ayer->modify('-1 days');
                    echo $ayer->format('Y-m-d') ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="avaluo">Monto</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Q.</span>
                                    <?php echo form_input($monto); ?>
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

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<?php $this->stop() ?>
