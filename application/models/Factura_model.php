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
        } elseif ($tienda == '2') {
            $query = $this->db->get('facturas_tienda_2_r');
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
            $this->db->join('cliente', 'cliente.id = facturas.cliente_id','Left');
            $this->db->order_by("factura_id",'ASC');
        } elseif ($tienda == '2') {
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
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2.cliente_id','Left');
            $this->db->order_by("factura_id",'ASC');
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
            $this->db->join('cliente', 'cliente.id = facturas_r.cliente_id','Left');
            $this->db->order_by("factura_id",'ASC');
        } elseif ($tienda == '2') {
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
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id','Left');
            $this->db->order_by("factura_id",'ASC');
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
            $this->db->join('cliente', 'cliente.id = facturas_r.cliente_id','Left');

            $this->db->order_by("facturas_r.fecha",'ASC');
        } elseif ($tienda == '2') {
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
            $this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id','Left');
            $this->db->order_by("facturas_tienda_2_r.fecha",'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}
