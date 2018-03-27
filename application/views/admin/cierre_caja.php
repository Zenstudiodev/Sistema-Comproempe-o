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



$b_200 = array(
    'type' => 'number',
    'name' => 'b_200',
    'id' => 'b_200',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_100 = array(
    'type' => 'number',
    'name' => 'b_100',
    'id' => 'b_100',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_50 = array(
    'type' => 'number',
    'name' => 'b_50',
    'id' => 'b_50',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_20 = array(
    'type' => 'number',
    'name' => 'b_20',
    'id' => 'b_20',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_10 = array(
    'type' => 'number',
    'name' => 'b_10',
    'id' => 'b_10',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_5 = array(
    'type' => 'number',
    'name' => 'b_5',
    'id' => 'b_5',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$b_1 = array(
    'type' => 'number',
    'name' => 'b_1',
    'id' => 'b_1',
    'class' => 'form-control pull-right',
    'placeholder' => 'Billetes',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$m_1 = array(
    'type' => 'number',
    'name' => 'm_1',
    'id' => 'm_1',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monedas',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$m_50 = array(
    'type' => 'number',
    'name' => 'm_50',
    'id' => 'm_50',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monedas',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$m_25 = array(
    'type' => 'number',
    'name' => 'm_25',
    'id' => 'm_25',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monedas',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$m_10 = array(
    'type' => 'number',
    'name' => 'm_10',
    'id' => 'm_10',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monedas',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);
$m_5 = array(
    'type' => 'number',
    'name' => 'm_5',
    'id' => 'm_5',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monedas',
    'required' => 'required',
    'step' => '1',
    'min' => '0'
);

?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cierre Caja
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                Balance de caja - <?php $hoy = New DateTime();
                echo $hoy->format('Y-m-d') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-header">
                            Ingreos
                        </h2>

                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Ventas</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Monto</th>
                                    <th>Cod. Producto</th>
                                    <th>Nombre Producto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>20</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>150</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_ingresos">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Apartado</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Recibo</th>
                                    <th>Monto</th>
                                    <th>Cod. Producto</th>
                                    <th>Saldo</th>
                                    <th>Vence</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_apartado">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Abono Empeño</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Recibo</th>
                                    <th>Monto</th>
                                    <th>Contrato</th>
                                    <th>Saldo capital</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_abono_empeño">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Desempeño</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Recibo</th>
                                    <th>Monto</th>
                                    <th>Contrato</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_desempeño">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Intereses Refrendo</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Monto</th>
                                    <th>Contrato</th>
                                    <th>Monto refrendado</th>
                                    <th>Saldo capital</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_interes_refrendo">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Intereses Desempeño</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Monto</th>
                                    <th>Contrato</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_intereses_desempeño">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h2 class="page-header">
                            Egresos
                        </h2>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Enempeño</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Monto</th>
                                    <th>Intereses</th>
                                    <th>dias</th>
                                    <th>Monto Refrendo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_empeño">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Compras</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Detalle</th>
                                    <th>Monto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_compras">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Otros gastos</h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Detalle</th>
                                    <th>Monto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td id="totaL_otros_gastos">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <h2 class="page-header">
                            Dinero
                        </h2>
                        <div class="container">
                            <h3 class="box-title">Billetes</h3>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.200</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_200); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.100</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_100); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.50</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_50); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.20</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_20); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.10</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_10); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.5</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_5); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.1</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($b_1); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <h3 class="box-title">Moneda</h3>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.1</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($m_1); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.0.50</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($m_50); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.0.25</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($m_25); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.0.10</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Q</span>
                                            <?php echo form_input($m_10); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="avaluo">Q.0.5</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">#</span>
                                            <?php echo form_input($m_5); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead">Total de balance </p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody><tr>
                                    <th style="width:50%">TOTAL INGRESOS:</th>
                                    <td id="total_ingresos">$250.30</td>
                                </tr>
                                <tr>
                                    <th>TOTAL EGRESOS</th>
                                    <td id="total_egresos">$10.34</td>
                                </tr>
                                <tr>
                                    <th>SALDO DEL DIA</th>
                                    <td id="saldo_dia">$5.80</td>
                                </tr>
                                <tr>
                                    <th>-(DEPOSITO BANCO)</th>
                                    <td id="total_deposito">$265.24</td>
                                </tr>
                                <tr>
                                    <th>VISANET</th>
                                    <td id="total_visanet">$265.24</td>
                                </tr>
                                <tr>
                                    <th>SALDO FINAL CAJA</th>
                                    <td id="saldo_final_caja">$265.24</td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Integración fondo real en caja</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody><tr>
                                    <th style="width:50%">Valor de moneda:</th>
                                    <th>Cantidad de billetes</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th>200</th>
                                    <td id="nb_200">-</td>
                                    <td id="tb_200"></td>
                                </tr>
                                <tr>
                                    <th>100</th>
                                    <td id="nb_100">-</td>
                                    <td id="tb_100"></td>
                                </tr>
                                <tr>
                                    <th>50</th>
                                    <td id="nb_50">-</td>
                                    <td id="tb_50"></td>
                                </tr>
                                <tr>
                                    <th>20</th>
                                    <td id="nb_20">-</td>
                                    <td id="tb_20"></td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <td id="nb_10">-</td>
                                    <td id="tb_10"></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td id="nb_5">-</td>
                                    <td id="tb_5"></td>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <td id="nb_1">-</td>
                                    <td id="tb_1"></td>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <td id="nm_1">-</td>
                                    <td id="tm_1"></td>
                                </tr>
                                <tr>
                                    <th>0.50</th>
                                    <td id="nm_50">-</td>
                                    <td id="tm_50"></td>
                                </tr>
                                <tr>
                                    <th>0.25</th>
                                    <td id="nm_25">-</td>
                                    <td id="tm_25"></td>
                                </tr>
                                <tr>
                                    <th>0.10</th>
                                    <td id="nm_10">-</td>
                                    <td id="tm_10"></td>
                                </tr>
                                <tr>
                                    <th>0.5</th>
                                    <td id="nm_5">-</td>
                                    <td id="tm_5"></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Vales por liquidar</th>
                                    <td>-</td>
                                </tr>

                                </tbody></table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead">Diferencia</p>
                        <p>--</p>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<?php $this->stop() ?>
