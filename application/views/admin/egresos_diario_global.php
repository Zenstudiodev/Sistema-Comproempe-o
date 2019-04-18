<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 08/03/2019
 * Time: 04:46 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$ci =& get_instance();
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
            Egresos diarios -
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                Movimiento diario
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Date range -->
                <div class="form-group">
                    <label>Rango de fechas:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="rango_movimiento">
                    </div>
                    <!-- /.input group -->
                </div>
                <?php
                if (isset($from)) {
                    //fecha de inicio
                    $fecha_inicio = New DateTime($from);
                    $fecha_inicio_t = New DateTime($from);
                    //fecha final
                    $fecha_final = New DateTime($to);
                } else {

                    $fecha = New DateTime();
                    $mes = $fecha->format('m');
                    $year = $fecha->format('Y');
                    $inicio_mes = $year . '-' . $mes . '-' . '01';
                    $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                    $fecha_inicio = new  DateTime($inicio_mes);
                    $fecha_inicio_t = new  DateTime($inicio_mes);
                    $fecha_final = New DateTime($fin_mes);
                    $from = $fecha_inicio->format('Y-m-d');
                    $to = $fecha_final->format('Y-m-d');
                }

                //diferencia de dias
                $diferencia = $fecha_inicio->diff($fecha_final);
                //echo $diferencia->format('%a días');
                //pasmos el dato de diferencia a numero
                $diferencia_numero = $diferencia->format('%a');
                //ajustamos para cubrir todos los dias
                $diferencia_numero = $diferencia_numero + 1;
                //echo $diferencia_numero;

                ?>
                <!-- /.form group -->
                <div class="row">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Egresos diarios <a class="btn btn-success" target="_blank"
                                                                     href="<?php echo base_url() . 'Reportes/egresos_diarios_global_excel/' . $from . '/' . $to; ?>">Exportar</a>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                               aria-expanded="false" class="collapsed">
                                                Centra Sur
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                                         style="height: 0px;">
                                        <div class="box-body">

                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Día</th>
                                                                <th colspan="7"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_monto_periodo = 0;
                                                            $total_intereses_periodo = 0;
                                                            $total_refendado_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                    </td>
                                                                    <td colspan="7">
                                                                        <?php
                                                                        // Loop del dia
                                                                        $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '1');
                                                                        if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                //echo $i.'<br>';
                                                                //modificamos puntero despues de ejecucion
                                                                $i = $i + 1;
                                                                //modificamos fecha despues de ejecucion
                                                                $fecha_inicio->modify('+1 day');
                                                            } while ($i < $diferencia_numero);

                                                            ?>
                                                            <tr>
                                                                <td>totales</td>
                                                                <th>monto</th>
                                                                <th>intereses</th>
                                                                <th>monto refrendo</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                                <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                                <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-danger">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                               class="collapsed" aria-expanded="false">
                                                Tienda 2
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                         style="height: 0px;">
                                        <div class="box-body">
                                            <?php
                                            if (isset($from)) {
                                                //fecha de inicio
                                                $fecha_inicio = New DateTime($from);
                                                $fecha_inicio_t = New DateTime($from);
                                                //fecha final
                                                $fecha_final = New DateTime($to);
                                            } else {
                                                $fecha = New DateTime();
                                                $mes = $fecha->format('m');
                                                $year = $fecha->format('Y');
                                                $inicio_mes = $year . '-' . $mes . '-' . '01';
                                                $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                                $fecha_inicio = new  DateTime($inicio_mes);
                                                $fecha_inicio_t = new  DateTime($inicio_mes);
                                                $fecha_final = New DateTime($fin_mes);
                                            }

                                            //diferencia de dias
                                            $diferencia = $fecha_inicio->diff($fecha_final);
                                            //echo $diferencia->format('%a días');
                                            //pasmos el dato de diferencia a numero
                                            $diferencia_numero = $diferencia->format('%a');
                                            //ajustamos para cubrir todos los dias
                                            $diferencia_numero = $diferencia_numero + 1;
                                            //echo $diferencia_numero;

                                            ?>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Día</th>
                                                            <th colspan="7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0; //delcaramos el puntero

                                                        //definimos los totales globales
                                                        $total_monto_periodo = 0;
                                                        $total_intereses_periodo = 0;
                                                        $total_refendado_periodo = 0;
                                                        do {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                </td>
                                                                <td colspan="7">
                                                                    <?php
                                                                    // Loop del dia
                                                                    $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            //echo $i.'<br>';
                                                            //modificamos puntero despues de ejecucion
                                                            $i = $i + 1;
                                                            //modificamos fecha despues de ejecucion
                                                            $fecha_inicio->modify('+1 day');
                                                        } while ($i < $diferencia_numero);

                                                        ?>
                                                        <tr>
                                                            <td>totales</td>
                                                            <th>monto</th>
                                                            <th>intereses</th>
                                                            <th>monto refrendo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                <br>
                                                                a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                            </td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                               class="" aria-expanded="false">
                                                Metro Norte
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false"
                                         style="">
                                        <div class="box-body">
                                            <?php
                                            if (isset($from)) {
                                                //fecha de inicio
                                                $fecha_inicio = New DateTime($from);
                                                $fecha_inicio_t = New DateTime($from);
                                                //fecha final
                                                $fecha_final = New DateTime($to);
                                            } else {
                                                $fecha = New DateTime();
                                                $mes = $fecha->format('m');
                                                $year = $fecha->format('Y');
                                                $inicio_mes = $year . '-' . $mes . '-' . '01';
                                                $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                                $fecha_inicio = new  DateTime($inicio_mes);
                                                $fecha_inicio_t = new  DateTime($inicio_mes);
                                                $fecha_final = New DateTime($fin_mes);
                                            }

                                            //diferencia de dias
                                            $diferencia = $fecha_inicio->diff($fecha_final);
                                            //echo $diferencia->format('%a días');
                                            //pasmos el dato de diferencia a numero
                                            $diferencia_numero = $diferencia->format('%a');
                                            //ajustamos para cubrir todos los dias
                                            $diferencia_numero = $diferencia_numero + 1;
                                            //echo $diferencia_numero;

                                            ?>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Día</th>
                                                            <th colspan="7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0; //delcaramos el puntero

                                                        //definimos los totales globales
                                                        $total_monto_periodo = 0;
                                                        $total_intereses_periodo = 0;
                                                        $total_refendado_periodo = 0;
                                                        do {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                </td>
                                                                <td colspan="7">
                                                                    <?php
                                                                    // Loop del dia
                                                                    $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            //echo $i.'<br>';
                                                            //modificamos puntero despues de ejecucion
                                                            $i = $i + 1;
                                                            //modificamos fecha despues de ejecucion
                                                            $fecha_inicio->modify('+1 day');
                                                        } while ($i < $diferencia_numero);

                                                        ?>
                                                        <tr>
                                                            <td>totales</td>
                                                            <th>monto</th>
                                                            <th>intereses</th>
                                                            <th>monto refrendo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                <br>
                                                                a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                            </td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-info">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                               class="" aria-expanded="false">
                                                Antigua
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse " aria-expanded="false"
                                         style="">
                                        <div class="box-body">
                                            <?php
                                            if (isset($from)) {
                                                //fecha de inicio
                                                $fecha_inicio = New DateTime($from);
                                                $fecha_inicio_t = New DateTime($from);
                                                //fecha final
                                                $fecha_final = New DateTime($to);
                                            } else {
                                                $fecha = New DateTime();
                                                $mes = $fecha->format('m');
                                                $year = $fecha->format('Y');
                                                $inicio_mes = $year . '-' . $mes . '-' . '01';
                                                $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                                $fecha_inicio = new  DateTime($inicio_mes);
                                                $fecha_inicio_t = new  DateTime($inicio_mes);
                                                $fecha_final = New DateTime($fin_mes);
                                            }

                                            //diferencia de dias
                                            $diferencia = $fecha_inicio->diff($fecha_final);
                                            //echo $diferencia->format('%a días');
                                            //pasmos el dato de diferencia a numero
                                            $diferencia_numero = $diferencia->format('%a');
                                            //ajustamos para cubrir todos los dias
                                            $diferencia_numero = $diferencia_numero + 1;
                                            //echo $diferencia_numero;

                                            ?>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Día</th>
                                                            <th colspan="7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0; //delcaramos el puntero

                                                        //definimos los totales globales
                                                        $total_monto_periodo = 0;
                                                        $total_intereses_periodo = 0;
                                                        $total_refendado_periodo = 0;
                                                        do {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                </td>
                                                                <td colspan="7">
                                                                    <?php
                                                                    // Loop del dia
                                                                    $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            //echo $i.'<br>';
                                                            //modificamos puntero despues de ejecucion
                                                            $i = $i + 1;
                                                            //modificamos fecha despues de ejecucion
                                                            $fecha_inicio->modify('+1 day');
                                                        } while ($i < $diferencia_numero);

                                                        ?>
                                                        <tr>
                                                            <td>totales</td>
                                                            <th>monto</th>
                                                            <th>intereses</th>
                                                            <th>monto refrendo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                <br>
                                                                a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                            </td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-warning">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                               class="" aria-expanded="false">
                                                Mixco
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse " aria-expanded="false"
                                         style="">
                                        <div class="box-body">
                                            <?php
                                            if (isset($from)) {
                                                //fecha de inicio
                                                $fecha_inicio = New DateTime($from);
                                                $fecha_inicio_t = New DateTime($from);
                                                //fecha final
                                                $fecha_final = New DateTime($to);
                                            } else {
                                                $fecha = New DateTime();
                                                $mes = $fecha->format('m');
                                                $year = $fecha->format('Y');
                                                $inicio_mes = $year . '-' . $mes . '-' . '01';
                                                $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                                $fecha_inicio = new  DateTime($inicio_mes);
                                                $fecha_inicio_t = new  DateTime($inicio_mes);
                                                $fecha_final = New DateTime($fin_mes);
                                            }

                                            //diferencia de dias
                                            $diferencia = $fecha_inicio->diff($fecha_final);
                                            //echo $diferencia->format('%a días');
                                            //pasmos el dato de diferencia a numero
                                            $diferencia_numero = $diferencia->format('%a');
                                            //ajustamos para cubrir todos los dias
                                            $diferencia_numero = $diferencia_numero + 1;
                                            //echo $diferencia_numero;

                                            ?>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Día</th>
                                                            <th colspan="7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0; //delcaramos el puntero

                                                        //definimos los totales globales
                                                        $total_monto_periodo = 0;
                                                        $total_intereses_periodo = 0;
                                                        $total_refendado_periodo = 0;
                                                        do {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                </td>
                                                                <td colspan="7">
                                                                    <?php
                                                                    // Loop del dia
                                                                    $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            //echo $i.'<br>';
                                                            //modificamos puntero despues de ejecucion
                                                            $i = $i + 1;
                                                            //modificamos fecha despues de ejecucion
                                                            $fecha_inicio->modify('+1 day');
                                                        } while ($i < $diferencia_numero);

                                                        ?>
                                                        <tr>
                                                            <td>totales</td>
                                                            <th>monto</th>
                                                            <th>intereses</th>
                                                            <th>monto refrendo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                <br>
                                                                a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                            </td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-warning">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                               class="" aria-expanded="false">
                                                Villa Nueva
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse " aria-expanded="false"
                                         style="">
                                        <div class="box-body">
                                            <?php
                                            if (isset($from)) {
                                                //fecha de inicio
                                                $fecha_inicio = New DateTime($from);
                                                $fecha_inicio_t = New DateTime($from);
                                                //fecha final
                                                $fecha_final = New DateTime($to);
                                            } else {
                                                $fecha = New DateTime();
                                                $mes = $fecha->format('m');
                                                $year = $fecha->format('Y');
                                                $inicio_mes = $year . '-' . $mes . '-' . '01';
                                                $fin_mes = $year . '-' . $mes . '-' . days_in_month($mes, $year);
                                                $fecha_inicio = new  DateTime($inicio_mes);
                                                $fecha_inicio_t = new  DateTime($inicio_mes);
                                                $fecha_final = New DateTime($fin_mes);
                                            }

                                            //diferencia de dias
                                            $diferencia = $fecha_inicio->diff($fecha_final);
                                            //echo $diferencia->format('%a días');
                                            //pasmos el dato de diferencia a numero
                                            $diferencia_numero = $diferencia->format('%a');
                                            //ajustamos para cubrir todos los dias
                                            $diferencia_numero = $diferencia_numero + 1;
                                            //echo $diferencia_numero;

                                            ?>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Día</th>
                                                            <th colspan="7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 0; //delcaramos el puntero

                                                        //definimos los totales globales
                                                        $total_monto_periodo = 0;
                                                        $total_intereses_periodo = 0;
                                                        $total_refendado_periodo = 0;
                                                        do {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $fecha_inicio->format('Y-m-d'); ?></td>
                                                                </td>
                                                                <td colspan="7">
                                                                    <?php
                                                                    // Loop del dia
                                                                    $egresos_dia = $ci->Caja_model->get_egresos_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    if ($egresos_dia) { ?>
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>tipo</th>
                                                                                <th>contrato</th>
                                                                                <th>Intereses</th>
                                                                                <th>dias</th>
                                                                                <th>monto</th>
                                                                                <th>monto refrendo</th>
                                                                                <th>detalle</th>
                                                                            </tr>
                                                                            <?php
                                                                            foreach ($egresos_dia->result() as $egreso) {
                                                                                ?>

                                                                                <tr>
                                                                                    <td><?php echo $egreso->tipo ?></td>
                                                                                    <td><?php echo $egreso->contrato_id ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->intereses;
                                                                                        $total_intereses_periodo = $total_intereses_periodo + $egreso->intereses;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->dias ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto;
                                                                                        $total_monto_periodo = $total_monto_periodo + $egreso->monto;
                                                                                        ?></td>
                                                                                    <td><?php
                                                                                        echo $egreso->monto_refrendo;
                                                                                        $total_refendado_periodo = $total_refendado_periodo + $egreso->monto_refrendo;
                                                                                        ?></td>
                                                                                    <td><?php echo $egreso->detalle ?></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </table>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            //echo $i.'<br>';
                                                            //modificamos puntero despues de ejecucion
                                                            $i = $i + 1;
                                                            //modificamos fecha despues de ejecucion
                                                            $fecha_inicio->modify('+1 day');
                                                        } while ($i < $diferencia_numero);

                                                        ?>
                                                        <tr>
                                                            <td>totales</td>
                                                            <th>monto</th>
                                                            <th>intereses</th>
                                                            <th>monto refrendo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                <br>
                                                                a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                            </td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_monto_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_intereses_periodo); ?></td>
                                                            <td><?php echo 'Q.' . formato_dinero($total_refendado_periodo); ?></td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
    $(document).ready(function () {
        //Date range picker
        $('#rango_movimiento').daterangepicker();
    });

    $('#rango_movimiento').on('apply.daterangepicker', function (ev, picker) {
        from = picker.startDate.format('YYYY-MM-DD');
        to = picker.endDate.format('YYYY-MM-DD');
        url = '<?php echo base_url();?>' + 'Reportes/egresos_diarios_global/' + from + '/' + to;
        window.location.href = url;
    });


</script>
<?php $this->stop() ?>
