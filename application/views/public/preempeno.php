<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 06/02/2019
 * Time: 11:35 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->layout('public/public_master_dev', [
    'monstrar_banners' => $monstrar_banners
]);


// TODO categorias select desde tabla de productos
$categoria_select = array(
    'name' => 'categoria',
    'id' => 'categoria',
    'class' => 'form-control',
    'placeholder' => 'Categoría',
    'required' => 'required'
);

$categorias_select_options = array(
    "Audio" => "Audio",
    "Cámaras" => "Cámaras",
    "Celulares" => "Celulares",
    "Computadoras Laptops y Tablets" => "Computadoras Laptops y Tablets",
    "Deportes" => "Deportes",
    "Electrodomésticos" => "Electrodomésticos",
    "Herramientas" => "Herramientas",
    "Hogar" => "Hogar",
    "Instrumentos Musicales" => "Instrumentos Musicales",
    "Joyería" => "Joyería",
    "Línea blanca" => "Línea blanca",
    "Motocicletas y Automóviles" => "Motocicletas y Automóviles",
    "Salud y belleza" => "Salud y belleza",
    "Video" => "Video",
    "Video Juegos" => "Video Juegos",
);


$nombre_producto = array(
    'type' => 'text',
    'name' => 'nombre_producto',
    'id' => 'nombre_producto',
    'class' => 'form-control',
    'placeholder' => 'Nombre del producto',
    'data-validate-length-range' => '6',
    'data-validate-words' => '2',
    'required' => 'required'

);
$no_serie = array(
    'type' => 'text',
    'name' => 'no_serie',
    'id' => 'no_serie',
    'class' => 'form-control',
    'placeholder' => 'No. de serie',
    'required' => 'required'

);
$modelo = array(
    'type' => 'text',
    'name' => 'modelo',
    'id' => 'modelo',
    'class' => 'form-control',
    'placeholder' => 'Modelo',
    'required' => 'required'

);
$marca = array(
    'type' => 'text',
    'name' => 'marca',
    'id' => 'marca',
    'class' => 'form-control',
    'placeholder' => 'Marca',
    'required' => 'required'

);
?>

<?php $this->start('page_content') ?>
<div id="preempeno_wraper">
    <h1 class="text-center">Pre Avaluo de productos</h1>
    <div class="container">
        <div class="row justify-content-md-center">
            <p>Recuerda que aceptamos más de 350 artículos en calidad de venta o empeño.</p>
            <p>Vende, compra o empeña con nosotros, tenemos el mejor trato para ti. Envía tus datos y los del producto
                que deseas vender o empeñar y nos pondremos en contacto ofreciéndote el mejor trato por tu articulo
            </p>
            <div class="col-md-4">
                <img src="<?php echo base_url()?>/ui/public/images/billete.png" class="img-fluid">
            </div>
            <div class="col-md-8">
                <form method="post" id="formulario_preempeno" action="<?php echo base_url()?>productos/guardar_preempeno">
                    <div class="form-group">
                        <label for="nombre_cliente">Nombre</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="dpi_cliente">DPI</label>
                        <input type="number" class="form-control" id="dpi_cliente" name="dpi_cliente" placeholder="DPI" required>
                    </div>
                    <div class="form-group">
                        <label for="correo_cliente">Email</label>
                        <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp_cliente">WhatsApp</label>
                        <input type="tel" class="form-control" id="whatsapp_cliente" name="whatsapp_cliente" placeholder="WhatsApp" aria-describedby="whatsapp_help">
                        <small id="whatsapp_help" class="form-text text-muted">SI tiene telefono con WhatsApp llene este campo si no tiene llene el campo de teléfono</small>
                    </div>
                    <div class="form-group">
                        <label for="telefono_cliente">Télefono</label>
                        <input type="tel" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Télefono">
                    </div>
                    <div class="form-group">
                        <label for="accion">Quiero</label>
                        <select class="form-control" id="accion" name="accion">
                            <option>Empeñar</option>
                            <option>Vender</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <?php echo form_dropdown($categoria_select, $categorias_select_options); ?>
                                <?php //echo form_input($categoria_select); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Nombre del producto</label>
                                <?php echo form_input($nombre_producto); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_serie">No de serie</label>
                                <?php echo form_input($no_serie); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <?php echo form_input($modelo); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modelo">Marca</label>
                                <?php echo form_input($marca); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_producto">Descripción producto</label>
                        <textarea class="form-control" id="descripcion_producto" name="descripcion_producto"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagenes">Imagenes del producto</label>
                        <input type='file' name='file[]' multiple id="imagenes" aria-describedby="imagenes_help">
                        <small id="imagenes_help" class="form-text text-muted">Puede seleccionar varias imágenes</small>
                    </div>

                    <button type="submit" class="btn btn-success">enviar</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>
