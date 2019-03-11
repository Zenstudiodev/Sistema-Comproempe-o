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
            Lista de productos a liquidar
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
                <form method="post" action="<? echo base_url() . 'index.php/Productos/liquidar/' ?>"
                      id="productList_form">
                    <?php

                    ?>

                    <?php if ($productos_contrato_tienda_1 or $productos_contrato_tienda_2 or $productos_contrato_tienda_3 or $productos_contrato_tienda_4) { ?>
                        <?php if ($rol != 'conta') { ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-app" id="crear_contrato_btn">
                                        <i class="fas fa-file"></i> Liquidar productos
                                    </button>
                                    <button type="submit" class="btn btn-app" id="apartar_btn">
                                        <i class="fas fa-file"></i> Apartar productos
                                    </button>
                                    <button type="submit" class="btn btn-app" id="trasladar_btn">
                                        <i class="fas fa-truck-moving"></i> Trasladar productos
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <select id="select_tienda_traslado" class="form-control" name="select_tienda_traslado">
                                        <option value=""></option>
                                        <option value="1">Tienda 1</option>
                                        <option value="2">Tienda 2</option>
                                        <option value="3">Tienda 3</option>
                                        <option value="4">Tienda 4</option>
                                        <option value="5">Tienda 5</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <pre>

                    <?php /*//print_r($facturas->result()) */ ?>
                    </pre>-->
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
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped display">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>PRODUCTO ID</th>
                                    <th>CONTRATO ID</th>
                                    <th>ESTADO CONTRATO</th>
                                    <th>NOMBRE</th>
                                    <th>AVALUO</th>
                                    <th>MUTUO</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>PRODUCTO ID</th>
                                    <th>CONTRATO ID</th>
                                    <th>ESTADO CONTRATO</th>
                                    <th>NOMBRE</th>
                                    <th>AVALUO</th>
                                    <th>MUTUO</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php if ($productos_contrato_tienda_1) { ?>
                                    <?php foreach ($productos_contrato_tienda_1->result() as $producto) { ?>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox"
                                                           id="<?php echo $producto->producto_id ?>"
                                                           name="producto_<?php echo $producto->producto_id ?>"
                                                           value="<?php echo $producto->producto_id ?>">
                                                </label>
                                            </td>
                                            <td><?php echo $producto->producto_id ?></td>
                                            <td><?php echo $producto->contrato_id ?></td>
                                            <td class="<?php color_por_estaado($producto->estado); ?>"><?php echo $producto->estado ?></td>
                                            <td>
                                                <?php echo $producto->nombre_producto ?>
                                            </td>
                                            <td><?php echo $producto->avaluo_ce ?></td>
                                            <td><?php echo $producto->mutuo ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($productos_contrato_tienda_2) { ?>
                                    <?php foreach ($productos_contrato_tienda_2->result() as $producto) { ?>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox"
                                                           id="<?php echo $producto->producto_id ?>"
                                                           name="producto_<?php echo $producto->producto_id ?>"
                                                           value="<?php echo $producto->producto_id ?>">
                                                </label>
                                            </td>
                                            <td><?php echo $producto->producto_id ?></td>
                                            <td><?php echo $producto->contrato_id ?></td>
                                            <td class="<?php color_por_estaado($producto->estado); ?>"><?php echo $producto->estado ?></td>
                                            <td>
                                                <?php echo $producto->nombre_producto ?>
                                            </td>
                                            <td><?php echo $producto->avaluo_ce ?></td>
                                            <td><?php echo $producto->mutuo ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($productos_contrato_tienda_3) { ?>
                                    <?php foreach ($productos_contrato_tienda_3->result() as $producto) { ?>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox"
                                                           id="<?php echo $producto->producto_id ?>"
                                                           name="producto_<?php echo $producto->producto_id ?>"
                                                           value="<?php echo $producto->producto_id ?>">
                                                </label>
                                            </td>
                                            <td><?php echo $producto->producto_id ?></td>
                                            <td><?php echo $producto->contrato_id ?></td>
                                            <td class="<?php color_por_estaado($producto->estado); ?>"><?php echo $producto->estado ?></td>
                                            <td>
                                                <?php echo $producto->nombre_producto ?>
                                            </td>
                                            <td><?php echo $producto->avaluo_ce ?></td>
                                            <td><?php echo $producto->mutuo ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($productos_contrato_tienda_4) { ?>
                                    <?php foreach ($productos_contrato_tienda_4->result() as $producto) { ?>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox"
                                                           id="<?php echo $producto->producto_id ?>"
                                                           name="producto_<?php echo $producto->producto_id ?>"
                                                           value="<?php echo $producto->producto_id ?>">
                                                </label>
                                            </td>
                                            <td><?php echo $producto->producto_id ?></td>
                                            <td><?php echo $producto->contrato_id ?></td>
                                            <td class="<?php color_por_estaado($producto->estado); ?>"><?php echo $producto->estado ?></td>
                                            <td>
                                                <?php echo $producto->nombre_producto ?>
                                            </td>
                                            <td><?php echo $producto->avaluo_ce ?></td>
                                            <td><?php echo $producto->mutuo ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } else {
                        echo 'Aún no hay productos';
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
                <?php //if ($productos) { ?>
                <?php if (false) { ?>

                    <?php
                    $total_de_inventario = 0;
                    foreach ($productos->result() as $producto) { ?>
                        <?php
                        if ($producto->tipo == 'venta') {
                            $total_de_inventario = $total_de_inventario + $producto->mutuo;
                        }

                        ?>


                    <?php } ?>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Inventario</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_de_inventario); ?></span>
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

                </form>
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
    $("#apartar_btn").click(function () {
        event.preventDefault();
        $("#productList_form").attr('action', '<?php echo base_url() . "productos/productos_apartar"?>');
        $("#productList_form").submit();
    });
    $("#trasladar_btn").click(function () {
        event.preventDefault();
        $("#productList_form").attr('action', '<?php echo base_url() . "productos/productos_trasladar"?>');
        tienda_a = $("#select_tienda_traslado").val();

        console.log(tienda_a);
        if(tienda_a == ''){
           alert('debe seleccionar una tienda de destino');
        }else{
            $("#productList_form").submit();
        }
    });

    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#example1').DataTable(
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
