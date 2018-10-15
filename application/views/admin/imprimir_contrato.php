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

if ($cliente)
{
	$cliente = $cliente->row();
}

if ($contrato)
{
	$contrato = $contrato->row();
}


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/dist/css/contrato.css"
      type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.min.css"
      type="text/css">
<link rel="stylesheet"
      href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.themes.min.css"
      type="text/css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/datepicker/datepicker3.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php if ($productos) { ?>

        <div id="contrato">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    imprimir contrato: <?php echo $contrato->contrato_id; ?> -
                    <small></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del contrato</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="<?php echo base_url() ?>Contrato/guardar_contrato" method="post"
                          id="contrato_form"
                          name="contrato_form">
                        <table class="table table-condensed">
                            <tbody>
                            <div id="logo_print">
                                <img src="<?php echo base_url() ?>/ui/public/images/logo.png" class="img-responsive">
                            </div>
                            <tr>
                                <td>
	                                <?php echo $contrato->fecha;?>
                                </td>
                                <td>Cliente: <?php echo $cliente->nombre ?></td>
                                <td>Còdigo de cliente: <?php echo $cliente->id ?></td>
                                <td>No. de contrato  <?php echo $contrato->contrato_id; ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <td>
                                    <p>
                                        CONTRATO DE MUTO CON INTERESES Y GARANTIAS PRENDARIAS QUE CELEBRAN POR UNA PARTE
                                        LA
                                        ENTIDAD DENOMINADA “GRUPO DE INVERSION Y SERVICIOS V & S, SOCIEDAD ANONIMA”, A
                                        QUIEN
                                        DE
                                        AQUÍ EN ADELANTE SE LE DENOMINARA “EL MUTUANTE” Y POR OTRA PARTE,
                                        (<?php echo $cliente->nombre; ?>) , AQUIEN DE AQUI EN ADELANTE SE LE DENOMINARA
                                        “EL
                                        MUTUARIO”, QUIEN SE
                                        IDENTIFICA CON DOCUMENTO PERSONAL DE IDENTIFICACION –DPI- CON CODIGO UNICO DE
                                        IDENTIFICACION –CUI- (<?php echo $cliente->dpi ?>) CON DOMICILIO EN
                                        (<?php echo $cliente->direccion; ?>), QUIEN DESGNA COMO COTITULAR A (<?php echo  $contrato->cotitular?> ) SOLO
                                        PARA
                                        EFECTOS DE ESTE
                                        CONTRATO.

                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td rowspan="2">COSTO DIARIO TOTALIZADO</td>
                                <td rowspan="2">TASA DE INTERESE MENSUAL</td>
                                <td rowspan="2">MONTO DEL MUTUO (PRESTAMO)</td>
                                <td rowspan="2">PLAZO DEL MUTUO</td>
                                <td rowspan="2">MONTO TOTAL A PAGAR</td>
                                <td colspan="4">COMISIONES</td>
                            </tr>
                            <tr>
                                <td colspan="4">MONTOS Y CLAUSULAS</td>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <p id="costo_diario"></p>

									<?php
									//$costo_dirario = ($producto->tasa_interes + $producto->almacenaje) / 30;
									//echo number_format($costo_dirario, 2); ?>
                                </td>
                                <td>
	                                <?php echo $contrato->tasa_interes;?>%
                                </td>
                                <td><p class=" monto_mutuo"></p>
                                </td>
                                <td>
	                                <?php echo $contrato->plazo;?> días
                                </td>
                                <td>
	                                Q.<?php echo $contrato->desempeno;?>
                                </td>
                                <td>
                                    Almacenaje:
                                </td>
                                <td>
	                                <?php echo $contrato->almacenaje;?>%
                                </td>
                                <td>
                                    (Claus. 5a)
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>FIJO MAS I.V.A.</td>
                                <td>TASA FIJA</td>
                                <td>MONEDA NACIONAL</td>
                                <td></td>
                                <td></td>
                                <td colspan="4">Comercialización 20 % (Claus.5 b)</td>
                            </tr>
                            <tr>
                                <td>Claus. 3</td>
                                <td>MAS I.V.A.</td>
                                <td></td>
                                <td>DIAS</td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <td colspan="4">
                                    <p>
                                        Metodología del cálculo de interés diario totalizado: Tasa de interés mensual
                                        más
                                        interés por almacenaje dividido entre 30 días. Este porcentaje deberá
                                        multiplicarse
                                        por
                                        el importe del saldo insoluto del préstamo por el número de días efectivamente
                                        transcurridos.

                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p>FECHA LIMITE DE PAGO: (LA FECHA DE LA EMISION + LOS DIAS DE PLAZO)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SU PAGO SERA:
                                </td>
                                <td></td>
                                <td>
	                                <?php echo $contrato->fecha_pago;?>
                                </td>
                                <td width="80%"></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td rowspan="3" width="10%">OPCIONES DE PAGO PARA REFRENDO O DESEMPEÑO</td>
                                <td rowspan="2">NUMERO</td>
                                <td colspan="4">MONTO</td>
                                <td colspan="2">TOTAL A PAGAR</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 13%;">IMPORTE DEL MUTUO (PRESTAMO)</td>
                                <td>INTERESES</td>
                                <td>ALMACENAJE</td>
                                <td>IVA</td>
                                <td>POR REFRENDO</td>
                                <td>POR DESEMPEÑO</td>
                                <td>CUANDO SE REALIZAN LOS PAGOS</td>
                            </tr>
                            <tr>
                                <td><?php echo $contrato->numero_de_productos;?></td>
                                <td>
                                    <p class="monto_mutuo"></p>
                                </td>
                                <td>
	                                Q.<?php display_formato_dinero($contrato->pago_interes);?>
                                </td>
                                <td>
                                    Q.<?php display_formato_dinero($contrato->costo_almacenaje);?>
                                </td>
                                <td>
                                    Q.<?php display_formato_dinero($contrato->pago_iva);?>
                                </td>
                                <td>
                                    Q.<?php display_formato_dinero($contrato->referendo);?>
                                </td>
                                <td>
                                    Q.<?php echo display_formato_dinero($contrato->desempeno);?>
                                </td>
                                <td>
                                    <?php echo $contrato->fecha_pago;?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <td colspan="3">GARANTIA: Para garantizar el pago de este préstamo, EL MUTUARIO deja en
                                    garantía
                                    el bien que se describe a continuación:
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td colspan="3">DESCRIPCION DE LA PRENDA</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>CARACTERISTICAS</td>
                                <td>AVALUO</td>
                                <td>PRESTAMO</td>
                            </tr>

							<?php
							$producto_numero= 1;
							foreach ($productos->result() as $producto)
							{

								?>
                                <tr>
                                    <td width="80%">
										<?php echo $producto->descripcion; ?>
                                    </td>
                                    <td>
                                        Q.<span class="avaluo_producto" precio="<?php echo $producto->avaluo_ce; ?>"><?php display_formato_dinero($producto->avaluo_ce); ?></span>
                                    </td>
                                    <td>Q.<span class="mutuo_producto" precio="<?php echo $producto->mutuo; ?>"><?php  display_formato_dinero($producto->mutuo); ?></span></td>
                                </tr>
                                <input type="hidden" name="producto_<?php echo $producto_numero?>" id="producto_<?php echo $producto_numero?>" value="<?php echo $producto->producto_id?>">
							<?php
							$producto_numero = $producto_numero + 1;
							} ?>
                            <tr>
                                <td>Totales: </td>
                                <td><p class="total_avaluo"></p></td>
                                <td><p class=" monto_mutuo"></p> </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="numero_de_productos" id="numero_de_productos" value="<?php echo $productos->num_rows();?>">

                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <td width="20%">Monto del avalúo</td>
                                <td><span class="total_avaluo"></span></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Dudas, aclaraciones y reclamaciones:</p>
                                    <p>Para cualquier duda, aclaración, reclamación, queja o sugerencia, favor dirigirse
                                        a:</p>
                                    <?php
                                    $tienda = tienda_id_h();
                                    // insertamon en la base de datos
                                    if($tienda == '1'){?>
                                        <p>Domicilio: 23 CALLE 1-55 LOCAL 74PB INTERIOR CENTRAL DE MAYOREO ZONA 12, VILLA
                                            NUEVA,
                                            GUATEMALA</p>
                                        <p>Teléfono: 24771855</p>
                                    <?php }
                                    elseif ($tienda =='2'){ ?>
                                        <p>Domicilio: RUTA AL ATLANTICO 4-26, ZONA 17, CENTRA NORTE, LOCAL U-15,  GUATEMALA, GUATEMALA</p>
                                        <p>Teléfono: 2233-1050</p>
                                    <?php }  ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>DESEMPEÑO</td>
                                <td colspan="2">FIRMAS</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="65%">EL MUTUARIO recoge en el acto y a su entera satisfacción la(s) prenda(S)
                                    arriba descrita(S),
                                    por lo que otorga a GRUPO DE INVERSION Y SERVICIOS, V&S, SOCIEDAD ANONIMA el
                                    finiquito
                                    más
                                    amplio que en derecho corresponda, liberándolo de cualquier responsabilidad jurídica
                                    que
                                    hubiere surgido o pudiere surgir en relación al contrato y a la prenda.
                                </td>
                                <td colspan="2" id="td_firma">
                                    <?php if ($cliente->firmo == 1){?>
                                        <img id="img_firma" src="/firmas/<?php echo $cliente->id; ?>_f.png" >
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Fecha:
                                    <?php
                                    if( $contrato->estado =='desempenado'){
                                        echo $contrato->fecha_desempeno;
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">EL MUTUARIO

                                    <?php
                                    if( $contrato->estado =='desempenado'){ ?>
                                        <img id="img_firma" src="/firmas/<?php echo $cliente->id; ?>_f.png" >
                                   <?php } ?>
                                </td>
                                <td rowspan="2">EL MUTUANTE</td>
                                <td>El Valuador</td>
                            </tr>
                            <tr>
                                <td><?php echo $nombre; ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-condensed">
                            <tr>
                                <td>EL HORARIO DE SERVICIO AL PUBLICO EN ESTE ESTABLECIMIENTO ES DE: LUNES A SABADO DE: 10:00 A 19:00 HORAS DOMINGO DE: 10:00 A 17:00
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <p class="codigo_p"><?php echo $contrato->contrato_id; ?></p>

                        <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $cliente->id ;?>">
                        <input type="hidden" name="fecha_contrato_h" id="fecha_contrato_h">
                        <!--almacenaje-->
                        <!--plazo-->
                        <!--tasa_interes-->
                        <input type="hidden" name="pago_interes" id="pago_interes">
                        <input type="hidden" name="costo_almacenaje" id="costo_almacenaje">
                        <input type="hidden" name="pago_iva" id="pago_iva">
                        <input type="hidden" name="refrendo_h" id="refrendo_h">
                        <input type="hidden" name="desempeno_h" id="desempeno_h">
                        <input type="hidden" name="fecha_pago" id="fecha_pago">
                        <input type="hidden" name="dias_gracia" id="dias_gracia">
                        <input type="hidden" name="tipo" id="tipo" value="Empeno">

                    </form>

                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div><!-- /#xcontrato -->
	<?php }
	else
	{
		echo 'El contrato que busca no existe';
	} ?>
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/numeral/numeral.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script>

    var fecha_contrato;
    var plazo;
    var tasa_interes;
    var almacenaje;
    //declaramos variable global float para total de avaluo
    var fecha_pago;
    var dias_gracia;
    var monto_avaluo = parseFloat("0");
    var monto_mutuo = parseFloat("0");
    var pago_interes = parseFloat("0");
    var costo_almacenaje = parseFloat("0");
    var pago_iva = parseFloat("0");
    var refrendo = parseFloat("0");
    var desempeno = parseFloat("0");
    moment.locale('es');

    $(document).ready(function () {
        window.print();
        //loop a los avaluos de productos seleccionado
        $(".avaluo_producto").each(function () {
            //sumamos los avaluos
            monto_avaluo += parseFloat($(this).attr("precio"));
        });
        //mostramos en pantalla la suma de los avaluos
        monto_avaluo = parseFloat(monto_avaluo).toFixed(2);
        monto_avaluo_string = numeral(monto_avaluo).format('0,0.00');
        $(".total_avaluo").html('Q.'+monto_avaluo_string);

        //loop a los mutuos de productos seleccionado
        $(".mutuo_producto").each(function () {
            //sumamos los avaluos
            monto_mutuo += parseFloat($(this).attr("precio"));
        });
        //mostramos en pantalla la suma de los avaluos
        monto_mutuo = parseFloat(monto_mutuo).toFixed(2);
        monto_mutuo_string = numeral(monto_mutuo).format('0,0.00');
        $(".monto_mutuo").html('Q.'+monto_mutuo_string);

    });

    $("#contrato_form").change(function () {
        //console.log('change');
        fecha_contrato = $("#fecha_contrato").val();
        $("#fecha_contrato_h").val(fecha_contrato);
        plazo = $("#plazo").val();
        tasa_interes = $("#tasa_interes").val();
        almacenaje = $("#almacenaje").val();
        console.log(plazo);
        //fecha de pago =
        fecha_contrato = moment(fecha_contrato);
        fecha_pago = fecha_contrato.add(plazo, 'days').format('YYYY-MM-DD');
        $(".fecha_pago").val(fecha_pago);
        $("#fecha_pago").val(fecha_pago);
        fecha_pago = moment(fecha_pago);
        dias_gracia = fecha_contrato.add(7, 'days').format('YYYY-MM-DD');
        $("#dias_gracia").val(dias_gracia);


        //calcular intereses
        pago_interes = tasa_interes / 30;
        pago_interes = pago_interes * monto_mutuo;
        pago_interes = pago_interes * plazo;
        pago_interes = pago_interes / 100;
        pago_interes = parseFloat(pago_interes).toFixed(2);
        $(".intereses").html(pago_interes);
        $("#pago_interes").val(pago_interes);

        //$("#pago_interes").val(pago_interes);

        //calcular almacenaje
        costo_almacenaje = almacenaje / 30;
        costo_almacenaje = costo_almacenaje * monto_mutuo;
        costo_almacenaje = costo_almacenaje * plazo;
        costo_almacenaje = costo_almacenaje / 100;
        costo_almacenaje = parseFloat(costo_almacenaje).toFixed(2);
        $(".almacenaje").html(costo_almacenaje);
        $("#costo_almacenaje").val(costo_almacenaje);

        // IVA
        pago_iva = pago_interes;
        pago_iva = +pago_iva + +costo_almacenaje;
        pago_iva = pago_iva * 0.12;
        pago_iva = parseFloat(pago_iva).toFixed(2);
        $(".iva").html(pago_iva);
        $("#pago_iva").html(pago_iva);

        //referendo
        refrendo = +pago_interes + +costo_almacenaje + +pago_iva;
        refrendo = parseFloat(refrendo).toFixed(2);
        $(".refrendo").html(refrendo);
        $("#refrendo_h").val(refrendo);

        //desempeño
        desempeno = +refrendo + +monto_mutuo;
        desempeno = parseFloat(desempeno).toFixed(2);
        $(".desempeno").html(desempeno);
        $("#desempeno_h").val(desempeno);



    });
</script>
<?php $this->stop() ?>
