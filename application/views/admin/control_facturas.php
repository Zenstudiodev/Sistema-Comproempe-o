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
            Lista de series facturas
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
                <a class="btn btn-app bg-olive" href="<?php echo base_url() ?>index.php/factura/nueva_serie">
                    <i class="fa fa-edit"></i> Nuevo
                </a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
				<?php if ($series) { ?>
                    <!-- <pre>

                    <?php /*//print_r($facturas->result()) */ ?>
                    </pre>-->
                    <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>ACTIVAR</th>
                                <th>LOTE</th>
                                <th>ESTADO</th>
                                <th>CORRELATIVO DEL</th>
                                <th>CORRELATIVO AL</th>
                                <th>CANTIDAD</th>
                                <th>USADAS</th>
                                <th>SERIE</th>
                                <th>FECHA DE VENCIMIENTO</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ACTIVAR</th>
                                <th>LOTE</th>
                                <th>ESTADO</th>
                                <th>CORRELATIVO DEL</th>
                                <th>CORRELATIVO AL</th>
                                <th>CANTIDAD</th>
                                <th>USADAS</th>
                                <th>SERIE</th>
                                <th>FECHA DE VENCIMIENTO</th>
                            </tr>
                            </tfoot>
                            <tbody>
							<?php foreach ($series->result() as $serie)
							{ ?>
                                <tr>
                                    <td>
                                    <?php if($serie->estado == 'inactivo'){?>
                                        <a href="<?php echo base_url() . 'index.php/factura/activar_lote_facturas/' . $serie->id ?>"
                                           class="btn btn-block btn-success">
                                            Activar
                                        </a>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $serie->id ?></td>
                                    <td><?php echo $serie->estado ?></td>
                                    <td><?php echo $serie->correlativo_del ?></td>
                                    <td><?php echo $serie->correlativo_al ?></td>
                                    <td><?php echo $serie->cantidad ?></td>
                                    <td><?php echo $serie->usadas ?></td>
                                    <td><?php echo $serie->serie ?></td>
                                    <td><?php echo $serie->fecha_vencimiento ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>

				<?php }
				else
				{
					echo 'Aún no hay Series ingresadas';
				} ?>
            </div>
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
