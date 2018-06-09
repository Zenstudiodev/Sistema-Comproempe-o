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
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $this->db->from('recibos');
            $this->db->join('cliente', 'cliente.id = recibos.cliente_id');

        } elseif ($tienda == '2') {
            $this->db->from('recibos_tienda_2');
            $this->db->join('cliente', 'cliente.id = recibos_tienda_2.cliente_id');
        }

		$query = $this->db->get();
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function get_info_recibo($recibo_id){
		$this->db->where('recibo_id',$recibo_id);
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $query = $this->db->get('recibos');

        } elseif ($tienda == '2') {
            $query = $this->db->get('recibos_tienda_2');
        }
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function anular_recibo($recibo_id){
		$datos = array(
			'estado' => 'anulada'
		);
		$this->db->where('recibo_id', $recibo_id);
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $query = $this->db->update('recibos', $datos);

        } elseif ($tienda == '2') {
            $query = $this->db->update('recibos_tienda_2', $datos);
        }
	}
    function get_recibos_apartado_by_client_id($cliente_id){
        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('recibos');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where('tipo', 'apartado');
        } elseif ($tienda == '2') {
            $this->db->from('recibos_tienda_2');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where('tipo', 'apartado');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
	function recibos_excel()
	{
		$fields = $this->db->field_data('recibos');
		$query  = $this->db->select('*')->get('recibos');
		return array("fields" => $fields, "query" => $query);
	}
}
