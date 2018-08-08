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
    function guarda_contratos_del_dia($datos_contrato){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_registro = array(
            'fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'contrato',
            'contrato_id' => $datos_contrato['contrato_id'],
            'intereses' => $datos_contrato['intereses'],
            'dias' => $datos_contrato['dias'],
            'monto' => $datos_contrato['monto'],
            'monto_refrendo' => $datos_contrato['monto_refrendo'],
            'tienda_id' => $tienda
        );
        $this->db->insert('egresos', $datos_registro);
    }
    function guardar_ventas_dia($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_venta = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'venta',
            'factura_id' => $data['factura_id'],
            'recibo_id' => $data['recibo_id'],
            'monto' => $data['monto'],
            'id_producto' => $data['id_producto'],
            'nombre_producto' => $data['nombre_producto'],
            'tienda_id' => $tienda
        );

        $this->db->insert('ingresos', $datos_venta);
    }
    function guardar_apartados($datos_apartado){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $registro_apartado = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'apartado',
            'recibo_id' => $datos_apartado['recibo_id'],
            'monto' => $datos_apartado['monto'],
            'id_producto' => $datos_apartado['id_producto'],
            'saldo' => $datos_apartado['saldo'],
            'fecha_vencimiento' => $datos_apartado['fecha_vencimiento'],
            'tienda_id' => $tienda
        );
        $this->db->insert('ingresos', $registro_apartado);
    }
    function guardar_abonos_apartados($datos_apartado){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $registro_apartado = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'apartado',
            'recibo_id' => $datos_apartado['recibo_id'],
            'monto' => $datos_apartado['monto'],
            'id_producto' => $datos_apartado['id_producto'],
            'saldo' => $datos_apartado['saldo'],
            'fecha_vencimiento' => $datos_apartado['fecha_vencimiento'],
            'tienda_id' => $tienda
        );
        $this->db->insert('ingresos', $registro_apartado);
    }
    function guardar_abonos_a_capital($datos_abono){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $registro_abono = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'abono',
            'recibo_id' => $datos_abono['recibo_id'],
            'monto' => $datos_abono['monto'],
            'id_contrato' => $datos_abono['id_contrato'],
            'saldo' => $datos_abono['saldo'],
            'tienda_id' => $tienda
        );
        $this->db->insert('ingresos', $registro_abono);
    }
    function guardar_desenpenos($datos_desenpeno){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $registro_desenpeno = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'desempeno',
            'recibo_id' => $datos_desenpeno['recibo_id'],
            'monto' => $datos_desenpeno['monto'],
            'id_contrato' => $datos_desenpeno['id_contrato'],
            'tienda_id' => $tienda
        );
        $this->db->insert('ingresos', $registro_desenpeno);
    }
    function guardar_intereses_desempeno($datos_intereses_desempeno){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $registro_intereses_desenpeno = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'intereses_desempeno',
            'factura_id' => $datos_intereses_desempeno['factura_id'],
            'monto' => $datos_intereses_desempeno['monto'],
            'id_contrato' => $datos_intereses_desempeno['id_contrato'],
            'tienda_id' => $tienda
        );
        $this->db->insert('ingresos', $registro_intereses_desenpeno);
    }
    function guardar_intereses_refrendo($data)
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_venta = array(
            'ingreso_fecha' => $fecha->format('Y-m-d'),
            'tipo' => 'intereses_refrendo',
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

    //guardar cierre y reporte
    function guardar_cierre($data){
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
            'tienda_id' => $tienda
        );
        // insertamos en la base de datos
        $this->db->insert('cierre', $datos_cierre);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    function guardar_dinero($data){
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
    function asignar_fondo_a_cierre($data){
        $datos = array(
            'cierre_id'=> $data['cierre_id']
        );
        $this->db->where('id_fc', $data['fondo_id']);
        $query = $this->db->update('fondos_a_caja',$datos);
    }
    function asignar_cierre_ingreso($data){
        $datos = array(
            'cierre_id'=> $data['cierre_id']
        );
        $this->db->where('ingreso_id', $data['ingreso_id']);

        $query = $this->db->update('ingresos',$datos);
    }
    function asignar_cierre_egresos($data){
        $datos = array(
            'cierre_id'=> $data['cierre_id']
        );
        $this->db->where('egreso_id', $data['egreso_id']);
        $query = $this->db->update('egresos',$datos);
    }
    //Obtener registros del día
    function get_caja_dia_anterior(){
        //fecha
        $fecha = New DateTime();
        $fecha->modify('-1 days');
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('fecha_cierre', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('cierre');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

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

    function get_vales_cobrados_dia(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        $this->db->where('fecha_cobrado', $fecha->format('Y-m-d'));
        $this->db->where('tienda_id', $tienda);
        $this->db->where('estado', 'cobrado');
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_vales(){
        //fecha
        $fecha = New DateTime();
        // Get tienda data

        $tienda = tienda_id_h();
        $this->db->where('tienda_id', $tienda);
        $query = $this->db->get('vales');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_vales_activos(){
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


}