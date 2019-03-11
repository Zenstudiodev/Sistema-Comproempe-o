<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 27/06/2017
 * Time: 10:00 AM
 */
class productos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }

    // categorias
    function get_categorias()
    {

        $this->db->distinct('categoria');
        $this->db->select('categoria');
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //productos
    function datos_de_producto($id)
    {
        $this->db->where('producto_id', $id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
    }
    function datos_de_productos($productos)
    {
        //$this->db->where_in('producto_id', $productos);
        $this->db->where_in('producto_id', $productos);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_producto($data)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_de_producto = array(
            'cliente_id' => $data['cliente_id'],
            'fecha' => $data['fecha'],
            'categoria' => $data['categoria'],
            'nombre_producto' => $data['nombre_producto'],
            'no_serie' => $data['no_serie'],
            'modelo' => $data['modelo'],
            'marca' => $data['marca'],
            'descripcion' => $data['descripcion'],
            'fecha_avaluo' => $data['fecha_avaluo'],
            'avaluo_comercial' => $data['avaluo_comercial'],
            'avaluo_ce' => $data['avaluo_ce'],
            'mutuo' => $data['mutuo'],
            'tienda_id' => $tienda,
            'tienda_actual' => $tienda,
        );
        // insertamon en la base de datos
        $this->db->insert('producto', $datos_de_producto);
    }
    function actualizar_producto($data)
    {
        $datos = array(
            'categoria' => $data['categoria'],
            'nombre_producto' => $data['nombre_producto'],
            'no_serie' => $data['no_serie'],
            'modelo' => $data['modelo'],
            'marca' => $data['marca'],
            'descripcion' => $data['descripcion'],
            'avaluo_comercial' => $data['avaluo_comercial'],
            'avaluo_ce' => $data['avaluo_ce'],
            'mutuo' => $data['mutuo'],
        );
        $this->db->where('producto_id', $data['producto_id']);
        $query = $this->db->update('producto', $datos);
    }

    //bodega
    function cargar_bodega()
    {
        $tienda = tienda_id_h();

        // insertamon en la base de datos
            $this->db->where('tienda_actual', $tienda);
            $this->db->where('bodega', '1');

        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
    }
    function actualizar_producto_administrador($datos_producto)
    {

        $producto_id = $datos_producto['producto_id'];
        $categoria = $datos_producto['categoria'];
        $tienda_actual = $datos_producto['tienda_id'];
        $precio_venta = $datos_producto['precio_venta'];
        $precio_descuento = $datos_producto['precio_descuento'];
        $bodega = $datos_producto['bodega'];
        $tipo = $datos_producto['tipo'];
        /*$cliente_id = '';
        $proveedor_id = '';
        $existencias = '';
        $fecha = '';
        $nombre_producto = '';
        $no_serie = '';
        $modelo = '';
        $marca = '';
        $descripcion = '';
        $fecha_avaluo = '';
        $avaluo_comercial = '';
        $avaluo_ce = '';
        $mutuo = '';
        $precio_compra = '';
        $contrato_id = '';
        $id_prorateo = '';
        $tipo = '';
        $tienda_id = '';
        $apartado = '';
        $cliente_apartado = '';
        $vencimiento_apartado = '';
        $recibo_apartado = '';
        $imagen = '';*/
        $nuevos_datos = array(
            'categoria' => $categoria,
            'tienda_actual' => $tienda_actual,
            'precio_venta' => $precio_venta,
            'precio_descuento' => $precio_descuento,
            'bodega' => $bodega,
            'tipo' => $tipo,
            /*'cliente_id' => $cliente_id,
            'proveedor_id' => $proveedor_id,
            'existencias' => $existencias,
            'fecha' => $fecha,
            'nombre_producto' => $nombre_producto,
            'no_serie' => $no_serie,
            'modelo' => $modelo,
            'marca' => $marca,
            'descripcion' => $descripcion,
            'fecha_avaluo' => $fecha_avaluo,
            'avaluo_comercial' => $avaluo_comercial,
            'avaluo_ce' => $avaluo_ce,
            'mutuo' => $mutuo,
            'precio_compra' => $precio_compra,
            'contrato_id' => $contrato_id,
            'id_prorateo' => $id_prorateo,
            'tipo' => $tipo,
            'tienda_id' => $tienda_id,
            'apartado' => $apartado,
            'cliente_apartado' => $cliente_apartado,
            'vencimiento_apartado' => $vencimiento_apartado,
            'recibo_apartado' => $recibo_apartado,
            'imagen' => $imagen,*/
        );
        $this->db->where('producto_id', $producto_id);
        $query = $this->db->update('producto', $nuevos_datos);
    }
    function get_productos_tienda_1_contratos_1()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_1_contratos_2()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id,  producto.tienda_actual, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_1_contratos_3()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_3.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '3');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_3', 'producto.contrato_id = contrato_tienda_3.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_1_contratos_4()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_4.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '4');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_4', 'producto.contrato_id = contrato_tienda_4.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_1()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_2()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_3()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_3.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '3');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_3', 'producto.contrato_id = contrato_tienda_3.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_4()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_4.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '4');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_4', 'producto.contrato_id = contrato_tienda_4.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_3_contratos_1()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '3');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_3_contratos_2()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '3');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_3_contratos_3()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_3.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '3');
        $this->db->where('producto.tienda_actual', '3');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_3', 'producto.contrato_id = contrato_tienda_3.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_3_contratos_4()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_4.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '4');
        $this->db->where('producto.tienda_actual', '3');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_4', 'producto.contrato_id = contrato_tienda_4.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_4_contratos_1()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '4');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_4_contratos_2()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '4');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_4_contratos_3()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_3.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '3');
        $this->db->where('producto.tienda_actual', '4');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_3', 'producto.contrato_id = contrato_tienda_3.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_4_contratos_4()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato_tienda_4.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '4');
        $this->db->where('producto.tienda_actual', '4');
        $this->db->where('producto.bodega', '0');
        $this->db->join('contrato_tienda_4', 'producto.contrato_id = contrato_tienda_4.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //imagenes de producto
    function get_productos_liquidacion_sin_foto()
    {
        $tienda = tienda_id_h();

            // insertamon en la base de datos
            if ($tienda == '1') {
                $this->db->where('tienda_actual', '1');

        } elseif ($tienda == '2') {
            $this->db->where('tienda_actual', '2');
        }
        elseif ($tienda == '3') {
            $this->db->where('tienda_actual', '3');
        }
        elseif ($tienda == '4') {
            $this->db->where('tienda_actual', '4');
        }
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $this->db->where('bodega', '0');
        $this->db->where('imagen', '0');

        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_fotos_de_producto_by_id($producto_id)
    {
        $this->db->where('producto_id', $producto_id);
        $this->db->order_by('nombre_imagen', 'desc');
        $query = $this->db->get('imagenes_producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_foto_tabla_fotos($datos_foto)
    {
        $datos_de_imagen = array(
            'producto_id' => $datos_foto['producto_id'],
            'extencion' => 'jpg',
            'nombre_imagen' => $datos_foto['nombre_imagen']
        );
        // insertamon en la base de datos
        $this->db->insert('imagenes_producto', $datos_de_imagen);
    }
    function get_datos_imagen($imagen_id)
    {
        $this->db->where('imagen_id', $imagen_id);
        $query = $this->db->get('imagenes_producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function borrar_registro_imagen($imagen_id)
    {
        $this->db->where('imagen_id', $imagen_id);
        $this->db->delete('imagenes_producto');
    }

    //venta
    function guardar_precio_venta($producto_id, $precio_venta)
    {
        $datos = array(
            'precio_venta' => $precio_venta,
            'tipo' => 'vendido',
        );
        $this->db->where('producto_id', $producto_id);
        $query = $this->db->update('producto', $datos);
    }
    function producto_vendido($datos_venta_producto)
    {
        $datos = array(
            'precio_venta' => $datos_venta_producto['precio_venta'],
            'existencias' => $datos_venta_producto['cantidad_productos'],
            'tipo' => 'vendido',
        );
        $this->db->where('producto_id', $datos_venta_producto['id']);
        $query = $this->db->update('producto', $datos);
    }

    //contratos
    function asignar_contrato($producto_id, $contrato_id)
    {
        $this->db->set('contrato_id', $contrato_id, FALSE);
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }
    function liberar_producto_de_contrato($producto_id)
    {
        $this->db->set('contrato_id', '0', FALSE);
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }
    function get_enmpenos($id)
    {
        $this->db->where('cliente_id', $id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_by_contrato($contrato_id)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        //$this->db->where('tienda_id', $tienda);
        $this->db->where('tienda_id', $tienda);
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_by_contrato_actualizador($contrato_id, $tienda)
    {

        $this->db->where('tienda_id', $tienda);
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_by_contrato_actualizador_t2($contrato_id)
    {

        //$this->db->where('tienda_id', $tienda);
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //liquidacion
    function cambiar_producto_a_venta($producto_id)
    {
        $this->db->set('tipo', 'venta');
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }
    function get_productos_liquidacion()
    {
        // Get tienda data
        $tienda = tienda_id_h();

        // insertamon en la base de datos
        if ($tienda == '1') {
            $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato.estado');
            $this->db->from('producto');
            $this->db->where('producto.tipo', 'venta');
            $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');
            $this->db->where('contrato.tienda_id', '1');
        }
        elseif ($tienda == '2') {
            $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_2.estado');
            $this->db->from('producto');
            $this->db->where('producto.tipo', 'venta');
            $this->db->where('producto.tienda_id', '2');
            // $this->db->where('contrato.tienda_id', '2');
            $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');
        }
        elseif ($tienda == '3') {
            $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_3.estado');
            $this->db->from('producto');
            $this->db->where('producto.tipo', 'venta');
            $this->db->where('producto.tienda_id', '3');
            // $this->db->where('contrato.tienda_id', '2');
            $this->db->join('contrato_tienda_3', 'producto.contrato_id = contrato_tienda_3.contrato_id');
        }
        elseif ($tienda == '4') {
            $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_4.estado');
            $this->db->from('producto');
            $this->db->where('producto.tipo', 'venta');
            $this->db->where('producto.tienda_id', '4');
            // $this->db->where('contrato.tienda_id', '2');
            $this->db->join('contrato_tienda_4', 'producto.contrato_id = contrato_tienda_4.contrato_id');
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_liquidacion_factura_producto($data)
    {
        $datos_de_liquidacion = array(
            'id_factura' => $data['id_factura'],
            'id_producto' => $data['id_producto'],
        );
        // insertamon en la base de datos
        $this->db->insert('liquidacion_factura_producto', $datos_de_liquidacion);

    }
    function get_transacciones_liquidacio_by_factura($factura_id)
    {
        $this->db->where('id_factura', $factura_id);
        $query = $this->db->get('liquidacion_factura_producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function liberar_producto__anular_factura_liquidacion($producto_id)
    {
        $this->db->set('tipo', 'venta');
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }
    function borrar_transacciones_liquidacion($factura_id)
    {
        $this->db->where('id_factura', $factura_id);
        $this->db->delete('liquidacion_factura_producto');
    }
    function regresar_a_vigente($producto_id)
    {
        $datos = array(
            'tipo' => 'vigente'
        );
        $this->db->where('producto_id', $producto_id);
        $query = $this->db->update('producto', $datos);

    }

    //traslados
    function trasladar_producto($id, $tienda)
    {
        $datos = array(
            'tienda_actual' => $tienda,
        );
        $this->db->where('producto_id', $id);
        $query = $this->db->update('producto', $datos);
    }
    function guardar_traslado($datos_traslado)
    {

        //fecha
        $fecha = New DateTime();
        //user data
        $user_id = get_user_id();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_traslado = array(
            'traslado_tienda_actual' => $datos_traslado['traslado_tienda_actual'],
            'traslado_tienda_destino' => $datos_traslado['traslado_tienda_destino'],
            'traslado_fecha' => $fecha->format('Y-m-d'),
            'user_id' => $user_id,
            'traslado_productos' => $datos_traslado['traslado_productos'],
            'tienda_id' => $tienda,
        );
        $this->db->insert('traslado', $datos_traslado);
    }
    function get_traslados()
    {
        $query = $this->db->get('traslado');
        if ($query->num_rows() > 0) return $query;
    }
    function get_traslado_by_id($id)
    {
        $this->db->where('traslado_id', $id);
        $query = $this->db->get('traslado');
        if ($query->num_rows() > 0) return $query;
    }

    //Productos por inventario
    function guardar_producto_inventario($form_data)
    {
        $tienda = tienda_id_h();

        $datos_de_producto = array(
            'proveedor_id' => $form_data['proveedor_id'],
            'existencias' => $form_data['existencias'],
            'fecha' => $form_data['fecha'],
            'categoria' => $form_data['categoria'],
            'nombre_producto' => $form_data['nombre_producto'],
            'no_serie' => $form_data['no_serie'],
            'modelo' => $form_data['modelo'],
            'marca' => $form_data['marca'],
            'descripcion' => $form_data['descripcion'],
            'precio_compra' => $form_data['precio_compra'],
            'precio_venta' => $form_data['precio_venta'],
            'id_prorateo' => $form_data['id_prorateo'],
            'tipo ' => 'compra',
            'tienda_id' => $tienda,
            'tienda_actual' => $tienda,
        );

        // insertamon en la base de datos
        $this->db->insert('producto', $datos_de_producto);
    }
    function get_productos_venta()
    {
        $tienda = tienda_id_h();
        //$this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'compra');
        // insertamos en la base de datos
        if ($tienda == '1') {
            $this->db->where('producto.tienda_actual', '1');
        } elseif ($tienda == '2') {
            $this->db->where('producto.tienda_actual', '2');
        }
        elseif ($tienda == '3') {
            $this->db->where('producto.tienda_actual', '3');
        }
        elseif ($tienda == '4') {
            $this->db->where('producto.tienda_actual', '4');
        }
        //$this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //productos apartados
    function get_productos_apartados()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'apartado');
        // insertamos en la base de datos
        if ($tienda == '1') {
            $this->db->where('producto.tienda_actual', '1');
        }
        elseif ($tienda == '2') {
            $this->db->where('producto.tienda_actual', '2');
        }
        elseif ($tienda == '3') {
            $this->db->where('producto.tienda_actual', '3');
        }
        elseif ($tienda == '4') {
            $this->db->where('producto.tienda_actual', '4');
        }
        //$this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_apartados_by_recibo($recibo_id)
    {
        $this->db->where('recibo_apartado', $recibo_id);
        $this->db->where('tipo', 'apartado');
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_porductos_apartado_by_client_id($id)
    {
        $this->db->where('cliente_apartado', $id);
        $this->db->where('tipo', 'apartado');
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function apartar_producto($datos_apartado_producto)
    {
        $datos = array(
            'cliente_apartado' => $datos_apartado_producto['cliente_id'],
            'precio_venta' => $datos_apartado_producto['precio_venta'],
            'apartado' => $datos_apartado_producto['apartado'],
            'existencias' => $datos_apartado_producto['cantidad_productos'],
            'vencimiento_apartado' => $datos_apartado_producto['vencimiento_apartado'],
            'tipo' => 'apartado',
        );
        $this->db->where('producto_id', $datos_apartado_producto['id']);
        $query = $this->db->update('producto', $datos);
    }
    function asignar_recibo_apartado($datos_recibo_apartado_producto)
    {
        $datos = array(
            'recibo_apartado' => $datos_recibo_apartado_producto['recibo_id'],
        );
        $this->db->where('producto_id', $datos_recibo_apartado_producto['id']);
        $query = $this->db->update('producto', $datos);
    }
    function abonar_producto_apartado($datos_apartado)
    {
        $this->db->set('apartado', $datos_apartado['apartado']);
        $this->db->where('producto_id', $datos_apartado['producto_id']);
        $this->db->update('producto');
    }
    function liberar_producto_apartado($producto_id)
    {
        $this->db->set('tipo', 'venta');
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }

    //exportar
    function productos_excel()
    {
        $fields = $this->db->field_data('producto');
        $query = $this->db->select('*')->get('producto');

        return array("fields" => $fields, "query" => $query);
    }
    public function productos_con_foto()
    {
        $this->db->distinct('producto_id');
        $this->db->select('producto_id');
        $this->db->from('imagenes_producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //public
    function get_productos_liquidacion_hompage_public()
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $this->db->where('tipo', 'venta');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->limit(16);
        $this->db->order_by('producto_id', 'RANDOM');
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
    }
    function get_productos_descuento_hompage_public()
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $this->db->where('tipo', 'venta');
        $this->db->where('precio_descuento !=', '0');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->limit(16);
        $this->db->order_by('producto_id', 'RANDOM');
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
    }
    function get_productos_liquidacion_public($limit, $start)
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $this->db->where('tipo', 'venta');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->from('producto');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
    }
    function get_productos_liquidacion_public_numero()
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $this->db->where('tipo', 'venta');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function get_public_categorias()
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $tiendas = array('1', '2','3','4');

        $this->db->distinct('categoria');
        $this->db->select('categoria');
        $this->db->from('producto');
        $this->db->where('tipo', 'venta');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->where_in('tienda_actual', $tiendas);
        $this->db->where('tipo', 'venta');
        $this->db->order_by('categoria', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_producto_public($categoria, $tienda, $limit, $start){

        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $this->db->where('tipo', 'venta');
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        if ($categoria != 'todas')
        {
            $this->db->where('categoria', urldecode($categoria));
        }
        if ($tienda != 'todas')
        {
            $this->db->where('tienda_actual', urldecode($tienda));
        }
        $this->db->from('producto');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_producto_public_numero($categoria, $tienda){
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        if ($categoria != 'todas')
        {
            $this->db->where('categoria', urldecode($categoria));
        }
        if ($tienda != 'todas')
        {
            $this->db->where('tienda_actual', urldecode($tienda));
        }
        $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function get_productos_liquidacion_by_categoria_public_numero($categoria)
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->where('categoria', urldecode($categoria));
        $this->db->from('producto');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function get_productos_liquidacion_by_categoria_public($categoria, $limit, $start)
    {
        //productos con imagen
        $prductos_con_foto_arr = productos_con_imagen_public();
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $this->db->where_in('producto_id', $prductos_con_foto_arr);
        $this->db->where('categoria', urldecode($categoria));
        $this->db->from('producto');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
    }
    function datos_de_producto_public($id)
    {
        $this->db->where('producto_id', $id);
        $en_venta = array('venta', 'compra');
        $this->db->where_in('tipo', $en_venta);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_pedido_catalogo($datos_pedido){
        $lote_data = array(
            'pedido_cliente_nombre' => $datos_pedido['nombre'],
            'pedido_cliente_correo' => $datos_pedido['email'],
            'pedido_cliente_telefono' => $datos_pedido['telefono'],
            'pedido_cliente_nit' => $datos_pedido['nit'],
            'pedido_cliente_direccion' => $datos_pedido['direccion'],
            'pedido_producto_id' => $datos_pedido['codigo_producto'],
            'pedido_fecha' => $datos_pedido['fecha'],
        );

        $this->db->insert('pedidos', $lote_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function prducto_a_pedido($producto_id){
        $this->db->set('tipo', 'pedido_catalogo');
        $this->db->where('producto_id', $producto_id);
        $this->db->update('producto');
    }
    function listar_pedido_de_pagina(){

        $this->db->from('pedidos');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function datos_pediddo_by_id($pedido_id){
        $this->db->where('pedido_id', $pedido_id);
        $this->db->from('pedidos');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //public pre empeño
    function guardar_preempeño($datos_preempeno){

        $preempeno = array(
            'pe_nombre_cliente' => $datos_preempeno['pe_nombre_cliente'],
            'pe_dpi_cliente' => $datos_preempeno['pe_dpi_cliente'],
            'pe_correo_cliente' => $datos_preempeno['pe_correo_cliente'],
            'pe_whatsapp_cliente' => $datos_preempeno['pe_whatsapp_cliente'],
            'pe_telefono_cliente' => $datos_preempeno['pe_telefono_cliente'],
            'pe_accion' => $datos_preempeno['pe_accion'],
            'pe_categoria' => $datos_preempeno['pe_categoria'],
            'pe_nombre_producto' => $datos_preempeno['pe_nombre_producto'],
            'pe_no_serie' => $datos_preempeno['pe_no_serie'],
            'pe_modelo' => $datos_preempeno['pe_modelo'],
            'pe_marca' => $datos_preempeno['pe_marca'],
            'pe_descripcion_producto' => $datos_preempeno['pe_descripcion_producto'],
        );
        // insertamon en la base de datos
        $this->db->insert('preempeno', $preempeno);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }
    function Preempenos_pendientes(){
        $tienda = tienda_id_h();
        $this->db->from('preempeno');
        $this->db->where('pe_estado', 'pendiente');
        $this->db->where('pe_tienda_id', $tienda);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function Preempenos_by_id($pe_id){
        $this->db->from('preempeno');
        $this->db->where('pe_id', $pe_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}