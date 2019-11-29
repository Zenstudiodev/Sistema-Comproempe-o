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

//forma de pago
$forma_pago_select = array(
    'name' => 'forma_pago',
    'id' => 'forma_pago',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$forma_pago_options = array(
    'Normal' => 'Normal',
    '10 cuotas 1 trans' => '10 cuotas 1 trans',
    '10 cuotas varias trans' => '10 cuotas varias trans',
);
//forma de pago
$cuotas_select = array(
    'name' => 'cuotas',
    'id' => 'cuotas',
    'class' => ' browser-default form-control',
    'required' => 'required'
);
$cuotas_options = array(
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '6' => '6',
    '10' => '10',
    '12' => '12',
    '15' => '15',
    '18' => '18',
);

//iva
$iva = array(
    'type' => 'number',
    'name' => 'iva',
    'id' => 'iva',
    'class' => 'form-control pull-right',
    'placeholder' => 'Iva',
    'readonly' => 'readonly'
);
//comision
$comision = array(
    'type' => 'number',
    'name' => 'comision',
    'id' => 'comision',
    'class' => 'form-control pull-right',
    'placeholder' => 'Comisión',
    'readonly' => 'readonly'
);
//iva comision
$iva_comision = array(
    'type' => 'number',
    'name' => 'iva_comision',
    'id' => 'iva_comision',
    'class' => 'form-control pull-right',
    'placeholder' => 'Iva comisión',
    'readonly' => 'readonly'
);
//retencion iva
$retension_iva = array(
    'type' => 'number',
    'name' => 'retension_iva',
    'id' => 'retension_iva',
    'class' => 'form-control pull-right',
    'placeholder' => 'Retension Iva',
    'readonly' => 'readonly'
);
//liquido
$liquido = array(
    'type' => 'number',
    'name' => 'liquido',
    'id' => 'liquido',
    'class' => 'form-control pull-right',
    'placeholder' => 'Liquido',
    'readonly' => 'readonly'
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
                                    <label for="avaluo">Forma de pago</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo form_dropdown($forma_pago_select, $forma_pago_options); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Cuotas</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo form_dropdown($cuotas_select, $cuotas_options); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="iva">IVA.</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($iva); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Comision</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($comision); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Iva Comision</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($iva_comision); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Retención Iva</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($retension_iva); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="avaluo">Liquido</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">Q.</span>
                                        <?php echo form_input($liquido); ?>
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
<script>
    var monto;
    var cuotas;
    var iva;
    var comision;
    var tasa_comision;
    var iva_comision;
    var iva_retension;
    var liquido;
    $("#monto").change(function () {
        monto = $("#monto").val();
        cuotas = $("#cuotas option:selected").val();
        console.log(monto);
        console.log(cuotas);

        //tasa de comision
        switch (cuotas) {
            case '1':
                tasa_comision = 0.045;
                break;
            case '2':
                tasa_comision = 0.0525;
                break;
            case '3':
                tasa_comision = 0.0575;
                break;
            case '6':
                tasa_comision = 0.07;
                break;
            case '10':
                tasa_comision = 0.0725;
                break;
            case '12':
                tasa_comision = 0.08;
                break;
            case '15':
                tasa_comision = 0.1;
            case '18':
                tasa_comision = 0.12;
        }

        //iva
        iva = parseFloat((monto / 1.12)* 0.12).toFixed(2);
        console.log(iva);
        $("#iva").val(iva);
        //Comision
        comision = parseFloat((monto / 1.12)* tasa_comision).toFixed(2);
        console.log(comision);
        $("#comision").val(comision);
        //iva comision
        iva_comision = parseFloat((comision)* 0.12).toFixed(2);
        console.log(iva_comision);
        $("#iva_comision").val(iva_comision);
        //iva retension
        iva_retension = parseFloat((iva)* 0.15).toFixed(2);
        console.log(iva_retension);
        $("#retension_iva").val(iva_retension);
        //liquido
        liquido = parseFloat(monto - comision - iva_comision -iva_retension ).toFixed(2);
        console.log(liquido);
        $("#liquido").val(liquido);
    });
</script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<?php $this->stop() ?>