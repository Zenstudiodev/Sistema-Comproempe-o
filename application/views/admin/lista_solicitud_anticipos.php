<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 20/02/2019
 * Time: 12:46 PM
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
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Solicitudes de anticipo pendientes
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Solicitudes de anticipo pendientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if ($solicitudes) { ?>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Monto deseado </th>
                                <th>Salario</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Monto deseado </th>
                                <th>Salario</th>
                            </tr>
                            </tfoot>
                            <tbody>
							<?php foreach ($solicitudes->result() as $solicitu)
							{ ?>
                                <tr>
                                    <td><?php echo $solicitu->id_sa ?></td>
                                    <td><?php echo $solicitu->fecha_sa ?></td>
                                    <td><?php echo $solicitu->nombre_cliente_sa ?></td>
                                    <td><?php echo $solicitu->monto_deseado_sa ?></td>
                                    <td><?php echo $solicitu->salario_sa ?></td>
                                    <td><a class="btn btn-success" href="<?php echo base_url().'anticipos/atender_solicitud/'. $solicitu->id_sa ?>">Atender</a> </td>
                                </tr>
							<?php } ?>


                            </tbody>
                        </table>
                    </div>
				<?php } else {
					echo 'Aún no hay solicitudes pendientes';
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
<script src="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.js"></script>
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

    $('#reservation').on('apply.daterangepicker', function (ev, picker) {
        from = picker.startDate.format('YYYY-MM-DD');
        to = picker.endDate.format('YYYY-MM-DD');

        url = '<?php echo base_url();?>' + 'index.php/cliente/index/' + from + '/' + to;

        window.location.href = url;
    });


</script>
<?php $this->stop() ?>
