<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 06/02/2019
 * Time: 05:27 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->layout('public/public_master_dev', [
    'monstrar_banners' => $monstrar_banners
]);
?>

<?php $this->start('page_content') ?>
    <div id="solicitud_anticipo_wraper">
        <h1 class="text-center">Solicitud de anticipo</h1>
        <div class="container">
            <div class="row justify-content-md-center">
                <p></p>
                <div class="col-md-4">
                    <img src="<?php echo base_url() ?>/ui/public/images/moneda.png" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <form action="<?php echo base_url()?>anticipos/guardar_solicitud" method="post">
                        <div class="form-group">
                            <label for="nombre_cliente">Nombre</label>
                            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre completo" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion_cliente">Dirección</label>
                            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente"
                                   placeholder="Dirección domicilio" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dpi_cliente">Número DPI</label>
                                    <input type="text" class="form-control" id="dpi_cliente" name="dpi_cliente" placeholder="# DPI" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dpi_emitido_cliente">Emitido</label>
                                    <input type="text" class="form-control" id="dpi_emitido_cliente" name="dpi_emitido_cliente"
                                           placeholder="Lugar de emisión DPI" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nit_cliente">NIT</label>
                                    <input type="text" class="form-control" id="nit_cliente" name="nit_cliente" placeholder="NIT" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo_cliente">Email</label>
                                    <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento"
                                           placeholder="Fecha Nacimiento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="celular_cliente">Número celular</label>
                                    <input type="tel" class="form-control" id="celular_cliente" name="celular_cliente"
                                           placeholder="Número celular" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado_civil">Estado cívil</label>
                            <input type="text" class="form-control" id="estado_civil" name="estado_civil"
                                   placeholder="Estado cívil" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_empresa">Nombre de la empresa donde labora</label>
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                   placeholder="Nombre de la empresa donde labora" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion_empresa">Dirección de la empresa donde labora</label>
                            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa"
                                   placeholder="Dirección de la empresa donde labora" required>
                        </div>
                        <div class="form-group">
                            <label for="puesto">Puesto</label>
                            <input type="text" class="form-control" id="puesto"
                                   placeholder="Puesto que ocupa en lña empresa" name="puesto" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono_empresa">Teléfono de la empresa</label>
                            <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa"
                                   placeholder="Teléfono de la empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="salario">Salario</label>
                            <input type="text" class="form-control" id="salario"
                                   placeholder="Salario que se refleja en los estados de cuenta" name="salario" required>
                        </div>
                        <div class="form-group">
                            <label for="monto_deseado">Monto deseado</label>
                            <input type="text" class="form-control" id="monto_deseado" name="monto_deseado"
                                   placeholder="Monto deseado" required>
                        </div>
                            <button type="submit" class="btn btn-success">enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $this->stop() ?>