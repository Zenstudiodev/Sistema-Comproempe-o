<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 12/03/2019
 * Time: 03:45 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);

$ci =& get_instance();
?>
    <!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/daterangepicker/daterangepicker.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Inventario Global -
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    inventario de tiendas
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tiendas</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $total_total_avaluo_ce = 0;
                                $total_total_avaluo_comercial = 0;
                                $total_total_mutuo = 0;

                                //categorias
                                $total_Audio = (object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_Camaras=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_Celulares=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_computadoras_laptops_tablets=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_deportes=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_electrodomesticos=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_herramientas=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_hogar=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_instrumentos_musicales=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_joyeria=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_line_blanca=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_motocicletas_automoviles=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_salud_belleza=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_video=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                $total_videojuegos=(object) array(
                                    'numero' => 0,
                                    'avaluo_ce' => 0,
                                    'avaluo_c' => 0,
                                    'mutuo' => 0
                                );
                                ?>

                                <div class="box-group" id="accordion">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                   aria-expanded="false" class="collapsed">
                                                    Centra Sur
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                                             style="height: 0px;">
                                            <div class="box-body">


                                                <?php
                                                //tienda 1
                                                $productos_en_liquidacion_tienda_1_1 = $ci->Productos_model->get_productos_liquidacion_inventario('1', '1');
                                                $productos_en_liquidacion_tienda_2_1 = $ci->Productos_model->get_productos_liquidacion_inventario('2', '1');
                                                $productos_en_liquidacion_tienda_3_1 = $ci->Productos_model->get_productos_liquidacion_inventario('3', '1');
                                                $productos_en_liquidacion_tienda_4_1 = $ci->Productos_model->get_productos_liquidacion_inventario('4', '1');


                                                ?>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover" id="tienda_1">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Categoriía</th>
                                                                <th>Contrato</th>
                                                                <th>Avaluo comercial</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Mutuo</th>
                                                                <th>días en inventario</th>
                                                                <th>Fecha</th>
                                                                <th>usuario que opero</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $total_avaluo_ce = 0;
                                                            $total_avaluo_comercial = 0;
                                                            $total_mutuo = 0;
                                                            $numero_producto = 1;
                                                            //tienda
                                                            //valores categorias
                                                            $Audio =(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Camaras=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Celulares=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $computadoras_laptops_tablets=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $deportes=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $electrodomesticos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $herramientas=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $hogar=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $instrumentos_musicales=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $joyeria=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $line_blanca=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $motocicletas_automoviles=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $salud_belleza=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $video=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $videojuegos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            ?>

                                                            <?php if ($productos_en_liquidacion_tienda_1_1) { ?>
                                                            <?php foreach ($productos_en_liquidacion_tienda_1_1->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>

                                                            <?php if ($productos_en_liquidacion_tienda_2_1) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_2_1->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_3_1) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_3_1->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_4_1) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_4_1->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>


                                                            </tbody>
                                                        </table>
                                                        <?php
                                                        $total_total_avaluo_ce = $total_total_avaluo_ce +$total_avaluo_ce;
                                                        $total_total_avaluo_comercial = $total_total_avaluo_comercial+ $total_avaluo_comercial;
                                                        $total_total_mutuo = $total_total_mutuo + $total_mutuo;
                                                        ?>
                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <td colspan="5">Totales</td>
                                                                <td>
                                                                    Avaluo Comercial
                                                                </td>
                                                                <td>
                                                                    Avaluo CE
                                                                </td>
                                                                <td>
                                                                    Mutuo
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5"></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_comercial); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_ce); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_mutuo); ?></td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Categoría</th>
                                                                <th>Cantidad</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Avaluo</th>
                                                                <th>Mutuo</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td>Audio</td>
                                                                <td><?php echo $Audio->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cámaras</td>
                                                                <td><?php echo $Camaras->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Celulares</td>
                                                                <td><?php echo $Celulares->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_ce)?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Computadoras Laptops y Tablets</td>
                                                                <td><?php echo $computadoras_laptops_tablets->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Deportes</td>
                                                                <td><?php echo $deportes->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Electrodomésticos</td>
                                                                <td><?php echo $electrodomesticos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herramientas</td>
                                                                <td><?php echo $herramientas->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hogar</td>
                                                                <td><?php echo $hogar->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Instrumentos Musicales</td>
                                                                <td><?php echo $instrumentos_musicales->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Joyería</td>
                                                                <td><?php echo $joyeria->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Línea blanca</td>
                                                                <td><?php echo $line_blanca->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Motocicletas y Automóviles</td>
                                                                <td><?php echo $motocicletas_automoviles->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salud y belleza</td>
                                                                <td><?php echo $salud_belleza->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video</td>
                                                                <td><?php echo $video->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video Juegos</td>
                                                                <td><?php echo $videojuegos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->mutuo) ?></td>
                                                            </tr>
                                                        </table>
                                                        <?php } ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel box box-danger">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                                   class="collapsed" aria-expanded="false">
                                                    Tienda 2
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                             style="height: 0px;">
                                            <div class="box-body">
                                                <?php
                                                //tienda 2
                                                $productos_en_liquidacion_tienda_1_2 = $ci->Productos_model->get_productos_liquidacion_inventario('1', '2');
                                                $productos_en_liquidacion_tienda_2_2 = $ci->Productos_model->get_productos_liquidacion_inventario('2', '2');
                                                $productos_en_liquidacion_tienda_3_2 = $ci->Productos_model->get_productos_liquidacion_inventario('3', '2');
                                                $productos_en_liquidacion_tienda_4_2 = $ci->Productos_model->get_productos_liquidacion_inventario('4', '2');
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover" id="tienda_2">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Categoriía</th>
                                                                <th>Contrato</th>
                                                                <th>Avaluo comercial</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Mutuo</th>
                                                                <th>días en inventario</th>
                                                                <th>Fecha</th>
                                                                <th>usuario que opero</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $total_avaluo_ce = 0;
                                                            $total_avaluo_comercial = 0;
                                                            $total_mutuo = 0;
                                                            $numero_producto = 1;
                                                            //tienda
                                                            //valores categorias
                                                            $Audio =(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Camaras=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Celulares=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $computadoras_laptops_tablets=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $deportes=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $electrodomesticos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $herramientas=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $hogar=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $instrumentos_musicales=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $joyeria=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $line_blanca=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $motocicletas_automoviles=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $salud_belleza=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $video=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $videojuegos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            ?>
                                                            <?php if ($productos_en_liquidacion_tienda_1_2) { ?>
                                                            <?php foreach ($productos_en_liquidacion_tienda_1_2->result() as $producto) { ?>
                                                                <?php //print_contenido($producto)?>
                                                                <tr>
                                                                    <td><?php echo $numero_producto; ?></td>
                                                                    <td><?php echo $producto->producto_id; ?></td>
                                                                    <td><?php echo $producto->nombre_producto; ?></td>
                                                                    <td><?php echo $producto->categoria; ?></td>
                                                                    <td><?php echo $producto->contrato_id; ?></td>
                                                                    <td><?php echo $producto->avaluo_comercial;
                                                                        $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                        ?></td>
                                                                    <td><?php echo $producto->avaluo_ce;
                                                                        $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                        ?></td>
                                                                    <td><?php echo $producto->mutuo;
                                                                        $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                        ?></td>
                                                                    <td><?php
                                                                        $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                        echo $diferencia_en_dias; ?> dias</td>
                                                                    <td><?php echo $producto->dias_gracia; ?></td>
                                                                    <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                </tr>
                                                                <?php
                                                                $numero_producto = $numero_producto + 1;
                                                                //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                if($producto->categoria == 'Audio'){

                                                                    $Audio->numero =  $Audio->numero +1;
                                                                    $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                    $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                    $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                    $total_Audio->numero =  $total_Audio->numero +1;
                                                                    $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                }
                                                                if($producto->categoria == 'Cámaras'){
                                                                    $Camaras->numero =  $Camaras->numero +1;
                                                                    $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                    $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                    $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                    $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                    $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Celulares'){
                                                                    $Celulares->numero =  $Celulares->numero +1;
                                                                    $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                    $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                    $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                    $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                    $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                    $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                    $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                    $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                    $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                    $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                    $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Deportes'){
                                                                    $deportes->numero =  $deportes->numero +1;
                                                                    $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                    $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                    $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                    $total_deportes->numero =  $total_deportes->numero +1;
                                                                    $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Electrodomésticos'){
                                                                    $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                    $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                    $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                    $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                    $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                    $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Herramientas'){
                                                                    $herramientas->numero =  $herramientas->numero +1;
                                                                    $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                    $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                    $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                    $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                    $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Hogar'){
                                                                    $hogar->numero =  $hogar->numero +1;
                                                                    $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                    $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                    $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                    $total_hogar->numero =  $total_hogar->numero +1;
                                                                    $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Instrumentos Musicales'){
                                                                    $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                    $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                    $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                    $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                    $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                    $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Joyería'){
                                                                    $joyeria->numero =  $joyeria->numero +1;
                                                                    $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                    $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                    $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                    $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                    $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Línea blanca'){
                                                                    $line_blanca->numero =  $line_blanca->numero +1;
                                                                    $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                    $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                    $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                    $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                    $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                    $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                    $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                    $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                    $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                    $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                }
                                                                if($producto->categoria == 'Salud y belleza'){
                                                                    $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                    $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                    $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                    $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                    $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                    $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Video'){
                                                                    $video->numero =  $video->numero +1;
                                                                    $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                    $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                    $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                    $total_video->numero =  $total_video->numero +1;
                                                                    $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                }
                                                                if($producto->categoria == 'Video Juegos'){
                                                                    $videojuegos->numero =  $videojuegos->numero +1;
                                                                    $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                    $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                    $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                    $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                    $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                    $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                    $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                }



                                                            } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_2_2) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_2_2->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_3_2) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_3_2->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_4_2) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_4_2->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                        $total_total_avaluo_ce = $total_total_avaluo_ce +$total_avaluo_ce;
                                                        $total_total_avaluo_comercial = $total_total_avaluo_comercial+ $total_avaluo_comercial;
                                                        $total_total_mutuo = $total_total_mutuo + $total_mutuo;
                                                        ?>

                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <td colspan="5">Totales</td>
                                                                <td>
                                                                    Avaluo Comercial
                                                                </td>
                                                                <td>
                                                                    Avaluo CE
                                                                </td>
                                                                <td>
                                                                    Mutuo
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5"></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_comercial); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_ce); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_mutuo); ?></td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Categoría</th>
                                                                <th>Cantidad</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Avaluo</th>
                                                                <th>Mutuo</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td>Audio</td>
                                                                <td><?php echo $Audio->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cámaras</td>
                                                                <td><?php echo $Camaras->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Celulares</td>
                                                                <td><?php echo $Celulares->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_ce)?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Computadoras Laptops y Tablets</td>
                                                                <td><?php echo $computadoras_laptops_tablets->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Deportes</td>
                                                                <td><?php echo $deportes->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Electrodomésticos</td>
                                                                <td><?php echo $electrodomesticos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herramientas</td>
                                                                <td><?php echo $herramientas->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hogar</td>
                                                                <td><?php echo $hogar->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Instrumentos Musicales</td>
                                                                <td><?php echo $instrumentos_musicales->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Joyería</td>
                                                                <td><?php echo $joyeria->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Línea blanca</td>
                                                                <td><?php echo $line_blanca->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Motocicletas y Automóviles</td>
                                                                <td><?php echo $motocicletas_automoviles->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salud y belleza</td>
                                                                <td><?php echo $salud_belleza->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video</td>
                                                                <td><?php echo $video->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video Juegos</td>
                                                                <td><?php echo $videojuegos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->mutuo) ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                                   class="" aria-expanded="true">
                                                    Metro Norte
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="true"
                                             style="">
                                            <div class="box-body">
                                                <?php
                                                //tienda 3
                                                $productos_en_liquidacion_tienda_1_3 = $ci->Productos_model->get_productos_liquidacion_inventario('1', '3');
                                                $productos_en_liquidacion_tienda_2_3 = $ci->Productos_model->get_productos_liquidacion_inventario('2', '3');
                                                $productos_en_liquidacion_tienda_3_3 = $ci->Productos_model->get_productos_liquidacion_inventario('3', '3');
                                                $productos_en_liquidacion_tienda_4_3 = $ci->Productos_model->get_productos_liquidacion_inventario('4', '3');
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover" id="tienda_1">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Categoriía</th>
                                                                <th>Contrato</th>
                                                                <th>Avaluo comercial</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Mutuo</th>
                                                                <th>días en inventario</th>
                                                                <th>Fecha</th>
                                                                <th>usuario que opero</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $total_avaluo_ce = 0;
                                                            $total_avaluo_comercial = 0;
                                                            $total_mutuo = 0;
                                                            $numero_producto = 1;
                                                            //tienda
                                                            //valores categorias
                                                            $Audio =(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Camaras=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Celulares=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $computadoras_laptops_tablets=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $deportes=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $electrodomesticos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $herramientas=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $hogar=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $instrumentos_musicales=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $joyeria=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $line_blanca=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $motocicletas_automoviles=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $salud_belleza=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $video=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $videojuegos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            ?>
                                                            <?php if ($productos_en_liquidacion_tienda_1_3) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_1_3->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_2_3) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_2_3->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_3_3) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_3_3->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_4_3) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_4_3->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                        $total_total_avaluo_ce = $total_total_avaluo_ce +$total_avaluo_ce;
                                                        $total_total_avaluo_comercial = $total_total_avaluo_comercial+ $total_avaluo_comercial;
                                                        $total_total_mutuo = $total_total_mutuo + $total_mutuo;
                                                        ?>
                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <td colspan="5">Totales</td>
                                                                <td>
                                                                    Avaluo Comercial
                                                                </td>
                                                                <td>
                                                                    Avaluo CE
                                                                </td>
                                                                <td>
                                                                    Mutuo
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5"></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_comercial); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_ce); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_mutuo); ?></td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Categoría</th>
                                                                <th>Cantidad</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Avaluo</th>
                                                                <th>Mutuo</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td>Audio</td>
                                                                <td><?php echo $Audio->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cámaras</td>
                                                                <td><?php echo $Camaras->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Celulares</td>
                                                                <td><?php echo $Celulares->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_ce)?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Computadoras Laptops y Tablets</td>
                                                                <td><?php echo $computadoras_laptops_tablets->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Deportes</td>
                                                                <td><?php echo $deportes->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Electrodomésticos</td>
                                                                <td><?php echo $electrodomesticos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herramientas</td>
                                                                <td><?php echo $herramientas->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hogar</td>
                                                                <td><?php echo $hogar->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Instrumentos Musicales</td>
                                                                <td><?php echo $instrumentos_musicales->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Joyería</td>
                                                                <td><?php echo $joyeria->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Línea blanca</td>
                                                                <td><?php echo $line_blanca->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Motocicletas y Automóviles</td>
                                                                <td><?php echo $motocicletas_automoviles->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salud y belleza</td>
                                                                <td><?php echo $salud_belleza->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video</td>
                                                                <td><?php echo $video->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video Juegos</td>
                                                                <td><?php echo $videojuegos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->mutuo) ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                                   class="" aria-expanded="false">
                                                    Antigua
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse " aria-expanded="false"
                                             style="">
                                            <div class="box-body">
                                                <?php
                                                //tienda 4
                                                $productos_en_liquidacion_tienda_1_4 = $ci->Productos_model->get_productos_liquidacion_inventario('1', '4');
                                                $productos_en_liquidacion_tienda_2_4 = $ci->Productos_model->get_productos_liquidacion_inventario('2', '4');
                                                $productos_en_liquidacion_tienda_3_4 = $ci->Productos_model->get_productos_liquidacion_inventario('3', '4');
                                                $productos_en_liquidacion_tienda_4_4 = $ci->Productos_model->get_productos_liquidacion_inventario('4', '4');
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover" id="tienda_4">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Categoriía</th>
                                                                <th>Contrato</th>
                                                                <th>Avaluo comercial</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Mutuo</th>
                                                                <th>días en inventario</th>
                                                                <th>Fecha</th>
                                                                <th>usuario que opero</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $total_avaluo_ce = 0;
                                                            $total_avaluo_comercial = 0;
                                                            $total_mutuo = 0;
                                                            $numero_producto = 1;
                                                            //tienda
                                                            //valores categorias
                                                            $Audio =(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Camaras=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $Celulares=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $computadoras_laptops_tablets=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $deportes=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $electrodomesticos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $herramientas=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $hogar=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $instrumentos_musicales=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $joyeria=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $line_blanca=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $motocicletas_automoviles=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $salud_belleza=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $video=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            $videojuegos=(object) array(
                                                                'numero' => 0,
                                                                'avaluo_ce' => 0,
                                                                'avaluo_c' => 0,
                                                                'mutuo' => 0
                                                            );
                                                            ?>
                                                            <?php if ($productos_en_liquidacion_tienda_1_4) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_1_4->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_2_4) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_2_4->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_3_4) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_3_4->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            <?php if ($productos_en_liquidacion_tienda_4_4) { ?>
                                                                <?php foreach ($productos_en_liquidacion_tienda_4_4->result() as $producto) { ?>
                                                                    <?php //print_contenido($producto)?>
                                                                    <tr>
                                                                        <td><?php echo $numero_producto; ?></td>
                                                                        <td><?php echo $producto->producto_id; ?></td>
                                                                        <td><?php echo $producto->nombre_producto; ?></td>
                                                                        <td><?php echo $producto->categoria; ?></td>
                                                                        <td><?php echo $producto->contrato_id; ?></td>
                                                                        <td><?php echo $producto->avaluo_comercial;
                                                                            $total_avaluo_comercial = $total_avaluo_comercial + $producto->avaluo_comercial;
                                                                            ?></td>
                                                                        <td><?php echo $producto->avaluo_ce;
                                                                            $total_avaluo_ce = $total_avaluo_ce + $producto->avaluo_ce;
                                                                            ?></td>
                                                                        <td><?php echo $producto->mutuo;
                                                                            $total_mutuo = $total_mutuo + $producto->mutuo;
                                                                            ?></td>
                                                                        <td><?php
                                                                            $diferencia_en_dias = diferencia_en_dias($producto->dias_gracia);
                                                                            echo $diferencia_en_dias; ?> dias</td>
                                                                        <td><?php echo $producto->dias_gracia; ?></td>
                                                                        <td><?php echo id_to_nombre($producto->user_id); ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $numero_producto = $numero_producto + 1;
                                                                    //asignamos valores segun categorias a objeto de total de tienda y total global

                                                                    if($producto->categoria == 'Audio'){

                                                                        $Audio->numero =  $Audio->numero +1;
                                                                        $Audio->avaluo_ce =  $Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $Audio->avaluo_c =  $Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $Audio->mutuo =  $Audio->mutuo + $producto->mutuo;

                                                                        $total_Audio->numero =  $total_Audio->numero +1;
                                                                        $total_Audio->avaluo_ce =  $total_Audio->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Audio->avaluo_c =  $total_Audio->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Audio->mutuo =  $total_Audio->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Cámaras'){
                                                                        $Camaras->numero =  $Camaras->numero +1;
                                                                        $Camaras->avaluo_ce =  $Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $Camaras->avaluo_c =  $Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $Camaras->mutuo =  $Camaras->mutuo + $producto->mutuo;

                                                                        $total_Camaras->numero =  $total_Camaras->numero +1;
                                                                        $total_Camaras->avaluo_ce =  $total_Camaras->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Camaras->avaluo_c =  $total_Camaras->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Camaras->mutuo =  $total_Camaras->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Celulares'){
                                                                        $Celulares->numero =  $Celulares->numero +1;
                                                                        $Celulares->avaluo_ce =  $Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $Celulares->avaluo_c =  $Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $Celulares->mutuo =  $Celulares->mutuo + $producto->mutuo;

                                                                        $total_Celulares->numero =  $total_Celulares->numero +1;
                                                                        $total_Celulares->avaluo_ce =  $total_Celulares->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_Celulares->avaluo_c =  $total_Celulares->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_Celulares->mutuo =  $total_Celulares->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Computadoras Laptops y Tablets'){
                                                                        $computadoras_laptops_tablets->numero =  $computadoras_laptops_tablets->numero +1;
                                                                        $computadoras_laptops_tablets->avaluo_ce =  $computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $computadoras_laptops_tablets->avaluo_c =  $computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $computadoras_laptops_tablets->mutuo =  $computadoras_laptops_tablets->mutuo + $producto->mutuo;

                                                                        $total_computadoras_laptops_tablets->numero =  $total_computadoras_laptops_tablets->numero +1;
                                                                        $total_computadoras_laptops_tablets->avaluo_ce =  $total_computadoras_laptops_tablets->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_computadoras_laptops_tablets->avaluo_c =  $total_computadoras_laptops_tablets->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_computadoras_laptops_tablets->mutuo =  $total_computadoras_laptops_tablets->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Deportes'){
                                                                        $deportes->numero =  $deportes->numero +1;
                                                                        $deportes->avaluo_ce =  $deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $deportes->avaluo_c =  $deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $deportes->mutuo =  $deportes->mutuo + $producto->mutuo;

                                                                        $total_deportes->numero =  $total_deportes->numero +1;
                                                                        $total_deportes->avaluo_ce =  $total_deportes->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_deportes->avaluo_c =  $total_deportes->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_deportes->mutuo =  $total_deportes->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Electrodomésticos'){
                                                                        $electrodomesticos->numero =  $electrodomesticos->numero +1;
                                                                        $electrodomesticos->avaluo_ce =  $electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $electrodomesticos->avaluo_c =  $electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $electrodomesticos->mutuo =  $electrodomesticos->mutuo + $producto->mutuo;

                                                                        $total_electrodomesticos->numero =  $total_electrodomesticos->numero +1;
                                                                        $total_electrodomesticos->avaluo_ce =  $total_electrodomesticos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_electrodomesticos->avaluo_c =  $total_electrodomesticos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_electrodomesticos->mutuo =  $total_electrodomesticos->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Herramientas'){
                                                                        $herramientas->numero =  $herramientas->numero +1;
                                                                        $herramientas->avaluo_ce =  $herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $herramientas->avaluo_c =  $herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $herramientas->mutuo =  $herramientas->mutuo + $producto->mutuo;

                                                                        $total_herramientas->numero =  $total_herramientas->numero +1;
                                                                        $total_herramientas->avaluo_ce =  $total_herramientas->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_herramientas->avaluo_c =  $total_herramientas->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_herramientas->mutuo =  $total_herramientas->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Hogar'){
                                                                        $hogar->numero =  $hogar->numero +1;
                                                                        $hogar->avaluo_ce =  $hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $hogar->avaluo_c =  $hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $hogar->mutuo =  $hogar->mutuo + $producto->mutuo;

                                                                        $total_hogar->numero =  $total_hogar->numero +1;
                                                                        $total_hogar->avaluo_ce =  $total_hogar->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_hogar->avaluo_c =  $total_hogar->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_hogar->mutuo =  $total_hogar->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Instrumentos Musicales'){
                                                                        $instrumentos_musicales->numero =  $instrumentos_musicales->numero +1;
                                                                        $instrumentos_musicales->avaluo_ce =  $instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $instrumentos_musicales->avaluo_c =  $instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $instrumentos_musicales->mutuo =  $instrumentos_musicales->mutuo + $producto->mutuo;

                                                                        $total_instrumentos_musicales->numero =  $total_instrumentos_musicales->numero +1;
                                                                        $total_instrumentos_musicales->avaluo_ce =  $total_instrumentos_musicales->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_instrumentos_musicales->avaluo_c =  $total_instrumentos_musicales->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_instrumentos_musicales->mutuo =  $total_instrumentos_musicales->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Joyería'){
                                                                        $joyeria->numero =  $joyeria->numero +1;
                                                                        $joyeria->avaluo_ce =  $joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $joyeria->avaluo_c =  $joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $joyeria->mutuo =  $joyeria->mutuo + $producto->mutuo;

                                                                        $total_joyeria->numero =  $total_joyeria->numero +1;
                                                                        $total_joyeria->avaluo_ce =  $total_joyeria->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_joyeria->avaluo_c =  $total_joyeria->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_joyeria->mutuo =  $total_joyeria->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Línea blanca'){
                                                                        $line_blanca->numero =  $line_blanca->numero +1;
                                                                        $line_blanca->avaluo_ce =  $line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $line_blanca->avaluo_c =  $line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $line_blanca->mutuo =  $line_blanca->mutuo + $producto->mutuo;

                                                                        $total_line_blanca->numero =  $total_line_blanca->numero +1;
                                                                        $total_line_blanca->avaluo_ce =  $total_line_blanca->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_line_blanca->avaluo_c =  $total_line_blanca->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_line_blanca->mutuo =  $total_line_blanca->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Motocicletas y Automóviles'){
                                                                        $motocicletas_automoviles->numero =  $motocicletas_automoviles->numero +1;
                                                                        $motocicletas_automoviles->avaluo_ce =  $motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $motocicletas_automoviles->avaluo_c =  $motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $motocicletas_automoviles->mutuo =  $motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                        $total_motocicletas_automoviles->numero =  $total_motocicletas_automoviles->numero +1;
                                                                        $total_motocicletas_automoviles->avaluo_ce =  $total_motocicletas_automoviles->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_motocicletas_automoviles->avaluo_c =  $total_motocicletas_automoviles->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_motocicletas_automoviles->mutuo =  $total_motocicletas_automoviles->mutuo + $producto->mutuo;

                                                                    }
                                                                    if($producto->categoria == 'Salud y belleza'){
                                                                        $salud_belleza->numero =  $salud_belleza->numero +1;
                                                                        $salud_belleza->avaluo_ce =  $salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $salud_belleza->avaluo_c =  $salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $salud_belleza->mutuo =  $salud_belleza->mutuo + $producto->mutuo;

                                                                        $total_salud_belleza->numero =  $total_salud_belleza->numero +1;
                                                                        $total_salud_belleza->avaluo_ce =  $total_salud_belleza->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_salud_belleza->avaluo_c =  $total_salud_belleza->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_salud_belleza->mutuo =  $total_salud_belleza->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video'){
                                                                        $video->numero =  $video->numero +1;
                                                                        $video->avaluo_ce =  $video->avaluo_ce + $producto->avaluo_ce;
                                                                        $video->avaluo_c =  $video->avaluo_c + $producto->avaluo_comercial;
                                                                        $video->mutuo =  $video->mutuo + $producto->mutuo;

                                                                        $total_video->numero =  $total_video->numero +1;
                                                                        $total_video->avaluo_ce =  $total_video->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_video->avaluo_c =  $total_video->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_video->mutuo =  $total_video->mutuo + $producto->mutuo;
                                                                    }
                                                                    if($producto->categoria == 'Video Juegos'){
                                                                        $videojuegos->numero =  $videojuegos->numero +1;
                                                                        $videojuegos->avaluo_ce =  $videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $videojuegos->avaluo_c =  $videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $videojuegos->mutuo =  $videojuegos->mutuo + $producto->mutuo;

                                                                        $total_videojuegos->numero =  $total_videojuegos->numero +1;
                                                                        $total_videojuegos->avaluo_ce =  $total_videojuegos->avaluo_ce + $producto->avaluo_ce;
                                                                        $total_videojuegos->avaluo_c =  $total_videojuegos->avaluo_c + $producto->avaluo_comercial;
                                                                        $total_videojuegos->mutuo =  $total_videojuegos->mutuo + $producto->mutuo;
                                                                    }



                                                                } ?>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                        $total_total_avaluo_ce = $total_total_avaluo_ce +$total_avaluo_ce;
                                                        $total_total_avaluo_comercial = $total_total_avaluo_comercial+ $total_avaluo_comercial;
                                                        $total_total_mutuo = $total_total_mutuo + $total_mutuo;
                                                        ?>
                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <td colspan="5">Totales</td>
                                                                <td>
                                                                    Avaluo Comercial
                                                                </td>
                                                                <td>
                                                                    Avaluo CE
                                                                </td>
                                                                <td>
                                                                    Mutuo
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5"></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_comercial); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_avaluo_ce); ?></td>
                                                                <td>
                                                                    Q.<?php echo display_formato_dinero($total_mutuo); ?></td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Categoría</th>
                                                                <th>Cantidad</th>
                                                                <th>Avaluo ce</th>
                                                                <th>Avaluo</th>
                                                                <th>Mutuo</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td>Audio</td>
                                                                <td><?php echo $Audio->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Audio->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cámaras</td>
                                                                <td><?php echo $Camaras->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Camaras->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Celulares</td>
                                                                <td><?php echo $Celulares->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_ce)?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($Celulares->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Computadoras Laptops y Tablets</td>
                                                                <td><?php echo $computadoras_laptops_tablets->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($computadoras_laptops_tablets->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Deportes</td>
                                                                <td><?php echo $deportes->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($deportes->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Electrodomésticos</td>
                                                                <td><?php echo $electrodomesticos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($electrodomesticos->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herramientas</td>
                                                                <td><?php echo $herramientas->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($herramientas->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hogar</td>
                                                                <td><?php echo $hogar->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($hogar->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Instrumentos Musicales</td>
                                                                <td><?php echo $instrumentos_musicales->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($instrumentos_musicales->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Joyería</td>
                                                                <td><?php echo $joyeria->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($joyeria->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Línea blanca</td>
                                                                <td><?php echo $line_blanca->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($line_blanca->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Motocicletas y Automóviles</td>
                                                                <td><?php echo $motocicletas_automoviles->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($motocicletas_automoviles->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salud y belleza</td>
                                                                <td><?php echo $salud_belleza->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($salud_belleza->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video</td>
                                                                <td><?php echo $video->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($video->mutuo) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Video Juegos</td>
                                                                <td><?php echo $videojuegos->numero ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_ce) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->avaluo_c) ?></td>
                                                                <td>Q.<?php echo display_formato_dinero($videojuegos->mutuo) ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-header">
                                    Totales por categorías
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- DONUT CHART -->
                                        <div class="box box-danger">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Numero de productos</h3>

                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <canvas id="pieChart" style="height:250px"></canvas>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- DONUT CHART -->
                                        <div class="box box-danger">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Valor según categorías</h3>

                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <canvas id="total_precio_chart" style="height:250px"></canvas>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <td colspan="5">Totales</td>
                                            <td>
                                                Avaluo Comercial
                                            </td>
                                            <td>
                                                Avaluo CE
                                            </td>
                                            <td>
                                                Mutuo
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>
                                                Q.<?php echo display_formato_dinero($total_total_avaluo_comercial); ?></td>
                                            <td>
                                                Q.<?php echo display_formato_dinero($total_total_avaluo_ce); ?></td>
                                            <td>
                                                Q.<?php echo display_formato_dinero($total_total_mutuo); ?></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Cantidad</th>
                                            <th>Avaluo ce</th>
                                            <th>Avaluo</th>
                                            <th>Mutuo</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>Audio</td>
                                            <td><?php echo $total_Audio->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Audio->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Audio->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Audio->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cámaras</td>
                                            <td><?php echo $total_Camaras->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Camaras->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Camaras->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Camaras->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Celulares</td>
                                            <td><?php echo $total_Celulares->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Celulares->avaluo_ce)?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Celulares->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_Celulares->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Computadoras Laptops y Tablets</td>
                                            <td><?php echo $total_computadoras_laptops_tablets->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_computadoras_laptops_tablets->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_computadoras_laptops_tablets->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_computadoras_laptops_tablets->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Deportes</td>
                                            <td><?php echo $total_deportes->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_deportes->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_deportes->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_deportes->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Electrodomésticos</td>
                                            <td><?php echo $total_electrodomesticos->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_electrodomesticos->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_electrodomesticos->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_electrodomesticos->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Herramientas</td>
                                            <td><?php echo $total_herramientas->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_herramientas->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_herramientas->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_herramientas->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hogar</td>
                                            <td><?php echo $total_hogar->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_hogar->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_hogar->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_hogar->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Instrumentos Musicales</td>
                                            <td><?php echo $total_instrumentos_musicales->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Joyería</td>
                                            <td><?php echo $total_joyeria->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_joyeria->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_joyeria->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_joyeria->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Línea blanca</td>
                                            <td><?php echo $total_line_blanca->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_line_blanca->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_line_blanca->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_line_blanca->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Motocicletas y Automóviles</td>
                                            <td><?php echo $total_instrumentos_musicales->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_instrumentos_musicales->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Salud y belleza</td>
                                            <td><?php echo $total_salud_belleza->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_salud_belleza->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_salud_belleza->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_salud_belleza->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Video</td>
                                            <td><?php echo $total_video->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_video->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_video->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_video->mutuo) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Video Juegos</td>
                                            <td><?php echo $total_videojuegos->numero ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_videojuegos->avaluo_ce) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_videojuegos->avaluo_c) ?></td>
                                            <td>Q.<?php echo display_formato_dinero($total_videojuegos->mutuo) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
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
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>/ui/admin/plugins/chartjs/Chart.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
    <!-- page script -->
    <script>
        $(document).ready(function () {
            $('#tienda_1').dataTable( {
                "paging": false,
                "searching": false
            } );
            $('#tienda_2').dataTable( {
                "paging": false,
                "searching": false
            } );
            $('#tienda_3').dataTable( {
                "paging": false,
                "searching": false
            } );
            $('#tienda_4').dataTable( {
                "paging": false,
                "searching": false
            } );
        });

        //-------------
        //- total numero productos  -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart       = new Chart(pieChartCanvas);
        var PieData        = [
            {
                value    : <?php echo $total_Audio->numero; ?>,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Audio'
            },
            {
                value    : <?php echo $total_Camaras->numero; ?>,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Cámaras'
            },
            {
                value    : <?php echo $total_Celulares->numero; ?>,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'Celulares'
            },
            {
                value    : <?php echo $total_computadoras_laptops_tablets->numero; ?>,
                color    : '#00c0ef',
                highlight: '#00c0ef',
                label    : 'Computadoras Laptops y Tablets'
            },
            {
                value    : <?php echo $total_deportes->numero; ?>,
                color    : '#3c8dbc',
                highlight: '#3c8dbc',
                label    : 'Deportes'
            },
            {
                value    : <?php echo $total_electrodomesticos->numero; ?>,
                color    : '#d2d6de',
                highlight: '#d2d6de',
                label    : 'Electrodomésticos'
            },
            {
                value    : <?php echo $total_herramientas->numero; ?>,
                color    : '#8dbc3c',
                highlight: '#8dbc3c',
                label    : 'Herramientas'
            },
            {
                value    : <?php echo $total_hogar->numero; ?>,
                color    : '#bc3c8d',
                highlight: '#bc3c8d',
                label    : 'Hogar'
            },
            {
                value    : <?php echo $total_instrumentos_musicales->numero; ?>,
                color    : '#bc6b3c',
                highlight: '#bc6b3c',
                label    : 'Instrumentos Musicales'
            },
            {
                value    : <?php echo $total_joyeria->numero; ?>,
                color    : '#bcab3c',
                highlight: '#bcab3c',
                label    : 'Joyería'
            },
            {
                value    : <?php echo $total_line_blanca->numero; ?>,
                color    : '#4dbc3c',
                highlight: '#4dbc3c',
                label    : 'Línea blanca'
            },
            {
                value    : <?php echo $total_motocicletas_automoviles->numero; ?>,
                color    : '#3c4dbc',
                highlight: '#3c4dbc',
                label    : 'Motocicletas y Automóviles'
            },
            {
                value    : <?php echo $total_salud_belleza->numero; ?>,
                color    : '#bc3c4d',
                highlight: '#bc3c4d',
                label    : 'Salud y belleza'
            },
            {
                value    : <?php echo $total_video->numero; ?>,
                color    : '#3cbcab',
                highlight: '#3cbcab',
                label    : 'Video'
            },
            {
                value    : <?php echo $total_videojuegos->numero; ?>,
                color    : '#ab3cbc',
                highlight: '#ab3cbc',
                label    : 'Video Juegos'
            }
        ]
        var pieOptions     = {

            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions)

        //-------------
        //- total valor productos  -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var total_valor_chart_canvas = $('#total_precio_chart').get(0).getContext('2d');
        var total_valor_chart       = new Chart(total_valor_chart_canvas);
        var total_valorData        = [
            {
                value    : <?php echo $total_Audio->avaluo_c; ?>,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Audio'
            },
            {
                value    : <?php echo $total_Camaras->avaluo_c; ?>,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Cámaras'
            },
            {
                value    : <?php echo $total_Celulares->avaluo_c; ?>,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'Celulares'
            },
            {
                value    : <?php echo $total_computadoras_laptops_tablets->avaluo_c; ?>,
                color    : '#00c0ef',
                highlight: '#00c0ef',
                label    : 'Computadoras Laptops y Tablets'
            },
            {
                value    : <?php echo $total_deportes->avaluo_c; ?>,
                color    : '#3c8dbc',
                highlight: '#3c8dbc',
                label    : 'Deportes'
            },
            {
                value    : <?php echo $total_electrodomesticos->avaluo_c; ?>,
                color    : '#d2d6de',
                highlight: '#d2d6de',
                label    : 'Electrodomésticos'
            },
            {
                value    : <?php echo $total_herramientas->avaluo_c; ?>,
                color    : '#8dbc3c',
                highlight: '#8dbc3c',
                label    : 'Herramientas'
            },
            {
                value    : <?php echo $total_hogar->avaluo_c; ?>,
                color    : '#bc3c8d',
                highlight: '#bc3c8d',
                label    : 'Hogar'
            },
            {
                value    : <?php echo $total_instrumentos_musicales->avaluo_c; ?>,
                color    : '#bc6b3c',
                highlight: '#bc6b3c',
                label    : 'Instrumentos Musicales'
            },
            {
                value    : <?php echo $total_joyeria->avaluo_c; ?>,
                color    : '#bcab3c',
                highlight: '#bcab3c',
                label    : 'Joyería'
            },
            {
                value    : <?php echo $total_line_blanca->avaluo_c; ?>,
                color    : '#4dbc3c',
                highlight: '#4dbc3c',
                label    : 'Línea blanca'
            },
            {
                value    : <?php echo $total_motocicletas_automoviles->avaluo_c; ?>,
                color    : '#3c4dbc',
                highlight: '#3c4dbc',
                label    : 'Motocicletas y Automóviles'
            },
            {
                value    : <?php echo $total_salud_belleza->avaluo_c; ?>,
                color    : '#bc3c4d',
                highlight: '#bc3c4d',
                label    : 'Salud y belleza'
            },
            {
                value    : <?php echo $total_video->avaluo_c; ?>,
                color    : '#3cbcab',
                highlight: '#3cbcab',
                label    : 'Video'
            },
            {
                value    : <?php echo $total_videojuegos->avaluo_c; ?>,
                color    : '#ab3cbc',
                highlight: '#ab3cbc',
                label    : 'Video Juegos'
            }
        ]
        var total_valorOptions     = {

            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        total_valor_chart.Doughnut(total_valorData, total_valorOptions)



    </script>
<?php $this->stop() ?>