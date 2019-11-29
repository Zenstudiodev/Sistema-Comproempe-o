<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 14/11/2018
 * Time: 2:28 PM
 */
class Reportes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }
    function get_ventas_dia($fecha){

    }
    function get_celulares_vendidos(){

        $this->db->like('categoria', 'CELULARES');
        $this->db->where('tipo', 'vendido');
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

}