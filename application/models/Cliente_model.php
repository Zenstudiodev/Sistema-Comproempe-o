<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 16/06/2017
 * Time: 10:18 AM
 */
class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }
    public function crear_cliente($form_data){
        $fecha = new DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $cliente_data = array(
            'fecha' => $fecha->format('Y-m-d H:i:s'),
            'nombre' => $form_data['nombre'],
            'dpi' => $form_data['dpi'],
            'nit' => $form_data['nit'],
            'fecha_nacimiento' => $form_data['fecha_nacimiento'],
            'celular' => $form_data['celular'],
            'telefono' => $form_data['telefono'],
            'email' => $form_data['email'],
            'direccion' => $form_data['direccion'],
            'publicidad' => $form_data['publicidad'],
            'ciudad' => $form_data['ciudad'],
            'zona' => $form_data['zona'],
            'colonia' => $form_data['colonia'],
            'tienda_id' => $tienda,
        );

        $this->db->insert('cliente', $cliente_data);
	    $insert_id = $this->db->insert_id();
	    return  $insert_id;
    }
	public function listar_clientes(){
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tienda_id',$tienda);

        $query = $this->db->get('cliente');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
	public function listar_clientes_by_date($from, $to)
	{
		if ($from != null)
		{
			$this->db->where('fecha  >=', $from);
		}
		if ($to != null)
		{
			$this->db->where('fecha  <=', $to);
		}
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tienda_id',$tienda);
		$query = $this->db->get('cliente');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	public function listar_clientes_json(){
		$this->db->where('dpi !=', null);
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function listar_ciudades_json(){
		$this->db->distinct('ciudad');
		$this->db->select('ciudad');
		$this->db->from('cliente');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function listar_colonias_json(){
		$this->db->distinct('colonia');
		$this->db->select('colonia');
		$this->db->from('cliente');
		$query = $this->db->get();
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	public function detalle_cliente($cliente_id){
		$this->db->where('id',$cliente_id);
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
    public function actualizar_cliente($post_data){
	    $datos = array(
		    'nombre'=> $post_data['nombre'],
		    'dpi'=> $post_data['dpi'],
		    'nit'=> $post_data['nit'],
		    'fecha_nacimiento'=> $post_data['fecha_nacimiento'],
		    'celular'=> $post_data['celular'],
		    'telefono'=> $post_data['telefono'],
		    'email'=> $post_data['email'],
		    'direccion'=> $post_data['direccion'],
		    'publicidad' => $post_data['publicidad'],
            'ciudad' => $post_data['ciudad'],
            'zona' => $post_data['zona'],
            'colonia' => $post_data['colonia'],
	    );
	    $this->db->where('id', $post_data['cliente_id']);
	    $query = $this->db->update('cliente',$datos);
    }
    public function cliente_firmo($cliente_id){
        $datos = array(
            'firmo'=> '1',
        );
        $this->db->where('id', $cliente_id);
        $query = $this->db->update('cliente',$datos);
    }
    public function listar_empenos($cliente_id){
	    $this->db->where('cliente_id',$cliente_id);
	    $this->db->where('tipo','Empeno');
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('contrato');
        } elseif ($tienda == '2') {
            $query = $this->db->get('contrato_tienda_2');
        } elseif ($tienda == '3') {
            $query = $this->db->get('contrato_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('contrato_tienda_4');
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('contrato_tienda_5');
        }elseif ($tienda == '6') {
            $query = $this->db->get('contrato_tienda_6');
        }
	    if($query->num_rows() > 0) return $query->num_rows();
	    else return 0;
    }
	function clientes_excel()
	{
		$fields = $this->db->field_data('cliente');
		$query  = $this->db->select('*')->get('cliente');

		return array("fields" => $fields, "query" => $query);
	}



}