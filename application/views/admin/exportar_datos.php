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
            Exportar datos
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
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Titilo</th>
                            <th>Accion</th>

                        </tr>
                        <tr>
                            <td>Clientes</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/cliente/clientes_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Productos</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/productos/productos_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Contratos</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/contrato/contratos_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Facturas</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/factura/facturas_html_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Facturas R</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/factura/facturas_r_html_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Recibos</td>
                            <td>
                                <a class="btn btn-app bg-olive"
                                   href="<?php echo base_url() ?>index.php/recibo/recibos_excel" target="_blank">
                                    <i class="fa fa-edit"></i> Exportar excel
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

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
