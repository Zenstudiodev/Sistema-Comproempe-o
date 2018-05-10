<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 9/05/2018
 * Time: 4:52 PM
 */
$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario
$boleta = array(
    'type' => 'text',
    'name' => 'boleta',
    'id' => 'boleta',
    'class' => 'form-control pull-right',
    'placeholder' => 'No. Boleta',
    'required' => 'required',
);

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
$banco = array(
    'type' => 'select',
    'name' => 'banco',
    'id' => 'banco',
    'class' => 'form-control pull-right',
    'required' => 'required'
);
$banco_options = array(
    'GyT' => 'GyT',
    'Bi' => 'Bi',
);

$tipo = array(
    'type' => 'select',
    'name' => 'tipo',
    'id' => 'tipo',
    'class' => 'form-control pull-right',
    'required' => 'required'
);
$tipo_options = array(
    'Interno' => 'interno',
    'cliente' => 'cliente',
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
            Ingreso de deposito
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <form id="ingresar_deposito" method="post" action="<?php echo base_url() . 'caja/guardar_deposito' ?>">
                <div class="box-header">
                    Ingreso de deposito - <?php $hoy = New DateTime();
                    echo $hoy->format('Y-m-d') ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="avaluo">No.boleta</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <?php echo form_input($boleta); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="avaluo">Monto</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Q.</span>
                                    <?php echo form_input($monto); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="avaluo">Banco</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <?php echo form_dropdown($banco, $banco_options) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="avaluo">Tipo</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <?php echo form_dropdown($tipo, $tipo_options) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="avaluo">Documento Ref</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <?php echo form_input($documento); ?>
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
        <div class="box">
            <div class="box-header">
                Depositos del dia - <?php $hoy = New DateTime();
                echo $hoy->format('Y-m-d') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $total_depositos = 0;
                if ($depositos) {

                    ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No. Boleta</th>
                            <th>Monto</th>
                            <th>Banco</th>
                            <th>Tipo</th>
                            <th>Documento</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($depositos->result() as $deposito) {
                            $total_depositos = $total_depositos + $deposito->monto;
                            ?>
                            <tr>
                                <td><?php echo $deposito->no_boleta ?></td>
                                <td><?php echo display_formato_dinero($deposito->monto); ?></td>
                                <td><?php echo $deposito->banco ?></td>
                                <td><?php echo $deposito->tipo ?></td>
                                <td><?php echo $deposito->documento ?></td>
                            </tr>
                            <?php
                        } ?>
                        <tr>
                            <td colspan="3">Total</td>
                            <td id="totaL_ingresos"><?php echo display_formato_dinero($total_depositos); ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php } else {
                    echo 'No hay depósitos';
                } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
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
