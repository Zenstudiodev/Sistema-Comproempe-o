<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/05/2018
 * Time: 3:20 PM
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
    <?php if ($productos) { ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos del producto</h3>
                </div>
                <!-- /.box-header -->

                <?php
                $fecha = new DateTime();
                $fecha_contrato = array(
                    'type' => 'text',
                    'name' => 'fecha',
                    'id' => 'fecha',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Fecha del contrato',
                    'required' => 'required',
                    'value' => $fecha->format('Y-m-d'),
                    'readonly' => 'readonly'
                );
                $cliente = array(
                    'type' => 'text',
                    'name' => 'cliente',
                    'id' => 'cliente',
                    'class' => 'form-control',
                    'placeholder' => 'Cliente',
                    //'required' => 'required'
                );

                $nit = array(
                    'type' => 'text',
                    'name' => 'nit_cliente',
                    'id' => 'nit_cliente',
                    'class' => 'form-control',
                    'placeholder' => 'NIT',
                    //'required' => 'required'
                );
                $cliente_id = array(
                    'type' => 'text',
                    'name' => 'cliente_id',
                    'id' => 'cliente_id',
                    'class' => 'form-control',
                    'placeholder' => 'Cliente id',
                    'required' => 'required'

                );

                $precio_venta = array(
                    'type' => 'number',
                    'name' => 'precio_venta',
                    'id' => 'precio_venta',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Precio',
                    'required' => 'required',
                    'step' => 'any',
                    'min' => '',
                    'value' => ''//TODO sumar precios
                );
                $descuento = array(
                    'type' => 'number',
                    'name' => 'descuento',
                    'id' => 'descuento',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Descuento',
                    'value' => '0',
                    'required' => 'required',
                    'step' => 'any'
                );
                $precio_final = array(
                    'type' => 'number',
                    'name' => 'precio_final',
                    'id' => 'precio_final',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Descuento',
                    'required' => 'required',
                    'step' => 'any'
                );

                $comprobante = array(
                    'name' => 'comprobante',
                    'id' => 'comprobante',
                    'class' => 'form-control ',
                    'required' => 'required'
                );

                $comprobante_options = array(
                    'factura' => 'Factura',
                    'recibo' => 'recibo'
                );

                $no_factura = array(
                    'type' => 'number',
                    'name' => 'no_factura',
                    'id' => 'no_factura',
                    'class' => 'form-control pull-right',
                    'placeholder' => 'Factura',
                    'required' => 'required'
                );
                $serie_factura = array(
                    'type' => 'text',
                    'name' => 'serie_factura',
                    'id' => 'serie_factura',
                    'class' => 'form-control ',
                    'placeholder' => 'Serie',
                    'required' => 'required'
                );
                $serie_factura_options = array();
                foreach ($facturas_activas->result() as $serie) {
                    $serie_factura_options[$serie->serie] = $serie->serie;
                }
                ?>

                <!-- form start -->

                <form role="form" action="<?php echo base_url() . 'productos/guardar_apartado' ?>" method="post"
                      id="producto_venta_form"
                      name="producto_form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Fecha de liquidación:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php echo form_input($fecha_contrato); ?>
                            </div>
                            <!-- /.input group -->
                        </div>


                        <?php
                        $producto_numero = 1;
                        $total_avaluos = 0;
                        $total_mutuos = 0;
                        foreach ($productos->result() as $producto) {
                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <p>
                                            <?php echo $producto->categoria ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoria">Nombre del producto</label>
                                        <p><?php echo $producto->nombre_producto; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_serie">No de serie</label>
                                        <p><?php echo $producto->no_serie; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        <p><?php echo $producto->modelo; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modelo">Marca</label>
                                        <p><?php echo $producto->marca; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <p><?php echo $producto->descripcion ?></p>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="avaluo">Precio de venta</label>
                                        <p>Q.<?php echo $producto->precio_venta; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="avaluo">Mutuo</label>
                                        <p>Q.<?php echo $producto->mutuo; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="avaluo">Avalúo comercial</label>
                                        <p>Q.<?php echo $producto->avaluo_comercial; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="avaluo">Avalúo Compro Empeño</label>
                                        <p>Q.<?php echo $producto->avaluo_ce; ?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <?php
                                $precio_venta = 0;
                                $minimo_venta = 0;
                                $valor_apartado=0;
                                $valor_apartado_minimo=0;
                                if($producto->precio_venta == 0){
                                    //echo'no tiene precio de venta <br> tomar mutuo';
                                    $precio_venta = $producto->avaluo_comercial;
                                    $minimo_venta = $producto->mutuo;
                                    $valor_apartado= $precio_venta *0.20;
                                    $valor_apartado_minimo = $valor_apartado;
                                }else{
                                    $precio_venta = $producto->precio_venta;
                                    $minimo_venta = $producto->precio_venta;
                                    $valor_apartado = $producto->precio_venta;
                                    $valor_apartado= $precio_venta *0.20;
                                    $valor_apartado_minimo = $valor_apartado;
                                }

                            //    echo'<p>apartado minimo '.$valor_apartado_minimo.' </p>';
                                ?>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="avaluo">Valor de venta</label>
                                            <div class="input-group">


                                                <span class="input-group-addon">Q.</span>
                                                <input type="number" class="form-control pull-right precio_venta"
                                                       placeholder="Precio de venta"
                                                       name="producto_<?php echo $producto_numero ?>_p"
                                                       id="producto_<?php echo $producto_numero ?>_p"
                                                       value="<?php echo $precio_venta ?>"
                                                       min="<?php echo $minimo_venta ?>" step="any">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="avaluo">Valor de apartado</label>
                                            <div class="input-group">


                                                <span class="input-group-addon">Q.</span>
                                                <input type="number" class="form-control pull-right valor_apartado"
                                                       placeholder="Valor apartado"
                                                       name="producto_<?php echo $producto_numero ?>_pa"
                                                       id="producto_<?php echo $producto_numero ?>_pa"
                                                       value="<?php echo $valor_apartado ?>"
                                                       min="<?php echo $valor_apartado_minimo ?>" step="any">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--TODO AGREGAR CALCUAR Y MOSTRAR SALDO-->
                                <!--TODO AGREGAR DIAS DE APARTADO-->
                                <!--TODO AGREGAR DIAS -->
                            </div>
                            <input type="hidden" name="producto_<?php echo $producto_numero ?>"
                                   id="producto_<?php echo $producto_numero ?>"
                                   value="<?php echo $producto->producto_id ?>">
                            <hr>
                            <input type="hidden" name="numero_productos" id="numero_productos"
                                   value="<?php echo $producto_numero; ?>">
                            <?php
                            $producto_numero = $producto_numero + 1;
                            $total_avaluos = $total_avaluos + $producto->avaluo_comercial;
                            $total_mutuos = $total_mutuos + $producto->mutuo;

                            $sub_total = $total_avaluos - $total_mutuos;
                        } ?>
                    </div>

                    <div class="box-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de cliente</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">Nombre</label>
                                    <div class="input-group">
                                        <?php echo form_input($cliente); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="avaluo">ID cliente</label>
                                    <div class="input-group">
                                        <?php echo form_input($cliente_id); ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead">Datos de recibo</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">Monto de apartado:</th>
                                            <td>
                                                <span id="total_orecio_venta"><?php echo display_formato_dinero($total_avaluos) ?></span>
                                                <input type="hidden" name="total_apartado" id="total_apartado">
                                                <input type="hidden" name="monto_recibo_letras" id="monto_recibo_letras">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
    <?php } else {
        echo 'El cliente que busca no existe';
    } ?>
</div>
<!-- /.content-wrapper -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/ui/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>/ui/admin/dist/js/numeros_a_letras.js"></script>
<?php $this->stop() ?>

<?php $this->start('js_ps') ?>
<!-- page script -->
<script>
    //variables
    var total_de_productos;
    var serie_facturas;

    $(document).ready(function () {

    });



    moment.locale('es');

    $("#producto_venta_form").change(function () {//loop a los productos
        total_de_productos = 0;

        $(".valor_apartado").each(function () {
            //tomamos el valor de apartado de cada producto
            var valor_apartado;
            valor_apartado = parseFloat($(this).val());
            //dumamos el valor de cada producto al total global de prodictos
            total_de_productos = parseFloat(total_de_productos + valor_apartado);
            console.log(total_de_productos);
        });
        //damos formato al total de apartado
        total_de_productos_string = numeral(total_de_productos).format('0,0.00');
        total_de_productos = parseFloat(total_de_productos).toFixed(2);
        //asignamos el valor total a un campo oculto
        $("#total_apartado").val(total_de_productos);
        //mostramos el valor total con formato en pantalla
        $("#total_orecio_venta").html(total_de_productos_string);

        total_a_letras = covertirNumLetras(total_de_productos);

        $("#monto_recibo_letras").val(total_a_letras);
        //console.log(sub_total);
    });

    //obtenemos los clientes y los inicializamos en el autocomplete
    var options = {

        url: "<?php echo base_url()?>index.php/cliente/clientes_json",
        theme: "square",
        getValue: 'nombre',
        template: {
            type: "custom",
            method: function (value, item) {
                return "ID: " + item.id + " | " + "Nombre: " + item.nombre + " | " + "DPI:" + item.dpi;
            }
        },
        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function () {
                var selectedItemValue = $("#cliente").getSelectedItemData().id;

                $("#cliente_id").val(selectedItemValue).trigger("click");
            },
            onHideListEvent: function () {
                // $("#cliente_id").val("").trigger("change");
            }
        }
    };
    $("#cliente").easyAutocomplete(options);
</script>
<?php $this->stop() ?>
