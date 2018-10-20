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

?>