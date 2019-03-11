<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 1:48 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMPROEMPEÑO</title>
    <link rel="shortcut icon" href="/ui/admin/dist/img/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/ui/admin/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
          type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/ui/admin/dist/css/AdminLTE.min.css" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/ui/admin/dist/css/skins/_all-skins.min.css" type="text/css">
    <link rel="stylesheet" href="/ui/admin/dist/css/style.css" type="text/css">
    <!--Css Personalizadoc para vista-->
    <?php echo $this->section('css_p') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>E</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>COMPRO EMPEÑO</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <i class="fas fa-bars"></i>
            </a>

            <div class="navbar-custom-menu">
                <!-- TODO <ul class="nav navbar-nav> -->

            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/ui/admin/dist/img/avatar3.png" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $nombre; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <div id="tienda_id">
                <?php mostrar_tienda(); ?>
            </div>
            <?php
            if (user_rol() == 'developer' || user_rol() == 'gerencia' || user_rol() == 'conta') {
                $tienda_id = tienda_id_h();

                if ($tienda_id == '1') {
                    $tienda_id = '2';
                } elseif ($tienda_id == '2') {
                    $tienda_id = '1';
                }

                ?>


                <div id="cambiar_tienda">
                    <select id="select_tienda" class="form-control">
                        <option value=""></option>
                        <option value="1">Tienda 1</option>
                        <option value="2">Tienda 2</option>
                        <option value="3">Tienda 3</option>
                        <option value="4">Tienda 4</option>
                        <option value="5">Tienda 5</option>
                    </select>
                    <!--<a class="btn btn-block btn-success"
                       href="<?php /*echo base_url() . 'user/cambiar_tienda/' . $tienda_id */?>">
                        Cambiar tienda
                    </a>-->

                </div>
            <?php } ?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">SECCIONES</li>
                <li><a href="<?php echo base_url() ?>index.php/cliente"><i class="fa fa-user"></i>
                        <span>Clientes</span></a></li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>Productos</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url() ?>productos/lista_preempenos">
                                <i class="fa fa-file
."></i> <span>Preempeños pagina</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/pedidos_de_pagina">
                                <i class="fa fa-file
."></i> <span>Pedidos pagina</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/administrar_liquidacion">
                                <i class="fa fa-file
."></i> <span>Administrador de productos</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/productos_sin_foto">
                                <i class="fas fa-file-image"></i> <span>Productos<br> Sin imagen</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/liquidacion"><i
                                        class="fa fa-shopping-cart"></i> <span>Productos<br> en liquidación</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/productos_en_venta"><i
                                        class="fa fa-shopping-cart"></i>
                                Productos en venta
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/productos_apartados"><i
                                        class="fa fa-shopping-cart"></i>
                                Productos apartados
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos/traslados"><i
                                        class="fa fa-file"></i>
                                Traslados
                            </a>
                        </li>
                        <?php
                        if (user_rol() == 'developer' || user_rol() == 'gerencia' || user_rol() == 'jefe_tienda') { ?>
                        <li>
                            <a href="<?php echo base_url() ?>productos/administar_bodega"><i
                                        class="fa fa-file"></i>
                                Bodega
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i> <span>Contratos</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url() ?>index.php/contrato"><i class="fa fa-file-text"></i>
                                <span>Contratos</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>index.php/contrato/contratos_vigentes"><i
                                        class="fa fa-circle-o"></i>
                                Contratos Vigentes
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>index.php/contrato/contratos_vencidos"><i
                                        class="fa fa-circle-o"></i>
                                Contratos vencidos
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i> <span>Facturas</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url() ?>index.php/factura"><i class="fa fa-list-alt"></i> <span>Facturas</span></a>
                        </li>
                        <li><a href="<?php echo base_url() ?>index.php/factura/control_facturas"><i
                                        class="fa fa-circle-o"></i> Control de facturas</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo base_url() ?>index.php/recibo"><i class="fa fa-file"></i>
                        <span>Recibos</span></a></li>
                <?php if (user_rol() == 'developer' || user_rol() == 'conta' || user_rol() == 'gerencia') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-shopping-cart"></i> <span>Inventario</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url() ?>index.php/proveedores"><i class="fa fa-circle-o"></i>
                                    Proveedores</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/productos/ingresar_producto_inventario"><i
                                            class="fa fa-circle-o"></i> ingresar Productos</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fas fa-money-check-alt"></i> <span>Caja</span>
                        <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(user_rol() == 'developer' || user_rol() =='gerencia' || user_rol() == 'vendedor' || user_rol() == 'jefe_tienda' ){?>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Vales
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url() ?>Caja/crear_vale"><i class="fa fa-circle-o"></i>
                                        Crear vales</a></li>
                                <li><a href="<?php echo base_url() ?>Caja/lista_vales"><i class="fa fa-circle-o"></i> Cobrar vales</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/ingresar_fondo_caja"><i class="fa fa-circle-o"></i>
                                Ingresar fondos a caja</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/ingreso_otros_gastos"><i class="fa fa-circle-o"></i>
                                Ingresar otros gastos</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/ingreso_deposito"><i class="fa fa-circle-o"></i>
                                Ingresar Depósito</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/ingreso_visanet"><i class="fa fa-circle-o"></i>
                                Ingresar Visanet</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/cierre"><i class="fa fa-circle-o"></i>
                                Cierre</a>
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?php echo base_url() ?>Caja/reporte"><i class="fa fa-circle-o"></i> reporte</a>
                        </li>
                    </ul>
                </li>
                <?php
                if (user_rol() == 'developer' || user_rol() == 'gerencia' || user_rol() == 'conta' || user_rol() == 'jefe_tienda') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-chart-bar"></i> <span>Sistema</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if(user_rol() != 'conta'){?>
                            <li>
                                <a href="<?php echo base_url() ?>user/lista_de_usuarios">
                                    <i class="fas fa-users"></i> Control de usuarios
                                </a>
                            </li>
                            <?php }?>
                            <?php if(user_rol() == 'developer' || user_rol() == 'gerencia' || user_rol() == 'conta' ){?>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/home/exportar">
                                    <i class="fas fa-file-download"></i> Exportar
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                <?php } ?>
                <?php
                if (user_rol() == 'developer' || user_rol() == 'gerencia') { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-chart-bar"></i> <span>Reportes</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo base_url() ?>reportes/movimiento_diario">
                                        <i class="fas fa-file-download"></i> Movimiento diario
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>reportes/movimiento_diario_global">
                                        <i class="fas fa-file-download"></i> Movimiento diario global
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/home/registros">
                                        <i class="far fa-file-alt"></i> Registros
                                    </a>
                                </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href="<?php echo base_url() ?>index.php/login/logout">
                        <i class="fas fa-file"></i>
                        <span>Salir</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <?php echo $this->section('page_content') ?>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2017 <a href="http://comproempeño.com">Comproempeño</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/ui/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/ui/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/ui/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/ui/admin/plugins/fastclick/fastclick.js"></script>
<!-- Moment -->
<script src="/ui/admin/plugins/moment/moment-with-locales.js"></script>
<!-- numeral -->
<script src="/ui/admin/plugins/numeral/numeral.js"></script>
<?php echo $this->section('js_p') ?>
<!-- AdminLTE App -->
<script src="/ui/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/ui/admin/dist/js/demo.js"></script>
<?php echo $this->section('js_ps') ?>
<script>
    $("#select_tienda").change(function () {
        var tienda_destino = $(this).val();
        window.location.href = "<?php echo base_url() . 'user/cambiar_tienda/'?>"+tienda_destino;
        console.log(tienda_destino);
    });
</script>
</body>
</html>
