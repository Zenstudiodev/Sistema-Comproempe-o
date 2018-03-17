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
            Lista de facturas
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="<?php echo base_url() ?>/factura">
                                <?php
                                $tienda = tienda_id_h();
                                // insertamon en la base de datos
                                if ($tienda == '1') {
                                    ?>
                                    Serie A
                                <?php } elseif ($tienda == '2') { ?>
                                    Serie CN
                                <?php } ?>
                            </a></li>
                        <li class=""><a href="<?php echo base_url() ?>/factura/serie_r">Serie R</a></li>
                    </ul>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
                <?php if ($facturas) { ?>
                    <!-- <pre>

                    <?php /*//print_r($facturas->result()) */ ?>
                    </pre>-->
                    <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>FACTURA No</th>
                                <th>NOMBRE</th>
                                <th>FECHA</th>
                                <th>TOTAL</th>
                                <th>ESTADO</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>FACTURA No</th>
                                <th>NOMBRE</th>
                                <th>FECHA</th>
                                <th>TOTAL</th>
                                <th>ESTADO</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($facturas->result() as $factura) { ?>
                                <tr>
                                    <td><?php echo $factura->factura_id ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'index.php/cliente/detalle/' . $factura->id; ?>"
                                           target="_blank"><?php echo $factura->nombre ?></a>
                                    </td>
                                    <td><?php echo $factura->fecha ?></td>
                                    <td><?php echo $factura->total ?></td>
                                    <td><?php echo $factura->estado ?></td>
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
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reporte de facturación</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if ($facturas) { ?>

                    <?php
                    $total_de_facturas = 0;
                    foreach ($facturas->result() as $factura) { ?>
                        <?php
                        if ($factura->estado == 'activa') {
                            $total_de_facturas = $total_de_facturas + $factura->total;
                        }

                        ?>


                    <?php } ?>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Facturas</span>
                                    <span class="info-box-number">Total: Q.<?php echo $total_de_facturas; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
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
