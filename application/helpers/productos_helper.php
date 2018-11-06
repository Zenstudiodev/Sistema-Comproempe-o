<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/10/2018
 * Time: 4:19 PM
 */


function get_imgenes_producto_public($producto_id)
{
    $ci =& get_instance();
    $imagenes_producto = $ci->Productos_model->get_fotos_de_producto_by_id($producto_id);
    return $imagenes_producto;
}
function tienda_id_to_nombre($tienda_id){
    $nombre_tienda = '';
    if($tienda_id == '2'){
        $nombre_tienda = 'Centra Norte';
    }
    if($tienda_id == '1'){
        $nombre_tienda = 'Centra Sur';
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

?>