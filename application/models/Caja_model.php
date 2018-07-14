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

    //guardar registros del dia
    function guardar_ventas_dia($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'factura_id' => $data['factura_id'],
            'monto' => $data['monto'],
            'id_producto' => $data['id_producto'],
            'nombre_producto' => $data['nombre_producto'],
            'tienda_id' => $tienda
        );

        $this->db->insert('ingresos', $datos_venta);
    }

    function guardar_intereses_refrendo($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_venta = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'factura_id' => $data['factura_id'],
            'monto' => $data['monto'],
            'id_contrato' => $data['contrato'],
            'mutuo' => $data['monto_refrendado'],
            'tipo' => 'intereses_refrendo',
            'tienda_id' => $tienda
        );

        $this->db->insert('ingresos', $datos_venta);
    }

    function guardar_deposito($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'no_boleta' => $data['boleta'],
            'monto' => $data['monto'],
            'banco' => $data['banco'],
            'tipo' => $data['tipo'],
            'documento' => $data['documento'],
            'tienda_id' => $tienda
        );
        $this->db->insert('depositos', $datos_venta);
    }

    function guardar_visanet($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'factura_id' => $data['factura_id'],
            'recibo_id' => $data['recibo_id'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda
        );
        $this->db->insert('visanet', $datos_venta);
    }

    function guardar_otros_gastos($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'otros_gastos',
            'detalle' => $data['detalle'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda
        );
        $this->db->insert('egresos', $datos_venta);
    }

    function guardar_fondo_caja($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'no_cheque' => $data['no_cheque'],
            'monto' => $data['monto'],
            'banco' => $data['banco'],
            'tienda_id' => $tienda
        );
        $this->db->insert('fondos_a_caja', $datos_venta);
    }

    function guardar_vale($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_venta = array(
            'fecha_creado' => $fecha->format('Y-m-d'),
            'nombre' => $data['nombre'],
            'estado' => 'activo',
            'detalle' => $data['detalle'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda
        );
        $this->db->insert('vales', $datos_venta);
    }


    //Obtener registros del día
    function get_ventas_dia()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'venta');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_apartados_dia()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'apartado');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_abono_empeno_dia()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'abono');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_desempeno()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'desempeño');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_intereses_refrendo()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'intereses_refrendo');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_intereses_desempeno()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'intereses_desempeno');
        $this->db->where('ingreso_fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_empenos()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'contrato');
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_compras()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'compra');
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_otros_gastos()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'otros_gastos');
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_depositos()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('depositos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_visanet()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('visanet');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_fondos_caja()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('fondos_a_caja');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


}