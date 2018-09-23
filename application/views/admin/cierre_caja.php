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

$dinero_en_caja = 0;

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
            Cierre Caja -
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
                        <h3>Dinero en caja del día anterior</h3>
                        <?php
                        if ($caja_dia_anterior) {
                            $caja_dia_anterior = $caja_dia_anterior->row();
                            $dinero_en_caja = $caja_dia_anterior->saldo_caja;
                        } else {
                            $dinero_en_caja = 0;
                        }
                        echo formato_dinero($dinero_en_caja);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-header">
                            Ingresos
                        </h2>

                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Ingresos a caja</h3>
                            <?php
                            $total_ingresos_caja = 0;
                            if ($ingresos_caja) {

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

                                    <?php foreach ($ingresos_caja->result() as $ingreso) {
                                        $total_ingresos_caja = $total_ingresos_caja + $ingreso->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo display_formato_dinero($ingreso->monto); ?></td>
                                            <td><?php echo $ingreso->banco ?></td>
                                            <td><?php echo $ingreso->no_cheque ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td id="totaL_ingresos"><?php echo display_formato_dinero($total_ingresos_caja); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay Ingresos';
                            } ?>

                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Ventas</h3>
                            <?php
                            $total_ventas = 0;
                            if ($ventas) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Serie</th>
                                        <th>Monto</th>
                                        <th>Cod. Producto</th>
                                        <th>Nombre Producto</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($ventas->result() as $venta) {
                                        $total_ventas = $total_ventas + $venta->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $venta->factura_id ?></td>
                                            <td><?php echo $venta->serie ?></td>
                                            <td><?php echo display_formato_dinero($venta->monto); ?></td>
                                            <td><?php echo $venta->id_producto ?></td>
                                            <td><?php echo $venta->nombre_producto ?></td>
                                            <td><?php echo   id_to_nombre($venta->user_id);?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_ingresos"><?php echo display_formato_dinero($total_ventas); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay ventas';
                            } ?>

                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Apartado</h3>
                            <table class="table table-striped table-bordered">
                                <?php
                                $total_apartados = 0;
                                if ($apartados) { ?>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Recibo</th>
                                            <th>Monto</th>
                                            <th>Cod. Producto</th>
                                            <th>Nombre Producto</th>
                                            <th>Saldo</th>
                                            <th>Vencimiento</th>
                                            <th>Usuario</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($apartados->result() as $apartado) {
                                            $total_apartados = $total_apartados + $apartado->monto;
                                            ?>
                                            <tr>
                                                <td><?php echo $apartado->recibo_id ?></td>
                                                <td><?php echo display_formato_dinero($apartado->monto); ?></td>
                                                <td><?php echo $apartado->id_producto ?></td>
                                                <td><?php echo $apartado->nombre_producto ?></td>
                                                <td><?php echo $apartado->saldo ?></td>
                                                <td><?php echo $apartado->fecha_vencimiento ?></td>
                                                <td><?php echo   id_to_nombre($apartado->user_id);?></td>
                                            </tr>
                                            <?php
                                        } ?>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td id="totaL_ingresos"><?php echo display_formato_dinero($total_apartados); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    echo 'No hay apartados';
                                } ?>
                            </table>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Abono apartados</h3>
                            <?php
                            $total_abonos_apartado = 0;
                            if ($abono_apartados) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Recibo</th>
                                        <th>Monto</th>
                                        <th>Producto</th>
                                        <th>Saldo capital</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($abono_apartados->result() as $abono) {
                                        $total_abonos_apartado = $total_abonos_apartado + $abono->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $abono->recibo_id ?></td>
                                            <td><?php echo display_formato_dinero($abono->monto); ?></td>
                                            <td><?php echo $abono->id_producto ?></td>
                                            <td><?php echo $abono->saldo ?></td>
                                            <td><?php echo id_to_nombre($abono->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_ingresos"><?php echo display_formato_dinero($total_abonos_apartado); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay abonos';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Abono Empeño</h3>
                            <?php
                            $total_abonos_enpenos = 0;
                            if ($abonos_enpenos) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Recibo</th>
                                        <th>Monto</th>
                                        <th>Contrato</th>
                                        <th>Saldo capital</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($abonos_enpenos->result() as $abono) {
                                        $total_abonos_enpenos = $total_abonos_enpenos + $abono->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $abono->recibo_id ?></td>
                                            <td><?php echo display_formato_dinero($abono->monto); ?></td>
                                            <td><?php echo $abono->id_contrato ?></td>
                                            <td><?php echo $abono->saldo ?></td>
                                            <td><?php echo id_to_nombre($abono->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_ingresos"><?php echo display_formato_dinero($total_abonos_enpenos); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay abonos';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Desempeño</h3>
                            <?php
                            $total_desenpeno = 0;
                            if ($desenpenos) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Recibo id</th>
                                        <th>Monto</th>
                                        <th>Contrato</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($desenpenos->result() as $desenpeno) {
                                        $total_desenpeno = $total_desenpeno + $desenpeno->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $desenpeno->recibo_id ?></td>
                                            <td><?php echo display_formato_dinero($desenpeno->monto); ?></td>
                                            <td><?php echo $desenpeno->id_contrato ?></td>
                                            <td><?php echo id_to_nombre($desenpeno->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_desempeño"><?php echo display_formato_dinero($total_desenpeno); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay Empeños';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Intereses Refrendo</h3>

                            <?php
                            $total_intereses_refrendo = 0;
                            if ($intereses_refrendo) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Monto</th>
                                        <th>Contrato</th>
                                        <th>Monto refrendado</th>
                                        <th>Saldo capital</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($intereses_refrendo->result() as $interese_refrendo) {
                                        $total_intereses_refrendo = $total_intereses_refrendo + $interese_refrendo->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $interese_refrendo->factura_id ?></td>
                                            <td><?php echo display_formato_dinero($interese_refrendo->monto); ?></td>
                                            <td><?php echo $interese_refrendo->id_contrato ?></td>
                                            <td><?php echo $interese_refrendo->mutuo ?></td>
                                            <td><?php echo $interese_refrendo->saldo ?></td>
                                            <td><?php echo id_to_nombre($interese_refrendo->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>

                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_interes_refrendo"><?php echo display_formato_dinero($total_intereses_refrendo); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay intereses por refrendo';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Intereses Desempeño</h3>
                            <?php
                            $total_intereses_desempeno = 0;
                            if ($intereses_desempeno) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Monto</th>
                                        <th>Contrato</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($intereses_desempeno->result() as $interes_desempeno) {
                                        $total_intereses_desempeno = $total_intereses_desempeno + $interes_desempeno->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $interes_desempeno->factura_id ?></td>
                                            <td><?php echo display_formato_dinero($interes_desempeno->monto); ?></td>
                                            <td><?php echo $interes_desempeno->id_contrato ?></td>
                                            <td><?php echo id_to_nombre($interes_desempeno->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_intereses_desempeño"><?php echo display_formato_dinero($total_intereses_desempeno); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay intereses por desempeño';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Vales cobrados</h3>
                            <?php
                            $total_vales_cobrados = 0;
                            if ($vales_cobrados) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($vales_cobrados->result() as $vale) {
                                        $total_vales_cobrados = $total_vales_cobrados + $vale->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $vale->nombre ?></td>
                                            <td><?php echo $vale->detalle ?></td>
                                            <td><?php echo display_formato_dinero($vale->monto); ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_intereses_desempeño"><?php echo display_formato_dinero($total_vales_cobrados); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay intereses por desempeño';
                            } ?>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h2 class="page-header">
                            Egresos
                        </h2>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Empeños</h3>
                            <?php
                            $total_empenos = 0;
                            if ($empenos) { ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Monto</th>
                                        <th>Intereses</th>
                                        <th>dias</th>
                                        <th>Monto Refrendo</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($empenos->result() as $empeno) {
                                        $total_empenos = $total_empenos + $empeno->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $empeno->contrato_id ?></td>
                                            <td><?php echo display_formato_dinero($empeno->monto); ?></td>
                                            <td><?php echo $empeno->intereses ?></td>
                                            <td><?php echo $empeno->dias ?></td>
                                            <td><?php echo $empeno->monto_refrendo ?></td>
                                            <td><?php echo id_to_nombre($empeno->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td id="totaL_empeño"><?php echo display_formato_dinero($total_empenos); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay empeños';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Compras</h3>

                            <?php
                            $total_compras = 0;
                            if ($compras) {
                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($compras->result() as $compra) {
                                        $total_compras = $total_compras + $compra->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $compra->detalle ?></td>
                                            <td><?php echo display_formato_dinero($compra->monto); ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_compras"><?php echo display_formato_dinero($total_compras); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay compras';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Otros gastos</h3>
                            <?php
                            $total_otros_gastos = 0;
                            if ($otros_gastos) {

                                ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($otros_gastos->result() as $otro_gasto) {
                                        $total_otros_gastos = $total_otros_gastos + $otro_gasto->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $otro_gasto->detalle ?></td>
                                            <td><?php echo display_formato_dinero($otro_gasto->monto); ?></td>
                                            <td><?php echo id_to_nombre($otro_gasto->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="1">Total</td>
                                        <td id="totaL_otros_gastos"><?php echo display_formato_dinero($total_otros_gastos); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay otros gastos';
                            } ?>
                        </div>
                        <div class="col-xs-12 table-responsive">
                            <h3 class="box-title">Vales</h3>
                            <?php
                            $total_vales = 0;
                            if ($vales) {?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($vales->result() as $vale) {
                                        $total_vales = $total_vales + $vale->monto;
                                        ?>
                                        <tr>
                                            <td><?php echo $vale->nombre ?></td>
                                            <td><?php echo $vale->detalle ?></td>
                                            <td><?php echo display_formato_dinero($vale->monto); ?></td>
                                            <td><?php echo id_to_nombre($vale->user_id) ?></td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td id="totaL_otros_gastos"><?php echo display_formato_dinero($total_vales); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo 'No hay otros gastos';
                            } ?>
                        </div>

                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <h2 class="page-header">
                            Dinero
                        </h2>
                        <div class="container">
                            <form id="cierre_caja" action="<?php echo base_url() . 'Caja/guardar_cierre_de_caja' ?>"
                                  method="post">
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

                <?php
                //calculos de totales
                //ingresps
                $total_ingresos
                    = $dinero_en_caja
                    + $total_ingresos_caja
                    + $total_vales_cobrados
                    + $total_ventas
                    + $total_apartados
                    + $total_abonos_enpenos
                    + $total_desenpeno
                    + $total_intereses_refrendo
                    + $total_intereses_desempeno;

                $total_egresos
                    = $total_empenos
                    + $total_compras
                    + $total_otros_gastos;

                $saldo = $total_ingresos - $total_egresos;

                //Depositos
                $total_depositos = 0;
                if ($depositos) {
                    foreach ($depositos->result() as $deposito) {
                        $total_depositos = $total_depositos + round($deposito->monto, 2);
                    }
                }
                //Visanet
                $total_visanet = 0;
                if ($visanets) {
                    foreach ($visanets->result() as $visanet) {
                        $total_visanet = $total_visanet + round($visanet->monto, 2);
                    }
                }

                $saldo_final = $saldo - $total_depositos - $total_visanet;
                $saldo_final = round($saldo_final, 2);
                ?>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead">Total de balance </p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">TOTAL INGRESOS:</th>
                                    <td id="total_ingresos"><?php echo $total_ingresos; ?></td>
                                </tr>
                                <tr>
                                    <th>TOTAL EGRESOS</th>
                                    <td id="total_egresos"><?php echo $total_egresos; ?></td>
                                </tr>
                                <tr>
                                    <th>SALDO DEL DIA</th>
                                    <td id="saldo_dia"><?php echo $saldo; ?></td>
                                </tr>
                                <tr>
                                    <th>-(DEPOSITO BANCO)</th>
                                    <td id="total_deposito"><?php echo $total_depositos; ?></td>
                                </tr>
                                <tr>
                                    <th>VISANET</th>
                                    <td id="total_visanet"><?php echo $total_visanet; ?></td>
                                </tr>
                                <tr>
                                    <th>SALDO FINAL CAJA</th>
                                    <td id="saldo_final_caja"><?php echo $saldo_final; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Integración fondo real en caja</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
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
                                    <td id="total_dinero">-</td>
                                </tr>
                                <tr>
                                    <th>Vales por liquidar</th>
                                    <td id="total_vales"><?php echo $total_vales;?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead">Diferencia</p>
                        <p id="diferencia_text">--</p>

                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Guardar cierre</p>
                        <button class="btn btn-success" type="submit" id="guardar_cierre_btn">Guardar cierre</button>
                        <input type="hidden" name="total_ingreso" id="total_ingreso">
                        <input type="hidden" name="total_egreso" id="total_egreso">
                        <input type="hidden" name="total_deposito_i" id="total_deposito_i">
                        <input type="hidden" name="total_visanet_i" id="total_visanet_i">
                        <input type="hidden" name="saldo_caja" id="saldo_caja">
                        <input type="hidden" name="total_dinero_i" id="total_dinero_i">
                        <input type="hidden" name="total_vales" id="total_vales" value="<?php echo $total_vales;?>">
                        </form>

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

<script>
    var billetes_200;
    var billetes_100;
    var billetes_50;
    var billetes_20;
    var billetes_10;
    var billetes_5;
    var billetes_1;
    var monedas_1;
    var monedas_50;
    var monedas_25;
    var monedas_10;
    var monedas_5;

    //totales
    var total_ingresos;
    var total_egresos;
    var total_depositos;
    var total_visanet;
    var saldo_caja;
    var total_dinero;
    var total_vales;
    var total_mas_vales;

    $(document).ready(function () {
      //  $("#guardar_cierre_btn").hide();
       $("#guardar_cierre_btn").show();
    });


    $("#cierre_caja").change(function () {
        billetes_200 = $("#b_200").val();
        billetes_100 = $("#b_100").val();
        billetes_50 = $("#b_50").val();
        billetes_20 = $("#b_20").val();
        billetes_10 = $("#b_10").val();
        billetes_5 = $("#b_5").val();
        billetes_1 = $("#b_1").val();
        monedas_1 = $("#m_1").val();
        monedas_50 = $("#m_50").val();
        monedas_25 = $("#m_25").val();
        monedas_10 = $("#m_10").val();
        monedas_5 = $("#m_5").val();

        $("#nb_200").html(billetes_200);
        $("#nb_100").html(billetes_100);
        $("#nb_50").html(billetes_50);
        $("#nb_20").html(billetes_20);
        $("#nb_10").html(billetes_10);
        $("#nb_5").html(billetes_5);
        $("#nb_1").html(billetes_1);
        $("#nm_1").html(monedas_1);
        $("#nm_50").html(monedas_50);
        $("#nm_25").html(monedas_25);
        $("#nm_10").html(monedas_10);
        $("#nm_5").html(monedas_5);

        //totales
        total_billetes_200 = billetes_200 * 200;
        total_billetes_100 = billetes_100 * 100;
        total_billetes_50 = billetes_50 * 50;
        total_billetes_20 = billetes_20 * 20;
        total_billetes_10 = billetes_10 * 10;
        total_billetes_5 = billetes_5 * 5;
        total_billetes_1 = billetes_1 * 1;
        total_monedas_1 = monedas_1 * 1;
        total_monedas_50 = monedas_50 * 0.50;
        total_monedas_25 = monedas_25 * 0.25;
        total_monedas_10 = monedas_10 * 0.10;
        total_monedas_5 = monedas_5 * 0.05;

        $("#tb_200").html(total_billetes_200);
        $("#tb_100").html(total_billetes_100);
        $("#tb_50").html(total_billetes_50);
        $("#tb_20").html(total_billetes_20);
        $("#tb_10").html(total_billetes_10);
        $("#tb_5").html(total_billetes_5);
        $("#tb_1").html(total_billetes_1);
        $("#tm_1").html(total_monedas_1);
        $("#tm_50").html(total_monedas_50);
        $("#tm_25").html(total_monedas_25);
        $("#tm_10").html(total_monedas_10);
        $("#tm_5").html(total_monedas_5);

        total = total_billetes_200;
        total += total_billetes_100;
        total += total_billetes_50;
        total += total_billetes_20;
        total += total_billetes_10;
        total += total_billetes_5;
        total += total_billetes_1;
        total += total_monedas_1;
        total += total_monedas_50;
        total += total_monedas_25;
        total += total_monedas_10;
        total += total_monedas_5;
        total = parseFloat(total).toFixed(2);
        $("#total_dinero").html(total);
        $("#total_dinero_i").val(total);

        total_ingresos = parseFloat($("#total_ingresos").text()).toFixed(2);
        $("#total_ingreso").val(total_ingresos);
        console.log(total_ingresos);

        total_egresos = parseFloat($("#total_egresos").text()).toFixed(2);
        $("#total_egreso").val(total_egresos);
        console.log(total_egresos);

        total_depositos = parseFloat($("#total_deposito").text()).toFixed(2);
        $("#total_deposito_i").val(total_depositos);

        total_visanet = parseFloat($("#total_deposito").text()).toFixed(2);
        $("#total_visanet_i").val(total_visanet);

        saldo_final_caja = parseFloat($("#saldo_final_caja").text()).toFixed(2);
        $("#saldo_caja").val(saldo_final_caja);
        // console.log(saldo_final_caja);
        total_vales = parseFloat($("#total_vales").text()).toFixed(2);
        total_vales = Number(total_vales);

        console.log(total_vales);
        total_dinero = parseFloat(total).toFixed(2);
        total_dinero = Number(total_dinero);

        console.log(jQuery.type( total_vales ));
        console.log(jQuery.type( total_dinero ));

        total_mas_vales = Number(parseFloat(total_vales + total_dinero).toFixed(2));
        console.log('total mas vales '+total_mas_vales);

        diferencia = parseFloat(total_mas_vales - saldo_final_caja).toFixed(2);

        //console.log(diferencia);
        if (diferencia > -2) {
            console.log('diferencia mas que -1');
            $("#guardar_cierre_btn").show();
        } else {
          //  $("#guardar_cierre_btn").hide();
        }

        $("#diferencia_text").html(diferencia);

    });
</script>
<?php $this->stop() ?>
