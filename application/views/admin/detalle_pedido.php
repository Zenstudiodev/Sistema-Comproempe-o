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

$pedido = $pedido->row();
$producto = $producto->row();

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
    <section class="invoice">

        <div class="col-md-12">
            <h2 class="page-header">
                Detalle del pedido
            </h2>
        </div>
        <?php
        //print_contenido($pedido);
        //print_contenido($producto);
        ?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td colspan="2">Cliente</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nombre:</td>
                <td><?php echo $pedido->pedido_cliente_nombre; ?></td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><?php echo $pedido->pedido_cliente_correo; ?></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><?php echo $pedido->pedido_cliente_telefono; ?></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><?php echo $pedido->pedido_cliente_direccion; ?></td>
            </tr>
            </tbody>

        </table>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td colspan="2">Producto</td>
                <td>Id: <b><?php echo $producto->producto_id; ?></b></td>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nombre:</td>
                <td><?php echo $producto->nombre_producto; ?></td>
                <td>Categoría:</td>
                <td><?php echo $producto->categoria; ?></td>
            </tr>
            <tr>
                <td>Marca:</td>
                <td><?php echo $producto->marca; ?></td>
                <td>Modelo:</td>
                <td><?php echo $producto->modelo; ?></td>
                <td>Serie:</td>
                <td><?php echo $producto->no_serie; ?></td>
            </tr>
            </tbody>

        </table>
        <hr>
        <a class="btn btn-success">facturar</a>
        <a class="btn btn-danger">Cancelar</a>
    </section>


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

<?php $this->stop() ?>
