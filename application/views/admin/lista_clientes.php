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
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de usuarios
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
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Acciones </h3>
            </div>
            <div class="box-body">
                <a class="btn btn-app bg-olive" href="<?php echo base_url() ?>index.php/cliente/crear/">
                    <i class="fa fa-edit"></i> Nuevo
                </a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de usuarios</h3>
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
                        <input type="text" class="form-control pull-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                </div>

				<?php if ($clientes) { ?>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>CLIENTE ID</th>
                                <th>ESTADO DE CUENTA</th>
                                <th>NOMBRE</th>
                                <th>DPI</th>
                                <th>NIT</th>
                                <th>TELÉFONO</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>CLIENTE ID</th>
                                <th>ESTADO DE CUENTA</th>
                                <th>NOMBRE</th>
                                <th>DPI</th>
                                <th>NIT</th>
                                <th>TELÉFONO</th>
                            </tr>
                            </tfoot>
                            <tbody>
							<?php foreach ($clientes->result() as $cliente)
							{ ?>
                                <tr>
                                    <td><?php echo $cliente->id ?></td>
                                    <td><a class="btn btn-success" href="<?php echo base_url().'cliente/estado_de_cuenta/'. $cliente->id ?>">Estado de cuenta</a> </td>
                                    <td>
                                        <a href="<?php echo base_url() . 'index.php/cliente/detalle/' . $cliente->id; ?>" target="_blank"><?php echo $cliente->nombre ?></a>
                                    </td>
                                    <td><?php echo $cliente->dpi ?></td>
                                    <td><?php echo $cliente->nit ?></td>
                                    <td><?php echo $cliente->telefono ?></td>
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
<script src="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    $(document).ready(function () {
        //Date range picker
        $('#reservation').daterangepicker();


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
