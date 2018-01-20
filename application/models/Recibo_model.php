<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/09/2017
 * Time: 12:37 PM
 */

class Recibo_model  extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Guatemala');
	}

	public function listar_recibos(){
		$this->db->from('recibos');
		$this->db->join('cliente', 'cliente.id = recibos.cliente_id');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query;
		else return false;
	}

	public function guardar_factura($datos){

	}

	public function get_info_recibo($recibo_id){
		$this->db->where('recibo_id',$recibo_id);
		$query = $this->db->get('recibos');
		if($query->num_rows() > 0) return $query;
		else return false;
	}

	public function anular_recibo($recibo_id){
		$datos = array(
			'estado' => 'anulada'
		);
		$this->db->where('recibo_id', $recibo_id);
		$query = $this->db->update('recibos', $datos);
	}

	function recibos_excel()
	{
		$fields = $this->db->field_data('recibos');
		$query  = $this->db->select('*')->get('recibos');
		return array("fields" => $fields, "query" => $query);
	}

}
