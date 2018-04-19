<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/04/2018
 * Time: 2:40 PM
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/dist/css/reportes.css"
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Lista de contratos
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

            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de contratos Vigentes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">



                    <?php if ($contratos) { ?>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>CATEGORIA</th>
                                    <th>DESCRIPCION</th>
                                    <th>MUTUO</th>
                                    <th>CONTRATO ID</th>
                                    <th>ESTADO CONTRATO</th>
                                    <th>FECHA DE CONTRATO</th>
                                    <th>FECHA VENCIMIENTO</th>
                                    <th>DIAS DE GRACIA</th>
                                    <th>CLIENTE</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>CATEGORIA</th>
                                    <th>DESCRIPCION</th>
                                    <th>MUTUO</th>
                                    <th>CONTRATO ID</th>
                                    <th>ESTADO CONTRATO</th>
                                    <th>FECHA DE CONTRATO</th>
                                    <th>FECHA VENCIMIENTO</th>
                                    <th>DIAS DE GRACIA</th>
                                    <th>CLIENTE</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($contratos->result() as $contrato)
                                { ?>
                                    <tr>
                                        <td><?php echo $contrato->nombre_producto ?></td>
                                        <td><?php echo $contrato->categoria ?></td>
                                        <td><?php echo $contrato->descripcion ?></td>
                                        <td><?php echo $contrato->mutuo ?></td>
                                        <td><?php echo $contrato->contrato_id ?></td>
                                        <td><?php echo texto_estado($contrato->estado); ?></td>
                                        <td><?php echo $contrato->fecha ?></td>
                                        <td><?php echo $contrato->fecha_pago ?></td>
                                        <td><?php echo $contrato->dias_gracia ?></td>
                                        <td>
                                            <?php echo $contrato->nombre ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    <?php }
                    else
                    {
                        echo 'Aún no hay contratos';
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
        var rango_fechas;
        var from;
        var to;

        $(document).ready(function () {

        });


    </script>
<?php $this->stop() ?>