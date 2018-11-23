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

$hoy = New DateTime();


?>
<!--Css Personalizadoc para vista-->
<?php $this->start('css_p') ?>
<!-- js-grid -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/js-grid/dist/jsgrid.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/js-grid/dist/jsgrid-theme.min.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar productos
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (isset($error)) { ?>
                    <div class="row">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×
                            </button>
                            <h4><i class="icon fa fa-ban"></i> Transacción vacia!</h4>
                            <?php echo $error ?>
                        </div>
                    </div>
                <?php } ?>


                <div id="jsGrid"></div>
                <!-- /.box-body -->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- js-grid -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/js-grid/dist/jsgrid.min.js"></script>

<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>

    var categorias = [
        {Name: "Audio"},
        {Name: "Cámaras"},
        {Name: "Celulares"},
        {Name: "Computadoras Laptops y Tablets"},
        {Name: "Deportes"},
        {Name: "Electrodomésticos"},
        {Name: "Herramientas"},
        {Name: "Hogar"},
        {Name: "Instrumentos Musicales"},
        {Name: "Joyería"},
        {Name: "Línea blanca"},
        {Name: "Motocicletas y Automóviles"},
        {Name: "Salud y belleza"},
        {Name: "Video"},
        {Name: "Video Juegos"}
    ];
    var estado_producto = [
        {Name: "venta", Id: "venta"},
        {Name: "vigente", Id: "vigente"},
        {Name: "vendido", Id: "vendido"},
        {Name: "compra", Id: "compra"},
        {Name: "baja_daño", Id: "baja_daño"},
        {Name: "baja_uso_interno", Id: "baja_uso_interno"},
    ];
    $(function() {

        $.ajax({
            type: "GET",
            url: "<?php echo base_url()?>productos/cargar_productos_en_liquidacion"
        }).done(function(productos) {
            //console.log(productos);
            //productos.unshift({ producto_id: "0", nombre_producto: "" });

            $("#jsGrid").jsGrid({
                height: "70%",
                width: "100%",
                filtering: true,
                inserting: false,
                editing: true,
                sorting: true,
                paging: false,
                autoload: true,
                pageSize: 100,
                pageButtonCount: 5,
                deleteConfirm: "Do you really want to delete client?",
                data: productos,
                controller: {

                    updateItem: function(item) {
                        console.log(item);
                        return $.ajax({
                            type: "PUT",
                            url: "<?php echo base_url()?>productos/actualizar_producto_administrador",
                            data: item
                        }).done(function (data, textStatus, jqXHR) {
                            console.log(data);
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            console.log('fail: status=' + jqXHR.status + ', textStatus=' + textStatus);
                        });
                    },
                    deleteItem: function(item) {
                        return $.ajax({
                            type: "DELETE",
                            url: "/clients/",
                            data: item
                        });
                    }
                },
                fields: [
                    {name: "fecha_avaluo", type: "text"},
                    {name: "producto_id", type: "number", readOnly: true},
                    {name: "contrato_id", type: "number", readOnly: true},
                    {name: "tienda_id", type: "number", readOnly: true, title: "Tienda origen"},
                    {name: "tienda_actual", type: "number", readOnly: true},
                    {name: "nombre_producto", type: "text", readOnly: true, title: "Nombre"},
                    {name: "categoria", type: "select", items: categorias, valueField: "Name", textField: "Name"},
                    <?php if(user_rol() == 'developer' || user_rol() == 'gerencia'){?>
                    {name: "tipo", type: "select", items: estado_producto, valueField: "Id", textField: "Name"},
                    {name: "avaluo_comercial", type: "number", readOnly: true, title: "Avaluo"},
                    {name: "precio_venta", type: "text", title: "Precio de venta"},
                    <?php }?>
                    {type: "control"}
                ]
            });

        });


    });



</script>
<?php $this->stop() ?>
