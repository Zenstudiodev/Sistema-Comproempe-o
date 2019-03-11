<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 20/02/2019
 * Time: 04:06 PM
 */

$this->layout('admin/admin_master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
]);
if ($preempeno_data) {
    $preempeno_data = $preempeno_data->row();
}
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
            Preempeño
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Preempeño</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if ($preempeno_data) { ?>

                    <table class="table table-striped">
                        <tr>
                            <td>ID: <?php echo $preempeno_data->pe_id; ?></td>
                            <td>Nombre del cliente: <?php echo $preempeno_data->pe_nombre_cliente; ?></td>
                            <td>DPI: <?php echo $preempeno_data->pe_dpi_cliente; ?></td>
                        </tr>
                        <tr>
                            <td>Correo del cliente: <?php echo $preempeno_data->pe_correo_cliente; ?></td>
                            <td>Whatsapp: <?php echo $preempeno_data->pe_whatsapp_cliente; ?></td>
                            <td>Teléfono: <?php echo $preempeno_data->pe_telefono_cliente; ?></td>
                        </tr>
                        <tr>
                            <td>Solicitud : <?php echo $preempeno_data->pe_accion; ?></td>
                            <td>Categoría : <?php echo $preempeno_data->pe_categoria; ?></td>
                            <td>Producto : <?php echo $preempeno_data->pe_nombre_producto; ?></td>
                        </tr>
                        <tr>
                            <td>No. Serie : <?php echo $preempeno_data->pe_no_serie; ?></td>
                            <td>Modelo : <?php echo $preempeno_data->pe_modelo; ?></td>
                            <td>Marca : <?php echo $preempeno_data->pe_marca; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Descripción de producto : <?php echo $preempeno_data->pe_descripcion_producto; ?></td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="box-header">
                            <h3 class="box-title">Imágenes</h3>
                        </div>
                        <?php
                        $i = 0;
                        while (file_exists('/home2/comproempeno/public_html/uploads/preempeno/' . $preempeno_data->pe_id . '_' . $i . '.jpg')) { ?>
                            <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-body text-center">
                                        <img src="<?php echo base_url() . 'uploads/preempeno/' . $preempeno_data->pe_id . '_' . $i . '.jpg' ?>"
                                             class="img-responsive  ">
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <?php $i++;
                        } ?>
                    </div>

                <?php } else {
                    echo 'El premepeño no existe';
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

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    $(document).ready(function () {
    });
</script>
<?php $this->stop() ?>
