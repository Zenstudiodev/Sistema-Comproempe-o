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
]);pedidos
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
        <div class="col-xs-12">
            <h2 class="page-header">
                Contratos
            </h2>
        </div>
        <?php if ($pedidos) {
            ?>
            <div class="row"></div>
            <div class="table-responsive">
                <table id="empeno_contratos_table"
                       class="table table-bordered table-striped display compact nowrap dataTable">
                    <thead>
                    <tr>
                        <th>ID PEDIDO</th>
                        <th>FECHA PEDIDO</th>
                        <th>NOMBRE CLIENTE</th>
                        <th>CORREO</th>
                        <th>TELEFONO</th>
                        <th>DIRECCION</th>
                        <th>PRODUCTO_ID</th>
                        <th>ESTADO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pedidos->result() as $pedido) {
                       ?>

                        <tr>
                            <td style="width: 10%">
                                <?php echo $pedido->pedido_id ?>
                            </td>
                            <td><?php echo $pedido->pedido_fecha; ?></td>
                            <td><?php echo $pedido->pedido_cliente_nombre; ?></td>
                            <td><?php echo $pedido->pedido_cliente_correo; ?></td>
                            <td><?php echo $pedido->pedido_cliente_telefono; ?></td>
                            <td><?php echo $pedido->pedido_cliente_direccion; ?></td>
                            <td><?php echo $pedido->pedido_producto_id; ?></td>
                            <td><?php echo $pedido->pedido_estado; ?></td>
                            <td><a class="btn btn-success" href="<?php echo base_url().'productos/detalle_pedido/'.$pedido->pedido_id.'/'.$pedido->pedido_producto_id?>">Ver pedido</a> </td>
                        </tr>

                    <?php
                    } ?>
                    </tbody>
                </table>
            </div>

        <?php } ?>
        <hr>
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
