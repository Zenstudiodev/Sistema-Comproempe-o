<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/05/2018
 * Time: 12:38 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario
$detalle = array(
    'type' => 'text',
    'name' => 'datalle',
    'id' => 'detalle',
    'class' => 'form-control pull-right',
    'placeholder' => 'Detalle de gasto',
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

//tipo de documento
$tipo_documento_select         = array(
    'name'     => 'tipo_documento',
    'id'       => 'tipo_documento',
    'class'    => ' form-control',
    'required' => 'required'
);
$tipo_documento_select_options = array(
    "Factura"   => "Factura",
    "Factura electrónica"   => "Factura electrónica",
    "Factura pequeño contribuyente"   => "Factura pequeño contribuyente",
);

$serie = array(
    'type' => 'text',
    'name' => 'serie',
    'id' => 'serie',
    'class' => 'form-control pull-right',
    'placeholder' => 'Serie',
    'required' => 'required'
);
$no_doc = array(
    'type' => 'text',
    'name' => 'no_doc',
    'id' => 'no_doc',
    'class' => 'form-control pull-right',
    'placeholder' => 'No. Documento',
    'required' => 'required'
);

$nit = array(
    'type' => 'text',
    'name' => 'nit',
    'id' => 'nit',
    'class' => 'form-control pull-right',
    'placeholder' => 'NIT',
    'required' => 'required'
);
$razon_social = array(
    'type' => 'text',
    'name' => 'razon_social',
    'id' => 'razon_social',
    'class' => 'form-control pull-right',
    'placeholder' => 'Razon Social',
    'required' => 'required'
);
//tipo de compra
$tipo_compra_select         = array(
    'name'     => 'tipo_compra',
    'id'       => 'tipo_compra',
    'class'    => ' form-control',
    'required' => 'required'
);
$tipo_compra_select_options = array(
    "Compra mercaderia"   => "Compra mercaderia",
    "Servicios"   => "Servicios",
    "Gasolina"   => "Gasolina",
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
                Ingreso otros gastos
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <form id="ingresar_deposito" method="post" action="<?php echo base_url() . 'caja/guardar_otros_gastos' ?>">
                    <div class="box-header">
                        Ingreso de otros gastos del día - <?php $hoy = New DateTime();
                        echo $hoy->format('Y-m-d') ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="avaluo">Tipo de documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_dropdown($tipo_documento_select, $tipo_documento_select_options); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Serie</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">.</span>
                                        <?php echo form_input($serie); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">No. Documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input($no_doc); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">NIT</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input($nit); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avaluo">Razón Social</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">-</span>
                                        <?php echo form_input ($razon_social); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="avaluo">Tipo de compra</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_dropdown($tipo_compra_select, $tipo_compra_select_options); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avaluo">Detalle</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">#</span>
                                        <?php echo form_input ($detalle); ?>
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
                    $total_otros_gastos = 0;
                    if ($otros_gastos) {

                        ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Detalle</th>
                                <th>Monto</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($otros_gastos->result() as $gasto) {
                                $total_otros_gastos = $total_otros_gastos + $gasto->monto;
                                ?>
                                <tr>
                                    <td><?php echo $gasto->detalle ?></td>
                                    <td><?php echo display_formato_dinero($gasto->monto); ?></td>
                                </tr>
                                <?php
                            } ?>
                            <tr>
                                <td colspan="1">Total</td>
                                <td id="totaL_ingresos"><?php echo display_formato_dinero($total_otros_gastos); ?></td>
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