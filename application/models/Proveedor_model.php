<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/12/2017
 * Time: 9:52 AM
 */

class Proveedor_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Guatemala');
	}
	public function crear_proveedor($form_data){
		$fecha = new DateTime();
		$cliente_data = array(
			'fecha' => $fecha->format('Y-m-d'),
			'nombre' => $form_data['nombre'],
			'direccion' => $form_data['direccion'],
			'telefono' => $form_data['telefono'],
			'razon_social' => $form_data['razon_social'],
			'email' => $form_data['email'],
			'nit' => $form_data['nit'],
		);


		$this->db->insert('proveedores', $cliente_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	public function get_proveedores(){
		$query = $this->db->get('proveedores');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function get_proveedor_data_by_id($proveedor_id){
		$this->db->where('proveedor_id', $proveedor_id);
		$query = $this->db->get('proveedores');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function get_productos_provedor_by_id($proveedor_id){
		$this->db->where('proveedor_id', $proveedor_id);
		$query = $this->db->get('producto');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function proveedores_json(){
		$query = $this->db->get('proveedores');
		if($query->num_rows() > 0) return $query;
		else return false;
	}


}