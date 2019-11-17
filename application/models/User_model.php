<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/09/2017
 * Time: 11:24 AM
 */

class User_model extends CI_Model
{
	function get_users(){
		return $this->db->get('users');
	}

	function userData($id){
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function listado_de_vendedores(){
		$this->db->where('rol','vendedor');
		$query = $this->db->get('users');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function listar_usuarios(){
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function asignar_tienda($user_id, $tienda_id){
        $datos = array(
            'tienda_id'=> $tienda_id,
        );
        $this->db->where('id', $user_id);
        $query = $this->db->update('users',$datos);
    }
    function listar_empleados_planilla(){
        $this->db->where('en_planilla','1');
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}