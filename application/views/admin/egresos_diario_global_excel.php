<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 08/03/2019
 * Time: 04:46 PM
 */

$ci =& get_instance();
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/ui/admin/plugins/file_saver/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/js/tableexport.js"></script>
    <!-- Moment -->
    <script src="<?php echo base_url(); ?>/ui/admin/plugins/moment/moment-with-locales.js"></script>
</head>
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
                            <h3 class="box-title">Egresos diarios</h3>
                        </div>
                        <input type="button" id="exportar_btn" onclick="tableToExcel('export', 'Egresos')"
                               value="Exportar a excel">
                        <table id="export">
                            <tr>
                                <td>
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                   aria-expanded="false" class="collapsed">
                                                    Centra Sur
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false">
                                            <div class="box-body">

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
                                                                                    <?php } ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="panel box box-danger">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                                   class="collapsed" aria-expanded="false">
                                                    Tienda 2
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
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
                                                                                <?php } ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                                   class="" aria-expanded="false">
                                                    Metro Norte
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
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
                                                                                <?php } ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="panel box box-info">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                                   class="" aria-expanded="false">
                                                    Antigua
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse " aria-expanded="false">
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
                                                                                <?php } ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="panel box box-warning">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                                   class="" aria-expanded="false">
                                                    Mixco
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse " aria-expanded="false">
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
                                                                                <?php } ?>
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
                                </td>
                            </tr>
                            <tr>
                                <td><div class="panel box box-warning">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                                   class="" aria-expanded="false">
                                                    Villa Nueva
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix" class="panel-collapse collapse " aria-expanded="false">
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
                                                                                <?php } ?>
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
                                    </div></td>
                            </tr>
                        </table>







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
<script>
    $(document).ready(function () {
        //Date range picker
        $('#rango_movimiento').daterangepicker();
        $('#exportar_btn').click();
        document.getElementById("exportar_btn").click();
    });


    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            ,
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
            , format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })();

</script>
</body>
</html>
