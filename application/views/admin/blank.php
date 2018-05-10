<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 9/05/2018
 * Time: 4:52 PM
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
            Ingreso de deposito
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                Ingreso de deposito - <?php $hoy = New DateTime();
                echo $hoy->format('Y-m-d') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

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
<?php $this->stop() ?>
