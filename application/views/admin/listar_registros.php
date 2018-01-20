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
            Lista de Registros
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
				<?php if ($registros) { ?>

                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>ACCION</th>
                            <th>CONTRATO</th>
                            <th>CLIENTE</th>
                            <th>USUARIO</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>ACCION</th>
                            <th>CONTRATO</th>
                            <th>CLIENTE</th>
                            <th>USUARIO</th>
                        </tr>
                        </tfoot>
                        <tbody>
						<?php foreach ($registros->result() as $registro)
						{ ?>
                            <tr>
                                <td><?php echo $registro->id_log ?></td>
                                <td><?php echo $registro->fecha_log ?></td>
                                <td><?php echo $registro->accion_log ?></td>
                                <td><?php echo $registro->contrato_id ?></td>
                                <td><?php echo $registro->cliente_id ?></td>
                                <td><?php echo $registro->user_id ?></td>
                            </tr>
						<?php } ?>


                        </tbody>
                    </table>
                    </div>

				<?php } else {
					echo 'Aún no hay clientes';
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
        $('#example1 tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#example1').DataTable();

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
