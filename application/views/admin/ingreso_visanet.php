<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 9/05/2018
 * Time: 6:04 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario
$factura = array(
    'type' => 'number',
    'name' => 'factura_id',
    'id' => 'factura_id',
    'class' => 'form-control pull-right',
    'placeholder' => 'Factura',
    'required' => 'required',
    'value' => '0',
    'step' => 'any',
    'min' => '0'
);

$recibo = array(
    'type' => 'number',
    'name' => 'recibo_id',
    'id' => 'recibo_id',
    'class' => 'form-control pull-right',
    'placeholder' => 'Factura',
    'value' => '0',
    'required' => 'required',
    'step' => 'any',
    'min' => '0'
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
                Ingreso de Visanet
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <form id="ingresar_deposito" method="post" action="<?php echo base_url() . 'caja/guardar_visanet' ?>">
                    <div class="box-header">
                        Ingreso de Visanet - <?php $hoy = New DateTime();
                        echo $hoy->format('Y-m-d') ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Factura No.</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input($factura); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Recibo No.</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input($recibo); ?>
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
                    $total_visanet = 0;
                    if ($visanets) {

                        ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No. factura</th>
                                <th>No. recibo</th>
                                <th>Monto</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($visanets->result() as $visanet) {
                                $total_visanet = $total_visanet + $visanet->monto;
                                ?>
                                <tr>
                                    <td><?php echo $visanet->factura_id ?></td>
                                    <td><?php echo $visanet->recibo_id ?></td>
                                    <td><?php echo display_formato_dinero($visanet->monto); ?></td>
                                </tr>
                                <?php
                            } ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td id="totaL_ingresos"><?php echo display_formato_dinero($total_visanet); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'No hay pagos visanet';
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