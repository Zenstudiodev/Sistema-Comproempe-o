<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 20/01/2018
 * Time: 3:16 PM
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
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detalle de proveedor
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Proveedor</a></li>
            <li class="active">Detalle</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php if ($proveedor)
		{
			$proveedor = $proveedor->row();
			?>

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <p class="text-muted text-center">Nombre:</p>
                            <h3 class="profile-username text-center"><?php echo $proveedor->nombre; ?></h3>
                            <hr>
                            <p class="text-muted text-center">Razón Social:</p>
                            <h3 class="profile-username text-center"><?php echo $proveedor->razon_social; ?></h3>
                            <hr>
                            <p class="text-muted text-center">NIT: <?php echo $proveedor->nit; ?></p>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-9">
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de Proveedor</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><i class="fa fa-phone margin-r-5"></i>Teléfono</strong>
                                    <p class="text-muted">
										<?php echo $proveedor->telefono; ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                                    <p class="text-muted">
		                                <?php echo $proveedor->direccion; ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                                    <p class="text-muted">
		                                <?php echo $proveedor->email; ?>
                                    </p>
                                    <hr>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <a type="button"
                                       href="<?php echo base_url() . 'index.php/proveedores/editar/' . $proveedor->proveedor_id; ?>"
                                       class="btn btn-block btn-success">Editar</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Productos</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form method="post" action="<?
								echo base_url() . 'index.php/Contrato/nuevo/' . $proveedor->proveedor_id ?>">
                                    <a class="btn btn-app"
                                       href="<?php echo base_url() . "index.php/Productos/proveedores/" . $proveedor->proveedor_id; ?>">
                                        <i class="fa fa-plus"></i> Agregar producto
                                    </a>
                                    <hr>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="page-header">
                                                Prorrateos
                                            </h2>
                                        </div>
                                    </div>

									<?php if (isset($error)) { ?>
                                        <div class="row">
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4><i class="icon fa fa-ban"></i> Contrato vacio!</h4>
												<?php echo $error ?>
                                            </div>
                                        </div>

									<?php } ?>

                                    <?php if ($prorateos) { ?>

                                    <div class="row"></div>
                                    <table id="empenos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th>ID PRORRATEO</th>
                                            <th>NO FACTURA</th>
                                            <th>SERIE</th>
                                            <th>FECHA</th>
                                        </tr>
                                        </thead>
                                        <!-- <tfoot>
										 <tr>
											 <th></th>
											 <th>NOMBRE</th>
											 <th>FECHA AVALUO</th>
											 <th>AVALUO</th>
											 <th>MUTUO</th>
											 <th>CONTRATO ID</th>
										 </tr>
										 </tfoot>-->
                                        <tbody>
                                        <?php foreach ($prorateos->result() as $prorateo) { ?>
                                            <tr>

                                                <td><?php echo $prorateo->id_prorateo ?></td>
                                                <td><?php echo $prorateo->p_no_factura ?></td>
                                                <td><?php echo $prorateo->p_serie_factura ?></td>
                                                <td><?php echo $prorateo->p_fecha_factura ?></td>
                                            </tr>


                                        <?php } ?>


                                        </tbody>
                                    </table>


                                </form>

                                <? }
                                else
                                {
                                    echo 'Aún no tiene productos';
                                } ?>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            Productos
                                        </h2>
                                    </div>
                                </div>


									<?php if ($productos) { ?>

                                    <div class="row"></div>
                                    <table id="empenos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>

                                            <th>NOMBRE</th>
                                            <th>CATEGORIA</th>
                                            <th>EXISTENCIAS</th>
                                            <th>PRORRATEO</th>
                                        </tr>
                                        </thead>
                                        <!-- <tfoot>
										 <tr>
											 <th></th>
											 <th>NOMBRE</th>
											 <th>FECHA AVALUO</th>
											 <th>AVALUO</th>
											 <th>MUTUO</th>
											 <th>CONTRATO ID</th>
										 </tr>
										 </tfoot>-->
                                        <tbody>
										<?php foreach ($productos->result() as $producto) { ?>
                                            <tr>

                                                <td><?php echo $producto->nombre_producto ?></td>
                                                <td><?php echo $producto->categoria ?></td>
                                                <td><?php echo $producto->existencias ?></td>
                                                <td><?php echo $producto->id_prorateo ?></td>
                                            </tr>


										<?php } ?>


                                        </tbody>
                                    </table>


                                </form>

								<? }
								else
								{
									echo 'Aún no tiene productos';
								} ?>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
		<?php }
		else
		{
			echo 'Aún no existe este proveedor';
		} ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- Numeral format -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/numeral/numeral.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    var total_mutuos;

    //Seguimientos
    var cliente_id;
    var accion;
    var comentario;
    var contrato_id;
    total_mutuos = parseInt('0');
    $(".contrato_mutuo").each(function () {
        total_mutuos = total_mutuos + parseInt($(this).text());
    });
    total_mutuos_string = numeral(total_mutuos).format('0,0.00');
    //$(".total_avaluo").html('Q.'+monto_avaluo_string);
    $("#total_mutuos").html('Q.' + total_mutuos_string);
    console.log(total_mutuos);
    $(document).ready(function () {
        $('.popover_btn').popover();

        // DataTable
        var table_contratos = $('#contratos_table').DataTable({
                "autoWidth": false,
                "Search": false
            }
        );
        /*// Setup - add a text input to each footer cell
        $('#contratos_table tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar: ' + title + '" />');
        });
        // Apply the search COTRATOS
        table_contratos.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });*/
        table_contratos.columns.adjust().draw();

        // DataTable
        var table_empenos = $('#empenos_table').DataTable({
                "autoWidth": false,
                "Search": false
            }
        );
        table_empenos.columns.adjust().draw();
        // Setup - add a text input to each footer cell
        /*$('#empenos_table tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Buscar: ' + title + '" />');
        });
        // Apply the search PRODUCTOS
        table_empenos.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });*/


    });

    $(".seguimiento_btn").click(function (event) {
        event.preventDefault();
        console.log($(this).attr('contrato_id'));
        $("#seguimiento_contrato").val($(this).attr('contrato_id'));
        $('#seguimiento_modal').modal('show');
    });
    $("#guardar_seguimiento_btn").click(function (event) {
        cliente_id = '<?php echo $cliente->id; ?>';
        contrato_id = $("#seguimiento_contrato").val();
        accion = $("#seguimiento_accion option:selected").text();
        comentario = $("#seguimiento_resultado").val();

        data_seguimiento =
            {
                cliente_id: cliente_id,
                contrato_id: contrato_id,
                accion: accion,
                comentario: comentario
            };
        console.log(data_seguimiento);

        $.ajax({
            method: "POST",
            url: "<?php echo base_url() . 'index.php/contrato/guardar_seguimiento/'?>",
            data: data_seguimiento
        })
            .done(function (msg) {
                alert("Data Saved: " + msg);
                $("#seguimiento_contrato").val('');
                $("#seguimiento_resultado").val('');
                $('#seguimiento_modal').modal('hide');
            });
    });
    $(".resultado_btn").click(function (event) {
        event.preventDefault();
        console.log($(this).attr('contrato_id'));
        $('#resultado_modal').modal('show');


        $("#resultado_modal .modal-body").load("<?php echo base_url() . 'index.php/contrato/get_resultados_seguimiento/';?>" + $(this).attr('contrato_id'), function () {
            //alert( "Load was performed." );
        });

    });


</script>
<?php $this->stop() ?>

