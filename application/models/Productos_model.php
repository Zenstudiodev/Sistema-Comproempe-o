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
    function get_productos_tienda_1_contratos_1(){
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_1_contratos_2(){
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '1');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_1(){
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '1');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_productos_tienda_2_contratos_2(){
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_2.estado');
        $this->db->from('producto');
        $this->db->where('producto.tipo', 'venta');
        $this->db->where('producto.tienda_id', '2');
        $this->db->where('producto.tienda_actual', '2');
        $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
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
        } elseif ($tienda == '2') {
            $this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato_tienda_2.estado');
            $this->db->from('producto');
            $this->db->where('producto.tipo', 'venta');
            $this->db->where('producto.tienda_id', '2');
            // $this->db->where('contrato.tienda_id', '2');
            $this->db->join('contrato_tienda_2', 'producto.contrato_id = contrato_tienda_2.contrato_id');
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
    function trasladar_productos($data_producto){
        $datos = array(
            'cliente_id' => $data_producto['precio_venta'],
            'precio_venta' => $data_producto['precio_venta'],
            'apartado' => $data_producto['apartado'],
            'existencias' => $data_producto['cantidad_productos'],
            'tipo' => 'apartado',
        );
        $this->db->where('producto_id', $data_producto['id']);
        $query = $this->db->update('producto', $datos);
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
            $this->db->where('producto.tienda_id', '1');
        } elseif ($tienda == '2') {
            $this->db->where('producto.tienda_id', '2');
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
            $this->db->where('producto.tienda_id', '1');
        } elseif ($tienda == '2') {
            $this->db->where('producto.tienda_id', '2');
        }
        //$this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function producto_apartado($datos_venta_producto)
    {
        $datos = array(
            'cliente_id' => $datos_venta_producto['precio_venta'],
            'precio_venta' => $datos_venta_producto['precio_venta'],
            'apartado' => $datos_venta_producto['apartado'],
            'existencias' => $datos_venta_producto['cantidad_productos'],
            'tipo' => 'apartado',
        );
        $this->db->where('producto_id', $datos_venta_producto['id']);
        $query = $this->db->update('producto', $datos);
    }
    function get_porductos_apartado_by_client_id($id)
    {
        $this->db->where('cliente_id', $id);
        $this->db->where('tipo', 'apartado');
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function abonar_producto_apartado($datos_apartado){
        $this->db->set('apartado', $datos_apartado['apartado']);
        $this->db->where('producto_id', $datos_apartado['producto_id']);
        $this->db->update('producto');
    }
    //exportar
    function productos_excel()
    {
        $fields = $this->db->field_data('producto');
        $query = $this->db->select('*')->get('producto');

        return array("fields" => $fields, "query" => $query);
    }
}