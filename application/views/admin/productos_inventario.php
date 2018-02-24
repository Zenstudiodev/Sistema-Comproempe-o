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
<link rel="stylesheet" href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.min.css"
      type="text/css">
<link rel="stylesheet"
      href="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/easy-autocomplete.themes.min.css"
      type="text/css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php base_url() ?>/ui/admin/plugins/datepicker/datepicker3.css">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ingresar producto
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos de Factura</h3>
            </div>
            <!-- /.box-header -->

			<?php


			//Tipo de factura
			$tipo_factura_select         = array(
				'name'     => 'factura_tipo',
				'id'       => 'factura_tipo',
				'class'    => ' form-control',
				'required' => 'required'
			);
			$tipo_factura_select_options = array(
				'local'       => 'Local',
				'importacion' => 'Importacion',
				'especial'    => 'Especial',
			);

			$proveedor    = array(
				'type'        => 'text',
				'name'        => 'proveedor',
				'id'          => 'proveedor',
				'class'       => 'form-control',
				'placeholder' => 'Proveedor',
				//'required' => 'required'
			);
			$proveedor_id = array(
				'type'        => 'text',
				'name'        => 'proveedor_id',
				'id'          => 'proveedor_id',
				'class'       => 'form-control',
				'placeholder' => 'Proveedor',
				'required'    => 'required'
			);

			$cantidad_productos = array(
				'type'        => 'number',
				'name'        => 'cantidad_productos',
				'id'          => 'cantidad_productos',
				'class'       => 'form-control',
				'placeholder' => 'Cantidad de productos',
				'required'    => 'required'
			);


			?>
            <!-- form start -->
            <form role="form" action="<?php echo base_url() ?>/Productos/guardar_productos_inventario" method="post"
                  id="productos_form"
                  name="productos_form">

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Proveedor</label>
								<?php echo form_input($proveedor) ?>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Proveedor_id</label>
								<?php echo form_input($proveedor_id) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Tipo de factura</label>
								<?php echo form_dropdown($tipo_factura_select, $tipo_factura_select_options) ?>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
									<?php $fecha = new DateTime(); ?>
                                    <input type="text" class="form-control pull-right" id="fecha" name="fecha"
                                           value="<?php echo $fecha->format('Y-m-d') ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de Productos</h3>
                    </div>


                    <div id="productos_holder">

                        <div class="box box-success">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <span class="username">Producto 1</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: block;">
                                <div id="product_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoria">Categoría</label>
                                                <input type="text" id="categoria_p1" name="categoria_p1"
                                                       class="categoria form-control" placeholder="Categoria" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categoria">Nombre del producto</label>
                                                <input type="text" id="nombre_producto_p1" name="nombre_producto_p1"
                                                       class="form-control" placeholder="Nombre del producto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="no_serie">No de serie</label>
                                                <input type="text" id="no_serie_p1" name="no_serie_p1"
                                                       class="form-control"
                                                       placeholder="No. de serie" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="modelo">Modelo</label>
                                                <input type="text" id="modelo_p1" name="modelo_p1" class="form-control"
                                                       placeholder="Modelo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="modelo">Marca</label>
                                                <input type="text" id="marca_p1" name="marca_p1" class="form-control"
                                                       placeholder="Marca" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea name="descripcion_p1" cols="40" rows="10" id="descripcion_p1"
                                                          class="form-control" placeholder="Descripción"
                                                          required="required"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">No de productos</label>
                                                <input type="number" id="no_productos_p1" name="no_productos_p1"
                                                       class="form-control no_prductos" placeholder="No. productos"
                                                       step="1" min="1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">Costo bruto</label>
                                                <input type="number" id="costo_b_p1" name="costo_b_p1"
                                                       class="form-control precio_s_iva"
                                                       placeholder="Costo en factura de Provedor" step="any" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">Iva</label>
                                                <input type="number" id="iva_p1" name="iva_p1"
                                                       class="form-control iva"
                                                       placeholder="IVA" step="any" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">Costo neto</label>
                                                <input type="number" id="costo_n_p1" name="costo_n_p1"
                                                       class="form-control precio_neto"
                                                       placeholder="Costo sin IVA" step="any" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">Precio de venta</label>
                                                <input type="number" id="precio_venta_p1" name="precio_venta_p1"
                                                       class="form-control precio_venta" placeholder="Precio de venta"
                                                       step="any" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="categoria">Total de producto</label>
                                                <input type="number" id="total_propducto_p1" name="total_propducto_p1"
                                                       class="form-control total_producto"
                                                       placeholder="Total de producto" step="any" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" name="productos_distintos" id="productos_distintos">
                            <button type="button" class="btn btn-success" id="add_product_btn">Agregar Producto</button>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Cargos extra</h3>
                    </div>

                    <div id="cargos_extra_holder">

                    </div>

                </div>
                <!-- /.box-body -->


        </div>
        <!-- /.box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Calculos</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Total de productos</h4>
                        <input type="hidden" name="total_productos" id="total_productos">
                        <div class="" id="total_productos_t"></div>
                    </div>
                    <div class="col-md-3">
                        <h4>Total de precio sin IVA</h4>
                        <div class="" id="total_precio_sin_iva_t"></div>
                        <input type="hidden" name="total_precio_sin_iva" id="total_precio_sin_iva">
                    </div>
                    <div class="col-md-3">
                        <h4>Total de precio de venta</h4>
                        <div class="" id="total_precio_de_venta_t"></div>
                        <input type="hidden" name="total_precio_de_venta" id="total_precio_de_venta">
                    </div>
                    <div class="col-md-3">
                        <h4>Total de Total de producto</h4>
                        <div class="" id="total_total_prpoducto_t"></div>
                        <input type="hidden" name="total_precios_total" id="total_precios_total">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //variables factura
    var proveedor_id;
    var tipo_factura;
    var fecha;
    //variable de producto
    var conteo_productos;
    var product_template;
    conteo_productos = 1;


    //vargos extra
    var factura_tipo
    var cargos_locales;
    var cargos_importacion;
    var total_cargos;
    var cargo_por_producto;
    moment.locale('es');

    function display_cargos() {
        factura_tipo = $("#factura_tipo").val();
        $("#cargos_extra_holder").html();

        if (factura_tipo == 'local') {
            $("#cargos_extra_holder").html(cargos_locales);
        }
        if (factura_tipo == 'importacion') {
            $("#cargos_extra_holder").html(cargos_importacion);
        }
    }

    function calcular_factura() {
        $("#productos_distintos").val(conteo_productos);
        var total_productos = 0;
        var total_precio_sin_iva = 0;
        var total_precio_de_venta = 0;
        var total_precios_total = 0;
        // console.log(conteo_productos);

        $(".no_prductos").each(function () {
            var numero_prductos = parseInt($(this).val());
            total_productos = parseInt(total_productos + numero_prductos);
        });

        factura_tipo = $("#factura_tipo").val();
        if (factura_tipo == 'local') {
            var flete_sin_iva;
            var gastos_no_deducibles;
            flete_sin_iva = parseFloat($("#flete_sin_iva_local").val());
            gastos_no_deducibles = parseFloat($("#gasto_no_deducible_local").val());
            total_cargos =parseFloat(flete_sin_iva + gastos_no_deducibles);
        }
        if (factura_tipo == 'importacion') {
        }
        console.log(total_cargos);
        cargo_por_producto = total_cargos / total_productos ;
        console.log(cargo_por_producto);

        $(".precio_s_iva").each(function () {
            var precio_con_iva = parseFloat($(this).val());
            var iva;
            var precio_sin_iva;
            console.log(precio_con_iva);

            //agregamos otros Gastos
            precio_con_iva = parseFloat(precio_con_iva + cargo_por_producto);
            iva =  parseFloat(precio_con_iva * 0.12);
            precio_sin_iva = parseFloat(precio_con_iva / 1.12);

            console.log('Iva '+ iva);
            console.log('precio sin Iva '+ precio_sin_iva);

            $(this).parent().parent().parent().find('.iva').val(iva);
            $(this).parent().parent().parent().find('.precio_neto').val(precio_sin_iva);
            console.log(precio_con_iva);
            total_precio_sin_iva = parseFloat(total_precio_sin_iva + precio_con_iva);

        });
        $(".precio_venta").each(function () {
            var precio_de_venta = parseFloat($(this).val());
            total_precio_de_venta = parseFloat(total_precio_de_venta + precio_de_venta);

        });
        $(".total_producto").each(function () {
            var numero_productos;
            var precio_sin_iva;

            numero_productos = parseInt($(this).parent().parent().parent().find(".no_prductos").val());
            precio_sin_iva = parseFloat($(this).parent().parent().parent().find(".precio_s_iva").val());
            precio_sin_iva = precio_sin_iva + cargo_por_producto;
            var total_producto = parseFloat(numero_productos * precio_sin_iva);
            $(this).val(total_producto);
            total_precios_total = parseFloat(total_precios_total + total_producto);
            // var precio_total = parseFloat($(this).siblings(".precio_s_iva").val());
            // total_precios_total = parseFloat(total_precios_total + precio_total);
        });
        //Diplay totales
        $("#total_productos_t").html(total_productos);
        $("#total_precio_sin_iva_t").html(total_precio_sin_iva);
        $("#total_precio_de_venta_t").html(total_precio_de_venta);
        $("#total_total_prpoducto_t").html(total_precios_total);
        //


    }


    $(document).ready(function () {
        display_cargos();
    });

    $("#productos_form").change(function () {
        calcular_factura();
    });


    $("#add_product_btn").click(function () {
        conteo_productos += 1;

        product_template = '<div id="product_' + conteo_productos + '" >';
        product_template += '<div class="box box-success">';
        product_template += '<div class="box-header with-border">';
        product_template += '<div class="user-block">';
        product_template += '<span class="username">Producto ' + conteo_productos + '</span>';
        product_template += '</div>';
        product_template += '<div class="box-tools">';
        product_template += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
        product_template += '<button type="button" class="btn btn-success  delete_btn"  product_id="' + conteo_productos + '">Borrar</button>';
        product_template += '</div>';
        product_template += '</div>';
        product_template += '<div class="box-body" style="display: block;">';
        product_template += '<div class="row">';
        product_template += '<div class="col-md-3"><div class="form-group">';
        product_template += '<label>Categoría</label>';
        product_template += '<input type="text" id="categoria_p' + conteo_productos + '" name="categoria_p' + conteo_productos + '" class="categoria form-control" placeholder="Categoria" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-3"><div class="form-group">';
        product_template += '<label for="categoria">Nombre del producto</label>';
        product_template += '<input type="text" id="nombre_producto_p' + conteo_productos + '" name="nombre_producto_p' + conteo_productos + '" class="form-control" placeholder="Nombre del producto" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="no_serie">No de serie</label>';
        product_template += '<input type="text" id="no_serie_p' + conteo_productos + '" name="no_serie_p' + conteo_productos + '" class="form-control" placeholder="No. de serie" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="modelo">Modelo</label>';
        product_template += '<input type="text" id="modelo_p' + conteo_productos + '" name="modelo_p' + conteo_productos + '" class="form-control" placeholder="Modelo" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="modelo">Marca</label>';
        product_template += '<input type="text" id="marca_p' + conteo_productos + '" name="marca_p' + conteo_productos + '" class="form-control" placeholder="Marca" required>';
        product_template += '</div></div>';
        product_template += '</div>';
        product_template += '<div class="row">';
        product_template += '<div class="col-md-12"><div class="form-group">';
        product_template += '<label for="descripcion">Descripción</label>';
        product_template += '<textarea name="descripcion_p' + conteo_productos + '" cols="40" rows="10"  id="descripcion_p' + conteo_productos + '" class="form-control" placeholder="Descripción" required="required"></textarea>';
        product_template += '</div></div>';
        product_template += '</div>';
        product_template += '<div class="row">';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label>No de productos</label>';
        product_template += '<input type="number" id="no_productos_p' + conteo_productos + '" name="no_productos_p' + conteo_productos + '" class="form-control no_prductos" placeholder="No. de productos" step="1" min="1" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="categoria">Costo bruto</label>';
        product_template += '<input type="number" id="costo_b_p' + conteo_productos + '" name="costo_b_p' + conteo_productos + '" class="form-control precio_s_iva" placeholder="Precio sin IVA" step="any" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="categoria">Iva</label>';
        product_template += '<input type="number" id="iva_p1" name="iva_p1" class="form-control iva" placeholder="IVA" step="any" required readonly>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="categoria">Costo neto</label>';
        product_template += '<input type="number" id="costo_n_p1" name="costo_n_p1" class="form-control precio_neto" placeholder="Costo con IVA" step="any" required readonly>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="categoria">Precio de venta</label>';
        product_template += '<input type="number" id="precio_venta_p' + conteo_productos + '" name="precio_venta_p' + conteo_productos + '" class="form-control precio_venta" placeholder="Precio de venta" step="any" required>';
        product_template += '</div></div>';
        product_template += '<div class="col-md-2"><div class="form-group">';
        product_template += '<label for="categoria">Total de producto</label>';
        product_template += '<input type="number" id="total_propducto_p' + conteo_productos + '" name="total_propducto_p' + conteo_productos + '" class="form-control total_producto" placeholder="Total de producto" step="any" required readonly>';
        product_template += '</div></div>';//row
        product_template += '</div>';//modal body
        product_template += '</div>';//container
        product_template += '</div>';
        product_template += '</div>';

        console.log(conteo_productos);
        $("#productos_holder").append(product_template);
        //auto compete categoria
        var options = {
            url: "<?php echo base_url()?>index.php/Productos/categorias_json",
            getValue: "categoria",
            list: {
                match: {
                    enabled: true
                }
            },
            theme: "plate-dark"
        };
        $(".categoria").easyAutocomplete(options);
    });


    cargos_locales = '<div class="row" id="cargos_local">';
    cargos_locales += '<div class="col-md-2"> <div class="form-group">';
    cargos_locales += '<label for="categoria">Flete sin iva</label>';
    cargos_locales += '<input type="number" name="flete_sin_iva_local" value="0" id="flete_sin_iva_local" class="form-control" placeholder="Flete sin IVA" step="any" required="required">';
    cargos_locales += '</div></div>';
    cargos_locales += '<div class="col-md-2"><div class="form-group">';
    cargos_locales += '<label for="categoria">Gastos no deducibles</label>';
    cargos_locales += '<input type="number" name="gasto_no_deducible_local" value="0" id="gasto_no_deducible_local" class="form-control" placeholder="Gastos no deducibles" step="any" required="required">';
    cargos_locales += '</div></div>';
    cargos_locales += '</div>';

    cargos_importacion = '<div class="row" id="cargos_importacion">';
    cargos_importacion += '<div class="col-md-2"><div class="form-group">';
    cargos_importacion += '<label for="categoria">Flete sin iva</label>';
    cargos_importacion += '<input type="number" name="flete_sin_iva_importacion" value="0" id="flete_sin_iva_importacion" class="form-control" placeholder="Flete" required="required">';
    cargos_importacion += '</div></div>';
    cargos_importacion += '<div class="col-md-2"><div class="form-group">';
    cargos_importacion += '<label for="categoria">Seguro</label>';
    cargos_importacion += '<input type="number" name="seguro_importacion" value="0" id="seguro_importacion" class="form-control" placeholder="Seguro" required="required">';
    cargos_importacion += '</div></div>';
    cargos_importacion += '<div class="col-md-2"><div class="form-group">';
    cargos_importacion += '<label for="categoria">DAI</label>';
    cargos_importacion += '<input type="number" name="dai_importacion" value="0" id="dai_importacion" class="form-control" placeholder="DAI" required="required">';
    cargos_importacion += '</div></div>';
    cargos_importacion += '<div class="col-md-2"><div class="form-group">';
    cargos_importacion += '<label for="categoria">Multas</label>';
    cargos_importacion += '<input type="number" name="multas_importacion" value="0" id="multas_importacion" class="form-control" placeholder="Multas" required="required">';
    cargos_importacion += '</div></div>';
    cargos_importacion += '<div class="col-md-2"><div class="form-group">';
    cargos_importacion += '<label for="categoria">Otros</label>';
    cargos_importacion += '<input type="number" name="otros_importacion" value="0" id="otros_importacion" class="form-control" placeholder="Otros" required="required">';
    cargos_importacion += '</div></div>';
    cargos_importacion += '</div>';

    $('#productos_holder').on('click', '.delete_btn', function () {
        conteo_productos -= 1;
        var producto_id = $(this).attr('product_id');
        var product_container = '#product_' + producto_id;
        console.log(conteo_productos);
        $(product_container).hide('slow');
        $(product_container).remove();

    });
    $("#factura_tipo").change(function () {
        display_cargos();
    });


    //auto compete categoria
    var options = {
        url: "<?php echo base_url()?>index.php/Productos/categorias_json",
        getValue: "categoria",
        list: {
            match: {
                enabled: true
            }
        },
        theme: "plate-dark"
    };
    $(".categoria").easyAutocomplete(options);
    //auto complete proveedores
    var proveedores = {

        url: "<?php echo base_url()?>index.php/Proveedores/proveedores_json",
        theme: "plate-dark",
        getValue: 'nombre',
        template: {
            type: "custom",
            method: function (value, item) {
                return "ID: " + item.proveedor_id + " | " + "Nombre: " + item.nombre + " | "
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#proveedor").getSelectedItemData().proveedor_id;

                $("#proveedor_id").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#proveedor").easyAutocomplete(proveedores);


</script>
<?php $this->stop() ?>
