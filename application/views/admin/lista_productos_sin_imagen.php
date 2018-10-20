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
            Lista de productos sin foto
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (isset($error)) { ?>
                    <div class="row">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×
                            </button>
                            <h4><i class="icon fa fa-ban"></i> Transacción vacia!</h4>
                            <?php echo $error ?>
                        </div>
                    </div>

                <?php } ?>
                <?php if ($productos_sin_foto) { ?>
                    <div class="table-responsive">
                        <table id="productos_sin_foto_table" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>Accion</th>
                                <th>PRODUCTO ID</th>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>PRODUCTO ID</th>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($productos_sin_foto->result() as $producto) { ?>

                                <tr>

                                    <td><a class="btn btn-success" href="<?php echo base_url().'productos/subir_imagenes_producto/'.$producto->producto_id?>">Subir imagenes</a> </td>
                                    <td><?php echo $producto->producto_id ?></td>
                                    <td><?php echo $producto->nombre_producto ?></td>
                                    <td><?php echo $producto->categoria ?></td>
                                </tr>


                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×
                            </button>
                            <h4><i class="fas fa-bell"></i> No hay productos sin foto</h4>
                        </div>
                    </div>
                <?php } ?>
            <!-- /.box-body -->
        </div>
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
        $('#productos_sin_foto_table tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable
        var table = $('#productos_sin_foto_table').DataTable(
            {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
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
