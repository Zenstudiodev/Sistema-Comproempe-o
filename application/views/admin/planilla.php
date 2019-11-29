<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 11/10/2019
 * Time: 09:21 AM
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
            Planilla -
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                Pago de planilla
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if($empleados){ ?>
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Codigo Empleado</th>
                            <th>Nombre</th>
                            <th>Sueldo Base</th>
                            <th>Bonificación</th>
                            <th>Anticipo sobre sueldo</th>
                            <th>Liquido a recibir</th>
                            <th>Decuentos varios</th>
                            <th>Iggs</th>
                            <th>Total descuentos y retenciones</th>
                            <th>Sueldo Mensual</th>
                            <th>Forma de pago</th>
                            <th>INDEMNIZACIÓN 9.72%</th>
                            <th>BONO 14 8.33%</th>
                            <th>AGUINALDO 8.33%</th>
                            <th>VACACIONES 4.11%</th>
                            <th>Cuotas Patronales 12.67%</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($empleados->result() as $empleado) { ?>
                       <tr>
                           <td><?php echo $empleado->id; ?></td>
                           <td><?php echo $empleado->nombre; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><input type="number"></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                           <td><?php echo $empleado->sueldo_base; ?></td>
                       </tr>
                        <?php }?>
                        </tbody>
                    </table>


                <?php }?>
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

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    $(document).ready(function () {
    });
</script>
<?php $this->stop() ?>
