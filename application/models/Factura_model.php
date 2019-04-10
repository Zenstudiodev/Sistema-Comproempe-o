<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/09/2017
 * Time: 12:37 PM
 */
class Factura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }

    public function listar_facturas()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('facturas');
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id');
        } elseif ($tienda == '2') {
            $this->db->from('facturas_tienda_2');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id');
        }
        elseif ($tienda == '3') {
            $this->db->from('facturas_tienda_3');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3.cliente_id');
        }
        elseif ($tienda == '4') {
            $this->db->from('facturas_tienda_4');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4.cliente_id');
        }
        elseif ($tienda == '5') {
            $this->db->from('facturas_tienda_5');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_5.cliente_id');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function listar_facturas_serie_r()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('facturas_r');
            $this->db->join('cliente', 'cliente.id = facturas_r.cliente_id');
        } elseif ($tienda == '2') {
            $this->db->from('facturas_tienda_2_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id');
        }
        elseif ($tienda == '3') {
            $this->db->from('facturas_tienda_3_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3_r.cliente_id');
        }
        elseif ($tienda == '4') {
            $this->db->from('facturas_tienda_4_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4_r.cliente_id');
        }
        elseif ($tienda == '5') {
            $this->db->from('facturas_tienda_5_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4_r.cliente_id');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_facturas_liquidacion_by_cliente_id($cliente_id)
    {
        $this->db->where('cliente_id', $cliente_id);
        $this->db->where('tipo', 'venta');
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $query = $this->db->get('facturas');
        } elseif ($tienda == '2') {
            $query = $this->db->get('facturas_tienda_2');
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('facturas_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('facturas_tienda_4');
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('facturas_tienda_5');
        }
        elseif ($tienda == '6') {
            $query = $this->db->get('facturas_tienda_6');
        }
        if ($query->num_rows() > 0) return $query;
        else return false;
    }//TODO liquidacion

    public function get_facturas_liquidacion_r_by_cliente_id($cliente_id)
    {
        $this->db->where('cliente_id', $cliente_id);
        $this->db->where('tipo', 'venta');
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('facturas_r');
        } elseif ($tienda == '2') {
            $this->db->from('facturas_tienda_2_r');
        }
        elseif ($tienda == '3') {
            $this->db->from('facturas_tienda_3_r');
        }
        elseif ($tienda == '4') {
            $this->db->from('facturas_tienda_4_r');
        }
        elseif ($tienda == '5') {
            $this->db->from('facturas_tienda_5_r');
        }
        elseif ($tienda == '6') {
            $this->db->from('facturas_tienda_6_r');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }//TODO liqidacion

    public function guardar_factura($datos)
    {

    }

    public function get_info_factura($factura_id, $serie)
    {
        $tienda = tienda_id_h();
        // insertamos en la base de datos

        $this->db->where('factura_id', $factura_id);

        if ($tienda == '1') {
            switch ($serie) {
                case 'R':
                    $query = $this->db->get('facturas_r');
                    break;
                case 'A':
                    $query = $this->db->get('facturas');
                    break;
            }
        } elseif ($tienda == '2') {
            switch ($serie) {
                case 'RE':
                    $query = $this->db->get('facturas_tienda_2_r');
                    break;
                case 'CN':
                    $query = $this->db->get('facturas_tienda_2');
                    break;
            }
        }
        elseif ($tienda == '3') {
            switch ($serie) {
                case 'RM':
                    $query = $this->db->get('facturas_tienda_3_r');
                    break;
                case 'CN2':
                    $query = $this->db->get('facturas_tienda_3_cn');
                    break;
                case 'MN':
                    $query = $this->db->get('facturas_tienda_3');
                    break;
            }
        }
        elseif ($tienda == '4') {
            switch ($serie) {
                case 'AG':
                    $query = $this->db->get('facturas_tienda_4');
                    break;
                case 'AR':
                    $query = $this->db->get('facturas_tienda_4_r');
            }
        }
        elseif ($tienda == '5') {
            switch ($serie) {
                case 'T5':
                    $query = $this->db->get('facturas_tienda_5');
                    break;
                case 'TR5':
                    $query = $this->db->get('facturas_tienda_5_r');
            }
        }

        if ($query->num_rows() > 0) return $query;
        else return false;

    }
    public function get_ultima_factura($serie){

        $this->db->order_by("factura_id", 'DESC');
        switch ($serie) {
            case 'R':
                $query = $this->db->get('facturas_r');
                break;
            case 'A':
                $query = $this->db->get('facturas');
                break;
            case 'RE':
                $query = $this->db->get('facturas_tienda_2_r');
                break;
            case 'CN':
                $query = $this->db->get('facturas_tienda_2');
                break;
            case 'CN2':
                $query = $this->db->get('facturas_tienda_3_cn');
                break;
            case 'RM':
                $query = $this->db->get('facturas_tienda_3_r');
                break;
            case 'MN':
                $query = $this->db->get('facturas_tienda_3');
                break;
            case 'AG':
                $query = $this->db->get('facturas_tienda_4');
                break;
            case 'AR':
                $query = $this->db->get('facturas_tienda_4_r');
                break;
        }
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function get_info_factura_r($factura_id)
    {
        $this->db->where('factura_id', $factura_id);

        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('facturas_r');
            if ($query->num_rows() > 0) return $query;
            else return false;
        }
        elseif ($tienda == '2') {
            $query = $this->db->get('facturas_tienda_2_r');
            if ($query->num_rows() > 0) return $query;
            else {
                $query = $this->db->get('facturas_r');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('facturas_tienda_3_r');
            if ($query->num_rows() > 0) return $query;
            else {
                $query = $this->db->get('facturas_r');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('facturas_tienda_4_r');
            if ($query->num_rows() > 0) return $query;
            else {
                $query = $this->db->get('facturas_r');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('facturas_tienda_5_r');
            if ($query->num_rows() > 0) return $query;
            else {
                $query = $this->db->get('facturas_r');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '6') {
            $query = $this->db->get('facturas_tienda_6_r');
            if ($query->num_rows() > 0) return $query;
            else {
                $query = $this->db->get('facturas_r');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
    }

    public function anular_factura($factura_id, $serie)//TODO facturas r
    {
        $datos = array(
            'estado' => 'anulada'
        );
        $this->db->where('factura_id', $factura_id);
        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            switch ($serie) {
                case 'R':
                    $query = $this->db->update('facturas_r', $datos);
                    break;
                case 'A':
                    $query = $this->db->update('facturas', $datos);
                    break;
            }
        } elseif ($tienda == '2') {
            switch ($serie) {
                case 'RE':
                    $query = $this->db->update('facturas_tienda_2_r', $datos);
                    break;
                case 'CN':
                    $query = $this->db->update('facturas_tienda_2', $datos);
                    break;
            }

        }
        elseif ($tienda == '3') {
            switch ($serie) {
                case 'RM':
                    $query = $this->db->update('facturas_tienda_3_r', $datos);
                    break;
                case 'MN':
                    $query = $this->db->update('facturas_tienda_3', $datos);
                    break;
            }
        }
        elseif ($tienda == '4') {
            switch ($serie) {
                case 'AG':
                    $query = $this->db->update('facturas_tienda_4_r', $datos);
                    break;
                case 'AR':
                    $query = $this->db->update('facturas_tienda_4', $datos);
                    break;
            }
        }
        elseif ($tienda == '5') {
            switch ($serie) {
                case 'T5':
                    $query = $this->db->update('facturas_tienda_5_r', $datos);
                    break;
                case 'TR5':
                    $query = $this->db->update('facturas_tienda_5', $datos);
                    break;
            }
        }
    }

    public function guardar_factura_recibo($factura_id, $recibo_id)
    {
        $fecha = new DateTime();
        $datos_de_transaccion = array(
            'factura_id' => $factura_id,
            'recibo_id' => $recibo_id,
            'fecha' => $fecha->format('Y-m-d H:i:s')
        );
        // insertamon en la base de datos
        $this->db->insert('factura_recibo', $datos_de_transaccion);
    }

    public function obtener_transaccion($factura_id)
    {
        $this->db->where('factura_id', $factura_id);
        $query = $this->db->get('factura_recibo');
        if ($query->num_rows() > 0) return $query;
    }


    public function get_series()
    {
        $query = $this->db->get('control_facturas');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function lote_data_by_id($id_lote)
    {
        $this->db->where('id', $id_lote);
        $query = $this->db->get('control_facturas');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function guardar_lote($data)
    {

        $fecha = new DateTime();

        $lote_data = array(
            'correlativo_del' => $data['correlativo_del'],
            'correlativo_al' => $data['correlativo_al'],
            'cantidad' => $data['cantidad'],
            'usadas' => $data['usadas'],
            'serie' => $data['serie'],
            'fecha_vencimiento' => $data['fecha_vencimiento']
        );

        $this->db->insert('control_facturas', $lote_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function desactivar_lotes($serie)
    {
        $datos = array(
            'estado' => 'inactivo'
        );
        $this->db->where('serie', $serie);
        $query = $this->db->update('control_facturas', $datos);
    }

    public function activar_lote($id_lote, $serie)
    {
        $datos = array(
            'estado' => 'activo'
        );
        $this->db->where('id', $id_lote);
        $this->db->where('serie', $serie);
        $query = $this->db->update('control_facturas', $datos);
    }

    public function get_lote_activo()
    {
        // Get tienda data
        $tienda = tienda_id_h();

        $this->db->where('tienda_id', $tienda);
        $this->db->where('estado', 'activo');
        $query = $this->db->get('control_facturas');
        if ($query->num_rows() > 0) return $query;
        else return false;

    }

    public function get_info_serie_activa($serie)
    {
        $this->db->where('serie', $serie);
        $this->db->where('estado', 'activo');
        $query = $this->db->get('control_facturas');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function facturas_excel()
    {
        //fecha
        $fecha = New DateTime();
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $fields = $this->db->field_data('facturas');
            $query = $this->db->select('*')->get('facturas');
        } elseif ($tienda == '2') {
            $fields = $this->db->field_data('facturas_tienda_2');
            $query = $this->db->select('*')->get('facturas_tienda_2');

        }
        return array("fields" => $fields, "query" => $query);
    }

    public function facturas_html_excel()
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->select('facturas.factura_id, 
            facturas.contrato_id, 
            facturas.fecha, 
            facturas.detalle, 
            facturas.intereses, 
            facturas.cargo_extra, 
            facturas.almacenaje, 
            facturas.mora, 
            facturas.recuperacion, 
            facturas.subtotal, 
            facturas.descuento, 
            facturas.total, 
            facturas.tipo, 
            facturas.estado, 
            facturas.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas');
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '2') {
            $this->db->select('facturas_tienda_2.factura_id, 
            facturas_tienda_2.contrato_id, 
            facturas_tienda_2.fecha, 
            facturas_tienda_2.detalle, 
            facturas_tienda_2.intereses, 
            facturas_tienda_2.cargo_extra, 
            facturas_tienda_2.almacenaje, 
            facturas_tienda_2.mora, 
            facturas_tienda_2.recuperacion, 
            facturas_tienda_2.subtotal, 
            facturas_tienda_2.descuento, 
            facturas_tienda_2.total, 
            facturas_tienda_2.tipo, 
            facturas_tienda_2.estado, 
            facturas_tienda_2.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '3') {
            $this->db->select('facturas_tienda_3.factura_id, 
            facturas_tienda_3.contrato_id, 
            facturas_tienda_3.fecha, 
            facturas_tienda_3.detalle, 
            facturas_tienda_3.intereses, 
            facturas_tienda_3.cargo_extra, 
            facturas_tienda_3.almacenaje, 
            facturas_tienda_3.mora, 
            facturas_tienda_3.recuperacion, 
            facturas_tienda_3.subtotal, 
            facturas_tienda_3.descuento, 
            facturas_tienda_3.total, 
            facturas_tienda_3.tipo, 
            facturas_tienda_3.estado, 
            facturas_tienda_3.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '4') {
            $this->db->select('facturas_tienda_4.factura_id, 
            facturas_tienda_4.contrato_id, 
            facturas_tienda_4.fecha, 
            facturas_tienda_4.detalle, 
            facturas_tienda_4.intereses, 
            facturas_tienda_4.cargo_extra, 
            facturas_tienda_4.almacenaje, 
            facturas_tienda_4.mora, 
            facturas_tienda_4.recuperacion, 
            facturas_tienda_4.subtotal, 
            facturas_tienda_4.descuento, 
            facturas_tienda_4.total, 
            facturas_tienda_4.tipo, 
            facturas_tienda_4.estado, 
            facturas_tienda_4.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_4');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '5') {
            $this->db->select('facturas_tienda_5.factura_id, 
            facturas_tienda_5.contrato_id, 
            facturas_tienda_5.fecha, 
            facturas_tienda_5.detalle, 
            facturas_tienda_5.intereses, 
            facturas_tienda_5.cargo_extra, 
            facturas_tienda_5.almacenaje, 
            facturas_tienda_5.mora, 
            facturas_tienda_5.recuperacion, 
            facturas_tienda_5.subtotal, 
            facturas_tienda_5.descuento, 
            facturas_tienda_5.total, 
            facturas_tienda_5.tipo, 
            facturas_tienda_5.estado, 
            facturas_tienda_5.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_5');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_5.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '6') {
            $this->db->select('facturas_tienda_6.factura_id, 
            facturas_tienda_6.contrato_id, 
            facturas_tienda_6.fecha, 
            facturas_tienda_6.detalle, 
            facturas_tienda_6.intereses, 
            facturas_tienda_6.cargo_extra, 
            facturas_tienda_6.almacenaje, 
            facturas_tienda_6.mora, 
            facturas_tienda_6.recuperacion, 
            facturas_tienda_6.subtotal, 
            facturas_tienda_6.descuento, 
            facturas_tienda_6.total, 
            facturas_tienda_6.tipo, 
            facturas_tienda_6.estado, 
            facturas_tienda_6.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_6');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_6.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function facturas_html_excel_by_date($from, $to)
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            if ($from != null) {
                $this->db->where('facturas.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas.fecha  <=', $to);
            }

            $this->db->select('facturas.factura_id, 
            facturas.contrato_id, 
            facturas.fecha, 
            facturas.detalle, 
            facturas.intereses, 
            facturas.cargo_extra, 
            facturas.almacenaje, 
            facturas.mora, 
            facturas.recuperacion, 
            facturas.subtotal, 
            facturas.descuento, 
            facturas.total, 
            facturas.tipo, 
            facturas.estado, 
            facturas.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas');
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '2') {
            if ($from != null) {
                $this->db->where('facturas_tienda_2.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_2.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_2.factura_id, 
            facturas_tienda_2.contrato_id, 
            facturas_tienda_2.fecha, 
            facturas_tienda_2.detalle, 
            facturas_tienda_2.intereses, 
            facturas_tienda_2.cargo_extra, 
            facturas_tienda_2.almacenaje, 
            facturas_tienda_2.mora, 
            facturas_tienda_2.recuperacion, 
            facturas_tienda_2.subtotal, 
            facturas_tienda_2.descuento, 
            facturas_tienda_2.total, 
            facturas_tienda_2.tipo, 
            facturas_tienda_2.estado, 
            facturas_tienda_2.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '3') {
            if ($from != null) {
                $this->db->where('facturas_tienda_3.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_3.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_3.factura_id, 
            facturas_tienda_3.contrato_id, 
            facturas_tienda_3.fecha, 
            facturas_tienda_3.detalle, 
            facturas_tienda_3.intereses, 
            facturas_tienda_3.cargo_extra, 
            facturas_tienda_3.almacenaje, 
            facturas_tienda_3.mora, 
            facturas_tienda_3.recuperacion, 
            facturas_tienda_3.subtotal, 
            facturas_tienda_3.descuento, 
            facturas_tienda_3.total, 
            facturas_tienda_3.tipo, 
            facturas_tienda_3.estado, 
            facturas_tienda_3.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '4') {
            if ($from != null) {
                $this->db->where('facturas_tienda_4.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_4.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_4.factura_id, 
            facturas_tienda_4.contrato_id, 
            facturas_tienda_4.fecha, 
            facturas_tienda_4.detalle, 
            facturas_tienda_4.intereses, 
            facturas_tienda_4.cargo_extra, 
            facturas_tienda_4.almacenaje, 
            facturas_tienda_4.mora, 
            facturas_tienda_4.recuperacion, 
            facturas_tienda_4.subtotal, 
            facturas_tienda_4.descuento, 
            facturas_tienda_4.total, 
            facturas_tienda_4.tipo, 
            facturas_tienda_4.estado, 
            facturas_tienda_4.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_4');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '5') {
            if ($from != null) {
                $this->db->where('facturas_tienda_5.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_5.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_5.factura_id, 
            facturas_tienda_5.contrato_id, 
            facturas_tienda_5.fecha, 
            facturas_tienda_5.detalle, 
            facturas_tienda_5.intereses, 
            facturas_tienda_5.cargo_extra, 
            facturas_tienda_5.almacenaje, 
            facturas_tienda_5.mora, 
            facturas_tienda_5.recuperacion, 
            facturas_tienda_5.subtotal, 
            facturas_tienda_5.descuento, 
            facturas_tienda_5.total, 
            facturas_tienda_5.tipo, 
            facturas_tienda_5.estado, 
            facturas_tienda_5.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_5');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_5.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '6') {
            if ($from != null) {
                $this->db->where('facturas_tienda_6.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_6.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_6.factura_id, 
            facturas_tienda_6.contrato_id, 
            facturas_tienda_6.fecha, 
            facturas_tienda_6.detalle, 
            facturas_tienda_6.intereses, 
            facturas_tienda_6.cargo_extra, 
            facturas_tienda_6.almacenaje, 
            facturas_tienda_6.mora, 
            facturas_tienda_6.recuperacion, 
            facturas_tienda_6.subtotal, 
            facturas_tienda_6.descuento, 
            facturas_tienda_6.total, 
            facturas_tienda_6.tipo, 
            facturas_tienda_6.estado, 
            facturas_tienda_6.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function facturas_r_html_excel()
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->select('facturas_r.factura_id, 
            facturas_r.contrato_id, 
            facturas_r.fecha, 
            facturas_r.detalle, 
            facturas_r.intereses, 
            facturas_r.cargo_extra, 
            facturas_r.almacenaje, 
            facturas_r.mora, 
            facturas_r.recuperacion, 
            facturas_r.subtotal, 
            facturas_r.descuento, 
            facturas_r.total, 
            facturas_r.tipo, 
            facturas_r.estado, 
            facturas_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_r');
            $this->db->join('cliente', 'cliente.id = facturas_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '2') {
            $this->db->select('facturas_tienda_2_r.factura_id, 
            facturas_tienda_2_r.contrato_id, 
            facturas_tienda_2_r.fecha, 
            facturas_tienda_2_r.detalle, 
            facturas_tienda_2_r.intereses, 
            facturas_tienda_2_r.cargo_extra, 
            facturas_tienda_2_r.almacenaje, 
            facturas_tienda_2_r.mora, 
            facturas_tienda_2_r.recuperacion, 
            facturas_tienda_2_r.subtotal, 
            facturas_tienda_2_r.descuento, 
            facturas_tienda_2_r.total, 
            facturas_tienda_2_r.tipo, 
            facturas_tienda_2_r.estado, 
            facturas_tienda_2_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '3') {
            $this->db->select('facturas_tienda_3_r.factura_id, 
            facturas_tienda_3_r.contrato_id, 
            facturas_tienda_3_r.fecha, 
            facturas_tienda_3_r.detalle, 
            facturas_tienda_3_r.intereses, 
            facturas_tienda_3_r.cargo_extra, 
            facturas_tienda_3_r.almacenaje, 
            facturas_tienda_3_r.mora, 
            facturas_tienda_3_r.recuperacion, 
            facturas_tienda_3_r.subtotal, 
            facturas_tienda_3_r.descuento, 
            facturas_tienda_3_r.total, 
            facturas_tienda_3_r.tipo, 
            facturas_tienda_3_r.estado, 
            facturas_tienda_3_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '4') {
            $this->db->select('facturas_tienda_4_r.factura_id, 
            facturas_tienda_4_r.contrato_id, 
            facturas_tienda_4_r.fecha, 
            facturas_tienda_4_r.detalle, 
            facturas_tienda_4_r.intereses, 
            facturas_tienda_4_r.cargo_extra, 
            facturas_tienda_4_r.almacenaje, 
            facturas_tienda_4_r.mora, 
            facturas_tienda_4_r.recuperacion, 
            facturas_tienda_4_r.subtotal, 
            facturas_tienda_4_r.descuento, 
            facturas_tienda_4_r.total, 
            facturas_tienda_4_r.tipo, 
            facturas_tienda_4_r.estado, 
            facturas_tienda_4_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_4_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '5') {
            $this->db->select('facturas_tienda_5_r.factura_id, 
            facturas_tienda_5_r.contrato_id, 
            facturas_tienda_5_r.fecha, 
            facturas_tienda_5_r.detalle, 
            facturas_tienda_5_r.intereses, 
            facturas_tienda_5_r.cargo_extra, 
            facturas_tienda_5_r.almacenaje, 
            facturas_tienda_5_r.mora, 
            facturas_tienda_5_r.recuperacion, 
            facturas_tienda_5_r.subtotal, 
            facturas_tienda_5_r.descuento, 
            facturas_tienda_5_r.total, 
            facturas_tienda_5_r.tipo, 
            facturas_tienda_5_r.estado, 
            facturas_tienda_5_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_5_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_5_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '6') {
            $this->db->select('facturas_tienda_6_r.factura_id, 
            facturas_tienda_6_r.contrato_id, 
            facturas_tienda_6_r.fecha, 
            facturas_tienda_6_r.detalle, 
            facturas_tienda_6_r.intereses, 
            facturas_tienda_6_r.cargo_extra, 
            facturas_tienda_6_r.almacenaje, 
            facturas_tienda_6_r.mora, 
            facturas_tienda_6_r.recuperacion, 
            facturas_tienda_6_r.subtotal, 
            facturas_tienda_6_r.descuento, 
            facturas_tienda_6_r.total, 
            facturas_tienda_6_r.tipo, 
            facturas_tienda_6_r.estado, 
            facturas_tienda_6_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_6_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_6_r.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function facturas_r_html_excel_by_date($from, $to)
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            if ($from != null) {
                $this->db->where('facturas_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_r.fecha  <=', $to);
            }

            $this->db->select('facturas_r.factura_id, 
            facturas_r.contrato_id, 
            facturas_r.fecha, 
            facturas_r.detalle, 
            facturas_r.intereses, 
            facturas_r.cargo_extra, 
            facturas_r.almacenaje, 
            facturas_r.mora, 
            facturas_r.recuperacion, 
            facturas_r.subtotal, 
            facturas_r.descuento, 
            facturas_r.total, 
            facturas_r.tipo, 
            facturas_r.estado, 
            facturas_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_r');
            $this->db->join('cliente', 'cliente.id = facturas_r.cliente_id', 'Left');

            $this->db->order_by("facturas_r.fecha", 'ASC');
        }
        elseif ($tienda == '2') {
            if ($from != null) {
                $this->db->where('facturas_tienda_2_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_2_r.fecha  <=', $to);
            }
            $this->db->select('facturas_tienda_2_r.factura_id, 
            facturas_tienda_2_r.contrato_id, 
            facturas_tienda_2_r.fecha, 
            facturas_tienda_2_r.detalle, 
            facturas_tienda_2_r.intereses, 
            facturas_tienda_2_r.cargo_extra, 
            facturas_tienda_2_r.almacenaje, 
            facturas_tienda_2_r.mora, 
            facturas_tienda_2_r.recuperacion, 
            facturas_tienda_2_r.subtotal, 
            facturas_tienda_2_r.descuento, 
            facturas_tienda_2_r.total, 
            facturas_tienda_2_r.tipo, 
            facturas_tienda_2_r.estado, 
            facturas_tienda_2_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id', 'Left');
            $this->db->order_by("facturas_tienda_2_r.fecha", 'ASC');
        }
        elseif ($tienda == '3') {
            if ($from != null) {
                $this->db->where('facturas_tienda_3_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_3_r.fecha  <=', $to);
            }
            $this->db->select('facturas_tienda_3_r.factura_id, 
            facturas_tienda_3_r.contrato_id, 
            facturas_tienda_3_r.fecha, 
            facturas_tienda_3_r.detalle, 
            facturas_tienda_3_r.intereses, 
            facturas_tienda_3_r.cargo_extra, 
            facturas_tienda_3_r.almacenaje, 
            facturas_tienda_3_r.mora, 
            facturas_tienda_3_r.recuperacion, 
            facturas_tienda_3_r.subtotal, 
            facturas_tienda_3_r.descuento, 
            facturas_tienda_3_r.total, 
            facturas_tienda_3_r.tipo, 
            facturas_tienda_3_r.estado, 
            facturas_tienda_3_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3_r.cliente_id', 'Left');
            $this->db->order_by("facturas_tienda_3_r.fecha", 'ASC');
        }
        elseif ($tienda == '4') {
            if ($from != null) {
                $this->db->where('facturas_tienda_4_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_4_r.fecha  <=', $to);
            }
            $this->db->select('facturas_tienda_4_r.factura_id, 
            facturas_tienda_4_r.contrato_id, 
            facturas_tienda_4_r.fecha, 
            facturas_tienda_4_r.detalle, 
            facturas_tienda_4_r.intereses, 
            facturas_tienda_4_r.cargo_extra, 
            facturas_tienda_4_r.almacenaje, 
            facturas_tienda_4_r.mora, 
            facturas_tienda_4_r.recuperacion, 
            facturas_tienda_4_r.subtotal, 
            facturas_tienda_4_r.descuento, 
            facturas_tienda_4_r.total, 
            facturas_tienda_4_r.tipo, 
            facturas_tienda_4_r.estado, 
            facturas_tienda_4_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_4_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_4_r.cliente_id', 'Left');
            $this->db->order_by("facturas_tienda_4_r.fecha", 'ASC');
        }
        elseif ($tienda == '5') {
            if ($from != null) {
                $this->db->where('facturas_tienda_5_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_5_r.fecha  <=', $to);
            }
            $this->db->select('facturas_tienda_5_r.factura_id, 
            facturas_tienda_5_r.contrato_id, 
            facturas_tienda_5_r.fecha, 
            facturas_tienda_5_r.detalle, 
            facturas_tienda_5_r.intereses, 
            facturas_tienda_5_r.cargo_extra, 
            facturas_tienda_5_r.almacenaje, 
            facturas_tienda_5_r.mora, 
            facturas_tienda_5_r.recuperacion, 
            facturas_tienda_5_r.subtotal, 
            facturas_tienda_5_r.descuento, 
            facturas_tienda_5_r.total, 
            facturas_tienda_5_r.tipo, 
            facturas_tienda_5_r.estado, 
            facturas_tienda_5_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_5_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_5_r.cliente_id', 'Left');
            $this->db->order_by("facturas_tienda_5_r.fecha", 'ASC');
        }
        elseif ($tienda == '6') {
            if ($from != null) {
                $this->db->where('facturas_tienda_6_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_6_r.fecha  <=', $to);
            }
            $this->db->select('facturas_tienda_6_r.factura_id, 
            facturas_tienda_6_r.contrato_id, 
            facturas_tienda_6_r.fecha, 
            facturas_tienda_6_r.detalle, 
            facturas_tienda_6_r.intereses, 
            facturas_tienda_6_r.cargo_extra, 
            facturas_tienda_6_r.almacenaje, 
            facturas_tienda_6_r.mora, 
            facturas_tienda_6_r.recuperacion, 
            facturas_tienda_6_r.subtotal, 
            facturas_tienda_6_r.descuento, 
            facturas_tienda_6_r.total, 
            facturas_tienda_6_r.tipo, 
            facturas_tienda_6_r.estado, 
            facturas_tienda_6_r.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_6_r');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_6_r.cliente_id', 'Left');
            $this->db->order_by("facturas_tienda_6_r.fecha", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    public function facturas_2_html_excel()
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->select('facturas.factura_id, 
            facturas.contrato_id, 
            facturas.fecha, 
            facturas.detalle, 
            facturas.intereses, 
            facturas.cargo_extra, 
            facturas.almacenaje, 
            facturas.mora, 
            facturas.recuperacion, 
            facturas.subtotal, 
            facturas.descuento, 
            facturas.total, 
            facturas.tipo, 
            facturas.estado, 
            facturas.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas');
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '2') {
            $this->db->select('facturas_tienda_2.factura_id, 
            facturas_tienda_2.contrato_id, 
            facturas_tienda_2.fecha, 
            facturas_tienda_2.detalle, 
            facturas_tienda_2.intereses, 
            facturas_tienda_2.cargo_extra, 
            facturas_tienda_2.almacenaje, 
            facturas_tienda_2.mora, 
            facturas_tienda_2.recuperacion, 
            facturas_tienda_2.subtotal, 
            facturas_tienda_2.descuento, 
            facturas_tienda_2.total, 
            facturas_tienda_2.tipo, 
            facturas_tienda_2.estado, 
            facturas_tienda_2.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        elseif ($tienda == '3') {
            $this->db->select('facturas_tienda_3_cn.factura_id, 
            facturas_tienda_3_cn.contrato_id, 
            facturas_tienda_3_cn.fecha, 
            facturas_tienda_3_cn.detalle, 
            facturas_tienda_3_cn.intereses, 
            facturas_tienda_3_cn.cargo_extra, 
            facturas_tienda_3_cn.almacenaje, 
            facturas_tienda_3_cn.mora, 
            facturas_tienda_3_cn.recuperacion, 
            facturas_tienda_3_cn.subtotal, 
            facturas_tienda_3_cn.descuento, 
            facturas_tienda_3_cn.total, 
            facturas_tienda_3_cn.tipo, 
            facturas_tienda_3_cn.estado, 
            facturas_tienda_3_cn.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_3_cn');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_3_cn.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function facturas_2_html_excel_by_date($from, $to)
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            if ($from != null) {
                $this->db->where('facturas.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas.fecha  <=', $to);
            }

            $this->db->select('facturas.factura_id, 
            facturas.contrato_id, 
            facturas.fecha, 
            facturas.detalle, 
            facturas.intereses, 
            facturas.cargo_extra, 
            facturas.almacenaje, 
            facturas.mora, 
            facturas.recuperacion, 
            facturas.subtotal, 
            facturas.descuento, 
            facturas.total, 
            facturas.tipo, 
            facturas.estado, 
            facturas.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas');
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        } elseif ($tienda == '2') {
            if ($from != null) {
                $this->db->where('facturas_tienda_2.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_2.fecha  <=', $to);
            }

            $this->db->select('facturas_tienda_2.factura_id, 
            facturas_tienda_2.contrato_id, 
            facturas_tienda_2.fecha, 
            facturas_tienda_2.detalle, 
            facturas_tienda_2.intereses, 
            facturas_tienda_2.cargo_extra, 
            facturas_tienda_2.almacenaje, 
            facturas_tienda_2.mora, 
            facturas_tienda_2.recuperacion, 
            facturas_tienda_2.subtotal, 
            facturas_tienda_2.descuento, 
            facturas_tienda_2.total, 
            facturas_tienda_2.tipo, 
            facturas_tienda_2.estado, 
            facturas_tienda_2.serie, 
            cliente.id, cliente.nit, 
            cliente.nombre');
            $this->db->from('facturas_tienda_2');
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id', 'Left');
            $this->db->order_by("factura_id", 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}
