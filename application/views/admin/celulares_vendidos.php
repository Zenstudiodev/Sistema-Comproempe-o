<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 08/03/2019
 * Time: 04:46 PM
 */

$ci =& get_instance();
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/ui/admin/plugins/file_saver/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/js/tableexport.js"></script>
    <!-- Moment -->
    <script src="<?php echo base_url(); ?>/ui/admin/plugins/moment/moment-with-locales.js"></script>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            celululares vendidos
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if ($celulares_vendidos){?>
             <table class="table table-bordered">
                 <thead>
                 <tr>
                     <th>Número</th>
                     <th>codigo producto</th>
                     <th>Nombre</th>
                     <th>Marca</th>
                     <th>Modelo</th>
                     <th>Tienda</th>
                     <th>Fecha venta</th>
                 </tr>
                 </thead>
                 <tbody>
                <?php
                $numero_celulares = 1;
                foreach ($celulares_vendidos->result() as $celular) {?>
                     <tr>
                         <td><?php echo $numero_celulares;?></td>
                         <td><?php echo $celular->producto_id;?></td>
                         <td><?php echo $celular->nombre_producto;?></td>
                         <td><?php echo $celular->marca;?></td>
                         <td><?php echo $celular->modelo;?></td>
                         <td><?php echo $celular->tienda_actual;?></td>
                         <?php
                         $fecha_liquidacion = $celular->fecha_venta;
                         //saber fecha de venta
                         //buscamos fecha de factura
                         $factura_liquidacion_id = $ci->Factura_model->get_factura_liquidacion_by_producto_id($celular->producto_id);
                         if($factura_liquidacion_id){
                             //datos de factura
                             $factura_liquidacion = $ci->Factura_model->get_factura_liquidacion_reporte($factura_liquidacion_id, $celular->tienda_actual);
                             if($factura_liquidacion){
                                 $factura_liquidacion = $factura_liquidacion->row();
                                 $fecha_liquidacion =  $factura_liquidacion->fecha;

                                 //cuantos dias tardo en liquidarse
                             }
                         }

                         ?>
                         <td><?php echo $fecha_liquidacion ?></td>
                     </tr>
                 <?php
                $numero_celulares = $numero_celulares +1;
                }?>
                 </tbody>
             </table>
    <?php }?>

    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function () {
        //Date range picker
        //$('#exportar_btn').click();
        //document.getElementById("exportar_btn").click();
    });


</script>
