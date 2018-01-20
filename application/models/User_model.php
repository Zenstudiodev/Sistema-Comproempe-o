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
}