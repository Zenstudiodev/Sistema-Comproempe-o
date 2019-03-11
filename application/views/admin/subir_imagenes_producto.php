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
if ($producto_data) {
    $producto = $producto_data->row();
}
?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>

<!-- Dropzone -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/dropzone/dropzone.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if ($producto_data) { ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subir imágenes producto ID:<?php echo $producto->producto_id; ?> - <?php echo $producto->nombre_producto; ?>
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del producto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                    href="#">×</a>
                        <h4 class="alert-heading">!</h4>
                        <?php echo $mensaje?>
                    </div>
                <?php } ?>


                <form action="<?php echo base_url() ?>Productos/guardar_imagen" class="dropzone" id="dpf">
                    <div class="fallback">
                        <input name="file" type="file" multiple/>
                    </div>
                </form>
                <hr>
                <?php
                if ($fotos_producto) {
                    ?>
                    <div class="row">
                        <?php foreach ($fotos_producto->result() as $imagen) { ?>
                            <div class="col-md-4">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <i class="fas fa-file-image"></i>

                                        <h3 class="box-title"><?php echo $imagen->nombre_imagen ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <img class="img-responsive pad img_subida"
                                             src="<?php echo base_url() . 'uploads/imagenes_productos/' . $imagen->nombre_imagen; ?>"
                                             alt="Photo">
                                        <a href="<?php echo base_url().'productos/borrar_imagen/'.$imagen->imagen_id.'/'.$producto->producto_id;?>" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                        </a>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                <?php } ?>

                <?php } else { ?>
                    <div class="row">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×
                            </button>
                            <h4><i class="fas fa-bell"></i> El producto que busca no existe</h4>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- Dropzone js-->
<script src="<?php echo base_url(); ?>ui/admin/plugins/dropzone/dropzone.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //variables

    // This example uses jQuery so it creates the Dropzone, only when the DOM has
    // loaded.

    // Disabling autoDiscover, otherwise Dropzone will try to attach twice.
    Dropzone.autoDiscover = false;
    // or disable for specific dropzone:
    // Dropzone.options.myDropzone = false;

    $(function () {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
        var myDropzone = new Dropzone("#dpf ",
            {
                url: "<?php echo base_url()?>Productos/guardar_imagen?pid=<?php echo $producto->producto_id;?>",
                paramName: "imagen_producto",
                parallelUploads: 1,
                maxFiles: 1,
                acceptedFiles: ".jpg,.jpeg",
                resizeWidth: '800',
                //resizeMimeType: '.jpg',
                //uploadMultiple: true,
                //chunking: true,
                //retryChunks: true,
                //forceChunking: true,
                //chunkSize: 500000,
                //retryChunksLimit: 40,
                //method: "post",
                //withCredentials: true,
                headers: {
                    "producto_id": "<?php echo $producto->producto_id;?>"
                }
            })
        ;


        myDropzone.on("addedfile", function (file) {
            //console.log(file)
            /* Maybe display some more file information on your page */
        });
        myDropzone.on("success", function (file, data) {
            //console.log(file);
            console.log(data);
            window.navigator.vibrate(200);
           location.reload();
            /* Maybe display some more file information on your page */
        });

    })


</script>
<?php $this->stop() ?>
