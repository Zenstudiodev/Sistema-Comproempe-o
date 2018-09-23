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

if ($traslado) {
    $traslado = $traslado->row();
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
    <?php //print_contenido($traslado); ?>

    <?php if ($traslado) { ?>


    <div id="imprimir_factura">
        <table>
            <tr>
                <td style="width: 4cm;"><img src="/ui/public/images/logo.png"></td>
                <td style="text-align: center"><h1>ENVIO DE MERCADERIA</h1></td>
                <td>No.</td>
                <td><?php echo $traslado->traslado_id; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>De:</td>
                <td><?php echo $traslado->traslado_tienda_actual; ?></td>
            </tr>
            <tr>
                <td>A:</td>
                <td><?php echo $traslado->traslado_tienda_destino; ?></td>
            </tr>
            <tr>
                <td>Asunto:</td>
                <td>Envío de mercaderia</td>
            </tr>
            <tr>
                <td>Fecha:</td>
                <td><?php echo $traslado->traslado_fecha; ?></td>
            </tr>
        </table>
        <table CLASS="table table-bordered" id="print_lista_traslado">
            <thead>
            <tr>
                <td>CODIGO</td>
                <td>CONTRATO</td>
                <td>CANTIDAD</td>
                <td>DESCRIPCIÓN</td>
                <td>MUTUO</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos->result() as $producto) { ?>
                <tr>
                    <td><?php echo $producto->producto_id ?></td>
                    <td><?php echo $producto->contrato_id ?></td>
                    <td>1</td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo display_formato_dinero($producto->avaluo_comercial) ?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <table>
            <tr>
                <td>Hecho por:</td>
                <td><?php echo id_to_nombre($traslado->user_id); ?></td>
            </tr>
            <tr>
                <td>Recibido por:</td>
                <td></td>
            </tr>

        </table>
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div><!-- /#xcontrato -->
<?php }
else {
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

        window.print();
    });


</script>
<?php $this->stop() ?>
