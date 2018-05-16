<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/05/2018
 * Time: 12:24 PM
 */
$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario
$no_cheque = array(
    'type' => 'text',
    'name' => 'no_cheque',
    'id' => 'no_cheque',
    'class' => 'form-control pull-right',
    'placeholder' => 'No. Cheque',
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
                Ingreso de fondos a caja
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <form id="ingresar_deposito" method="post" action="<?php echo base_url() . 'caja/guardar_fondo_caja' ?>">
                    <div class="box-header">
                        Ingreso de fondos a caja - <?php $hoy = New DateTime();
                        echo $hoy->format('Y-m-d') ?>
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
                                    <label for="avaluo">No. cheque</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input($no_cheque); ?>
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
                    Ingresos a caja del día - <?php $hoy = New DateTime();
                    echo $hoy->format('Y-m-d') ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $total_ingresos = 0;
                    if ($ingresos) {

                        ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Monto</th>
                                <th>Banco</th>
                                <th>No. Cheque</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($ingresos->result() as $ingreso) {
                                $total_ingresos = $total_ingresos + $ingreso->monto;
                                ?>
                                <tr>
                                    <td><?php echo display_formato_dinero($ingreso->monto); ?></td>
                                    <td><?php echo $ingreso->banco ?></td>
                                    <td><?php echo $ingreso->no_cheque ?></td>
                                </tr>
                                <?php
                            } ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td id="totaL_ingresos"><?php echo display_formato_dinero($total_ingresos); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'No hay Ingresos';
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