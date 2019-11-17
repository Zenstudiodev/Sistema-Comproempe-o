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
            Contrado -
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                reporte de contratos
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
                $total_global_deposito = 0;

                //hoy
                $hoy = New DateTime();
                ?>
                <!-- /.form group -->
                <div class="row">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                           <h3 class="box-title">Contraros <a class="btn btn-success" target="_blank"
                                                               href="<?php echo base_url() . 'Reportes/contratos_excel/' . $from . '/' . $to; ?>">Exportar</a>
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
                                                    <?php
                                                    //contratos tienda 1

                                                   /* echo $from;
                                                    echo $to;*/
                                                    $tienda = '1';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                    ?>
                                                    <table class="table table-condensed table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <td># de contratos</td>
                                                            <td>Tienda Id</td>
                                                            <td>No. contrato</td>
                                                            <td>Fecha contrato</td>
                                                            <td>Código cliente</td>
                                                            <td>Nombre cliente</td>
                                                            <td>Dirección cliente</td>
                                                            <td>Ciudad</td>
                                                            <td>zona</td>
                                                            <td>Teléfono</td>
                                                            <td>Producto</td>
                                                            <td>Ganancia de contrato</td>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                                $total_ganancia_contrato = 0;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $numero_de_contratos ?></td>
                                                                    <td><?php echo $contrato->tienda_id ?></td>
                                                                    <td><?php echo $contrato->contrato_id ?></td>
                                                                    <td><?php echo $contrato->fecha ?></td>
                                                                    <td><?php echo $contrato->id ?></td>
                                                                    <td><?php echo $contrato->nombre ?></td>
                                                                    <td><?php echo $contrato->direccion ?></td>
                                                                    <td><?php echo $contrato->ciudad;?></td>
                                                                    <td><?php echo$contrato->zona; ?></td>
                                                                    <td><?php echo $contrato->telefono ?></td>
                                                                    <td>
                                                                        <?php
                                                                        //buscamos los productos del contrato
                                                                        $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                        if($productos){
                                                                           // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                            <tr>
                                                                                <td><?php echo $numero_de_productos ?></td>
                                                                                <td><?php echo $producto->producto_id ?></td>
                                                                                <td><?php echo $producto->nombre_producto ?></td>
                                                                                <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                <td><?php echo $producto->avaluo_ce ?></td>
                                                                                <td><?php echo $producto->mutuo ?></td>
                                                                                <td><?php echo $producto->categoria ?></td>
                                                                                <td><?php echo $contrato->estado ?></td>
                                                                                <td><?php echo $producto->tipo ?></td>
                                                                                <?php
                                                                                if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                    //dias desde que se refendo
                                                                                    $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                    if($ultimo_refrendo){

                                                                                        $factura_refendo = $ultimo_refrendo->row();
                                                                                        $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                        $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                        $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                        $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }
                                                                                }else{

                                                                                    $dias_desde_refrendo= '0';
                                                                                    $monto_refrendo = '0';
                                                                                }

                                                                                ?>
                                                                                <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                <?php
                                                                                if($contrato->estado == 'perdido' ){
                                                                                    //dias desde que se refendo
                                                                                    $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                    $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                    $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                }else{
                                                                                    $dias_desde_perdido = '0';
                                                                                }

                                                                                ?>
                                                                                <td><?php echo $dias_desde_perdido; ?></td>
                                                                                <?php
                                                                                $interes_obtenido = 0;
                                                                                //porcentage de interes ganado

                                                                                $interes_obtenido = $monto_refrendo;
                                                                                //$porcentaje_ganado

                                                                                if($contrato->estado == 'desempenado' ){
                                                                                    //factura de desempeno
                                                                                    echo $contrato->contrato_id;
                                                                                    $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                    if($factura_desempeno){
                                                                                        $factura_desempeno= $factura_desempeno->row();
                                                                                       // print_contenido($factura_desempeno);
                                                                                        $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                        $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                    }else{

                                                                                    }
                                                                                }
                                                                                //ganacia por desempeño refrendo y liquidacion
                                                                                $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                //$interes_obtenido = $interes_obtenido * 100


                                                                                //total interese
                                                                                $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                //total porcentage de intereses
                                                                                ?>


                                                                                <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                <?php
                                                                                if($contrato->estado == 'desempenado'){
                                                                                    //dias desde que se refendo
                                                                                    $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                    $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                    $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                }else{
                                                                                    $dias_desde_desempenado= '0';
                                                                                }

                                                                                ?>
                                                                                <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                <?php
                                                                                //se vendio
                                                                                if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                    if($producto->tipo == 'vendido'){
                                                                                        $valor_liquidado = $producto->precio_vendido;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }

                                                                                    //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                }else{
                                                                                    $valor_liquidado ='0';
                                                                                }
                                                                                $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                ?>
                                                                                <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                <?php
                                                                                //saber fecha de venta
                                                                                //si tiente fecha de venta
                                                                                if($producto->fecha_venta == '0000-00-00'){
                                                                                    //si esta vendido
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                        //buscamos fecha de factura
                                                                                        $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                        if($factura_liquidacion_id){
                                                                                            //datos de factura
                                                                                            $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                            if($factura_liquidacion){
                                                                                                $factura_liquidacion = $factura_liquidacion->row();
                                                                                                $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                //cuantos dias tardo en liquidarse
                                                                                            }
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    }

                                                                                }else{
                                                                                    $fecha_liquidacion = $producto->fecha_venta;
                                                                                } ?>
                                                                                <td><?php echo $fecha_liquidacion ?></td>
                                                                                <?php
                                                                                $ganancia_liquidacion =0;
                                                                                //ganancia liquidacion
                                                                                if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                    if($producto->tipo == 'vendido'){
                                                                                        $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                        $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                    }else{
                                                                                        $ganancia_liquidacion ='0';
                                                                                    }
                                                                                }else{
                                                                                    $ganancia_liquidacion =0;
                                                                                    $porcentage_ganancia_liquidacion = 0;
                                                                                }
                                                                                $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                ?>

                                                                                <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                <?php
                                                                                //dias transcurrisdos hasta la liquidacion
                                                                                if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                    //dias desde que se refendo
                                                                                    $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                   /* echo gettype($fecha_liquidacion), "\n";
                                                                                    echo $fecha_liquidacion;*/
                                                                                    $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                    $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                    $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                }else{
                                                                                    $dias_para_liquidacion= '0';
                                                                                }
                                                                                ?>
                                                                                <td><?php echo $dias_para_liquidacion ?></td>
                                                                                <?php
                                                                                $total_abono_contrato = 0;
                                                                                //abonos  a contratos
                                                                                $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                if($abonos_a_contrato){
                                                                                    $recibo_abono =$abonos_a_contrato->row();
                                                                                    $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                    $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                    $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                }else{
                                                                                    $fecha_abono = '0';
                                                                                    $monto_abono_contrato = '0';
                                                                                }

                                                                                ?>
                                                                                <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                <td><?php echo $fecha_abono; ?></td>
                                                                                <?php
                                                                                if($producto->tipo == 'apartado'){
                                                                                $total_apartado = $total_apartado + $producto->apartado;
                                                                                $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                }
                                                                                ?>
                                                                                <td><?php echo $producto->apartado ?></td>
                                                                                <?php
                                                                                //fecha apartado
                                                                                //echo $producto->recibo_apartado;
                                                                                $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                if($recibo_apartado){
                                                                                    $recibo_apartado =$recibo_apartado->row();
                                                                                    $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                }else{
                                                                                    $fecha_apartado = '0';
                                                                                }
                                                                                ?>
                                                                                <td><?php echo $fecha_apartado ?></td>

                                                                            </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                            <?php

                                                                        }else{echo 'no hay producto'; } ?>



                                                                    </td>
                                                                <?php
                                                            $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                            <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                            }?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                            <?php }?>
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
                                                    <?php
                                                    //contratos tienda 2

                                                    /* echo $from;
                                                     echo $to;*/
                                                    $tienda = '2';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                        ?>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td># de contratos</td>
                                                                <td>Tienda Id</td>
                                                                <td>No. contrato</td>
                                                                <td>Fecha contrato</td>
                                                                <td>Código cliente</td>
                                                                <td>Nombre cliente</td>
                                                                <td>Dirección cliente</td>
                                                                <td>Ciudad</td>
                                                                <td>zona</td>
                                                                <td>Teléfono</td>
                                                                <td>Producto</td>
                                                                <td>Ganancia de contrato</td>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                            $total_ganancia_contrato = 0;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos ?></td>
                                                                <td><?php echo $contrato->tienda_id ?></td>
                                                                <td><?php echo $contrato->contrato_id ?></td>
                                                                <td><?php echo $contrato->fecha ?></td>
                                                                <td><?php echo $contrato->id ?></td>
                                                                <td><?php echo $contrato->nombre ?></td>
                                                                <td><?php echo $contrato->direccion ?></td>
                                                                <td><?php echo $contrato->ciudad;?></td>
                                                                <td><?php echo$contrato->zona; ?></td>
                                                                <td><?php echo $contrato->telefono ?></td>
                                                                <td>
                                                                    <?php
                                                                    //buscamos los productos del contrato
                                                                    $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                    if($productos){
                                                                        // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $numero_de_productos ?></td>
                                                                                    <td><?php echo $producto->producto_id ?></td>
                                                                                    <td><?php echo $producto->nombre_producto ?></td>
                                                                                    <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                    <td><?php echo $producto->avaluo_ce ?></td>
                                                                                    <td><?php echo $producto->mutuo ?></td>
                                                                                    <td><?php echo $producto->categoria ?></td>
                                                                                    <td><?php echo $contrato->estado ?></td>
                                                                                    <td><?php echo $producto->tipo ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                        //dias desde que se refendo
                                                                                        $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                        if($ultimo_refrendo){

                                                                                            $factura_refendo = $ultimo_refrendo->row();
                                                                                            $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                            $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                            $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                            $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                        }else{

                                                                                            $dias_desde_refrendo= '0';
                                                                                            $monto_refrendo = '0';
                                                                                        }
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'perdido' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                        $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_perdido = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_perdido; ?></td>
                                                                                    <?php
                                                                                    $interes_obtenido = 0;
                                                                                    //porcentage de interes ganado

                                                                                    $interes_obtenido = $monto_refrendo;
                                                                                    //$porcentaje_ganado

                                                                                    if($contrato->estado == 'desempenado' ){
                                                                                        //factura de desempeno
                                                                                        echo $contrato->contrato_id;
                                                                                        $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                        if($factura_desempeno){
                                                                                            $factura_desempeno= $factura_desempeno->row();
                                                                                            // print_contenido($factura_desempeno);
                                                                                            $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                            $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                        }else{

                                                                                        }
                                                                                    }
                                                                                    //ganacia por desempeño refrendo y liquidacion
                                                                                    $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                    //$interes_obtenido = $interes_obtenido * 100


                                                                                    //total interese
                                                                                    $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                    $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                    //total porcentage de intereses
                                                                                    ?>


                                                                                    <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                    <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                    <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'desempenado'){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                        $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                        $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_desempenado= '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                    <?php
                                                                                    //se vendio
                                                                                    if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $valor_liquidado = $producto->precio_vendido;
                                                                                        }else{
                                                                                            $valor_liquidado ='0';
                                                                                        }

                                                                                        //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }
                                                                                    $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                    <?php
                                                                                    //saber fecha de venta
                                                                                    //si tiente fecha de venta
                                                                                    if($producto->fecha_venta == '0000-00-00'){
                                                                                        //si esta vendido
                                                                                        if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                            //buscamos fecha de factura
                                                                                            $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                            if($factura_liquidacion_id){
                                                                                                //datos de factura
                                                                                                $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                                if($factura_liquidacion){
                                                                                                    $factura_liquidacion = $factura_liquidacion->row();
                                                                                                    $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                    //cuantos dias tardo en liquidarse
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            $fecha_liquidacion = $producto->fecha_venta;
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    } ?>
                                                                                    <td><?php echo $fecha_liquidacion ?></td>
                                                                                    <?php
                                                                                    $ganancia_liquidacion =0;
                                                                                    //ganancia liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                            $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                        }else{
                                                                                            $ganancia_liquidacion ='0';
                                                                                        }
                                                                                    }else{
                                                                                        $ganancia_liquidacion =0;
                                                                                        $porcentage_ganancia_liquidacion = 0;
                                                                                    }
                                                                                    $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                    ?>

                                                                                    <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                    <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                    <?php
                                                                                    //dias transcurrisdos hasta la liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        /* echo gettype($fecha_liquidacion), "\n";
                                                                                         echo $fecha_liquidacion;*/
                                                                                        $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                        $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                        $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                    }else{
                                                                                        $dias_para_liquidacion= '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $dias_para_liquidacion ?></td>
                                                                                    <?php
                                                                                    $total_abono_contrato = 0;
                                                                                    //abonos  a contratos
                                                                                    $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                    if($abonos_a_contrato){
                                                                                        $recibo_abono =$abonos_a_contrato->row();
                                                                                        $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                        $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                        $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                    }else{
                                                                                        $fecha_abono = '0';
                                                                                        $monto_abono_contrato = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                    <td><?php echo $fecha_abono; ?></td>
                                                                                    <?php
                                                                                    if($producto->tipo == 'apartado'){
                                                                                        $total_apartado = $total_apartado + $producto->apartado;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $producto->apartado ?></td>
                                                                                    <?php
                                                                                    //fecha apartado
                                                                                    //echo $producto->recibo_apartado;
                                                                                    $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                    if($recibo_apartado){
                                                                                        $recibo_apartado =$recibo_apartado->row();
                                                                                        $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                    }else{
                                                                                        $fecha_apartado = '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $fecha_apartado ?></td>

                                                                                </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                        <?php

                                                                    }else{echo 'no hay producto'; } ?>



                                                                </td>
                                                                <?php
                                                                $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                                <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                                }?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
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
                                                    <?php
                                                    //contratos tienda 3

                                                    /* echo $from;
                                                     echo $to;*/
                                                    $tienda = '3';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                        ?>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td># de contratos</td>
                                                                <td>Tienda Id</td>
                                                                <td>No. contrato</td>
                                                                <td>Fecha contrato</td>
                                                                <td>Código cliente</td>
                                                                <td>Nombre cliente</td>
                                                                <td>Dirección cliente</td>
                                                                <td>Ciudad</td>
                                                                <td>zona</td>
                                                                <td>Teléfono</td>
                                                                <td>Producto</td>
                                                                <td>Ganancia de contrato</td>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                            $total_ganancia_contrato = 0;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos ?></td>
                                                                <td><?php echo $contrato->tienda_id ?></td>
                                                                <td><?php echo $contrato->contrato_id ?></td>
                                                                <td><?php echo $contrato->fecha ?></td>
                                                                <td><?php echo $contrato->id ?></td>
                                                                <td><?php echo $contrato->nombre ?></td>
                                                                <td><?php echo $contrato->direccion ?></td>
                                                                <td><?php echo $contrato->ciudad;?></td>
                                                                <td><?php echo$contrato->zona; ?></td>
                                                                <td><?php echo $contrato->telefono ?></td>
                                                                <td>
                                                                    <?php
                                                                    //buscamos los productos del contrato
                                                                    $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                    if($productos){
                                                                        // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $numero_de_productos ?></td>
                                                                                    <td><?php echo $producto->producto_id ?></td>
                                                                                    <td><?php echo $producto->nombre_producto ?></td>
                                                                                    <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                    <td><?php echo $producto->avaluo_ce ?></td>
                                                                                    <td><?php echo $producto->mutuo ?></td>
                                                                                    <td><?php echo $producto->categoria ?></td>
                                                                                    <td><?php echo $contrato->estado ?></td>
                                                                                    <td><?php echo $producto->tipo ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                        //dias desde que se refendo
                                                                                        $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                        if($ultimo_refrendo){

                                                                                            $factura_refendo = $ultimo_refrendo->row();
                                                                                            $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                            $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                            $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                            $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                        }else{

                                                                                            $dias_desde_refrendo= '0';
                                                                                            $monto_refrendo = '0';
                                                                                        }
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'perdido' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                        $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_perdido = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_perdido; ?></td>
                                                                                    <?php
                                                                                    $interes_obtenido = 0;
                                                                                    //porcentage de interes ganado

                                                                                    $interes_obtenido = $monto_refrendo;
                                                                                    //$porcentaje_ganado

                                                                                    if($contrato->estado == 'desempenado' ){
                                                                                        //factura de desempeno
                                                                                        echo $contrato->contrato_id;
                                                                                        $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                        if($factura_desempeno){
                                                                                            $factura_desempeno= $factura_desempeno->row();
                                                                                            // print_contenido($factura_desempeno);
                                                                                            $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                            $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                        }else{

                                                                                        }
                                                                                    }
                                                                                    //ganacia por desempeño refrendo y liquidacion
                                                                                    $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                    //$interes_obtenido = $interes_obtenido * 100


                                                                                    //total interese
                                                                                    $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                    $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                    //total porcentage de intereses
                                                                                    ?>


                                                                                    <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                    <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                    <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'desempenado'){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                        $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                        $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_desempenado= '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                    <?php
                                                                                    //se vendio
                                                                                    if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $valor_liquidado = $producto->precio_vendido;
                                                                                        }else{
                                                                                            $valor_liquidado ='0';
                                                                                        }

                                                                                        //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }
                                                                                    $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                    <?php
                                                                                    //saber fecha de venta
                                                                                    //si tiente fecha de venta
                                                                                    if($producto->fecha_venta == '0000-00-00'){
                                                                                        //si esta vendido
                                                                                        if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                            //buscamos fecha de factura
                                                                                            $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                            if($factura_liquidacion_id){
                                                                                                //datos de factura
                                                                                                $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                                if($factura_liquidacion){
                                                                                                    $factura_liquidacion = $factura_liquidacion->row();
                                                                                                    $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                    //cuantos dias tardo en liquidarse
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            $fecha_liquidacion = $producto->fecha_venta;
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    } ?>
                                                                                    <td><?php echo $fecha_liquidacion ?></td>
                                                                                    <?php
                                                                                    $ganancia_liquidacion =0;
                                                                                    //ganancia liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                            $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                        }else{
                                                                                            $ganancia_liquidacion ='0';
                                                                                        }
                                                                                    }else{
                                                                                        $ganancia_liquidacion =0;
                                                                                        $porcentage_ganancia_liquidacion = 0;
                                                                                    }
                                                                                    $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                    ?>

                                                                                    <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                    <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                    <?php
                                                                                    //dias transcurrisdos hasta la liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        /* echo gettype($fecha_liquidacion), "\n";
                                                                                         echo $fecha_liquidacion;*/
                                                                                        $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                        $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                        $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                    }else{
                                                                                        $dias_para_liquidacion= '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $dias_para_liquidacion ?></td>
                                                                                    <?php
                                                                                    $total_abono_contrato = 0;
                                                                                    //abonos  a contratos
                                                                                    $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                    if($abonos_a_contrato){
                                                                                        $recibo_abono =$abonos_a_contrato->row();
                                                                                        $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                        $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                        $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                    }else{
                                                                                        $fecha_abono = '0';
                                                                                        $monto_abono_contrato = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                    <td><?php echo $fecha_abono; ?></td>
                                                                                    <?php
                                                                                    if($producto->tipo == 'apartado'){
                                                                                        $total_apartado = $total_apartado + $producto->apartado;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $producto->apartado ?></td>
                                                                                    <?php
                                                                                    //fecha apartado
                                                                                    //echo $producto->recibo_apartado;
                                                                                    $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                    if($recibo_apartado){
                                                                                        $recibo_apartado =$recibo_apartado->row();
                                                                                        $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                    }else{
                                                                                        $fecha_apartado = '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $fecha_apartado ?></td>

                                                                                </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                        <?php

                                                                    }else{echo 'no hay producto'; } ?>



                                                                </td>
                                                                <?php
                                                                $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                                <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                                }?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
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
                                                    <?php
                                                    //contratos tienda 4

                                                    /* echo $from;
                                                     echo $to;*/
                                                    $tienda = '4';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                        ?>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td># de contratos</td>
                                                                <td>Tienda Id</td>
                                                                <td>No. contrato</td>
                                                                <td>Fecha contrato</td>
                                                                <td>Código cliente</td>
                                                                <td>Nombre cliente</td>
                                                                <td>Dirección cliente</td>
                                                                <td>Ciudad</td>
                                                                <td>zona</td>
                                                                <td>Teléfono</td>
                                                                <td>Producto</td>
                                                                <td>Ganancia de contrato</td>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                            $total_ganancia_contrato = 0;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos ?></td>
                                                                <td><?php echo $contrato->tienda_id ?></td>
                                                                <td><?php echo $contrato->contrato_id ?></td>
                                                                <td><?php echo $contrato->fecha ?></td>
                                                                <td><?php echo $contrato->id ?></td>
                                                                <td><?php echo $contrato->nombre ?></td>
                                                                <td><?php echo $contrato->direccion ?></td>
                                                                <td><?php echo $contrato->ciudad;?></td>
                                                                <td><?php echo$contrato->zona; ?></td>
                                                                <td><?php echo $contrato->telefono ?></td>
                                                                <td>
                                                                    <?php
                                                                    //buscamos los productos del contrato
                                                                    $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                    if($productos){
                                                                        // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $numero_de_productos ?></td>
                                                                                    <td><?php echo $producto->producto_id ?></td>
                                                                                    <td><?php echo $producto->nombre_producto ?></td>
                                                                                    <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                    <td><?php echo $producto->avaluo_ce ?></td>
                                                                                    <td><?php echo $producto->mutuo ?></td>
                                                                                    <td><?php echo $producto->categoria ?></td>
                                                                                    <td><?php echo $contrato->estado ?></td>
                                                                                    <td><?php echo $producto->tipo ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                        //dias desde que se refendo
                                                                                        $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                        if($ultimo_refrendo){

                                                                                            $factura_refendo = $ultimo_refrendo->row();
                                                                                            $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                            $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                            $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                            $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                        }else{

                                                                                            $dias_desde_refrendo= '0';
                                                                                            $monto_refrendo = '0';
                                                                                        }
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'perdido' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                        $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_perdido = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_perdido; ?></td>
                                                                                    <?php
                                                                                    $interes_obtenido = 0;
                                                                                    //porcentage de interes ganado

                                                                                    $interes_obtenido = $monto_refrendo;
                                                                                    //$porcentaje_ganado

                                                                                    if($contrato->estado == 'desempenado' ){
                                                                                        //factura de desempeno
                                                                                        echo $contrato->contrato_id;
                                                                                        $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                        if($factura_desempeno){
                                                                                            $factura_desempeno= $factura_desempeno->row();
                                                                                            // print_contenido($factura_desempeno);
                                                                                            $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                            $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                        }else{

                                                                                        }
                                                                                    }
                                                                                    //ganacia por desempeño refrendo y liquidacion
                                                                                    $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                    //$interes_obtenido = $interes_obtenido * 100


                                                                                    //total interese
                                                                                    $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                    $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                    //total porcentage de intereses
                                                                                    ?>


                                                                                    <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                    <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                    <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'desempenado'){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                        $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                        $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_desempenado= '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                    <?php
                                                                                    //se vendio
                                                                                    if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $valor_liquidado = $producto->precio_vendido;
                                                                                        }else{
                                                                                            $valor_liquidado ='0';
                                                                                        }

                                                                                        //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }
                                                                                    $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                    <?php
                                                                                    //saber fecha de venta
                                                                                    //si tiente fecha de venta
                                                                                    if($producto->fecha_venta == '0000-00-00'){
                                                                                        //si esta vendido
                                                                                        if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                            //buscamos fecha de factura
                                                                                            $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                            if($factura_liquidacion_id){
                                                                                                //datos de factura
                                                                                                $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                                if($factura_liquidacion){
                                                                                                    $factura_liquidacion = $factura_liquidacion->row();
                                                                                                    $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                    //cuantos dias tardo en liquidarse
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            $fecha_liquidacion = $producto->fecha_venta;
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    } ?>
                                                                                    <td><?php echo $fecha_liquidacion ?></td>
                                                                                    <?php
                                                                                    $ganancia_liquidacion =0;
                                                                                    //ganancia liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                            $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                        }else{
                                                                                            $ganancia_liquidacion ='0';
                                                                                        }
                                                                                    }else{
                                                                                        $ganancia_liquidacion =0;
                                                                                        $porcentage_ganancia_liquidacion = 0;
                                                                                    }
                                                                                    $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                    ?>

                                                                                    <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                    <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                    <?php
                                                                                    //dias transcurrisdos hasta la liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        /* echo gettype($fecha_liquidacion), "\n";
                                                                                         echo $fecha_liquidacion;*/
                                                                                        $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                        $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                        $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                    }else{
                                                                                        $dias_para_liquidacion= '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $dias_para_liquidacion ?></td>
                                                                                    <?php
                                                                                    $total_abono_contrato = 0;
                                                                                    //abonos  a contratos
                                                                                    $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                    if($abonos_a_contrato){
                                                                                        $recibo_abono =$abonos_a_contrato->row();
                                                                                        $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                        $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                        $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                    }else{
                                                                                        $fecha_abono = '0';
                                                                                        $monto_abono_contrato = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                    <td><?php echo $fecha_abono; ?></td>
                                                                                    <?php
                                                                                    if($producto->tipo == 'apartado'){
                                                                                        $total_apartado = $total_apartado + $producto->apartado;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $producto->apartado ?></td>
                                                                                    <?php
                                                                                    //fecha apartado
                                                                                    //echo $producto->recibo_apartado;
                                                                                    $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                    if($recibo_apartado){
                                                                                        $recibo_apartado =$recibo_apartado->row();
                                                                                        $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                    }else{
                                                                                        $fecha_apartado = '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $fecha_apartado ?></td>

                                                                                </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                        <?php

                                                                    }else{echo 'no hay producto'; } ?>



                                                                </td>
                                                                <?php
                                                                $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                                <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                                }?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
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
                                                    <?php
                                                    //contratos tienda 5

                                                    /* echo $from;
                                                     echo $to;*/
                                                    $tienda = '5';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                        ?>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td># de contratos</td>
                                                                <td>Tienda Id</td>
                                                                <td>No. contrato</td>
                                                                <td>Fecha contrato</td>
                                                                <td>Código cliente</td>
                                                                <td>Nombre cliente</td>
                                                                <td>Dirección cliente</td>
                                                                <td>Ciudad</td>
                                                                <td>zona</td>
                                                                <td>Teléfono</td>
                                                                <td>Producto</td>
                                                                <td>Ganancia de contrato</td>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                            $total_ganancia_contrato = 0;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos ?></td>
                                                                <td><?php echo $contrato->tienda_id ?></td>
                                                                <td><?php echo $contrato->contrato_id ?></td>
                                                                <td><?php echo $contrato->fecha ?></td>
                                                                <td><?php echo $contrato->id ?></td>
                                                                <td><?php echo $contrato->nombre ?></td>
                                                                <td><?php echo $contrato->direccion ?></td>
                                                                <td><?php echo $contrato->ciudad;?></td>
                                                                <td><?php echo$contrato->zona; ?></td>
                                                                <td><?php echo $contrato->telefono ?></td>
                                                                <td>
                                                                    <?php
                                                                    //buscamos los productos del contrato
                                                                    $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                    if($productos){
                                                                        // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $numero_de_productos ?></td>
                                                                                    <td><?php echo $producto->producto_id ?></td>
                                                                                    <td><?php echo $producto->nombre_producto ?></td>
                                                                                    <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                    <td><?php echo $producto->avaluo_ce ?></td>
                                                                                    <td><?php echo $producto->mutuo ?></td>
                                                                                    <td><?php echo $producto->categoria ?></td>
                                                                                    <td><?php echo $contrato->estado ?></td>
                                                                                    <td><?php echo $producto->tipo ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                        //dias desde que se refendo
                                                                                        $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                        if($ultimo_refrendo){

                                                                                            $factura_refendo = $ultimo_refrendo->row();
                                                                                            $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                            $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                            $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                            $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                        }else{

                                                                                            $dias_desde_refrendo= '0';
                                                                                            $monto_refrendo = '0';
                                                                                        }
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'perdido' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                        $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_perdido = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_perdido; ?></td>
                                                                                    <?php
                                                                                    $interes_obtenido = 0;
                                                                                    //porcentage de interes ganado

                                                                                    $interes_obtenido = $monto_refrendo;
                                                                                    //$porcentaje_ganado

                                                                                    if($contrato->estado == 'desempenado' ){
                                                                                        //factura de desempeno
                                                                                        echo $contrato->contrato_id;
                                                                                        $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                        if($factura_desempeno){
                                                                                            $factura_desempeno= $factura_desempeno->row();
                                                                                            // print_contenido($factura_desempeno);
                                                                                            $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                            $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                        }else{

                                                                                        }
                                                                                    }
                                                                                    //ganacia por desempeño refrendo y liquidacion
                                                                                    $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                    //$interes_obtenido = $interes_obtenido * 100


                                                                                    //total interese
                                                                                    $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                    $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                    //total porcentage de intereses
                                                                                    ?>


                                                                                    <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                    <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                    <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'desempenado'){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                        $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                        $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_desempenado= '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                    <?php
                                                                                    //se vendio
                                                                                    if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $valor_liquidado = $producto->precio_vendido;
                                                                                        }else{
                                                                                            $valor_liquidado ='0';
                                                                                        }

                                                                                        //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }
                                                                                    $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                    <?php
                                                                                    //saber fecha de venta
                                                                                    //si tiente fecha de venta
                                                                                    if($producto->fecha_venta == '0000-00-00'){
                                                                                        //si esta vendido
                                                                                        if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                            //buscamos fecha de factura
                                                                                            $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                            if($factura_liquidacion_id){
                                                                                                //datos de factura
                                                                                                $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                                if($factura_liquidacion){
                                                                                                    $factura_liquidacion = $factura_liquidacion->row();
                                                                                                    $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                    //cuantos dias tardo en liquidarse
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            $fecha_liquidacion = $producto->fecha_venta;
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    } ?>
                                                                                    <td><?php echo $fecha_liquidacion ?></td>
                                                                                    <?php
                                                                                    $ganancia_liquidacion =0;
                                                                                    //ganancia liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                            $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                        }else{
                                                                                            $ganancia_liquidacion ='0';
                                                                                        }
                                                                                    }else{
                                                                                        $ganancia_liquidacion =0;
                                                                                        $porcentage_ganancia_liquidacion = 0;
                                                                                    }
                                                                                    $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                    ?>

                                                                                    <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                    <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                    <?php
                                                                                    //dias transcurrisdos hasta la liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        /* echo gettype($fecha_liquidacion), "\n";
                                                                                         echo $fecha_liquidacion;*/
                                                                                        $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                        $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                        $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                    }else{
                                                                                        $dias_para_liquidacion= '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $dias_para_liquidacion ?></td>
                                                                                    <?php
                                                                                    $total_abono_contrato = 0;
                                                                                    //abonos  a contratos
                                                                                    $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                    if($abonos_a_contrato){
                                                                                        $recibo_abono =$abonos_a_contrato->row();
                                                                                        $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                        $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                        $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                    }else{
                                                                                        $fecha_abono = '0';
                                                                                        $monto_abono_contrato = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                    <td><?php echo $fecha_abono; ?></td>
                                                                                    <?php
                                                                                    if($producto->tipo == 'apartado'){
                                                                                        $total_apartado = $total_apartado + $producto->apartado;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $producto->apartado ?></td>
                                                                                    <?php
                                                                                    //fecha apartado
                                                                                    //echo $producto->recibo_apartado;
                                                                                    $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                    if($recibo_apartado){
                                                                                        $recibo_apartado =$recibo_apartado->row();
                                                                                        $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                    }else{
                                                                                        $fecha_apartado = '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $fecha_apartado ?></td>

                                                                                </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                        <?php

                                                                    }else{echo 'no hay producto'; } ?>



                                                                </td>
                                                                <?php
                                                                $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                                <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                                }?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
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
                                                    <?php
                                                    //contratos tienda 6

                                                    /* echo $from;
                                                     echo $to;*/
                                                    $tienda = '6';

                                                    $contratos = $ci->Contratos_model->listar_contratos_by_date_reporte($from , $to, $tienda);
                                                    //print_contenido($contratos->result());

                                                    if ($contratos) {
                                                        ?>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <td># de contratos</td>
                                                                <td>Tienda Id</td>
                                                                <td>No. contrato</td>
                                                                <td>Fecha contrato</td>
                                                                <td>Código cliente</td>
                                                                <td>Nombre cliente</td>
                                                                <td>Dirección cliente</td>
                                                                <td>Ciudad</td>
                                                                <td>zona</td>
                                                                <td>Teléfono</td>
                                                                <td>Producto</td>
                                                                <td>Ganancia de contrato</td>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $numero_de_contratos = 1;
                                                            $numero_de_productos = 1;
                                                            $total_intereses = 0;
                                                            $total_mutuo = 0;
                                                            $total_liquidacion = 0;
                                                            $total_gangancia_liquidacion =0;
                                                            $total_abono_contrato= 0;
                                                            $total_apartado = 0;

                                                            $total_total_ganancia_de_contrato=0;
                                                            foreach ($contratos->result() as $contrato) {
                                                            $total_ganancia_contrato = 0;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos ?></td>
                                                                <td><?php echo $contrato->tienda_id ?></td>
                                                                <td><?php echo $contrato->contrato_id ?></td>
                                                                <td><?php echo $contrato->fecha ?></td>
                                                                <td><?php echo $contrato->id ?></td>
                                                                <td><?php echo $contrato->nombre ?></td>
                                                                <td><?php echo $contrato->direccion ?></td>
                                                                <td><?php echo $contrato->ciudad;?></td>
                                                                <td><?php echo$contrato->zona; ?></td>
                                                                <td><?php echo $contrato->telefono ?></td>
                                                                <td>
                                                                    <?php
                                                                    //buscamos los productos del contrato
                                                                    $productos = $ci->Productos_model->datos_de_producto_by_contrato($contrato->contrato_id, $tienda);
                                                                    if($productos){
                                                                        // print_contenido($productos->result());
                                                                        ?>
                                                                        <table class="table table-condensed table-bordered table-hover">
                                                                            <tr>
                                                                                <td># de productos</td>
                                                                                <td>Código</td>
                                                                                <td>Nombre Producto</td>
                                                                                <td>avaluo comercial </td>
                                                                                <td>avaluo CE </td>
                                                                                <td>Mutuo</td>
                                                                                <td>Categoría</td>
                                                                                <td>Estado contrato</td>
                                                                                <td>Estado producto</td>
                                                                                <td>Días transcurridos en productos refrendados</td>
                                                                                <td>Días transcurridos en productos perdidos</td>
                                                                                <td>Intereses Ganados</td>
                                                                                <td>% Intereses Obtenido</td>
                                                                                <td>Fecha Desempeño</td>
                                                                                <td>Días transcurridos en productos desempeñados</td>
                                                                                <td>Ingresos por venta</td>
                                                                                <td>Fecha Venta</td>
                                                                                <td>Ganancia por liqudiación</td>
                                                                                <td>% Ganancia por liqudiación</td>
                                                                                <td>Días transcurridos en productos vendidos</td>
                                                                                <td>Monto de abono a empeño</td>
                                                                                <td>Fecha abono</td>
                                                                                <td>Monto Apartado</td>
                                                                                <td>Fecha de Apartado</td>
                                                                            </tr>
                                                                            <?php
                                                                            $numero_productos_en_contrato = $productos->num_rows();

                                                                            foreach ($productos->result() as $producto) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $numero_de_productos ?></td>
                                                                                    <td><?php echo $producto->producto_id ?></td>
                                                                                    <td><?php echo $producto->nombre_producto ?></td>
                                                                                    <td><?php echo $producto->avaluo_comercial ?></td>
                                                                                    <td><?php echo $producto->avaluo_ce ?></td>
                                                                                    <td><?php echo $producto->mutuo ?></td>
                                                                                    <td><?php echo $producto->categoria ?></td>
                                                                                    <td><?php echo $contrato->estado ?></td>
                                                                                    <td><?php echo $producto->tipo ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'refrendado' or $contrato->estado == 'gracia' or $contrato->estado == 'perdido' or $contrato->estado == 'desempenado' ){

                                                                                        //dias desde que se refendo
                                                                                        $ultimo_refrendo = $ci->Contratos_model->ultimo_refrendo($contrato->contrato_id, $tienda);

                                                                                        if($ultimo_refrendo){

                                                                                            $factura_refendo = $ultimo_refrendo->row();
                                                                                            $fecha_factura_refrendo = New DateTime($factura_refendo->fecha);
                                                                                            $dias_desde_refrendo = $hoy->diff($fecha_factura_refrendo);
                                                                                            $dias_desde_refrendo = $dias_desde_refrendo->format('%a');
                                                                                            $monto_refrendo = $factura_refendo->total /  $numero_productos_en_contrato;
                                                                                        }else{

                                                                                            $dias_desde_refrendo= '0';
                                                                                            $monto_refrendo = '0';
                                                                                        }
                                                                                    }else{

                                                                                        $dias_desde_refrendo= '0';
                                                                                        $monto_refrendo = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_refrendo; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'perdido' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        $dias_desde_perdido = $hoy->diff($fecha_perdido);
                                                                                        $dias_desde_perdido = $dias_desde_perdido->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_perdido = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_perdido; ?></td>
                                                                                    <?php
                                                                                    $interes_obtenido = 0;
                                                                                    //porcentage de interes ganado

                                                                                    $interes_obtenido = $monto_refrendo;
                                                                                    //$porcentaje_ganado

                                                                                    if($contrato->estado == 'desempenado' ){
                                                                                        //factura de desempeno
                                                                                        echo $contrato->contrato_id;
                                                                                        $factura_desempeno = $ci->Factura_model->get_factura_desempeno_reporte($contrato->contrato_id, $tienda);
                                                                                        if($factura_desempeno){
                                                                                            $factura_desempeno= $factura_desempeno->row();
                                                                                            // print_contenido($factura_desempeno);
                                                                                            $monto_interes_desempeño = $factura_desempeno->total/ $numero_productos_en_contrato ;
                                                                                            $interes_obtenido = $interes_obtenido +$monto_interes_desempeño;

                                                                                        }else{

                                                                                        }
                                                                                    }
                                                                                    //ganacia por desempeño refrendo y liquidacion
                                                                                    $porcentage_interes = $interes_obtenido / $producto->mutuo;
                                                                                    //$interes_obtenido = $interes_obtenido * 100


                                                                                    //total interese
                                                                                    $total_intereses = $total_intereses+ $interes_obtenido;
                                                                                    $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$interes_obtenido;

                                                                                    //total porcentage de intereses
                                                                                    ?>


                                                                                    <td><?php echo 'Q.'.formato_dinero($interes_obtenido); ?></td>
                                                                                    <td><?php echo 'Q.'.number_format($porcentage_interes, 2); ?></td>
                                                                                    <td><?php echo $contrato->fecha_desempeno; ?></td>
                                                                                    <?php
                                                                                    if($contrato->estado == 'desempenado'){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_desempenado = New DateTime($contrato->fecha_desempeno);
                                                                                        $dias_desde_desempenado = $hoy->diff($fecha_desempenado);
                                                                                        $dias_desde_desempenado = $dias_desde_desempenado->format('%a');
                                                                                    }else{
                                                                                        $dias_desde_desempenado= '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo $dias_desde_desempenado; ?></td>
                                                                                    <?php
                                                                                    //se vendio
                                                                                    if($contrato->estado == 'liquidado' or $contrato->estado == 'liquidado_parcial'){
                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $valor_liquidado = $producto->precio_vendido;
                                                                                        }else{
                                                                                            $valor_liquidado ='0';
                                                                                        }

                                                                                        //$total_ganancia_contrato = $total_ganancia_contrato +$total_liquidacion;
                                                                                    }else{
                                                                                        $valor_liquidado ='0';
                                                                                    }
                                                                                    $total_liquidacion = $total_liquidacion +$valor_liquidado;
                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($valor_liquidado); ?></td>
                                                                                    <?php
                                                                                    //saber fecha de venta
                                                                                    //si tiente fecha de venta
                                                                                    if($producto->fecha_venta == '0000-00-00'){
                                                                                        //si esta vendido
                                                                                        if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial'){

                                                                                            //buscamos fecha de factura
                                                                                            $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($producto->producto_id);
                                                                                            if($factura_liquidacion_id){
                                                                                                //datos de factura
                                                                                                $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $producto->tienda_actual);
                                                                                                if($factura_liquidacion){
                                                                                                    $factura_liquidacion = $factura_liquidacion->row();
                                                                                                    $fecha_liquidacion =  $factura_liquidacion->fecha;

                                                                                                    //cuantos dias tardo en liquidarse
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            $fecha_liquidacion = $producto->fecha_venta;
                                                                                        }

                                                                                    }else{
                                                                                        $fecha_liquidacion = $producto->fecha_venta;
                                                                                    } ?>
                                                                                    <td><?php echo $fecha_liquidacion ?></td>
                                                                                    <?php
                                                                                    $ganancia_liquidacion =0;
                                                                                    //ganancia liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial') {

                                                                                        if($producto->tipo == 'vendido'){
                                                                                            $ganancia_liquidacion = $producto->precio_vendido - $producto->mutuo ;
                                                                                            $porcentage_ganancia_liquidacion = $ganancia_liquidacion /$producto->mutuo;
                                                                                        }else{
                                                                                            $ganancia_liquidacion ='0';
                                                                                        }
                                                                                    }else{
                                                                                        $ganancia_liquidacion =0;
                                                                                        $porcentage_ganancia_liquidacion = 0;
                                                                                    }
                                                                                    $total_gangancia_liquidacion =  $total_gangancia_liquidacion+$ganancia_liquidacion;
                                                                                    $total_ganancia_contrato = $total_ganancia_contrato +$ganancia_liquidacion;


                                                                                    ?>

                                                                                    <td><?php echo 'Q.'.formato_dinero($ganancia_liquidacion) ?></td>
                                                                                    <td><?php echo number_format($porcentage_ganancia_liquidacion, 2); ?></td>

                                                                                    <?php
                                                                                    //dias transcurrisdos hasta la liquidacion
                                                                                    if($contrato->estado =='liquidado' or $contrato->estado =='liquidado_parcial' ){
                                                                                        //dias desde que se refendo
                                                                                        $fecha_perdido = New DateTime($contrato->dias_gracia);
                                                                                        /* echo gettype($fecha_liquidacion), "\n";
                                                                                         echo $fecha_liquidacion;*/
                                                                                        $fecha_liquidado = New DateTime($fecha_liquidacion);
                                                                                        $dias_para_liquidacion = $fecha_liquidado->diff($fecha_perdido);
                                                                                        $dias_para_liquidacion = $dias_para_liquidacion->format('%a');
                                                                                    }else{
                                                                                        $dias_para_liquidacion= '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $dias_para_liquidacion ?></td>
                                                                                    <?php
                                                                                    $total_abono_contrato = 0;
                                                                                    //abonos  a contratos
                                                                                    $abonos_a_contrato = $ci->Recibo_model->get_abonos_a_contrato_reporte($contrato->contrato_id, $producto->tienda_actual);
                                                                                    if($abonos_a_contrato){
                                                                                        $recibo_abono =$abonos_a_contrato->row();
                                                                                        $fecha_abono = $recibo_abono->fecha_recibo;
                                                                                        $monto_abono_contrato = $recibo_abono->monto /$numero_productos_en_contrato;
                                                                                        $total_abono_contrato = $total_abono_contrato + $monto_abono_contrato;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_abono_contrato;

                                                                                    }else{
                                                                                        $fecha_abono = '0';
                                                                                        $monto_abono_contrato = '0';
                                                                                    }

                                                                                    ?>
                                                                                    <td><?php echo 'Q.'.formato_dinero($monto_abono_contrato); ?></td>
                                                                                    <td><?php echo $fecha_abono; ?></td>
                                                                                    <?php
                                                                                    if($producto->tipo == 'apartado'){
                                                                                        $total_apartado = $total_apartado + $producto->apartado;
                                                                                        $total_ganancia_contrato = $total_ganancia_contrato+ $total_apartado;
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $producto->apartado ?></td>
                                                                                    <?php
                                                                                    //fecha apartado
                                                                                    //echo $producto->recibo_apartado;
                                                                                    $recibo_apartado =$ci->Recibo_model->get_apartado_reporte($producto->recibo_apartado, $producto->tienda_actual);

                                                                                    if($recibo_apartado){
                                                                                        $recibo_apartado =$recibo_apartado->row();
                                                                                        $fecha_apartado = $recibo_apartado->fecha_recibo;

                                                                                    }else{
                                                                                        $fecha_apartado = '0';
                                                                                    }
                                                                                    ?>
                                                                                    <td><?php echo $fecha_apartado ?></td>

                                                                                </tr>
                                                                                <?php
                                                                                $numero_de_productos = $numero_de_productos+1;
                                                                            }?>
                                                                        </table>
                                                                        <?php

                                                                    }else{echo 'no hay producto'; } ?>



                                                                </td>
                                                                <?php
                                                                $total_total_ganancia_de_contrato = $total_total_ganancia_de_contrato+$total_ganancia_contrato;
                                                                ?>
                                                                <td><?php echo $total_ganancia_contrato?> </td>
                                                                <?php
                                                                $numero_de_contratos = $numero_de_contratos+ 1;
                                                                }?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-condensed table-bordered table-hover">
                                                            <tr>
                                                                <td>Total de contratos</td>
                                                                <td>Total de productos</td>
                                                                <td>Total de Mutuo</td>
                                                                <td>Total % de interes </td>
                                                                <td>Total Ventas </td>
                                                                <td>Total ganancia Ventas </td>
                                                                <td>Total % Ventas </td>
                                                                <td>Total abono contratos </td>
                                                                <td>Total apartado</td>
                                                                <td>Total gangancias de contratos</td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $numero_de_contratos -1?></td>
                                                                <td><?php echo $numero_de_productos -1 ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_mutuo) ?></td>
                                                                <?php
                                                                $tota_porcentage_interes = $total_intereses / $total_mutuo *100;
                                                                ?>
                                                                <td><?php echo 'Q.'.formato_dinero($tota_porcentage_interes);
                                                                    ?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_liquidacion);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_gangancia_liquidacion); ?></td>
                                                                <?php $tota_porcentage_ventas = $total_gangancia_liquidacion / $total_mutuo *100;?>
                                                                <td><?php echo number_format($tota_porcentage_ventas, 2);?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_abono_contrato)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_apartado)?></td>
                                                                <td><?php echo 'Q.'.formato_dinero($total_total_ganancia_de_contrato)?></td>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!--<div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        Totales
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                <tr>
                                                    <td>totales</td>
                                                    <td colspan="3">Total deposito</td>
                                                </tr>
                                                <tr>
                                                    <td>de <?php /*/*echo $fecha_inicio_t->format('Y-m-d'); */?>
                                                        <br>
                                                        a <?php /*/*echo $fecha_final->format('Y-m-d'); */?>
                                                    </td>
                                                    <td colspan="3"><?php /*/*echo 'Q.' . formato_dinero($total_global_deposito); */?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </table>
                                    </div>
                                </div>
                            </div>-->
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
        url = '<?php echo base_url();?>' + 'Reportes/contratos/' + from + '/' + to;
        window.location.href = url;
    });


</script>
<?php $this->stop() ?>
