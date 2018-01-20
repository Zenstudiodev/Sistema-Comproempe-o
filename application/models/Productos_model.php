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

    function get_categorias(){

	    $this->db->distinct('categoria');
	    $this->db->select('categoria');
	    $this->db->from('producto');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function datos_de_producto($id){
        $this->db->where('producto_id', $id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
    }
	function datos_de_productos($productos){
		//$this->db->where_in('producto_id', $productos);
		$this->db->where_in('producto_id', $productos);
		$query = $this->db->get('producto');
		if ($query->num_rows() > 0) return $query;
	}

    function guardar_producto($data){
        $datos_de_producto= array(
            'cliente_id'=>$data['cliente_id'],
            'fecha'=> $data['fecha'],
            'categoria'=> $data['categoria'],
            'nombre_producto'=> $data['nombre_producto'],
            'no_serie'=> $data['no_serie'],
            'modelo'=> $data['modelo'],
            'marca'=> $data['marca'],
            'descripcion'=> $data['descripcion'],
            'fecha_avaluo'=> $data['fecha_avaluo'],
            'avaluo_comercial'=> $data['avaluo_comercial'],
            'avaluo_ce'=> $data['avaluo_ce'],
            'mutuo'=> $data['mutuo']
        );
        // insertamon en la base de datos
        $this->db->insert('producto',$datos_de_producto);
    }
    function actualizar_producto($data){
	    $datos = array(
		    'categoria'=> $data['categoria'],
		    'nombre_producto'=> $data['nombre_producto'],
		    'no_serie'=> $data['no_serie'],
		    'modelo'=> $data['modelo'],
		    'marca'=> $data['marca'],
		    'descripcion'=> $data['descripcion'],
		    'avaluo_comercial'=> $data['avaluo_comercial'],
		    'avaluo_ce'=> $data['avaluo_ce'],
		    'mutuo' => $data['mutuo'],
	    );
	    $this->db->where('producto_id', $data['producto_id']);
	    $query = $this->db->update('producto',$datos);
    }
    function guardar_precio_venta($producto_id, $precio_venta){
	    $datos = array(
		    'precio_venta'=> $precio_venta,
		    'tipo'=> 'vendido',
	    );
	    $this->db->where('producto_id', $producto_id);
	    $query = $this->db->update('producto',$datos);
    }
    function asignar_contrato($producto_id, $contrato_id){
	    $this->db->set('contrato_id', $contrato_id, FALSE);
	    $this->db->where('producto_id', $producto_id);
	    $this->db->update('producto');
    }
    function liberar_producto_de_contrato($producto_id){
	    $this->db->set('contrato_id', '0', FALSE);
	    $this->db->where('producto_id', $producto_id);
	    $this->db->update('producto');
    }
    function get_enmpenos($id){
        $this->db->where('cliente_id', $id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
	function get_productos_by_contrato($contrato_id){
		$this->db->where('contrato_id', $contrato_id);
		$query = $this->db->get('producto');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function cambiar_producto_a_venta($producto_id){
		$this->db->set('tipo', 'venta');
		$this->db->where('producto_id', $producto_id);
		$this->db->update('producto');
	}
	function get_productos_liquidacion(){

		$this->db->select('producto.producto_id, producto.contrato_id, producto.nombre_producto, producto.avaluo_ce, producto.mutuo, producto.tipo, contrato.estado');
		$this->db->from('producto');
		$this->db->where('producto.tipo', 'venta');
		$this->db->join('contrato', 'producto.contrato_id = contrato.contrato_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function guardar_liquidacion_factura_producto($data){
		$datos_de_liquidacion= array(
			'id_factura'=>$data['id_factura'],
			'id_producto'=> $data['id_producto'],
		);
		// insertamon en la base de datos
		$this->db->insert('liquidacion_factura_producto',$datos_de_liquidacion);

	}
	function get_transacciones_liquidacio_by_factura($factura_id){
		$this->db->where('id_factura', $factura_id);
		$query = $this->db->get('liquidacion_factura_producto');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function liberar_producto__anular_factura_liquidacion($producto_id){
		$this->db->set('tipo', 'venta');
		$this->db->where('producto_id', $producto_id);
		$this->db->update('producto');
	}
	function borrar_transacciones_liquidacion($factura_id){
		$this->db->where('id_factura', $factura_id);
		$this->db->delete('liquidacion_factura_producto');
	}
	function regresar_a_vigente($producto_id){
		$datos = array(
			'tipo'=> 'vigente'
		);
		$this->db->where('producto_id', $producto_id);
		$query = $this->db->update('producto',$datos);

	}
	function productos_excel()
	{
		$fields = $this->db->field_data('producto');
		$query  = $this->db->select('*')->get('producto');

		return array("fields" => $fields, "query" => $query);
	}
}