<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 11/10/2019
 * Time: 09:21 AM
 */


$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

//aniticipo
$anticipo_sueldo = array(
    'type' => 'text',
    'name' => 'anticipo_sueldo',
    'id' => 'anticipo_sueldo',
    'class' => ' form-control',
    'placeholder' => 'Anticipo de sueldo',
    //'value'       => $carro->id_carro,
    'required' => 'required'
    //'disabled'    => 'disabled'
);

//liquido
$liquido = array(
    'type' => 'text',
    'name' => 'liquido',
    'id' => 'liquido',
    'class' => ' form-control',
    'placeholder' => 'Liquido a recibir',
    //'value'       => $carro->id_carro,
    'required' => 'required'
    //'disabled'    => 'disabled'
);

$ci =& get_instance();

$hoy = New DateTime();

?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Planilla -
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                Pago de planilla
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $total_sueldo_base = 0;
                $total_bonificacion = 0;
                $total_iggs = 0;
                $total_imndemnizacion = 0;
                $total_bono_14 = 0;
                $total_aguinaldo = 0;
                $total_vacaciones = 0;
                $total_irtra = 0;
                $total_intecap = 0;
                $total_cuotas_patronales = 0;
                $total_total_cuotas_patronales = 0;

                if ($empleados) { ?>
                    <form action="<?php echo base_url() ?>reportes/guardar_planilla" method="post">


                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Codigo Empleado</th>
                                    <th>Nombre</th>
                                    <th>DPI</th>
                                    <th>NIT</th>
                                    <th>Puesto</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Dias Trabajados</th>
                                    <th>Sueldo Base</th>
                                    <th>Bonificación</th>
                                    <th>Bonificación Incentivo</th>
                                    <th>Sueldo Mensual</th>
                                    <th>Anticipo sobre sueldo</th>
                                    <th>Sueldo por pagar</th>
                                    <th>Decuentos varios</th>
                                    <th>Iggs</th>
                                    <th>Total descuentos y retenciones</th>
                                    <th>Forma de pago</th>
                                    <th>Cuota Irtra</th>
                                    <th>Cuota intecap</th>
                                    <th>Cuota Patronales 10.67%</th>
                                    <th>Total Patronales 12.67%</th>
                                    <th>INDEMNIZACIÓN 9.72%</th>
                                    <th>BONO 14 8.33%</th>
                                    <th>AGUINALDO 8.33%</th>
                                    <th>VACACIONES 4.11%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($empleados->result() as $empleado) {
                                    //print_contenido($empleado);
                                    if ($empleado->fecha_ingreso != '0000-00-00') {
                                        $fecha_ingreso = New DateTime($empleado->fecha_ingreso);
                                        $dias_trabajados = $fecha_ingreso->diff($hoy);
                                        $dias_trabajados = $dias_trabajados->format('%a días');
                                    } else {
                                        $dias_trabajados = '0';
                                    }

                                    ?>
                                    <tr>
                                        <td><?php echo $empleado->id; ?></td>
                                        <td><?php echo $empleado->nombre; ?></td>
                                        <td><?php echo $empleado->dpi; ?></td>
                                        <td><?php echo $empleado->nit; ?></td>
                                        <td><?php echo $empleado->rol; ?></td>
                                        <td><?php echo $empleado->fecha_ingreso; ?></td>
                                        <td><?php echo $dias_trabajados; ?></td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">
                                                <?php
                                                $total_sueldo_base = $empleado->sueldo_base + $total_sueldo_base; ?>
                                                <input type="text" name="sueldo_base_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $empleado->sueldo_base; ?>"
                                                       id="sueldo_base<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Sueldo base" readonly="readonly">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                $total_bonificacion = $empleado->bonificacion + $total_bonificacion; ?>
                                                <input type="text" name="bonificacion_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $empleado->bonificacion; ?>"
                                                       id="bonificacion_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Bonificacion" readonly="readonly">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number"
                                                       name="bonificacion_incentivo_<?php echo $empleado->id; ?>"
                                                       value="0"
                                                       id="bonificacion_incentivo_<?php echo $empleado->id; ?>"
                                                       class=" form-control bonificacion_incentivo"
                                                       placeholder="Bonificacion Incentivo">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">

                                                <input type="text" name="sueldo_mensual_<?php echo $empleado->id; ?>"
                                                       value="0"
                                                       empleado_id="<?php echo $empleado->id; ?>"
                                                       id="sueldo_mensual_<?php echo $empleado->id; ?>"
                                                       class=" form-control sueldo_mensual"
                                                       placeholder="Sueldo mensual"
                                                >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="anticipo_sueldo_<?php echo $empleado->id; ?>"
                                                       value="0"
                                                       id="anticipo_sueldo_<?php echo $empleado->id; ?>"
                                                       class=" form-control anticipo_input"
                                                       empleado_id="<?php echo $empleado->id; ?>"
                                                       placeholder="Anticipo de sueldo"
                                                       required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="sueldo_por_pagar_<?php echo $empleado->id; ?>"
                                                       empleado_id="<?php echo $empleado->id; ?>"
                                                       value="0" id="sueldo_por_pagar_<?php echo $empleado->id; ?>"
                                                       class=" form-control sueldo_por_pagar"
                                                       placeholder="Liquido a recibir" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="descuentos_varios_<?php echo $empleado->id; ?>"
                                                       value="0" empleado_id="<?php echo $empleado->id; ?>"
                                                       id="descuentos_varios_<?php echo $empleado->id; ?>"
                                                       class=" form-control descuentos"
                                                       placeholder="Descuentos varios" required="required">
                                            </div>

                                        </td>
                                        <td>
                                            <?php $valor_iggs = $empleado->sueldo_base * 0.0483;
                                            $valor_iggs = round($valor_iggs, '2');
                                            $total_iggs = $valor_iggs + $total_iggs;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="iggs_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $valor_iggs; ?>"
                                                       id="iggs_<?php echo $empleado->id; ?>" class=" form-control"
                                                       placeholder="Igss" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="total_descuento_<?php echo $empleado->id; ?>"
                                                       value="0"
                                                       id="total_descuento_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Total descuentos" required="required">
                                            </div>
                                        </td>
                                        <td><?php echo $empleado->forma_de_pago; ?></td>
                                        <td>
                                            <?php $cuotas_irtra = ($empleado->sueldo_base * 0.01);
                                            $cuotas_irtra = round($cuotas_irtra, '2');
                                            $total_irtra = $total_irtra + $cuotas_irtra;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="cuotas_irtra_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $cuotas_irtra; ?>"
                                                       id="cuotas_irtra_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Cuotas patronales" required="required">
                                            </div>

                                        </td>
                                        <td> <?php $cuotas_intecap = ($empleado->sueldo_base * 0.01);
                                            $cuotas_intecap = round($cuotas_irtra, '2');
                                            $total_intecap = $total_intecap + $cuotas_intecap;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="cuotas_intecap_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $cuotas_intecap; ?>"
                                                       id="cuotas_intecap_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Cuotas patronales" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php $cuotas_patronales = ($empleado->sueldo_base * 0.1067);
                                            $cuotas_patronales = round($cuotas_patronales, '2');
                                            $total_cuotas_patronales = $total_cuotas_patronales + $cuotas_patronales;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="cuotas_patronales_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $cuotas_patronales; ?>"
                                                       id="cuotas_patronales_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Cuotas patronales" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php $total_patronal = $valor_iggs + $cuotas_patronales + $cuotas_intecap + $cuotas_irtra;
                                            $total_total_cuotas_patronales = $total_total_cuotas_patronales + $total_patronal;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text"
                                                       name="total_cuotas_patronales_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $total_patronal; ?>"
                                                       id="total_cuotas_patronales_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Cuotas patronales" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php $indemnizacion = (9.72 / 100) * $empleado->sueldo_base;
                                            $indemnizacion = round($indemnizacion, '2');
                                            $total_imndemnizacion = $total_imndemnizacion + $indemnizacion;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="indemnización_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $indemnizacion; ?>"
                                                       id="indemnización_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="indemnización" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php $bono_14 = (8.33 / 100) * $empleado->sueldo_base;
                                            $bono_14 = round($bono_14, '2');
                                            $total_bono_14 = $total_bono_14 + $bono_14;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="bono_14_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $bono_14; ?>"
                                                       id="bono_14_<?php echo $empleado->id; ?>" class=" form-control "
                                                       placeholder="Bono 14" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php $aguinaldo = (8.33 / 100) * $empleado->sueldo_base;
                                            $aguinaldo = round($aguinaldo, '2');
                                            $total_aguinaldo = $total_aguinaldo + $aguinaldo;
                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="aguinaldo_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $aguinaldo; ?>"
                                                       id="aguinaldo_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Aginaldo" required="required">
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $vacaciones = ($empleado->sueldo_base * 15) / 365;
                                            $vacaciones = round($vacaciones, '2');
                                            $total_vacaciones = $total_vacaciones + $vacaciones;

                                            ?>
                                            <div class="form-group" style="width: 80px;">
                                                <input type="text" name="vacaciones_<?php echo $empleado->id; ?>"
                                                       value="<?php echo $vacaciones; ?>"
                                                       id="vacaciones_<?php echo $empleado->id; ?>"
                                                       class=" form-control "
                                                       placeholder="Vacaciones" required="required">
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="total_sueldo_base"
                                               value="<?php echo $total_sueldo_base ?>"
                                               id="total_sueldo_base"
                                               class=" form-control"
                                               placeholder="Total sueldo base" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_bonificacion"
                                               value="<?php echo $total_bonificacion ?>"
                                               id="total_bonificacion"
                                               class=" form-control"
                                               placeholder="Bonificación inventivo" readonly="readonly">

                                    </td>
                                    <td>
                                        <input type="text" name="total_bonificacion_incentivo"
                                               value="0"
                                               id="total_bonificacion_incentivo"
                                               class=" form-control"
                                               placeholder="Bonificación inventivo" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_sueldo_mensual"
                                               value="0"
                                               id="total_sueldo_mensual"
                                               class=" form-control"
                                               placeholder="Sueldo mensual" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_anticipo_sueldo"
                                               value="0"
                                               id="total_anticipo_sueldo"
                                               class=" form-control"
                                               placeholder="Anticipo" readonly="readonly">
                                    </td>
                                    <td><input type="text" name="total_sueldo_por_pagar"
                                               value="0"
                                               id="total_sueldo_por_pagar"
                                               class=" form-control"
                                               placeholder="Sueldo mensual" readonly="readonly"></td>
                                    <td>
                                        <input type="text" name="total_descuentos_varios"
                                               value="0"
                                               id="total_descuentos_varios"
                                               class=" form-control"
                                               placeholder="Sueldo mensual" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_igss"
                                               value="<?php echo $total_iggs; ?>"
                                               id="total_igss"
                                               class=" form-control"
                                               placeholder="Sueldo mensual" readonly="readonly">
                                        </td>
                                    <td>
                                        <input type="text" name="total_descuentos_retenciones"
                                               value="0"
                                               id="total_descuentos_retenciones"
                                               class=" form-control"
                                               placeholder="Sueldo mensual" readonly="readonly">
                                    </td>

                                    <td></td>
                                    <td>
                                        <input type="text" name="total_cuota_irtra"
                                               value="<?php echo $total_irtra ?>"
                                               id="total_cuota_irtra"
                                               class=" form-control"
                                               placeholder="Irtra" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_cuota_intecap"
                                               value="<?php echo $total_irtra ?>"
                                               id="total_cuota_intecap"
                                               class=" form-control"
                                               placeholder="Intecap" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_cuotas_patronales"
                                               value="<?php echo $total_cuotas_patronales ?>"
                                               id="total_cuotas_patronales"
                                               class=" form-control"
                                               placeholder="Intecap" readonly="readonly">
                                    </td>

                                    <td>
                                        <input type="text" name="total_total_cuotas_patronales"
                                               value="<?php echo $total_total_cuotas_patronales ?>"
                                               id="total_total_cuotas_patronales"
                                               class=" form-control"
                                               placeholder="Intecap" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_indemnizacion"
                                               value="<?php echo $total_imndemnizacion ?>"
                                               id="total_indemnizacion"
                                               class=" form-control"
                                               placeholder="Indemnizacion" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_bono_14"
                                               value="<?php echo $total_bono_14 ?>"
                                               id="total_bono_14"
                                               class=" form-control"
                                               placeholder="Bono 14" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_aguinaldo"
                                               value="<?php echo $total_aguinaldo ?>"
                                               id="total_aguinaldo"
                                               class=" form-control"
                                               placeholder="Aguinaldo" readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" name="total_vacaciones"
                                               value="<?php echo $total_vacaciones ?>"
                                               id="total_vacaciones"
                                               class=" form-control"
                                               placeholder="Vacaciones" readonly="readonly">

                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    $hoy = New DateTime();
                                    //$hoy->modify('-9 days');
                                    $hoy = $hoy->format('d');
                                    echo $hoy;
                                    echo '<br>';
                                    ?>
                                    <?php if ($hoy <= '15') { ?>
                                        <button class="btn btn-primary" type="submit">Guardar planilla quincena</button>
                                        <?php
                                    } else { ?>
                                        <button class="btn btn-primary">Guardar planilla fin de mes</button>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                    </form>
                <?php } ?>
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

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    var anticipo_sueldo;


    function total_sueldo_mensual() {

        var total_sueldo = 0;

        $(".sueldo_mensual").each(function () {
            // console.log($(this).attr('empleado_id'));
            calcular_sueldo_mensual($(this).attr('empleado_id'));
            // console.log($( this ).val());
            sueldo_mensual_val = parseFloat($(this).val());
            //console.log(sueldo_mensual_val);
            total_sueldo = parseFloat(total_sueldo + sueldo_mensual_val);
        });

        $("#total_sueldo_mensual").val(total_sueldo);

    }
    function calcular_sueldo_mensual(empleado_id) {
        sueldo_base = 0;
        bonificacion = 0;
        bonificacion_incentivo = 0;
        campo_sueldo = "#sueldo_base" + empleado_id;
        campo_bonificacion = "#bonificacion_" + empleado_id;
        campo_bonificacion_incentivo = "#bonificacion_incentivo_" + empleado_id;
        campo_sueldo_mensual = "#sueldo_mensual" + empleado_id;
        sueldo_base = parseFloat($(campo_sueldo).val());
        bonificacion = parseFloat($(campo_bonificacion).val());
        bonificacion_incentivo = parseFloat($(campo_bonificacion_incentivo).val());

        // console.log(sueldo_base);
        //console.log(bonificacion);
        //console.log(bonificacion_incentivo);
        sueldo_mensual = parseFloat(sueldo_base + bonificacion + bonificacion_incentivo);
        if (sueldo_base == '0') {

        } else {
            $(campo_sueldo_mensual).val(sueldo_mensual);
        }
        //console.log(sueldo_mensual);

    }
    function total_anticipo_sueldo() {

        var total_anticipo_sueldo = 0;

        $(".anticipo_input").each(function () {
            //console.log($(this).val());
            anticipo_sueldo_val = parseFloat($(this).val());
            //console.log('anticipo'+anticipo_sueldo_val);
            total_anticipo_sueldo = parseFloat(total_anticipo_sueldo + anticipo_sueldo_val);
        });

        $("#total_anticipo_sueldo").val(total_anticipo_sueldo);

    }
    function total_bonificacion_incentivo() {

        var total_bonificacion_incentivo = 0;

        $(".bonificacion_incentivo").each(function () {
            //console.log($(this).val());
            bonificacion_incentivo_val = parseFloat($(this).val());
            //console.log('anticipo'+anticipo_sueldo_val);
            total_bonificacion_incentivo = parseFloat(total_bonificacion_incentivo + bonificacion_incentivo_val);
        });

        $("#total_bonificacion_incentivo").val(total_bonificacion_incentivo);

    }
    function total_descuento_varios(){
        var total_descuentos_varios = 0;

        $(".descuentos").each(function () {
            //console.log($(this).val());
            descuento_val = parseFloat($(this).val());
            //console.log('anticipo'+anticipo_sueldo_val);
            total_descuentos_varios = parseFloat(total_descuentos_varios + descuento_val);
        });

        $("#total_descuentos_varios").val(total_descuentos_varios);
    }


    $(".bonificacion_incentivo").change(function () {
        total_bonificacion_incentivo();
        total_sueldo_mensual();
        total_sueldo_por_pagar();
    });
    $(".sueldo_mensual").change(function () {
        total_sueldo_mensual();
        total_sueldo_por_pagar();
    });
    $(".anticipo_input").change(function () {
        total_sueldo_por_pagar();
        total_anticipo_sueldo();
    });


    function total_sueldo_por_pagar() {

        var total_sueldo_por_pagar = 0;

        $(".sueldo_por_pagar").each(function () {
            //console.log($(this).attr('empleado_id'));
            calcular_sueldo_por_pagar($(this).attr('empleado_id'));
            //console.log($(this).val());
            sueldo_mensual_val = parseFloat($(this).val());
            // console.log(sueldo_mensual_val);
            total_sueldo_por_pagar = parseFloat(total_sueldo_por_pagar + sueldo_mensual_val);
        });

        $("#total_sueldo_por_pagar").val(total_sueldo_por_pagar);

    }
    function calcular_sueldo_por_pagar(empleado_id) {
        sueldo_base = 0;
        anticipo_sueldo = 0;
        campo_sueldo = "#sueldo_base_" + empleado_id;
        campo_anticipo = "#anticipo_sueldo_" + empleado_id;
        campo_sueldo_por_pagar = "#sueldo_por_pagar_" + empleado_id;
        sueldo_base = parseFloat($(campo_sueldo).val());
        anticipo_sueldo = parseFloat($(campo_anticipo).val());
        // console.log(sueldo_base);
        // console.log(bonificacion);
        //console.log(anticipo_sueldo);
        sueldo_por_pagar = parseFloat(sueldo_mensual) - anticipo_sueldo;
        console.log(sueldo_por_pagar);
        $(campo_sueldo_por_pagar).val(sueldo_por_pagar);
    }
    function calcular_total_decuentos(empleado_id) {
        liquido_recibir = 0;
        descuentos = 0;
        iggs = 0;
        campo_liquido = '#anticipo_sueldo_' + empleado_id;
        campo_descuento = '#descuentos_varios_' + empleado_id;
        campo_iggs = '#iggs_' + empleado_id;
        campo_total_descuento = '#total_descuento_' + empleado_id;
        liquido_recibir = parseFloat($(campo_liquido).val());
        descuentos = parseFloat($(campo_descuento).val());
        iggs = parseFloat($(campo_iggs).val());
        console.log(liquido_recibir);
        console.log(descuentos);
        console.log(iggs);
        total_descuentos = parseFloat(liquido_recibir + descuentos + iggs).toFixed(2);
        console.log(total_descuentos);
        $(campo_total_descuento).val(total_descuentos);


    }

    $(".anticipo_input").change(function () {
        empleado_id = $(this).attr('empleado_id');
        calcular_sueldo_por_pagar(empleado_id);
    });
    $(".descuentos").change(function () {
        empleado_id = $(this).attr('empleado_id');
        calcular_total_decuentos(empleado_id);
        total_descuento_varios();
    });
    $(document).ready(function () {
        total_sueldo_mensual();
        total_sueldo_por_pagar();
    });
</script>
<?php $this->stop() ?>
