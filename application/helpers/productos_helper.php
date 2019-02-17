<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/10/2018
 * Time: 4:19 PM
 */


function colores_de_margen($margen){
    $color_margen = '';

    if($margen > 1){
        $color_margen ='bg-red-active  color-palette';
    }
    if($margen >70 && $margen < 100){
        $color_margen ='bg-yellow color-palette';
    }

    if($margen >= 100){
        $color_margen ='bg-green color-palette';
    }
    echo $color_margen;
}

function formato_de_margen($margen){
    if(is_integer($margen)){
        echo 'mada';
    }else{
        echo'no es entereo';
        number_format((float)$margen, 2, '.', '');
    }
    return $margen;
}
function dias_de_gracia_contrato($id_contrato, $tienda_origen){
    $ci =& get_instance();
    $datos_de_contrato = $ci->Contratos_model->get_info_contrato_sin_imagen($id_contrato, $tienda_origen);
    if($datos_de_contrato){
        $datos_de_contrato = $datos_de_contrato->row();
    }
    return $datos_de_contrato->dias_gracia;;
}
function get_imgenes_producto_public($producto_id)
{
    $ci =& get_instance();
    $imagenes_producto = $ci->Productos_model->get_fotos_de_producto_by_id($producto_id);
    return $imagenes_producto;
}
function tienda_id_to_nombre($tienda_id){
    $nombre_tienda = '';
    if($tienda_id == '2'){
        $nombre_tienda = 'Metro Norte';
    }
    if($tienda_id == '1'){
        $nombre_tienda = 'Centra Sur';
    }
    if($tienda_id == '3'){
        $nombre_tienda = 'Metro Norte';
    }
    return $nombre_tienda;
}

function mostrar_precio_producto($avaluo, $precio_venta){
    $precio_producto = 0 ;
    if($precio_venta == 0){
        $precio_producto = $avaluo;
    }else{
        $precio_producto = $precio_venta;
    }
    return $precio_producto;
}
function productos_con_imagen_public(){
    //echo 'seleccionamos los productos con imagen';
    $ci =& get_instance();
    $prductos_con_foto = $ci->Productos_model->productos_con_foto();
    $prductos_con_foto_arr = array();
    foreach ($prductos_con_foto->result() as $producto)
    {
        $prductos_con_foto_arr[] = $producto->producto_id;
    }
    return $prductos_con_foto_arr;
}
function productops_en_categoria($categoria){
    //echo 'seleccionamos los productos con imagen';
    $ci =& get_instance();
    $numero_productos = $ci->Productos_model->get_productos_liquidacion_by_categoria_public_numero($categoria);
    return $numero_productos;
}
?>