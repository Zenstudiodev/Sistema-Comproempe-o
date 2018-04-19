<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 7/04/2018
 * Time: 6:52 PM
 */

class Caja_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }

    //registros del día
    function get_ventas_dia(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo','venta');
        $this->db->where('ingreso_fecha',$fecha->format('Y-m-d'));
        $this->db->where('tienda_id',$tienda);
        $query = $this->db->get('ingresos');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_apartados_dia(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo','apartado');
        $this->db->where('ingreso_fecha',$fecha->format('Y-m-d'));
        $this->db->where('tienda_id',$tienda);
        $query = $this->db->get('ingresos');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_abono_empeno_dia(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo','abono');
        $this->db->where('ingreso_fecha',$fecha->format('Y-m-d'));
        $this->db->where('tienda_id',$tienda);
        $query = $this->db->get('ingresos');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_desempeno(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo','desempeño');
        $this->db->where('ingreso_fecha',$fecha->format('Y-m-d'));
        $this->db->where('tienda_id',$tienda);
        $query = $this->db->get('ingresos');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}