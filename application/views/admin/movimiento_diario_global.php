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
            Movimiento diario -
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


                //definimos los totales globales
                $total_ventas_global = 0;
                $total_mutuos_global = 0;
                $total_apartados_global = 0;
                $total_empenos_global = 0;
                $total_desempenos_global = 0;
                $total_refrendo_global = 0;

                ?>
                <!-- /.form group -->
                <div class="row">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Movimiento diario <a class="btn btn-success" target="_blank"
                                                                       href="<?php echo base_url() . 'Reportes/movimiento_diario_global_excel/' . $from . '/' . $to; ?>">Exportar</a>
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
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '1');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '1');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '1');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '1');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '1');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
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
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '2');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>

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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
                                                            </tr>


                                                            </tbody>
                                                        </table>

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
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop gastos
                                                                    $gastos = $ci->Caja_model->get_otros_gastos_global($fecha_inicio->format('Y-m-d'), '3');
                                                                    $total_gastos_dia = 0;
                                                                    if ($gastos) {
                                                                        foreach ($gastos->result() as $gasto) {
                                                                            $total_gastos_dia = $total_gastos_dia + $gasto->monto;
                                                                        }
                                                                    }
                                                                    $total_gastos_periodo = $total_gastos_periodo + $total_gastos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_gastos_dia); ?></th>
                                                                    <th><?php if ($gastos) {
                                                                            echo $gastos->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <th>Gastos</th>
                                                                    <th>Monto</th>
                                                                    <th>cantidad</th>
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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
                                                            </tr>


                                                            </tbody>
                                                        </table>

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
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop gastos
                                                                    $gastos = $ci->Caja_model->get_otros_gastos_global($fecha_inicio->format('Y-m-d'), '4');
                                                                    $total_gastos_dia = 0;
                                                                    if ($gastos) {
                                                                        foreach ($gastos->result() as $gasto) {
                                                                            $total_gastos_dia = $total_gastos_dia + $gasto->monto;
                                                                        }
                                                                    }
                                                                    $total_gastos_periodo = $total_gastos_periodo + $total_gastos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_gastos_dia); ?></th>
                                                                    <th><?php if ($gastos) {
                                                                            echo $gastos->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <th>Gastos</th>
                                                                    <th>Monto</th>
                                                                    <th>cantidad</th>
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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
                                                            </tr>
                                                            </tbody>
                                                        </table>

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
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop gastos
                                                                    $gastos = $ci->Caja_model->get_otros_gastos_global($fecha_inicio->format('Y-m-d'), '5');
                                                                    $total_gastos_dia = 0;
                                                                    if ($gastos) {
                                                                        foreach ($gastos->result() as $gasto) {
                                                                            $total_gastos_dia = $total_gastos_dia + $gasto->monto;
                                                                        }
                                                                    }
                                                                    $total_gastos_periodo = $total_gastos_periodo + $total_gastos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_gastos_dia); ?></th>
                                                                    <th><?php if ($gastos) {
                                                                            echo $gastos->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <th>Gastos</th>
                                                                    <th>Monto</th>
                                                                    <th>cantidad</th>
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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
                                                            </tr>


                                                            </tbody>
                                                        </table>

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
                                                    <table class="table table-condensed">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">Día</th>
                                                                <th colspan="3">Ventas</th>
                                                                <th></th>
                                                                <th colspan="3">Apartado</th>
                                                                <th></th>
                                                                <th colspan="2">Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2" >refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>porductos</th>
                                                                <th>facturas</th>
                                                                <th>Monto</th>
                                                                <th></th>
                                                                <th>Monto</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                                <th></th>
                                                                <th>Intereses</th>
                                                                <th>cantidad</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $i = 0; //delcaramos el puntero

                                                            //definimos los totales globales
                                                            $total_ventas_periodo = 0;
                                                            $total_mutuos_periodo = 0;
                                                            $total_apartados_periodo = 0;
                                                            $total_empenos_periodo = 0;
                                                            $total_desempenos_periodo = 0;
                                                            $total_refrendo_periodo = 0;
                                                            $total_gastos_periodo = 0;
                                                            do {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $fecha_inicio->format('Y-m-d'); ?></th>
                                                                    <?php
                                                                    // Loop ventas
                                                                    $ventas_dia = $ci->Caja_model->get_ventas_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_ventas_dia = 0;
                                                                    $total_mutuos_de_venta_dia = 0;
                                                                    $productos = array();
                                                                    $productos_text = '';
                                                                    $numero_productos = 0;
                                                                    if ($ventas_dia) {
                                                                        foreach ($ventas_dia->result() as $venta) {
                                                                            $total_ventas_dia = $total_ventas_dia + $venta->monto;
                                                                            $total_mutuos_de_venta_dia = $total_mutuos_de_venta_dia + $venta->mutuo;
                                                                            $productos[] = $venta->id_producto;
                                                                        }
                                                                        $productos_text = implode(",", $productos);
                                                                        $productos_text = explode(",", $productos_text);
                                                                        $numero_productos = count($productos_text);

                                                                    }
                                                                    $total_ventas_periodo = $total_ventas_periodo + $total_ventas_dia;
                                                                    $total_mutuos_periodo = $total_mutuos_periodo + $total_mutuos_de_venta_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos; ?></th>
                                                                    <th><?php if ($ventas_dia) {
                                                                            echo $ventas_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_ventas_dia); ?></th>
                                                                    <!--<th><?php echo 'Q.' . formato_dinero($total_mutuos_de_venta_dia); ?></th>-->
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop apartados
                                                                    $apartados_dia = $ci->Caja_model->get_apartados_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_apartados_dia = 0;
                                                                    $numero_productos_apartados = 0;
                                                                    $productos_apartados = array();
                                                                    $productos_apartados_text = '';
                                                                    if ($apartados_dia) {
                                                                        foreach ($apartados_dia->result() as $apartado) {
                                                                            $total_apartados_dia = $total_apartados_dia + $apartado->monto;
                                                                            $productos_apartados[] = $apartado->id_producto;
                                                                        }
                                                                        $productos_apartados_text = implode(",", $productos_apartados);
                                                                        $productos_apartados_text = explode(",", $productos_apartados_text);
                                                                        $numero_productos_apartados = count($productos_apartados_text);
                                                                    }
                                                                    $total_apartados_periodo = $total_apartados_periodo + $total_apartados_dia;
                                                                    ?>
                                                                    <th><?php echo $numero_productos_apartados; ?></th>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_apartados_dia); ?></th>
                                                                    <th><?php if ($apartados_dia) {
                                                                            echo $apartados_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop empeños
                                                                    $empenos_dia = $ci->Caja_model->get_empenos_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_empenos_dia = 0;
                                                                    //$numero_empenos =0;
                                                                    //$productos_empenados = array();
                                                                    //$productos_empenados_text ='';
                                                                    if ($empenos_dia) {
                                                                        foreach ($empenos_dia->result() as $empeno) {
                                                                            $total_empenos_dia = $total_empenos_dia + $empeno->monto;
                                                                            //$productos_empenados[] = $empeno->id_producto;
                                                                        }
                                                                        //$productos_empenados_text = implode(",", $productos_apartados);
                                                                        //$productos_empenados_text = explode(",", $productos_apartados_text);
                                                                        //$numero_productos_empenados = count($productos_apartados_text);
                                                                    }
                                                                    $total_empenos_periodo = $total_empenos_periodo + $total_empenos_dia;
                                                                    ?>
                                                                    <!--<th><?php /*echo $numero_productos_empenados;*/ ?></th>-->
                                                                    <th><?php echo 'Q.' . formato_dinero($total_empenos_dia); ?></th>
                                                                    <th><?php if ($empenos_dia) {
                                                                            echo $empenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop desempeños
                                                                    $desempenos_dia = $ci->Caja_model->get_intereses_desempeno_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_desempenos_dia = 0;
                                                                    if ($desempenos_dia) {
                                                                        foreach ($desempenos_dia->result() as $desempeno) {
                                                                            $total_desempenos_dia = $total_desempenos_dia + $desempeno->monto;
                                                                        }
                                                                    }
                                                                    $total_desempenos_periodo = $total_desempenos_periodo + $total_desempenos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_desempenos_dia); ?></th>
                                                                    <th><?php if ($desempenos_dia) {
                                                                            echo $desempenos_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop refrendos
                                                                    $refrendo_dia = $ci->Caja_model->get_intereses_refrendo_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_refrendo_dia = 0;
                                                                    if ($refrendo_dia) {
                                                                        foreach ($refrendo_dia->result() as $refrendo) {
                                                                            $total_refrendo_dia = $total_refrendo_dia + $refrendo->monto;
                                                                        }
                                                                    }
                                                                    $total_refrendo_periodo = $total_refrendo_periodo + $total_refrendo_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_refrendo_dia); ?></th>
                                                                    <th><?php if ($refrendo_dia) {
                                                                            echo $refrendo_dia->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <?php
                                                                    // Loop gastos
                                                                    $gastos = $ci->Caja_model->get_otros_gastos_global($fecha_inicio->format('Y-m-d'), '6');
                                                                    $total_gastos_dia = 0;
                                                                    if ($gastos) {
                                                                        foreach ($gastos->result() as $gasto) {
                                                                            $total_gastos_dia = $total_gastos_dia + $gasto->monto;
                                                                        }
                                                                    }
                                                                    $total_gastos_periodo = $total_gastos_periodo + $total_gastos_dia;
                                                                    ?>
                                                                    <th><?php echo 'Q.' . formato_dinero($total_gastos_dia); ?></th>
                                                                    <th><?php if ($gastos) {
                                                                            echo $gastos->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <th>Gastos</th>
                                                                    <th>Monto</th>
                                                                    <th>cantidad</th>
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
                                                                <td colspan="3">Total Ventas</td>
                                                                <td></td>
                                                                <td colspan="3">Total Apartado</td>
                                                                <td></td>
                                                                <th colspan="2">Total Empeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total Desempeños</th>
                                                                <th></th>
                                                                <th colspan="2">Total refrendos</th>
                                                            </tr>
                                                            <tr>
                                                                <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                                    <br>
                                                                    a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                                </td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_periodo); ?></td>
                                                                <?php $total_ventas_global = $total_ventas_global + $total_ventas_periodo; ?>
                                                                <?php

                                                                /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                                $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                                $margen_periodo = ($margen_periodo * 100);*/
                                                                ?>
                                                                <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->

                                                                <td></td>
                                                                <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_periodo); ?></td>
                                                                <?php $total_apartados_global = $total_apartados_global + $total_apartados_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_periodo); ?></td>
                                                                <?php $total_empenos_global = $total_empenos_global + $total_empenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_periodo); ?></td>
                                                                <?php $total_desempenos_global = $total_desempenos_global + $total_desempenos_periodo; ?>
                                                                <td></td>
                                                                <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_periodo); ?></td>
                                                                <?php $total_refrendo_global = $total_refrendo_global + $total_refrendo_periodo; ?>
                                                            </tr>


                                                            </tbody>
                                                        </table>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        Totales
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2">Día</th>
                                                    <th colspan="3">Ventas</th>
                                                    <th></th>
                                                    <th colspan="3">Apartado</th>
                                                    <th></th>
                                                    <th colspan="2">Empeños</th>
                                                    <th></th>
                                                    <th colspan="2">Desempeños</th>
                                                    <th></th>
                                                    <th colspan="2" >refrendos</th>
                                                </tr>
                                                <tr>
                                                    <th>porductos</th>
                                                    <th>facturas</th>
                                                    <th>Monto</th>
                                                    <th></th>
                                                    <th>porductos</th>
                                                    <th>facturas</th>
                                                    <th>Monto</th>
                                                    <th></th>
                                                    <th>Monto</th>
                                                    <th>cantidad</th>
                                                    <th></th>
                                                    <th>Intereses</th>
                                                    <th>cantidad</th>
                                                    <th></th>
                                                    <th>Intereses</th>
                                                    <th>cantidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>totales</td>
                                                    <td colspan="3">Total Ventas</td>
                                                    <td></td>
                                                    <td colspan="3">Total Apartado</td>
                                                    <td></td>
                                                    <th colspan="2">Total Empeños</th>
                                                    <th></th>
                                                    <th colspan="2">Total Desempeños</th>
                                                    <th></th>
                                                    <th colspan="2">Total refrendos</th>
                                                    <th></th>

                                                </tr>
                                                <tr>
                                                    <td>de <?php echo $fecha_inicio_t->format('Y-m-d'); ?>
                                                        <br>
                                                        a <?php echo $fecha_final->format('Y-m-d'); ?>
                                                    </td>
                                                    <td colspan="3"><?php echo 'Q.' . formato_dinero($total_ventas_global); ?></td>
                                                    <?php

                                                    /*$margen_periodo = ($total_ventas_periodo - $total_mutuos_periodo );
                                                    $margen_periodo = ($margen_periodo / $total_mutuos_periodo);
                                                    $margen_periodo = ($margen_periodo * 100);*/
                                                    ?>
                                                    <!--<td class="<?php echo colores_de_margen($margen_periodo) ?>"><?php echo intval($margen_periodo); ?> %</td>-->
                                                    <td></td>
                                                    <td colspan="3"><?php echo 'Q.' . formato_dinero($total_apartados_global); ?></td>
                                                    <td></td>
                                                    <td colspan="2"><?php echo 'Q.' . formato_dinero($total_empenos_global); ?></td>
                                                    <td></td>
                                                    <td colspan="2"><?php echo 'Q.' . formato_dinero($total_desempenos_global); ?></td>
                                                    <td></td>
                                                    <td colspan="2"><?php echo 'Q.' . formato_dinero($total_refrendo_global); ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </table>
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
        url = '<?php echo base_url();?>' + 'Reportes/movimiento_diario_global/' + from + '/' + to;
        window.location.href = url;
    });


</script>
<?php $this->stop() ?>
