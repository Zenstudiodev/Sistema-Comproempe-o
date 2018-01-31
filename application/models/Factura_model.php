<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/09/2017
 * Time: 12:37 PM
 */

class Factura_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Guatemala');
	}

	public function listar_facturas()
	{
		$this->db->from('facturas');
		$this->db->join('cliente', 'cliente.id = facturas.cliente_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_facturas_liquidacion_by_cliente_id($cliente_id)
	{
		$this->db->where('cliente_id', $cliente_id);
		$this->db->where('tipo', 'venta');
		$query = $this->db->get('facturas');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_facturas_liquidacion_r_by_cliente_id($cliente_id)
	{
		$this->db->where('cliente_id', $cliente_id);
		$this->db->where('tipo', 'venta');
		$query = $this->db->get('facturas_r');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	public function guardar_factura($datos)
	{

	}
	public function get_info_factura($factura_id)
	{
		$this->db->where('factura_id', $factura_id);
		$query = $this->db->get('facturas');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	public function anular_factura($factura_id)
	{
		$datos = array(
			'estado' => 'anulada'
		);
		$this->db->where('factura_id', $factura_id);
		$query = $this->db->update('facturas', $datos);
	}
	public function guardar_factura_recibo($factura_id, $recibo_id)
	{
		$fecha                = new DateTime();
		$datos_de_transaccion = array(
			'factura_id' => $factura_id,
			'recibo_id'  => $recibo_id,
			'fecha'      => $fecha->format('Y-m-d H:i:s')
		);
		// insertamon en la base de datos
		$this->db->insert('factura_recibo', $datos_de_transaccion);
	}
	function obtener_transaccion($factura_id){
		$this->db->where('factura_id', $factura_id);
		$query = $this->db->get('factura_recibo');
		if ($query->num_rows() > 0) return $query;
	}
	function get_series(){
		$query = $this->db->get('control_facturas');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function lote_data_by_id($id_lote){
		$this->db->where('id', $id_lote);
		$query = $this->db->get('control_facturas');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function guardar_lote($data){

		$fecha = new DateTime();

		$lote_data = array(
			'correlativo_del'=> $data['correlativo_del'],
			'correlativo_al'=> $data['correlativo_al'],
			'cantidad'=> $data['cantidad'],
			'usadas'=> $data['usadas'],
			'serie'=> $data['serie'],
			'fecha_vencimiento'=> $data['fecha_vencimiento']
		);

		$this->db->insert('control_facturas', $lote_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	function desactivar_lotes($serie){
		$datos = array(
			'estado'=> 'inactivo'
		);
		$this->db->where('serie', $serie);
		$query = $this->db->update('control_facturas',$datos);
	}
	function activar_lote($id_lote, $serie){
		$datos = array(
			'estado'=> 'activo'
		);
		$this->db->where('id', $id_lote);
		$this->db->where('serie', $serie);
		$query = $this->db->update('control_facturas',$datos);
	}
	function get_lote_activo(){
		$this->db->where('estado', 'activo');
		$query = $this->db->get('control_facturas');
		if($query->num_rows() > 0) return $query;
		else return false;

	}
	function get_info_serie_activa($serie){
		$this->db->where('serie', $serie);
		$this->db->where('estado', 'activo');
		$query = $this->db->get('control_facturas');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function facturas_excel()
	{
		$fields = $this->db->field_data('facturas');
		$query  = $this->db->select('*')->get('facturas');
		return array("fields" => $fields, "query" => $query);
	}

}
