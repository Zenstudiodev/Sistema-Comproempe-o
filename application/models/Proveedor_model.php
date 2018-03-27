<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/12/2017
 * Time: 9:52 AM
 */
class Proveedor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }

    public function crear_proveedor($form_data)
    {
        $fecha = new DateTime();
        $cliente_data = array(
            'fecha' => $fecha->format('Y-m-d'),
            'nombre' => $form_data['nombre'],
            'direccion' => $form_data['direccion'],
            'telefono' => $form_data['telefono'],
            'razon_social' => $form_data['razon_social'],
            'email' => $form_data['email'],
            'nit' => $form_data['nit'],
        );


        $this->db->insert('proveedores', $cliente_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_proveedores()
    {
        $query = $this->db->get('proveedores');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_proveedor_data_by_id($proveedor_id)
    {
        $this->db->where('proveedor_id', $proveedor_id);
        $query = $this->db->get('proveedores');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_productos_provedor_by_id($proveedor_id)
    {
        $this->db->where('proveedor_id', $proveedor_id);
        $query = $this->db->get('producto');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function proveedores_json()
    {
        $query = $this->db->get('proveedores');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function guardar_prorateo($form_data)
    {
        $tienda = tienda_id_h();
        $prorateo_data = array(
            'p_proveedor_id' => $form_data['proveedor_id'],
            'p_no_factura' => $form_data['no_factura'],
            'p_serie_factura' => $form_data['serie_factura'],
            'p_fecha_factura' => $form_data['fecha_factura'],
            'p_factura_tipo' => $form_data['factura_tipo'],
            'p_fecha' => $form_data['factura_tipo'],
            'p_no_productos' => $form_data['no_productos'],
            'p_flete_sin_iva_local' => $form_data['flete_sin_iva_local'],
            'p_gasto_no_deducible_local' => $form_data['gasto_no_deducible_local'],
            'p_total_cargo_extra' => $form_data['total_cargo_extra'],
            'p_cargo_extra_por_producto' => $form_data['cargo_extra_por_producto'],
            'p_total_productos' => $form_data['total_productos'],
            'p_total_precio_sin_iva' => $form_data['total_precio_sin_iva'],
            'p_total_iva' => $form_data['total_iva'],
            'p_total_costo_neto' => $form_data['total_costo_neto'],
            'p_total_precio_venta' => $form_data['total_precio_venta'],
            'p_total_total_producto' => $form_data['total_total_producto'],
            'tienda_id' => $tienda,
        );

        // insertamon en la base de datos
		$this->db->insert('prorateos', $prorateo_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_prorateos_by_id($proveedor_id){
        $this->db->where('p_proveedor_id', $proveedor_id);
        $query = $this->db->get('prorateos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


}