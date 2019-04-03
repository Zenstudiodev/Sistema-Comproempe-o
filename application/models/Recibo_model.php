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
        elseif ($tienda == '3') {
            $this->db->from('recibos_tienda_3');
            $this->db->join('cliente', 'cliente.id = recibos_tienda_3.cliente_id');
        }
        elseif ($tienda == '4') {
            $this->db->from('recibos_tienda_4');
            $this->db->join('cliente', 'cliente.id = recibos_tienda_4.cliente_id');
        }
        elseif ($tienda == '5') {
            $this->db->from('recibos_tienda_5');
            $this->db->join('cliente', 'cliente.id = recibos_tienda_5.cliente_id');
        }

		$query = $this->db->get();
		if($query->num_rows() > 0) return $query;
		else return false;
	}
    public function get_recibos_enmpeno_by_cliente_id($cliente_id)
    {
        $tienda = tienda_id_h();

        $tipos_de_recibo = array('desempeno', 'abono');
        if ($tienda == '1') {
            $this->db->select('recibos.recibo_id, recibos.estado, recibos.fecha_recibo, recibos.contrato_id, recibos.monto, recibos.tipo, contrato.total_mutuo');
            $this->db->from('recibos');
            $this->db->join('contrato', 'recibos.contrato_id = contrato.contrato_id');
            $this->db->where('recibos.cliente_id', $cliente_id);
            $this->db->where_in('recibos.tipo', $tipos_de_recibo);
        } elseif ($tienda == '2') {
            $this->db->select('recibos_tienda_2.recibo_id, recibos_tienda_2.estado, recibos_tienda_2.fecha_recibo, recibos_tienda_2.contrato_id, recibos_tienda_2.monto, recibos_tienda_2.tipo, contrato_tienda_2.total_mutuo');
            $this->db->from('recibos_tienda_2');
            $this->db->join('contrato_tienda_2', 'recibos_tienda_2.contrato_id = contrato_tienda_2.contrato_id');
            $this->db->where('recibos_tienda_2.cliente_id', $cliente_id);
            $this->db->where_in('recibos_tienda_2.tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '3') {
            $this->db->select('recibos_tienda_3.recibo_id, recibos_tienda_3.estado, recibos_tienda_3.fecha_recibo, recibos_tienda_3.contrato_id, recibos_tienda_3.monto, recibos_tienda_3.tipo, contrato_tienda_3.total_mutuo');
            $this->db->from('recibos_tienda_3');
            $this->db->join('contrato_tienda_3', 'recibos_tienda_3.contrato_id = contrato_tienda_3.contrato_id');
            $this->db->where('recibos_tienda_3.cliente_id', $cliente_id);
            $this->db->where_in('recibos_tienda_3.tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '4') {
            $this->db->select('recibos_tienda_4.recibo_id, recibos_tienda_4.estado, recibos_tienda_4.fecha_recibo, recibos_tienda_4.contrato_id, recibos_tienda_4.monto, recibos_tienda_4.tipo, contrato_tienda_4.total_mutuo');
            $this->db->from('recibos_tienda_4');
            $this->db->join('contrato_tienda_4', 'recibos_tienda_4.contrato_id = contrato_tienda_4.contrato_id');
            $this->db->where('recibos_tienda_4.cliente_id', $cliente_id);
            $this->db->where_in('recibos_tienda_4.tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '5') {
            $this->db->select('recibos_tienda_5.recibo_id, recibos_tienda_5.estado, recibos_tienda_5.fecha_recibo, recibos_tienda_5.contrato_id, recibos_tienda_5.monto, recibos_tienda_5.tipo, contrato_tienda_5.total_mutuo');
            $this->db->from('recibos_tienda_5');
            $this->db->join('contrato_tienda_5', 'recibos_tienda_5.contrato_id = contrato_tienda_5.contrato_id');
            $this->db->where('recibos_tienda_5.cliente_id', $cliente_id);
            $this->db->where_in('recibos_tienda_5.tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '6') {
            $this->db->select('recibos_tienda_6.recibo_id, recibos_tienda_6.estado, recibos_tienda_6.fecha_recibo, recibos_tienda_6.contrato_id, recibos_tienda_6.monto, recibos_tienda_6.tipo, contrato_tienda_5.total_mutuo');
            $this->db->from('recibos_tienda_6');
            $this->db->join('contrato_tienda_5', 'recibos_tienda_6.contrato_id = contrato_tienda_5.contrato_id');
            $this->db->where('recibos_tienda_6.cliente_id', $cliente_id);
            $this->db->where_in('recibos_tienda_6.tipo', $tipos_de_recibo);
        }



        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_recibos_liquidacion_by_client_id($cliente_id)
    {
        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('recibos');
            $this->db->where('cliente_id', $cliente_id);
        } elseif ($tienda == '2') {
            $this->db->from('recibos_tienda_2');
            $this->db->where('cliente_id', $cliente_id);
        }
        elseif ($tienda == '3') {
            $this->db->from('recibos_tienda_3');
            $this->db->where('cliente_id', $cliente_id);
        }
        elseif ($tienda == '4') {
            $this->db->from('recibos_tienda_4');
            $this->db->where('cliente_id', $cliente_id);
        }
        elseif ($tienda == '5') {
            $this->db->from('recibos_tienda_5');
            $this->db->where('cliente_id', $cliente_id);
        }
        elseif ($tienda == '6') {
            $this->db->from('recibos_tienda_6');
            $this->db->where('cliente_id', $cliente_id);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_recibos_apartado_by_client_id($cliente_id){
        $tienda = tienda_id_h();
        $tipos_de_recibo = array('apartado', 'abono_apartado');
        if ($tienda == '1') {
            $this->db->from('recibos');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        } elseif ($tienda == '2') {
            $this->db->from('recibos_tienda_2');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '3') {
            $this->db->from('recibos_tienda_3');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '4') {
            $this->db->from('recibos_tienda_4');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '5') {
            $this->db->from('recibos_tienda_5');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        }
        elseif ($tienda == '6') {
            $this->db->from('recibos_tienda_6');
            $this->db->where('cliente_id', $cliente_id);
            $this->db->where_in('tipo', $tipos_de_recibo);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function recibos_excel()
    {
        $tienda = tienda_id_h();
        $tipos_de_recibo = array('apartado', 'abono_apartado');
        if ($tienda == '1') {
            $fields = $this->db->field_data('recibos');
            $query  = $this->db->select('*')->get('recibos');
        } elseif ($tienda == '2') {
            $fields = $this->db->field_data('recibos_tienda_2');
            $query  = $this->db->select('*')->get('recibos_tienda_2');
        }
        elseif ($tienda == '3') {
            $fields = $this->db->field_data('recibos_tienda_3');
            $query  = $this->db->select('*')->get('recibos_tienda_3');
        }
        elseif ($tienda == '4') {
            $fields = $this->db->field_data('recibos_tienda_4');
            $query  = $this->db->select('*')->get('recibos_tienda_4');
        }
        elseif ($tienda == '5') {
            $fields = $this->db->field_data('recibos_tienda_5');
            $query  = $this->db->select('*')->get('recibos_tienda_5');
        }



        return array("fields" => $fields, "query" => $query);
    }
    public function get_info_recibo($recibo_id){
		$this->db->where('recibo_id',$recibo_id);
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $query = $this->db->get('recibos');
        } elseif ($tienda == '2') {
            $query = $this->db->get('recibos_tienda_2');
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('recibos_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('recibos_tienda_4');
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
        elseif ($tienda == '3') {
            $query = $this->db->update('recibos_tienda_3', $datos);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('recibos_tienda_4', $datos);
        }
	}
}
