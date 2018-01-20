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
            Lista de Recibos
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
				<?php if ($recibos) { ?>

                    <table id="example1" class="table table-bordered table-striped display">
                        <thead>
                        <tr>
                            <th>RECIBO No</th>
                            <th>NOMBRE</th>
                            <th>FECHA</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>RECIBO No</th>
                            <th>NOMBRE</th>
                            <th>FECHA</th>
                            <th>TOTAL</th>
                        </tr>
                        </tfoot>
                        <tbody>
						<?php foreach ($recibos->result() as $recibo)
						{ ?>
                            <tr>
                                <td><?php echo $recibo->recibo_id ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'index.php/cliente/detalle/' . $recibo->id; ?>"><?php echo $recibo->nombre ?></a>
                                </td>
                                <td><?php echo $recibo->fecha ?></td>
                                <td><?php echo $recibo->monto ?></td>
                            </tr>
						<?php } ?>


                        </tbody>
                    </table>

				<?php } else {
					echo 'Aún no hay clientes';
				} ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reporte de Recibos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			    <?php if ($recibos) { ?>

				    <?php
				    $total_de_recibos = 0;
				    foreach ($recibos->result() as $recibo)
				    { ?>
					    <?php

						    $total_de_recibos = $total_de_recibos + $recibo->monto;

					    ?>


				    <?php } ?>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Recibos</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_de_recibos);?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
			    <?php }
			    else
			    {
				    echo 'Aún no hay recibos';
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
