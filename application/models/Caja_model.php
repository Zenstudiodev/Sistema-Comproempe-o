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
    function guarda_contratos_del_dia($datos_contrato)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $datos_registro = array(
            'fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'contrato',
            'contrato_id' => $datos_contrato['contrato_id'],
            'intereses' => $datos_contrato['intereses'],
            'dias' => $datos_contrato['dias'],
            'monto' => $datos_contrato['monto'],
            'monto_refrendo' => $datos_contrato['monto_refrendo'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('egresos', $datos_registro);
    }

    function guardar_ventas_dia($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $datos_venta = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'venta',
            'factura_id' => $data['factura_id'],
            'serie' => $data['serie'],
            'recibo_id' => $data['recibo_id'],
            'monto' => $data['monto'],
            'margen' => $data['margen'],
            'id_producto' => $data['id_producto'],
            'nombre_producto' => $data['nombre_producto'],
            'tienda_id' => $tienda,
            'user_id' => $user_id,
        );

        $this->db->insert('ingresos', $datos_venta);
    }

    function guardar_apartados($datos_apartado)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $registro_apartado = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'apartado',
            'recibo_id' => $datos_apartado['recibo_id'],
            'monto' => $datos_apartado['monto'],
            'id_producto' => $datos_apartado['id_producto'],
            'nombre_producto' => $datos_apartado['nombre_producto'],
            'saldo' => $datos_apartado['saldo'],
            'fecha_vencimiento' => $datos_apartado['fecha_vencimiento'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('ingresos', $registro_apartado);
    }
    function guardar_abonos_a_apartados($datos_abono)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $registro_abono = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'abono_apartado',
            'recibo_id' => $datos_abono['recibo_id'],
            'monto' => $datos_abono['monto'],
            'id_producto' => $datos_abono['id_producto'],
            'saldo' => $datos_abono['saldo'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('ingresos', $registro_abono);
    }
    function guardar_abonos_a_capital($datos_abono)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $registro_abono = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'abono',
            'recibo_id' => $datos_abono['recibo_id'],
            'monto' => $datos_abono['monto'],
            'id_contrato' => $datos_abono['id_contrato'],
            'saldo' => $datos_abono['saldo'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('ingresos', $registro_abono);
    }
    function guardar_desenpenos($datos_desenpeno)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $registro_desenpeno = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'desempeno',
            'recibo_id' => $datos_desenpeno['recibo_id'],
            'monto' => $datos_desenpeno['monto'],
            'id_contrato' => $datos_desenpeno['id_contrato'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('ingresos', $registro_desenpeno);
    }
    function guardar_intereses_desempeno($datos_intereses_desempeno)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $registro_intereses_desenpeno = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'intereses_desempeno',
            'factura_id' => $datos_intereses_desempeno['factura_id'],
            'monto' => $datos_intereses_desempeno['monto'],
            'id_contrato' => $datos_intereses_desempeno['id_contrato'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('ingresos', $registro_intereses_desenpeno);
    }
    function guardar_intereses_refrendo($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();

        $datos_venta = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'intereses_refrendo',
            'factura_id' => $data['factura_id'],
            'monto' => $data['monto'],
            'id_contrato' => $data['contrato'],
            'mutuo' => $data['monto_refrendado'],
            'tipo' => 'intereses_refrendo',
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );

        $this->db->insert('ingresos', $datos_venta);
    }
    function guardar_vale_cobrado($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();
        $datos_venta = array(
                'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'vale_cobrado',
            'monto' => $data['monto'],
            'vale_id' => $data['vale_id'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );

        $this->db->insert('ingresos', $datos_venta);
    }

    function guardar_deposito($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'no_boleta' => $data['boleta'],
            'monto' => $data['monto'],
            'banco' => $data['banco'],
            'tipo' => $data['tipo'],
            'documento' => $data['documento'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('depositos', $datos_venta);
    }
    function anular_deposito($deposito_id){
        $datos = array(
            'monto' => '0',
        );
        $this->db->where('id_deposito', $deposito_id);
        $query = $this->db->update('depositos', $datos);
    }
    function guardar_visanet($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'factura_id' => $data['factura_id'],
            'recibo_id' => $data['recibo_id'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('visanet', $datos_venta);
    }
    function anular_visanet($visanet_id){
        $datos = array(
            'monto' => '0',
        );
        $this->db->where('id_visanet', $visanet_id);
        $query = $this->db->update('visanet', $datos);
    }

    function guardar_otros_gastos($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        //user data
        $user_id = get_user_id();
        $datos_venta = array(
            'fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'otros_gastos',
            'detalle' => $data['detalle'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
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
        //user data
        $user_id = get_user_id();
        $datos_venta = array(
            'fecha_creado' => $fecha->format('Y-m-d'),
            'nombre' => $data['nombre'],
            'estado' => 'activo',
            'detalle' => $data['detalle'],
            'monto' => $data['monto'],
            'tienda_id' => $tienda,
            'user_id' => $user_id
        );
        $this->db->insert('vales', $datos_venta);
    }

    //guardar cierre y reporte
    function guardar_cierre($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_cierre = array(
            'fecha_cierre' => $fecha->format('Y-m-d'),
            'total_ingreso' => $data['total_ingreso'],
            'total_egreso' => $data['total_egreso'],
            'deposito' => $data['total_deposito_i'],
            'visanet' => $data['total_visanet_i'],
            'saldo_caja' => $data['saldo_caja'],
            'total_dinero' => $data['total_dinero_i'],
            'total_vales' => $data['total_vales'],
            'tienda_id' => $tienda
        );
        // insertamos en la base de datos
        $this->db->insert('cierre', $datos_cierre);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function guardar_dinero($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $datos_dinero = array(
            'fecha_dinero' => $fecha->format('Y-m-d'),
            'b_200' => $data['b_200'],
            'b_100' => $data['b_100'],
            'b_50' => $data['b_50'],
            'b_20' => $data['b_20'],
            'b_10' => $data['b_10'],
            'b_5' => $data['b_5'],
            'b_1' => $data['b_1'],
            'm_1' => $data['m_1'],
            'm_50' => $data['m_50'],
            'm_25' => $data['m_25'],
            'm_10' => $data['m_10'],
            'm_5' => $data['m_5'],
            'cierre_id' => $data['cierre_id'],
            'tienda_id' => $tienda
        );
        // insertamos en la base de datos
        $this->db->insert('dinero', $datos_dinero);
    }

    function asignar_fondo_a_cierre($data)
    {
        $datos = array(
            'cierre_id' => $data['cierre_id']
        );
        $this->db->where('id_fc', $data['fondo_id']);
        $query = $this->db->update('fondos_a_caja', $datos);
    }

    function asignar_cierre_ingreso($data)
    {
        $datos = array(
            'cierre_id' => $data['cierre_id']
        );
        $this->db->where('ingreso_id', $data['ingreso_id']);

        $query = $this->db->update('ingresos', $datos);
    }

    function asignar_cierre_egresos($data)
    {
        $datos = array(
            'cierre_id' => $data['cierre_id']
        );
        $this->db->where('egreso_id', $data['egreso_id']);
        $query = $this->db->update('egresos', $datos);
    }


    //Obtener registros del día
    function get_caja_dia_anterior($fecha)
    {

        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('fecha_cierre', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('cierre');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_caja_dia($fecha)
    {

        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('fecha_cierre', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('cierre');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_fondos_caja($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('fondos_a_caja');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_ventas_dia($fecha)
    {
        //fecha
        //$fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'venta');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_apartados_dia($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'apartado');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_abono_apartado_dia($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'abono_apartado');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_abono_empeno_dia($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'abono');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_desempeno($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tipo', 'desempeño');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_intereses_refrendo($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'intereses_refrendo');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_intereses_desempeno($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'intereses_desempeno');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_empenos($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'contrato');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_compras($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'compra');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_otros_gastos($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tipo', 'otros_gastos');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_depositos($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('depositos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_visanet($fecha)
    {

        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('visanet');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_cobrados_dia($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_cobrado', $fecha);
        $this->db->where('tienda_id', $tienda);
        $this->db->where('estado', 'cobrado');
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_dia()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_creado', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_activos()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        // $this->db->where('fecha_creado', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $this->db->where('estado', 'activo');
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //registros globales
    function get_caja_global($fecha)
    {

        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('fecha_cierre', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('cierre');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_fondos_caja_global($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('fondos_a_caja');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_ventas_global($fecha, $tienda)
    {
        //fecha
        //$fecha = New DateTime();
        $this->db->where('tipo', 'venta');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_apartados_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'apartado');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_abono_apartado_global($fecha, $tienda)
    {

        $this->db->where('tipo', 'abono_apartado');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_abono_empeno_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'abono');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_desempeno_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'desempeño');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_intereses_refrendo_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'intereses_refrendo');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_intereses_desempeno_global($fecha, $tienda)
    {

        $this->db->where('tipo', 'intereses_desempeno');
        $this->db->where('ingreso_fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('ingresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_empenos_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'contrato');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_compras_global($fecha, $tienda)
    {
        $this->db->where('tipo', 'compra');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_otros_gastos_global($fecha, $tienda)
    {

        $this->db->where('tipo', 'otros_gastos');
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('egresos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_depositos_global($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('depositos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_visanet_global($fecha)
    {

        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha', $fecha);
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('visanet');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_cobrados_dia_global($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_cobrado', $fecha);
        $this->db->where('tienda_id', $tienda);
        $this->db->where('estado', 'cobrado');
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_global()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_dia_global()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_creado', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


    function get_datos_vale_by_id($vale_id){
        $this->db->where('vale_id', $vale_id);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function cobrar_vale($vale_id){
        //fecha
        $fecha = New DateTime();
        $datos = array(
            'fecha_cobrado' => $fecha->format('Y-m-d'),
            'estado' => 'cobrado',
        );
        $this->db->where('vale_id', $vale_id);
        $query = $this->db->update('vales', $datos);
    }

    function get_dinero_dia($fecha)
    {
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_dinero', $fecha);
        $this->db->where('tienda_id', $tienda);
        $this->db->order_by('dinero_id', 'DESC');
        $this->db->limit(1);


        $query = $this->db->get('dinero');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


    //obtener fondos para asignar a cierre
    function get_fondos_caja_ac()
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
    function anular_ingreso_caja($fondo_caja_id){
        $datos = array(
            'monto' => '0',
        );
        $this->db->where('id_fc', $fondo_caja_id);
        $query = $this->db->update('fondos_a_caja', $datos);
    }
    function guardar_saldo_caja($saldo){
        $ayer = new DateTime();
        $ayer->modify('-1 days');

        // Get tienda data
        $tienda = tienda_id_h();

        $datos_cierre = array(
            'fecha_cierre' => $ayer->format('Y-m-d'),
            'saldo_caja' => $saldo,
            'tienda_id' => $tienda
        );
        // insertamos en la base de datos
        $this->db->insert('cierre', $datos_cierre);
        $insert_id = $this->db->insert_id();


    }

    function anular_ingreso($ingreso_id){

        $datos = array(
            'monto' => '0',
        );
        $this->db->where('ingreso_id', $ingreso_id);
        $query = $this->db->update('ingresos', $datos);
    }
    function anular_egreso($egreso_id){

        $datos = array(
            'monto' => '0',
        );
        $this->db->where('egreso_id', $egreso_id);
        $query = $this->db->update('egresos', $datos);
    }



}