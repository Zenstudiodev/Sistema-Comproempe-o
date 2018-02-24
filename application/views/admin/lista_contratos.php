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
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Acciones </h3>
            </div>
            <div class="box-body">
                <a class="btn btn-app bg-olive" href="<?php echo base_url() ?>index.php/contrato/actualizar_estado" target="_blank">
                    <i class="fa fa-edit"></i> Actualizar contratos
                </a>
                <a class="btn btn-app bg-olive" href="<?php echo base_url() ?>index.php/contrato/contratos_excel" target="_blank">
                    <i class="fa fa-edit"></i> Exportar excel
                </a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de contratos</h3>
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
                <!-- /.form group -->

				<?php if ($contratos) { ?>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>CONTRATO No</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>MUTUO</th>
                                <th>FECHA VENCIMIENTO</th>
                                <th>FECHA DE CONTRATO</th>
                                <th>DIAS DE GRACIA</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>CONTRATO No</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>MUTUO</th>
                                <th>FECHA VENCIMIENTO</th>
                                <th>FECHA DE CONTRATO</th>
                                <th>DIAS DE GRACIA</th>
                            </tr>
                            </tfoot>
                            <tbody>
							<?php foreach ($contratos->result() as $contrato)
							{ ?>
                                <tr>
                                    <td><?php echo $contrato->contrato_id ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'index.php/cliente/detalle/' . $contrato->id; ?>" target="_blank"><?php echo $contrato->nombre ?></a>
                                    </td>
                                    <td class="<?php color_por_estaado($contrato->estado); ?>"><?php echo texto_estado($contrato->estado); ?></td>
                                    <td><?php echo ($contrato->total_mutuo); ?></td>
                                    <td><?php echo $contrato->fecha_pago ?></td>
                                    <td><?php echo $contrato->fecha ?></td>
                                    <td><?php echo $contrato->dias_gracia ?></td>
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

        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Resumen de contratos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if ($contratos) { ?>

					<?php
                    $total_de_contratos = 0;
					$total_de_contratos_vigentes = 0;
					$numero_de_contratos_vigentes = 0;
					$total_contratos_desenpeno   = 0;
					$numero_contratos_desenpeno   = 0;
					$total_contratos_refendados  = 0;
					$numero_contratos_refendados  = 0;
					$total_contratos_perdidos    = 0;
					$numero_contratos_perdidos    = 0;
					$total_contratos_gracia      = 0;
					$numero_contratos_gracia      = 0;
					$total_contratos_liquidado      = 0;
					$numero_contratos_liquidado      = 0;
					foreach ($contratos->result() as $contrato)
					{ ?>
						<?php

						if ($contrato->estado == 'vigente')
						{
							$total_de_contratos_vigentes = $total_de_contratos_vigentes + $contrato->total_mutuo;
							$numero_de_contratos_vigentes = $numero_de_contratos_vigentes + 1;

							//total de la cartera
							$total_de_contratos = $total_de_contratos + $contrato->total_mutuo;
						}
						if ($contrato->estado == 'desempenado')
						{
							$total_contratos_desenpeno = $total_contratos_desenpeno + $contrato->total_mutuo;
							$numero_contratos_desenpeno = $numero_contratos_desenpeno + 1;
						}
						if ($contrato->estado == 'refrendado')
						{
							$total_contratos_refendados = $total_contratos_refendados + $contrato->total_mutuo;
							$numero_contratos_refendados = $numero_contratos_refendados + 1;

							//total de la cartera
							$total_de_contratos = $total_de_contratos + $contrato->total_mutuo;

						}
						if ($contrato->estado == 'perdido')
						{
							$total_contratos_perdidos = $total_contratos_perdidos + $contrato->total_mutuo;
							$numero_contratos_perdidos = $numero_contratos_perdidos +1;
						}
						if ($contrato->estado == 'gracia')
						{
							$total_contratos_gracia = $total_contratos_gracia + $contrato->total_mutuo;
							$numero_contratos_gracia = $numero_contratos_gracia +1;

							//total de la cartera
							$total_de_contratos = $total_de_contratos + $contrato->total_mutuo;
						}
						if ($contrato->estado == 'liquidado')
						{
							$total_contratos_liquidado = $total_contratos_liquidado + $contrato->tototal_liquidado;
							$numero_contratos_liquidado = $numero_contratos_liquidado +1;

							//total de la cartera
							$total_de_contratos = $total_de_contratos + $contrato->total_mutuo;
						}

						?>


					<?php } ?>

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h4><b>Total: Q.<?php display_formato_dinero($total_de_contratos); ?></b></h4>

                                    <p>Total de Cartera</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Vigentes</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_de_contratos_vigentes); ?></span>

                                    <div class="progress">
                                        total:
                                    </div>
                                    <span class="progress-description">
                                        # de contratos: <?php echo $numero_de_contratos_vigentes;?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-grey">
                                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Desempeñados</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_contratos_desenpeno); ?></span>

                                    <div class="progress">
                                        total:
                                    </div>
                                    <span class="progress-description">
                                        # de contratos: <?php echo $numero_contratos_desenpeno;?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Refrendados</span>
                                        <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_contratos_refendados); ?></span>

                                        <div class="progress">
                                            total:
                                        </div>
                                        <span class="progress-description">
                                        # de contratos: <?php echo $numero_contratos_refendados;?>
                                    </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">

                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Vencido</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_contratos_perdidos); ?></span>

                                    <div class="progress">
                                        total:
                                    </div>
                                    <span class="progress-description">
                                        # de contratos: <?php echo $numero_contratos_perdidos;?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">

                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">En gracia</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_contratos_gracia); ?></span>

                                    <div class="progress">
                                        total:
                                    </div>
                                    <span class="progress-description">
                                        # de contratos: <?php echo $numero_contratos_gracia;?>

                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">

                            <div class="info-box bg-orange">
                                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Liquidado</span>
                                    <span class="info-box-number">Total: Q.<?php display_formato_dinero($total_contratos_liquidado); ?></span>

                                    <div class="progress">
                                        total:
                                    </div>
                                    <span class="progress-description">
                                        # de contratos: <?php echo $numero_contratos_liquidado;?>

                                    </span>
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
<script src="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    var rango_fechas;
    var from;
    var to;

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

        url = '<?php echo base_url();?>' + 'index.php/contrato/index/' + from + '/' + to;

        window.location.href = url;
    });


</script>
<?php $this->stop() ?>
