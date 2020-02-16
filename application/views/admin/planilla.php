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
                $total_iggs=0;
                $total_imndemnizacion = 0;
                $total_bono_14 = 0;
                $total_aguinaldo =0;
                $total_vacaciones = 0;
                $total_cuotas_patronales =0;

                if ($empleados) { ?>
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
                            <th>Anticipo sobre sueldo</th>
                            <th>Liquido a recibir</th>
                            <th>Decuentos varios</th>
                            <th>Iggs</th>
                            <th>Total descuentos y retenciones</th>
                            <th>Sueldo Mensual</th>
                            <th>Forma de pago</th>
                            <th>INDEMNIZACIÓN 9.72%</th>
                            <th>BONO 14 8.33%</th>
                            <th>AGUINALDO 8.33%</th>
                            <th>VACACIONES 4.11%</th>
                            <th>Cuotas Patronales 12.67%</th>
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
                                    <div class="form-group">
                                        <?php

                                        $total_sueldo_base = $empleado->sueldo_base + $total_sueldo_base;?>
                                        <input type="text" name="sueldo_base<?php echo $empleado->id; ?>"
                                               value="<?php echo $empleado->sueldo_base; ?>"
                                               id="sueldo_base<?php echo $empleado->id; ?>" class=" form-control "
                                               placeholder="Sueldo base" readonly="readonly">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="bonificacion_<?php echo $empleado->id; ?>"
                                               value="<?php echo $empleado->bonificacion; ?>"
                                               id="bonificacion_<?php echo $empleado->id; ?>" class=" form-control "
                                               placeholder="Bonificacion" readonly="readonly">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="anticipo_sueldo_<?php echo $empleado->id; ?>" value=""
                                               id="anticipo_sueldo_<?php echo $empleado->id; ?>"
                                               class=" form-control anticipo_input"
                                               empleado_id="<?php echo $empleado->id; ?>"
                                               placeholder="Anticipo de sueldo"
                                               required="required">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="liquido_<?php echo $empleado->id; ?>" value=""
                                               id="liquido_<?php echo $empleado->id; ?>" class=" form-control"
                                               placeholder="Liquido a recibir" required="required">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="descuentos_varios_<?php echo $empleado->id; ?>"
                                               value=""  empleado_id="<?php echo $empleado->id; ?>"
                                               id="descuentos_varios_<?php echo $empleado->id; ?>" class=" form-control descuentos"
                                               placeholder="Descuentos varios" required="required">
                                    </div>

                                </td>
                                <td>
                                    <?php $valor_iggs = $empleado->sueldo_base * 0.0483;
                                    $total_iggs = $valor_iggs +$total_iggs;
                                    ?>
                                    <div class="form-group">
                                        <input type="text" name="iggs_<?php echo $empleado->id; ?>"
                                               value="<?php echo $valor_iggs; ?>"
                                               id="iggs_<?php echo $empleado->id; ?>" class=" form-control"
                                               placeholder="Igss" required="required">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="total_descuento_<?php echo $empleado->id; ?>"
                                               value=""
                                               id="total_descuento_<?php echo $empleado->id; ?>" class=" form-control "
                                               placeholder="Total descuentos" required="required">
                                    </div>
                                </td>
                                <td><?php echo $empleado->sueldo_base; ?></td>
                                <td><?php echo $empleado->forma_de_pago; ?></td>
                                <td>
                                    <?php $indemnizacion = (9.72 / 100)* $empleado->sueldo_base ;
                                    $total_imndemnizacion = $total_imndemnizacion + $indemnizacion;
                                    ?>
                                    <div class="form-group">
                                        <input type="text" name="indemnización_<?php echo $empleado->id; ?>"
                                               value="<?php echo $indemnizacion; ?>"
                                               id="indemnización_<?php echo $empleado->id; ?>" class=" form-control "
                                               placeholder="indemnización" required="required">
                                    </div>
                                </td>
                                <td>
                                    <?php $bono_14 = (8.33 / 100)* $empleado->sueldo_base ;
                                    $total_bono_14 = $total_bono_14 + $bono_14;
                                    ?>
                                    <div class="form-group">
                                        <input type="text" name="bono_14<?php echo $empleado->id; ?>"
                                               value="<?php echo $bono_14; ?>"
                                               id="bono_14<?php echo $empleado->id; ?>" class=" form-control "
                                               placeholder="Bono 14" required="required">
                                    </div></td>
                                <td>
                                    <?php $aguinaldo = (8.33 / 100)* $empleado->sueldo_base ;
                                    $total_aguinaldo = $total_aguinaldo +$aguinaldo;
                                    ?>
                                    <input type="text" name="aguinaldo_<?php echo $empleado->id; ?>"
                                           value="<?php echo $aguinaldo; ?>"
                                           id="aguinaldo_<?php echo $empleado->id; ?>" class=" form-control "
                                           placeholder="Aginaldo" required="required"></td>
                                <td>
                                    <?php
                                    $vacaciones = ($empleado->sueldo_base * 15)/365  ;
                                    $vacaciones = round($vacaciones,'2')  ;
                                    $total_vacaciones = $total_vacaciones + $vacaciones;

                                    ?>
                                    <input type="text" name="vacaciones_<?php echo $empleado->id; ?>"
                                           value="<?php echo $vacaciones; ?>"
                                           id="vacaciones_<?php echo $empleado->id; ?>" class=" form-control "
                                           placeholder="Vacaciones" required="required"></td>
                                <td>
                                    <?php $cuotas_patronales = ($empleado->sueldo_base * 0.1267);
                                    $total_cuotas_patronales = $total_cuotas_patronales + $cuotas_patronales;
                                    ?>
                                    <input type="text" name="cuotas_patronales<?php echo $empleado->id; ?>"
                                           value="<?php echo $cuotas_patronales; ?>"
                                           id="cuotas_patronales_<?php echo $empleado->id; ?>" class=" form-control "
                                           placeholder="Cuotas patronales" required="required"></td>
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
                            <td><?php echo $total_sueldo_base?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_iggs;?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_imndemnizacion;?></td>
                            <td><?php echo $total_bono_14;?></td>
                            <td><?php echo $total_aguinaldo;?></td>
                            <td><?php echo $total_vacaciones;?></td>
                            <td><?php echo $total_cuotas_patronales;?></td>
                        </tr>
                        </tbody>
                    </table>


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

    function calcular_liquido(empleado_id) {
        sueldo_base = 0;
        bonificacion = 0;
        anticipo_sueldo = 0;
        campo_sueldo = "#sueldo_base" + empleado_id;
        campo_bonificacion = "#bonificacion_" + empleado_id;
        campo_anticipo = "#anticipo_sueldo_" + empleado_id;
        campo_liquido = "#liquido_" + empleado_id;
        sueldo_base = parseFloat($(campo_sueldo).val());
        bonificacion = parseFloat($(campo_bonificacion).val());
        anticipo_sueldo = parseFloat($(campo_anticipo).val());
        console.log(sueldo_base);
        console.log(bonificacion);
        console.log(anticipo_sueldo);
        liquido_a_recibir = parseFloat(sueldo_base + bonificacion) - anticipo_sueldo;
        console.log(liquido_a_recibir);
        $(campo_liquido).val(liquido_a_recibir);
    }
    function calcular_total_decuentos(empleado_id){
        liquido_recibir = 0;
        descuentos = 0;
        iggs = 0;
        campo_liquido ='#anticipo_sueldo_' + empleado_id;
        campo_descuento ='#descuentos_varios_' + empleado_id;
        campo_iggs='#iggs_' + empleado_id;
        campo_total_descuento='#total_descuento_' + empleado_id;
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
        calcular_liquido(empleado_id);
    });
    $(".descuentos").change(function () {
        empleado_id = $(this).attr('empleado_id');
        calcular_total_decuentos(empleado_id);
    });

    $(document).ready(function () {
    });
</script>
<?php $this->stop() ?>
