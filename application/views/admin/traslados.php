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

?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/datatables/dataTables.bootstrap.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de traslados
            <small></small>
        </h1>
        <!-- TODO breadCrumb
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
        -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Custom Tabs -->
                <!-- nav-tabs-custom -->
                <?php if ($traslados) { ?>
                    <!-- <pre>

                    <?php /*//print_r($facturas->result()) */ ?>
                    </pre>-->
                    <div class="table-responsive">

                        <table id="traslados_table" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>No Traslado</th>
                                <th>FECHA</th>
                                <th>DE TIENDA</th>
                                <th>A TIENDA</th>
                                <th>OPERADOR</th>
                                <th>PRODUCTOS</th>
                                <th>ACCION</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No Traslado</th>
                                <th>FECHA</th>
                                <th>DE TIENDA</th>
                                <th>A TIENDA</th>
                                <th>OPERADOR</th>
                                <th>PRODUCTOS</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($traslados->result() as $traslado) { ?>
                                <tr>
                                    <td><?php echo $traslado->traslado_id ?></td>
                                    <td><?php echo $traslado->traslado_fecha ?></td>
                                    <td><?php echo $traslado->traslado_tienda_actual ?></td>
                                    <td><?php echo $traslado->traslado_tienda_destino ?></td>
                                    <td><?php echo id_to_nombre($traslado->user_id) ?></td>
                                    <td><?php echo $traslado->traslado_productos ?></td>
                                    <td><a class="btn btn-success" href="<?php echo base_url().'productos/imprimir_trslado/'.$traslado->traslado_id ?>">Imprimir</a> </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                <?php } else {
                    echo 'Aún no hay facturas';
                } ?>
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
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#traslados_table tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#traslados_table').DataTable();

        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });


</script>
<?php $this->stop() ?>
