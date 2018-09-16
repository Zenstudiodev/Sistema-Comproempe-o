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
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detalle de cliente
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Cliente</a></li>
            <li class="active">Detalle</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if ($cliente) {

            $cliente = $cliente->row();
            ?>

            <!--Datos del cliente-->
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center"><?php echo $cliente->nombre; ?></h3>

                            <p class="text-muted text-center"><?php echo $cliente->dpi; ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Empeños</b> <a class="pull-right"><?php echo $Numero_empenos; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>ventas</b> <a class="pull-right">xx</a>
                                </li>
                                <li class="list-group-item">
                                    <b>compras</b> <a class="pull-right">xx</a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-9">
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">información Personal</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><i class="fa fa-birthday-cake margin-r-5"></i> Cumpleaños</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->fecha_nacimiento; ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-book margin-r-5"></i> DPI</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->dpi; ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fa fa-book margin-r-5"></i>NIT</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->nit; ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->direccion; ?>
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->telefono; ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-phone margin-r-5"></i> Celular</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->celular; ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $cliente->email; ?>
                                    </p>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php if ($rol != 'conta') { ?>
                                        <a type="button"
                                           href="<?php echo base_url() . 'index.php/cliente/editar/' . $cliente->id; ?>"
                                           class="btn btn-block btn-success">Editar</a>
                                    <?php } ?>
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
                            <li class="active"><a href="#activity" data-toggle="tab">Empeños</a></li>
                            <li><a href="#timeline" data-toggle="tab">Ventas</a></li>
                            <li><a href="#settings" data-toggle="tab">Apartado</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->

                                <form method="post"
                                      action="<? echo base_url() . 'index.php/Contrato/nuevo/' . $cliente->id ?>">
                                    <?php if($rol !='conta'){?>
                                    <a class="btn btn-app"
                                       href="<?php echo base_url() . "index.php/Productos/agregar/" . $cliente->id; ?>">
                                        <i class="fa fa-plus"></i> Agregar producto
                                    </a>
                                    <button type="submit" class="btn btn-app" id="crear_contrato_btn">
                                        <i class="fa fa-file-text-o"></i> Crear contrato
                                    </button>
                                    <?php }?>
                                    <hr>
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            Recibos
                                        </h2>
                                    </div>
                                    <?php if ($recibos) { ?>

                                        <div class="row"></div>
                                        <table id="contratos_table" class="table table-bordered table-striped display">
                                            <thead>
                                            <tr>
                                                <th>ID RECIBO</th>
                                                <th>ESTADO</th>
                                                <th>TIPO</th>
                                                <th>FECHA</th>
                                                <th>MONTO</th>
                                                <th>ID CONTRATO</th>
                                                <th>MUTUO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                            </thead>
                                            <!-- <tfoot>
											 <tr>
												 <th>ID CONTRATO</th>
												 <th>ESTADO</th>
												 <th>REFRENDO</th>
												 <th>DESEMPEÑO</th>
												 <th>FECHA DE PAGO</th>
												 <th></th>
											 </tr>
											 </tfoot>-->
                                            <tbody>
                                            <?php foreach ($recibos->result() as $recibo) { ?>
                                                <?php if ($recibo->tipo != 'liquidacion') { ?>


                                                    <tr>
                                                        <td style="width: 10%">
                                                            <?php echo $recibo->recibo_id ?>
                                                        </td>
                                                        <td><?php echo $recibo->estado; ?></td>
                                                        <td><?php echo $recibo->tipo; ?></td>
                                                        <td><?php echo $recibo->fecha_recibo; ?></td>
                                                        <td><?php echo $recibo->monto; ?></td>
                                                        <td><?php echo $recibo->contrato_id; ?></td>
                                                        <td><?php echo $recibo->total_mutuo; ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'recibo/imprimir_recibo/' . $cliente->id . '/' . $recibo->recibo_id; ?>"><i
                                                                            class="fa fa-print"></i> Imprimir</a>
                                                            </div>
                                                            <?php
                                                            if ($recibo->tipo == 'abono') {
                                                                ?>
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'recibo/anular_recibo/' . $cliente->id . '/' . $recibo->recibo_id; ?>"><i
                                                                            class="fa fa-print"></i> Anular Recibo</a>
                                                            <?php }
                                                            ?>

                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>
                                    <?php } else {
                                        echo 'Aún no tiene Recibos';
                                    } ?>
                                    <hr>
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            Facturas
                                        </h2>
                                    </div>
                                    <?php if ($facturas) { ?>
                                        <div class="row"></div>
                                        <table id="contratos_table" class="table table-bordered table-striped display">
                                            <thead>
                                            <tr>
                                                <th>ID FACTURA</th>
                                                <th>FECHA</th>
                                                <th>SERIE</th>
                                                <th>ESTADO</th>
                                                <th>TIPO</th>
                                                <th>NO CONTRATO</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                            </thead>
                                            <!-- <tfoot>
											 <tr>
												 <th>ID CONTRATO</th>
												 <th>ESTADO</th>
												 <th>REFRENDO</th>
												 <th>DESEMPEÑO</th>
												 <th>FECHA DE PAGO</th>
												 <th></th>
											 </tr>
											 </tfoot>-->
                                            <tbody>
                                            <?php foreach ($facturas->result() as $factura) { ?>
                                                <?php if ($factura->tipo != 'venta') { ?>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <?php echo $factura->factura_id ?>
                                                        </td>
                                                        <td><?php echo $factura->fecha; ?></a></td>
                                                        <td><?php echo $factura->serie; ?></a></td>
                                                        <td class="<?php color_por_estaado($factura->estado); ?>"><?php echo $factura->estado ?></td>
                                                        <td><?php echo $factura->tipo; ?></a></td>
                                                        <td><?php echo $factura->contrato_id; ?></a></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/imprimir_factura/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Imprimir</a>
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/anular_factura/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Anular</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>
                                    <?php } else {
                                        echo 'Aún no tiene facturas';
                                    } ?>
                                    <hr>
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            Contratos
                                        </h2>
                                    </div>
                                    <?php if ($contratos) { ?>
                                        <div class="row"></div>
                                        <div class="table-responsive">
                                            <table id="contratos_table"
                                                   class="table table-bordered table-striped display compact nowrap dataTable">
                                                <thead>
                                                <tr>
                                                    <th>ID CONTRATO</th>
                                                    <th>FECHA</th>
                                                    <th>FECHA DE PAGO</th>
                                                    <th>ESTADO</th>
                                                    <th>REFRENDO</th>
                                                    <th>DESEMPEÑO</th>
                                                    <th>MUTUO</th>
                                                    <th>ACCIONES</th>
                                                    <th>SEGUIMIENTO</th>
                                                </tr>
                                                </thead>
                                                <!-- <tfoot>
												 <tr>
													 <th>ID CONTRATO</th>
													 <th>ESTADO</th>
													 <th>REFRENDO</th>
													 <th>DESEMPEÑO</th>
													 <th>FECHA DE PAGO</th>
													 <th></th>
												 </tr>
												 </tfoot>-->
                                                <tbody>
                                                <?php foreach ($contratos->result() as $contrato) { ?>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <?php echo $contrato->contrato_id ?>
                                                        </td>
                                                        <td><?php echo $contrato->fecha ?></td>
                                                        <td><?php echo $contrato->fecha_pago ?></td>
                                                        <td class="<?php color_por_estaado($contrato->estado); ?>"><?php echo $contrato->estado ?></td>
                                                        <td><?php echo $contrato->referendo ?></a></td>
                                                        <td class="contrato_desempeno"><?php echo $contrato->desempeno ?></td>
                                                        <td class="contrato_mutuo"><?php echo $contrato->total_mutuo ?></td>
                                                        <td>

                                                            <div class="btn-group">
                                                                <a href="<?php echo base_url() . 'contrato/imprimir_contrato/' . $cliente->id . '/' . $contrato->contrato_id; ?>"
                                                                   class="btn btn-default"><i class="fa fa-print"></i>
                                                                    Imprimir</a>
                                                                <button type="button"
                                                                        class="btn btn-default dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                    <span class="caret"></span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <?php if ($rol !='conta') { ?>
                                                                        <?php if ($contrato->estado == 'vigente' || $contrato->estado == 'refrendado' || $contrato->estado == 'gracia' || $contrato->estado == 'perdido') { ?>
                                                                            <li>
                                                                                <a href="<?php echo base_url() . 'contrato/refrendo/' . $cliente->id . '/' . $contrato->contrato_id; ?>">
                                                                                    <i class="fa fa-plus-square"></i>
                                                                                    Refrendo</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="<?php echo base_url() . 'contrato/desempeno/' . $cliente->id . '/' . $contrato->contrato_id; ?>">
                                                                                    <i class="fa fa-money"></i>
                                                                                    Desempeño</a></li>
                                                                            <li>
                                                                                <a href="<?php echo base_url() . 'contrato/abono_a_apital/' . $cliente->id . '/' . $contrato->contrato_id; ?>">
                                                                                    <i class="fa fa-money"></i>
                                                                                    Abono a capital</a></li>
                                                                        <?php } ?>
                                                                        <?php if ($contrato->estado == 'vigente') { ?>
                                                                            <li class="divider"></li>
                                                                            <li>
                                                                                <a href="<?php echo base_url() . 'contrato/editar/' . $cliente->id . '/' . $contrato->contrato_id; ?>">
                                                                                    <i class="fa fa-edit"></i>
                                                                                    Editar</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="<?php echo base_url() . 'contrato/anular/' . $cliente->id . '/' . $contrato->contrato_id; ?>">
                                                                                    <i class="fa fa-minus-square"></i>
                                                                                    Anular</a></li>
                                                                        <?php }
                                                                    } ?>
                                                                </ul>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href=""
                                                                   class="btn btn-default seguimiento_btn"
                                                                   contrato_id="<?php echo $contrato->contrato_id; ?>"><i
                                                                            class="fa fa-commenting"></i>
                                                                    seguimiento</a>
                                                                <button type="button"
                                                                        class="btn btn-default dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                    <span class="caret"></span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="" class="resultado_btn btn btn-warning"
                                                                           contrato_id="<?php echo $contrato->contrato_id; ?>">
                                                                            <i class="fa fa-plus-square"></i>
                                                                            Resultados</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <table class="table">
                                            <tr>
                                                <td>Total mutuos</td>
                                                <td id="total_mutuos"></td>
                                            </tr>
                                            <tr>
                                                <td>Total desempeños</td>
                                                <td id="total_desempenos"></td>
                                            </tr>
                                        </table>
                                    <?php } ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="page-header">
                                                Productos
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
                                    <?php if ($enmpenos) { ?>

                                    <div class="row"></div>
                                    <table id="empenos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>NOMBRE</th>
                                            <th>FECHA AVALUO</th>
                                            <th>AVALUO</th>
                                            <th>MUTUO</th>
                                            <th>CONTRATO ID</th>
                                            <th>ACCIONES</th>

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
                                        <?php foreach ($enmpenos->result() as $producto) { ?>
                                            <tr>
                                                <td style="width: 10%">
                                                    <?php if ($producto->contrato_id == '0') { ?>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"
                                                                           id="<?php echo $producto->producto_id ?>"
                                                                           name="producto_<?php echo $producto->producto_id ?>"
                                                                           value="<?php echo $producto->producto_id ?>">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php } ?>


                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default popover_btn"
                                                            data-container="body"
                                                            data-toggle="popover" data-placement="top" data-html="true"
                                                            data-content="
                                                            <p>id: <?php echo $producto->producto_id ?></p>
                                                            <p><?php echo $producto->categoria ?></p>
                                                            <p><?php echo $producto->nombre_producto ?></p>
                                                            <p><?php echo $producto->marca ?></p>
                                                            <p><?php echo $producto->no_serie ?></p>
                                                            <p><?php echo $producto->modelo ?></p>
                                                            <p><?php echo $producto->descripcion ?></p>
                                                            ">
                                                        <?php echo $producto->nombre_producto ?>
                                                    </button>
                                                </td>
                                                <td><?php echo $producto->fecha_avaluo ?></td>
                                                <td><?php echo $producto->avaluo_comercial ?></td>
                                                <td><?php echo $producto->mutuo ?></td>
                                                <td><?php echo $producto->contrato_id ?></td>
                                                <td>
                                                    <?php if ($producto->contrato_id == '0') { ?>
                                                        <a type="button" class="btn btn-default"
                                                           href="<?php echo base_url() . 'productos/editar_producto/' . $producto->producto_id; ?>">
                                                            <i class="fa fa-pencil-square-o"></i> Editar
                                                        </a>
                                                    <?php } ?>
                                                </td>


                                            </tr>


                                        <?php } ?>


                                        </tbody>
                                    </table>


                                </form>

                                <? }
                                else {
                                    echo 'Aún no tiene productos empeñados';
                                } ?>
                            </div>
                            <!-- /.empeño -->
                            <div class="tab-pane" id="timeline">
                                <h2>Ventas</h2>

                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        Recibos
                                    </h2>
                                </div>

                                <?php if ($recibos_liquidacion) { ?>
                                    <div class="row"></div>
                                    <table id="contratos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th>ID RECIBO</th>
                                            <th>TIPO</th>
                                            <th>FECHA</th>
                                            <th>MONTO</th>
                                            <th>ID CONTRATO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                        </thead>
                                        <!-- <tfoot>
										 <tr>
											 <th>ID CONTRATO</th>
											 <th>ESTADO</th>
											 <th>REFRENDO</th>
											 <th>DESEMPEÑO</th>
											 <th>FECHA DE PAGO</th>
											 <th></th>
										 </tr>
										 </tfoot>-->
                                        <tbody>
                                        <?php foreach ($recibos_liquidacion->result() as $recibo) { ?>
                                            <?php if ($recibo->tipo == 'liquidacion') { ?>

                                                <tr>
                                                    <td style="width: 10%">
                                                        <?php echo $recibo->recibo_id ?>
                                                    </td>
                                                    <td><?php echo $recibo->tipo; ?></td>
                                                    <td><?php echo $recibo->fecha_recibo; ?></td>
                                                    <td><?php echo $recibo->monto; ?></td>
                                                    <td><?php echo $recibo->contrato_id; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a type="button" class="btn btn-default"
                                                               href="<?php echo base_url() . 'recibo/imprimir_recibo/' . $cliente->id . '/' . $recibo->recibo_id; ?>"><i
                                                                        class="fa fa-print"></i> Imprimir</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    echo 'Aún no tiene Recibos';
                                } ?>

                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        Facturas
                                    </h2>
                                </div>
                                <?php if ($facturas_l || $facturas_l_r) { ?>
                                    <div class="row"></div>
                                    <table id="contratos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th>ID FACTURA</th>
                                            <th>SERIE</th>
                                            <th>MONTO</th>
                                            <th>FECHA</th>
                                            <th>ESTADO</th>
                                            <th>TIPO</th>
                                            <th>NO CONTRATO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                        </thead>
                                        <!-- <tfoot>
										 <tr>
											 <th>ID CONTRATO</th>
											 <th>ESTADO</th>
											 <th>REFRENDO</th>
											 <th>DESEMPEÑO</th>
											 <th>FECHA DE PAGO</th>
											 <th></th>
										 </tr>
										 </tfoot>-->

                                        <tbody>
                                        <?php if ($facturas_l) { ?>
                                            <?php foreach ($facturas_l->result() as $factura) { ?>
                                                <?php if ($factura->tipo == 'venta') { ?>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <?php echo $factura->factura_id ?>
                                                        </td>
                                                        <td><?php echo $factura->serie ?></td>
                                                        <td><?php echo $factura->total ?></td>
                                                        <td><?php echo $factura->fecha ?></td>
                                                        <td class="<?php color_por_estaado($factura->estado); ?>"><?php echo $factura->estado ?></td>
                                                        <td><?php echo $factura->tipo; ?></a></td>
                                                        <td><?php echo $factura->contrato_id; ?></a></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/imprimir_factura/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Imprimir</a>
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/anular_factura/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Anular</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } ?>
                                        <?php } ?>
                                        <?php if ($facturas_l_r) { ?>
                                            <?php foreach ($facturas_l_r->result() as $factura) { ?>
                                                <?php if ($factura->tipo == 'venta') { ?>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <?php echo $factura->factura_id ?>
                                                        </td>
                                                        <td><?php echo $factura->serie ?></td>
                                                        <td><?php echo $factura->total ?></td>
                                                        <td><?php echo $factura->fecha ?></td>
                                                        <td class="<?php color_por_estaado($factura->estado); ?>"><?php echo $factura->estado ?></td>
                                                        <td><?php echo $factura->tipo; ?></a></td>
                                                        <td><?php echo $factura->contrato_id; ?></a></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/imprimir_factura_r/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Imprimir</a>
                                                                <a type="button" class="btn btn-default"
                                                                   href="<?php echo base_url() . 'factura/anular_factura/' . $cliente->id . '/' . $factura->factura_id; ?>"><i
                                                                            class="fa fa-print"></i> Anular</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    echo 'Aún no tiene facturas';
                                } ?>

                            </div>
                            <!-- /.compra -->
                            <div class="tab-pane" id="settings">
                                <h2>Apartado</h2>

                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        Recibos
                                    </h2>
                                </div>


                                <?php if ($recibos_apartado) { ?>
                                    <div class="row"></div>
                                    <table id="contratos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th>ID RECIBO</th>
                                            <th>TIPO</th>
                                            <th>FECHA</th>
                                            <th>MONTO</th>
                                            <th>ID CONTRATO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($recibos_apartado->result() as $recibo) { ?>

                                            <tr>
                                                <td style="width: 10%">
                                                    <?php echo $recibo->recibo_id ?>
                                                </td>
                                                <td><?php echo $recibo->tipo; ?></td>
                                                <td><?php echo $recibo->fecha_recibo; ?></td>
                                                <td><?php echo $recibo->monto; ?></td>
                                                <td><?php echo $recibo->contrato_id; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a type="button" class="btn btn-default"
                                                           href="<?php echo base_url() . 'recibo/imprimir_recibo/' . $cliente->id . '/' . $recibo->recibo_id; ?>"><i
                                                                    class="fa fa-print"></i> Imprimir</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else {
                                    echo 'Aún no tiene Recibos';
                                } ?>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            Productos
                                        </h2>
                                    </div>
                                </div>

                                <?php if ($productos_apartado) { ?>

                                    <div class="row"></div>
                                    <table id="empenos_table" class="table table-bordered table-striped display">
                                        <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>FECHA VENCIMIENTO</th>
                                            <th>PRECIO DE VENTA</th>
                                            <th>ABONO DE APARTADO</th>
                                            <th>SALDO PENDIENTE</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($productos_apartado->result() as $producto) { ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-default popover_btn"
                                                            data-container="body"
                                                            data-toggle="popover" data-placement="top" data-html="true"
                                                            data-content="
                                                            <p>id: <?php echo $producto->producto_id ?></p>
                                                            <p><?php echo $producto->categoria ?></p>
                                                            <p><?php echo $producto->nombre_producto ?></p>
                                                            <p><?php echo $producto->marca ?></p>
                                                            <p><?php echo $producto->no_serie ?></p>
                                                            <p><?php echo $producto->modelo ?></p>
                                                            <p><?php echo $producto->descripcion ?></p>
                                                            ">
                                                        <?php echo $producto->nombre_producto ?>
                                                    </button>
                                                </td>
                                                <td><?php echo $producto->vencimiento_apartado ?></td>
                                                <td><?php echo $producto->precio_venta ?></td>
                                                <td><?php echo $producto->apartado ?></td>
                                                <?php $saldo_pendiente = $producto->precio_venta - $producto->apartado ?>
                                                <td><?php echo $saldo_pendiente ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-default"
                                                       href="<?php echo base_url() . 'productos/facturar_parartado/' . $cliente->id . '/' . $producto->producto_id; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> facturar
                                                    </a>
                                                    <a type="button" class="btn btn-default"
                                                       href="<?php echo base_url() . 'productos/abonar_apartado/' . $cliente->id . '/' . $producto->producto_id; ?>">
                                                        <i class="fa fa-pencil-square-o"></i> abonar
                                                    </a>
                                                </td>


                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>


                                    </form>

                                <? } else {
                                    echo 'Aún no tiene productos empeñados';
                                } ?>

                            </div>
                            <!-- /.apartado -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        <?php } else {
            echo 'no existe ese cliente';
        } ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="seguimiento_modal" tabindex="-1" role="dialog" aria-labelledby="seguimiento_modal_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="seguimiento_modal_label">Seguimiento</h4>
            </div>
            <div class="modal-body">
                <h2><?php echo $cliente->nombre; ?></h2>
                <div class="row">
                    <div class="col-md-4">
                        <p>Celular: <?php echo $cliente->celular; ?></p>
                    </div>
                    <div class="col-md-4"><p>Telefono: <?php echo $cliente->telefono; ?></p></div>
                    <div class="col-md-4"><p>Email: <?php echo $cliente->email; ?></p></div>
                </div>


                <form>
                    <div class="form-group">
                        <label for="seguimiento_resultado">Contrato</label>
                        <input type="number" class="form-control" name="seguimiento_contrato" id="seguimiento_contrato"
                               disabled/>
                    </div>
                    <div class="form-group">
                        <label for="seguimiento_accion">Accion</label>
                        <select class="form-control" name="seguimiento_accion" id="seguimiento_accion">
                            <option value="llamada">Llamada</option>
                            <option value="mensaje">Mensaje</option>
                            <option value="email">Email</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seguimiento_resultado">Resultado</label>
                        <textarea class="form-control" rows="3" name="seguimiento_resultado"
                                  id="seguimiento_resultado"></textarea>
                    </div>
                    <button type="button" class="btn btn-success" id="guardar_seguimiento_btn">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="resultado_modal" tabindex="-1" role="dialog" aria-labelledby="resultado_modal_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="resultado_modal_label">Resultados</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>

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
    var total_desempenos;


    //Seguimientos
    var cliente_id;
    var accion;
    var comentario;
    var contrato_id;
    total_mutuos = parseInt('0');
    total_desempenos = parseInt('0');
    $(".contrato_mutuo").each(function () {
        total_mutuos = total_mutuos + parseInt($(this).text());
    });
    $(".contrato_desempeno").each(function () {
        total_desempenos = total_desempenos + parseInt($(this).text());
    });
    total_mutuos_string = numeral(total_mutuos).format('0,0.00');
    total_desempeno_string = numeral(total_desempenos).format('0,0.00');
    //$(".total_avaluo").html('Q.'+monto_avaluo_string);
    $("#total_mutuos").html('Q.' + total_mutuos_string);
    $("#total_desempenos").html('Q.' + total_desempeno_string);
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
