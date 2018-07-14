<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/05/2018
 * Time: 12:38 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);


//campos formulario
$detalle = array(
    'type' => 'text',
    'name' => 'datalle',
    'id' => 'detalle',
    'class' => 'form-control pull-right',
    'placeholder' => 'Detalle de gasto',
    'required' => 'required',
);

$monto = array(
    'type' => 'number',
    'name' => 'monto',
    'id' => 'monto',
    'class' => 'form-control pull-right',
    'placeholder' => 'Monto',
    'required' => 'required',
    'step' => 'any',
    'min' => '0'
);
$nombre = array(
    'type' => 'text',
    'name' => 'nombre',
    'id' => 'nombre',
    'class' => 'form-control pull-right',
    'placeholder' => 'Nombre',
    'required' => 'required',
    'step' => 'any',
    'min' => '0'
);
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
                Vales Activos
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <?php
                $total_vales = 0;
                if (false) {

                    ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Monto</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($otros_gastos->result() as $gasto) {
                            $total_otros_gastos = $total_otros_gastos + $gasto->monto;
                            ?>
                            <tr>
                                <td><?php echo $gasto->detalle ?></td>
                                <td><?php echo display_formato_dinero($gasto->monto); ?></td>
                            </tr>
                            <?php
                        } ?>
                        <tr>
                            <td colspan="1">Total</td>
                            <td id="totaL_ingresos"><?php echo display_formato_dinero($total_otros_gastos); ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php } else {
                    echo 'No hay vales';
                } ?>
            </div>
            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    Vales del dia - <?php $hoy = New DateTime();
                    echo $hoy->format('Y-m-d') ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $total_otros_gastos = 0;
                    if (false) {

                        ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Detalle</th>
                                <th>Monto</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($otros_gastos->result() as $gasto) {
                                $total_otros_gastos = $total_otros_gastos + $gasto->monto;
                                ?>
                                <tr>
                                    <td><?php echo $gasto->detalle ?></td>
                                    <td><?php echo display_formato_dinero($gasto->monto); ?></td>
                                </tr>
                                <?php
                            } ?>
                            <tr>
                                <td colspan="1">Total</td>
                                <td id="totaL_ingresos"><?php echo display_formato_dinero($total_otros_gastos); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'No hay vales';
                    } ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<?php $this->stop() ?>