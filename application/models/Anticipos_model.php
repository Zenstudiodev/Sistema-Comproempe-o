<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: potato
 * Date: 06/03/2019
 * Time: 02:44 PM
 */

class Anticipos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }
    function guardar_anticipo($solicitud){
        $fecha = New DateTime();

        $datos_anticipo=array(
            'fecha_sa'=>$fecha->format('Y-m-d'),
            'nombre_cliente_sa'=>$solicitud['nombre_cliente'],
            'direccion_cliente_sa'=>$solicitud['direccion_cliente'],
            'dpi_cliente_sa'=>$solicitud['dpi_cliente'],
            'dpi_emitido_cliente_sa'=>$solicitud['dpi_emitido_cliente'],
            'nit_cliente_sa'=>$solicitud['nit_cliente'],
            'correo_cliente_sa'=>$solicitud['correo_cliente'],
            'celular_cliente_sa'=>$solicitud['celular_cliente'],
            'estado_civil_sa'=>$solicitud['correo_cliente'],
            'nombre_empresa_sa'=>$solicitud['nombre_empresa'],
            'direccion_empresa_sa'=>$solicitud['direccion_empresa'],
            'puesto_sa'=>$solicitud['puesto'],
            'telefono_empresa_sa'=>$solicitud['telefono_empresa'],
            'salario_sa'=>$solicitud['salario'],
            'monto_deseado_sa'=>$solicitud['monto_deseado'],
        );
        $this->db->insert('solicitud_anticipo', $datos_anticipo);
    }
    function get_solicitudes_pendientes(){

        $this->db->where('estado_sa', 'pendiente');
        $query = $this->db->get('solicitud_anticipo');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

}