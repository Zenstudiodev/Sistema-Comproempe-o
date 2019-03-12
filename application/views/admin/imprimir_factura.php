<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 1:50 PM
 */

$this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
]);

if ($cliente)
{
	$cliente = $cliente->row();
}

if ($factura)
{
	$factura = $factura->row();
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
	<?php if ($factura) { ?>
	<?php
	setlocale(LC_TIME, "es_ES");
	$fecha_actual = new DateTime();
	$fecha_factura = new DateTime($factura->fecha);
	setlocale(LC_ALL, 'es_GT.UTF-8');
	?>

    <?php
    $tienda = tienda_id_h();
    if($tienda == '3'){ ?>
        <div id="imprimir_factura">
            <table>
                <tr style="height: 0.8cm;">
                    <td colspan="4"></td>
                </tr>
                <tr style="text-align: center">
                    <td style="width: 32cm;"></td>
                    <td style="width: 1cm;"><?php echo $fecha_factura->format('d'); ?></td>
                    <td style="width: 4.30cm"><?php echo $fecha_factura->format('m'); ?></td>
                    <td style="width: 2cm"><?php echo $fecha_factura->format('y'); ?></td>
                </tr>
            </table>
            <table>
                <tr style="height: 0.5cm;">
                    <td style="padding-left: 3cm;  " colspan="4"><?php echo $cliente->nombre; ?></td>
                </tr>
                <tr style="height: 0.5cm;">
                    <td style="padding-left: 3cm; width: 20cm;"><?php echo $cliente->direccion ?></td>
                    <td><?php echo $cliente->nit ?></td>
                </tr>
            </table>
            <table style="width: 21.59cm; height: 4.3cm;" id="detalle_factura">
                <tr style="height:0.63cm;">
                    <td colspan="4"></td>
                </tr>



                <?php if ($factura->tipo == 'venta') { ?>
                    <?php echo($factura->detalle); ?>

                <?php }
                else
                {
                    ?>
                    <tr>
                        <td style="width: 3cm"></td>
                        <td colspan="2" style="width: 15.90cm">Intereses
                            por <?php echo tipo_factura_text($factura->tipo) ?>
                            de contrato <?php echo $factura->contrato_id ?></td>
                        <td style="width: 2cm">Q. <?php display_formato_dinero($factura->intereses); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">Servicio de almacenamiento</td>
                        <td>Q. <?php display_formato_dinero($factura->almacenaje); ?></td>
                    </tr>

                    <?php if ($factura->mora != null) { ?>
                    <tr style="height: 1cm">
                        <td ></td>
                        <td colspan="2">Mora</td>
                        <td>Q. <?php display_formato_dinero($factura->mora); ?></td>
                    </tr>
                <?php } ?>
                    <?php if ($factura->recuperacion != null) { ?>
                    <tr style="height: 1cm">
                        <td></td>
                        <td colspan="2">Gastos de recuperación</td>
                        <td>Q. <?php display_formato_dinero($factura->recuperacion); ?></td>
                    </tr>
                <?php } ?>
                    <?php if ($factura->tipo == 'refrendo') { ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Nueva fecha de vencimiento:
                            <?php
                            $fecha_pago = new DateTime($contrato->fecha_pago);
                            echo $fecha_pago->format('d-m-Y');
                            ?></td>
                        <td></td>
                    </tr>
                <?php } ?>

                <?php } ?>
            </table>
            <table>
                <tr style="height: 0.8cm;">
                    <td style="width: 3cm"></td>
                    <td colspan="2">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES.</td>
                    <td style="width: 1.51cm">Q. <?php echo display_formato_dinero($factura->subtotal); ?></td>
                </tr>
                <tr style="height:  0.8cm;">
                    <td style="width: 3cm; "></td>

                    <td colspan="2" style="width: 11.07cm; text-align: center;">
                        <?php if ($factura->tipo != 'venta') { ?>
                            <?php echo $contrato->contrato_id; ?>
                        <?php } ?>
                    </td>
                    <td style="width: 1.51cm">Q.<?php display_formato_dinero($factura->descuento); ?></td>
                </tr>
                <tr style="height: 0.8cm;">
                    <td style="width: 3cm; "></td>

                    <td colspan="2"
                        style="width: 11.07cm; text-align: center;">
                        <?php if ($factura->tipo != 'venta') { ?>
                            <?php display_formato_dinero($contrato->total_mutuo); ?>
                        <?php } ?>
                    </td>
                    <td style="width: 1.51cm">Q.<?php display_formato_dinero($factura->total); ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr style=" height: 0.5cm; vertical-align: bottom; ">
                    <td colspan="4" style="padding-left: 1.70cm">
                        <span id="total_en_letras"></span>
                    </td>
                </tr>
            </table>
        </div>
        <?php }else{ ?>
        <div id="imprimir_factura">
            <table>
                <tr style="height: 2.5cm;">
                    <td colspan="4"></td>
                </tr>
                <tr style="text-align: center">
                    <td style="width: 16cm;"></td>
                    <td style="width: 1cm;"><?php echo $fecha_factura->format('d'); ?></td>
                    <td style="width: 4.30cm"><?php echo $fecha_factura->format('m'); ?></td>
                    <td style="width: 2cm"><?php echo $fecha_factura->format('y'); ?></td>
                </tr>
            </table>
            <table>
                <tr style="height: 1cm;">
                    <td style="padding-left: 2.4cm;  " colspan="4"><?php echo $cliente->nombre; ?></td>
                </tr>
                <tr style="height: 1cm;">
                    <td style="padding-left: 2.4cm; width: 17.60cm;"><?php echo $cliente->direccion ?></td>
                    <td><?php echo $cliente->nit ?></td>
                </tr>
            </table>
            <table style="width: 21.59cm; height: 7.3cm;" id="detalle_factura">
                <tr style="height:0.63cm;">
                    <td colspan="4"></td>
                </tr>



                <?php if ($factura->tipo == 'venta') { ?>
                    <?php echo($factura->detalle); ?>

                <?php }
                else
                {
                    ?>
                    <tr>
                        <td style="width: 2.2cm"></td>
                        <td colspan="2" style="width: 15.90cm">Intereses
                            por <?php echo tipo_factura_text($factura->tipo) ?>
                            de contrato <?php echo $factura->contrato_id ?></td>
                        <td style="width: 3.51cm">Q. <?php display_formato_dinero($factura->intereses); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">Servicio de almacenamiento</td>
                        <td>Q. <?php display_formato_dinero($factura->almacenaje); ?></td>
                    </tr>

                    <?php if ($factura->mora != null) { ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Mora</td>
                        <td>Q. <?php display_formato_dinero($factura->mora); ?></td>
                    </tr>
                <?php } ?>
                    <?php if ($factura->recuperacion != null) { ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Gastos de recuperación</td>
                        <td>Q. <?php display_formato_dinero($factura->recuperacion); ?></td>
                    </tr>
                <?php } ?>
                    <?php if ($factura->tipo == 'refrendo') { ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Nueva fecha de vencimiento:
                            <?php
                            $fecha_pago = new DateTime($contrato->fecha_pago);
                            echo $fecha_pago->format('d-m-Y');
                            ?></td>
                        <td></td>
                    </tr>
                <?php } ?>

                <?php } ?>
            </table>
            <table>
                <tr style="height: 0.8cm;">
                    <td></td>
                    <td colspan="2">NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES.</td>
                    <td style="width: 3.51cm">Q. <?php echo display_formato_dinero($factura->subtotal); ?></td>
                </tr>
                <tr style="height:  0.8cm;">
                    <td style="width: 3.73cm; "></td>

                    <td colspan="2" style="width: 11.07cm; text-align: center;">
                        <?php if ($factura->tipo != 'venta') { ?>
                            <?php echo $contrato->contrato_id; ?>
                        <?php } ?>
                    </td>
                    <td style="width: 3.51cm">Q.<?php display_formato_dinero($factura->descuento); ?></td>
                </tr>
                <tr style="height: 0.8cm;">
                    <td></td>

                    <td colspan="2"
                        style="width: 11.07cm; text-align: center;">
                        <?php if ($factura->tipo != 'venta') { ?>
                            <?php display_formato_dinero($contrato->total_mutuo); ?>
                        <?php } ?>
                    </td>
                    <td style="width: 3.51cm">Q.<?php display_formato_dinero($factura->total); ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr style=" height: 1cm; vertical-align: bottom; ">
                    <td colspan="4" style="padding-left: 1.70cm">
                        <span id="total_en_letras"></span>
                    </td>
                </tr>
            </table>
        </div>
        <?php } ?>


    <!-- /.box -->

    </section>
    <!-- /.content -->
</div><!-- /#xcontrato -->
<?php }
else
{
	echo 'El producto que busca no existe';
} ?>
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/dist/js/numeros_a_letras.js"></script>
<script>

    var total_en_letras;


    $(document).ready(function () {
        total_en_letras = '<?php echo $factura->total; ?>';
        total_en_letras = parseFloat(total_en_letras).toFixed(2);
        total_en_letras = covertirNumLetras(total_en_letras);

        $("#total_en_letras").html(total_en_letras);
        window.print();
    });


</script>
<?php $this->stop() ?>
