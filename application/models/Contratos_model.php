<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/09/2017
 * Time: 1:51 PM
 */
class Contratos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Guatemala');
    }

    function listar_contratos()
    {
        // Get tienda data
        $tienda = tienda_id_h();

        if ($tienda == '1') {
            $this->db->select('contrato.contrato_id, contrato.estado, contrato.total_mutuo, contrato.fecha, contrato.fecha_pago, contrato.tipo, contrato.dias_gracia, contrato.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato');
            $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
        } elseif ($tienda == '2') {
            $this->db->select('contrato_tienda_2.contrato_id, contrato_tienda_2.estado, contrato_tienda_2.total_mutuo, contrato_tienda_2.fecha, contrato_tienda_2.fecha_pago, contrato_tienda_2.tipo, contrato_tienda_2.dias_gracia, contrato_tienda_2.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_2');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
        }
        elseif ($tienda == '3') {
            $this->db->select('contrato_tienda_3.contrato_id, contrato_tienda_3.estado, contrato_tienda_3.total_mutuo, contrato_tienda_3.fecha, contrato_tienda_3.fecha_pago, contrato_tienda_3.tipo, contrato_tienda_3.dias_gracia, contrato_tienda_3.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_3');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
        }
        elseif ($tienda == '4') {
            $this->db->select('contrato_tienda_4.contrato_id, contrato_tienda_4.estado, contrato_tienda_4.total_mutuo, contrato_tienda_4.fecha, contrato_tienda_4.fecha_pago, contrato_tienda_4.tipo, contrato_tienda_4.dias_gracia, contrato_tienda_4.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_4');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
        }
        elseif ($tienda == '5') {
            $this->db->select('contrato_tienda_5.contrato_id, contrato_tienda_5.estado, contrato_tienda_5.total_mutuo, contrato_tienda_5.fecha, contrato_tienda_5.fecha_pago, contrato_tienda_5.tipo, contrato_tienda_5.dias_gracia, contrato_tienda_5.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_5');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
        }
        elseif ($tienda == '6') {
            $this->db->select('contrato_tienda_6.contrato_id, contrato_tienda_6.estado, contrato_tienda_6.total_mutuo, contrato_tienda_6.fecha, contrato_tienda_6.fecha_pago, contrato_tienda_6.tipo, contrato_tienda_6.dias_gracia, contrato_tienda_6.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_6');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_6.cliente_id');
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;


        $query = $this->db->get('contrato');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //actualizador de contratos
    function contratos_actuaizador_t1()
    {
        $this->db->select('contrato.contrato_id, contrato.estado, contrato.total_mutuo, contrato.fecha, contrato.fecha_pago, contrato.tipo, contrato.dias_gracia, contrato.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato');
        $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_actuaizador_t2()
    {
        $this->db->select('contrato_tienda_2.contrato_id, contrato_tienda_2.estado, contrato_tienda_2.total_mutuo, contrato_tienda_2.fecha, contrato_tienda_2.fecha_pago, contrato_tienda_2.tipo, contrato_tienda_2.dias_gracia, contrato_tienda_2.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato_tienda_2');
        $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_actuaizador_t3()
    {
        $this->db->select('contrato_tienda_3.contrato_id, contrato_tienda_3.estado, contrato_tienda_3.total_mutuo, contrato_tienda_3.fecha, contrato_tienda_3.fecha_pago, contrato_tienda_3.tipo, contrato_tienda_3.dias_gracia, contrato_tienda_3.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato_tienda_3');
        $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_actuaizador_t4()
    {
        $this->db->select('contrato_tienda_4.contrato_id, contrato_tienda_4.estado, contrato_tienda_4.total_mutuo, contrato_tienda_4.fecha, contrato_tienda_4.fecha_pago, contrato_tienda_4.tipo, contrato_tienda_4.dias_gracia, contrato_tienda_4.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato_tienda_4');
        $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_actuaizador_t5()
    {
        $this->db->select('contrato_tienda_5.contrato_id, contrato_tienda_5.estado, contrato_tienda_5.total_mutuo, contrato_tienda_5.fecha, contrato_tienda_5.fecha_pago, contrato_tienda_5.tipo, contrato_tienda_5.dias_gracia, contrato_tienda_5.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato_tienda_5');
        $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_actuaizador_t6()
    {
        $this->db->select('contrato_tienda_6.contrato_id, contrato_tienda_6.estado, contrato_tienda_6.total_mutuo, contrato_tienda_6.fecha, contrato_tienda_6.fecha_pago, contrato_tienda_6.tipo, contrato_tienda_6.dias_gracia, contrato_tienda_6.tototal_liquidado, cliente.id, cliente.nombre');
        $this->db->from('contrato_tienda_6');
        $this->db->join('cliente', 'cliente.id = contrato_tienda_6.cliente_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function actualizar_estado_contrato_t1($contrato_id, $estado)
    {

        $data = array(
            'estado' => $estado,
        );

        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato', $data);
    }
    function actualizar_estado_contrato_t2($contrato_id, $estado)
    {
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato_tienda_2', $data);
    }
    function actualizar_estado_contrato_t3($contrato_id, $estado)
    {
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato_tienda_3', $data);
    }
    function actualizar_estado_contrato_t4($contrato_id, $estado)
    {
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato_tienda_4', $data);
    }
    function actualizar_estado_contrato_t5($contrato_id, $estado)
    {
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato_tienda_5', $data);
    }
    function actualizar_estado_contrato_t6($contrato_id, $estado)
    {
        $data = array(
            'estado' => $estado,
        );
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->update('contrato_tienda_6', $data);
    }
    function listar_contratos_by_date($from, $to)
    {
        // Get tienda data
        $tienda = tienda_id_h();

        if ($tienda == '1') {
            if ($from != null) {
                $this->db->where('contrato.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato.fecha  <=', $to);
            }
            $this->db->select('contrato.contrato_id, contrato.estado, contrato.total_mutuo, contrato.fecha, contrato.fecha_pago, contrato.tipo, contrato.dias_gracia, contrato.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato');
            $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
        }
        elseif ($tienda == '2') {
            if ($from != null) {
                $this->db->where('contrato_tienda_2.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_2.fecha  <=', $to);
            }
            $this->db->select('contrato_tienda_2.contrato_id, contrato_tienda_2.estado, contrato_tienda_2.total_mutuo, contrato_tienda_2.fecha, contrato_tienda_2.fecha_pago, contrato_tienda_2.tipo, contrato_tienda_2.dias_gracia, contrato_tienda_2.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_2');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
        }
        elseif ($tienda == '3') {
            if ($from != null) {
                $this->db->where('contrato_tienda_3.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_3.fecha  <=', $to);
            }
            $this->db->select('contrato_tienda_3.contrato_id, contrato_tienda_3.estado, contrato_tienda_3.total_mutuo, contrato_tienda_3.fecha, contrato_tienda_3.fecha_pago, contrato_tienda_3.tipo, contrato_tienda_3.dias_gracia, contrato_tienda_3.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_3');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
        }
        elseif ($tienda == '4') {
            if ($from != null) {
                $this->db->where('contrato_tienda_4.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_4.fecha  <=', $to);
            }
            $this->db->select('contrato_tienda_4.contrato_id, contrato_tienda_4.estado, contrato_tienda_4.total_mutuo, contrato_tienda_4.fecha, contrato_tienda_4.fecha_pago, contrato_tienda_4.tipo, contrato_tienda_4.dias_gracia, contrato_tienda_4.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_4');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
        }
        elseif ($tienda == '5') {
            if ($from != null) {
                $this->db->where('contrato_tienda_5.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_5.fecha  <=', $to);
            }
            $this->db->select('contrato_tienda_5.contrato_id, contrato_tienda_5.estado, contrato_tienda_5.total_mutuo, contrato_tienda_5.fecha, contrato_tienda_5.fecha_pago, contrato_tienda_5.tipo, contrato_tienda_5.dias_gracia, contrato_tienda_5.tototal_liquidado, cliente.id, cliente.nombre');
            $this->db->from('contrato_tienda_5');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function listar_contratos_perdidos()
    {
        // Get tienda data
        $tienda = tienda_id_h();

        if ($tienda == '1') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato.fecha, contrato.estado, contrato.fecha_pago, contrato.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato');
            $estados = array('perdido');
            $this->db->where_in('contrato.estado', $estados);
            $this->db->where_in('producto.tienda_actual', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '2') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_2.fecha, contrato_tienda_2.estado, contrato_tienda_2.fecha_pago, contrato_tienda_2.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_2');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_2.estado', $estados);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_2.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '3') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_3.fecha, contrato_tienda_3.estado, contrato_tienda_3.fecha_pago, contrato_tienda_3.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_3');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_3.estado', $estados);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_3.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '4') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_4.fecha, contrato_tienda_4.estado, contrato_tienda_4.fecha_pago, contrato_tienda_4.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_4');
            $this->db->where('producto.tienda_id', '4');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_4.estado', $estados);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_4.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '5') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_5.fecha, contrato_tienda_5.estado, contrato_tienda_5.fecha_pago, contrato_tienda_5.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_5');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_5.estado', $estados);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_5.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;

    }
    function listar_contratos_vigentes()
    {
        // Get tienda data
        $tienda = tienda_id_h();
        if ($tienda == '1') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato.fecha, contrato.estado, contrato.fecha_pago, contrato.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato.estado', $estados);
            $this->db->where_in('producto.tienda_id', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '2') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_2.fecha, contrato_tienda_2.estado, contrato_tienda_2.fecha_pago, contrato_tienda_2.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_2');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato_tienda_2.estado', $estados);
            $this->db->where_in('producto.tienda_id', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_2.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '3') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_3.fecha, contrato_tienda_3.estado, contrato_tienda_3.fecha_pago, contrato_tienda_3.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_3');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato_tienda_3.estado', $estados);
            $this->db->where_in('producto.tienda_id', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_3.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '4') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_4.fecha, contrato_tienda_4.estado, contrato_tienda_4.fecha_pago, contrato_tienda_4.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_4');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato_tienda_4.estado', $estados);
            $this->db->where_in('producto.tienda_id', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_4.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '5') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_5.fecha, contrato_tienda_5.estado, contrato_tienda_5.fecha_pago, contrato_tienda_5.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_5');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato_tienda_5.estado', $estados);
            $this->db->where_in('producto.tienda_actual', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_5.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '6') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_6.fecha, contrato_tienda_6.estado, contrato_tienda_6.fecha_pago, contrato_tienda_6.dias_gracia, cliente.nombre, cliente.id, cliente.telefono, cliente.celular, cliente.email');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_6');
            $estados = array('vigente', 'refrendado','gracia');
            $this->db->where_in('contrato_tienda_6.estado', $estados);
            $this->db->where_in('producto.tienda_actual', $tienda);
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_6.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_6.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function listar_contratos_perdidos_by_date($from, $to)
    {
        $tienda = tienda_id_h();

        if ($tienda == '1') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato.fecha, contrato.estado, contrato.fecha_pago, contrato.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato');
            $estados = array('perdido');
            $this->db->where_in('contrato.estado', $estados);
            $this->db->where_in('producto.tienda_actual', $tienda);
            if ($from != null) {
                $this->db->where('contrato.dias_gracia  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato.dias_gracia  <=', $to);
            }// Get tienda data
            $this->db->join('producto', 'producto.contrato_id  = contrato.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        } elseif ($tienda == '2') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_2.fecha, contrato_tienda_2.estado, contrato_tienda_2.fecha_pago, contrato_tienda_2.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_2');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_2.estado', $estados);
            if ($from != null) {
                $this->db->where('contrato_tienda_2.dias_gracia  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_2.dias_gracia  <=', $to);
            }// Get tienda data
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_2.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_2.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '3') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_3.fecha, contrato_tienda_3.estado, contrato_tienda_3.fecha_pago, contrato_tienda_3.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_3');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_3.estado', $estados);
            if ($from != null) {
                $this->db->where('contrato_tienda_3.dias_gracia  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_3.dias_gracia  <=', $to);
            }// Get tienda data
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_3.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_3.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '4') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_4.fecha, contrato_tienda_4.estado, contrato_tienda_4.fecha_pago, contrato_tienda_4.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_4');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_4.estado', $estados);
            if ($from != null) {
                $this->db->where('contrato_tienda_4.dias_gracia  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_4.dias_gracia  <=', $to);
            }// Get tienda data
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_4.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_4.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }
        elseif ($tienda == '5') {
            $this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato_tienda_5.fecha, contrato_tienda_5.estado, contrato_tienda_5.fecha_pago, contrato_tienda_5.dias_gracia, cliente.nombre, cliente.id');
            // $this->db->select('*');
            $this->db->from('contrato_tienda_5');
            $estados = array('perdido');
            $this->db->where_in('contrato_tienda_5.estado', $estados);
            if ($from != null) {
                $this->db->where('contrato_tienda_5.dias_gracia  >=', $from);
            }
            if ($to != null) {
                $this->db->where('contrato_tienda_5.dias_gracia  <=', $to);
            }// Get tienda data
            $this->db->join('producto', 'producto.contrato_id  = contrato_tienda_5.contrato_id');
            $this->db->join('cliente', 'cliente.id = contrato_tienda_5.cliente_id');
            $this->db->order_by("producto.contrato_id", "asc");
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_contrato($data)
    {
        //user data
        $user_id = get_user_id();
        // Get tienda data
        $tienda = tienda_id_h();

        $datos_de_contrato = array(
            //'contrato_id'=> $data['contrato_id'],
            'cliente_id' => $data['cliente_id'],
            'fecha' => $data['fecha_contrato_h'],
            'numero_de_productos' => $data['numero_de_productos'],
            'almacenaje' => $data['almacenaje'],
            'total_mutuo' => $data['total_mutuo'],
            'total_avaluo' => $data['total_avaluo'],
            'plazo' => $data['plazo'],
            'tasa_interes' => $data['tasa_interes'],
            'pago_interes' => $data['pago_interes'],
            'costo_almacenaje' => $data['costo_almacenaje'],
            'pago_iva' => $data['pago_iva'],
            'referendo' => $data['refrendo_h'],
            'desempeno' => $data['desempeno'],
            'fecha_pago' => $data['fecha_pago'],
            'dias_gracia' => $data['dias_gracia'],
            'tipo' => $data['tipo'],
            'cotitular' => $data['cotitular'],
            'tienda_id' => $tienda,
            'estado' => $data['estado'],
            'user_id' => $user_id
        );



        // insertamon en la base de datos
        if ($tienda == '1') {
            $this->db->insert('contrato', $datos_de_contrato);
        } elseif ($tienda == '2') {
            $this->db->insert('contrato_tienda_2', $datos_de_contrato);
        }
        elseif ($tienda == '3') {
            $this->db->insert('contrato_tienda_3', $datos_de_contrato);
        }
        elseif ($tienda == '4') {
            $this->db->insert('contrato_tienda_4', $datos_de_contrato);
        }
        elseif ($tienda == '5') {
            $this->db->insert('contrato_tienda_5', $datos_de_contrato);
        }
        elseif ($tienda == '6') {
            $this->db->insert('contrato_tienda_6', $datos_de_contrato);
        }


        // if tienda id_1 intert
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    function guardar_editar_contrato($data)
    {
        $datos_de_contrato = array(
            'almacenaje' => $data['almacenaje'],
            'total_mutuo' => $data['total_mutuo'],
            'total_avaluo' => $data['total_avaluo'],
            'plazo' => $data['plazo'],
            'tasa_interes' => $data['tasa_interes'],
            'pago_interes' => $data['pago_interes'],
            'costo_almacenaje' => $data['costo_almacenaje'],
            'pago_iva' => $data['pago_iva'],
            'referendo' => $data['refrendo_h'],
            'desempeno' => $data['desempeno'],
            'fecha_pago' => $data['fecha_pago'],
            'dias_gracia' => $data['dias_gracia'],
            'tipo' => $data['tipo'],
            'cotitular' => $data['cotitular']
        );

        $this->db->where('contrato_id', $data['contrato_id']);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $datos_de_contrato);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $datos_de_contrato);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $datos_de_contrato);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $datos_de_contrato);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $datos_de_contrato);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $datos_de_contrato);
        }


    }
    function guardar_factura($data)
    {

        $serie_factura = 'A';
        $tabla_de_factura = 'facturas';

        if (isset($data['serie_factura'])) {
            $serie_factura = $data['serie_factura'];

            switch ($serie_factura) {
                case 'A':
                    $tabla_de_factura = 'facturas';
                    break;
                case 'B':
                    $tabla_de_factura = 'facturas';
                    break;
                case 'R':
                    $tabla_de_factura = 'facturas_r';
                    break;
                case 'CN':
                    $tabla_de_factura = 'facturas_tienda_2';
                    break;
                case 'RE':
                    $tabla_de_factura = 'facturas_tienda_2_r';
                    break;
                case 'CN2':
                    $tabla_de_factura = 'facturas_tienda_3_cn';
                    break;
                case 'MN':
                    $tabla_de_factura = 'facturas_tienda_3';
                    break;
                case 'RM':
                    $tabla_de_factura = 'facturas_tienda_3_r';
                    break;
                case 'AR':
                    $tabla_de_factura = 'facturas_tienda_4_r';
                    break;
                case 'AG':
                    $tabla_de_factura = 'facturas_tienda_4';
                    break;
                case 'VN':
                    $tabla_de_factura = 'facturas_tienda_6';
                    break;
                case 'VNR':
                    $tabla_de_factura = 'facturas_tienda_6_r';
                    break;
                case 'MX':
                    $tabla_de_factura = 'facturas_tienda_5';
                    break;
                case 'MXR':
                    $tabla_de_factura = 'facturas_tienda_5_r';
                    break;

            }


        }
        $datos_de_factura = array(
            //'factura_id' => $data['no_factura'],
            'cliente_id' => $data['cliente_id'],
            'contrato_id' => $data['contrato_id'],
            'fecha' => $data['fecha'],
            'detalle' => $data['detalle'],
            'intereses' => $data['interese'],
            'almacenaje' => $data['almacenaje'],
            'mora' => $data['mora'],
            'recuperacion' => $data['recuperacion'],
            'subtotal' => $data['sub_total'],
            'descuento' => $data['descuento'],
            'total' => $data['total'],
            'tipo' => $data['tipo'],
            'serie' => $serie_factura

        );
        // insertamon en la base de datos
        $this->db->insert($tabla_de_factura, $datos_de_factura);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    function guardar_recibo($data)
    {
        if(isset($data['contrato_id'])){}
        else{
            $data['contrato_id'] ='0';
        }
        if(isset($data['producto_id'])){}
        else{
            $data['producto_id'] ='0';
        }

        $datos_de_recibo = array(
            'cliente_id' => $data['cliente_id'],
            'contrato_id' => $data['contrato_id'],
            'producto_id' => $data['producto_id'],
            'fecha_recibo' => $data['fecha'],
            'monto' => $data['monto_recibo'],
            'monto_en_letras' => $data['monto_recibo_letras'],
            'tipo' => $data['tipo'],
            'detalle' => $data['detalle'],

        );
        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $this->db->insert('recibos', $datos_de_recibo);
        } elseif ($tienda == '2') {
            $this->db->insert('recibos_tienda_2', $datos_de_recibo);
        }
        elseif ($tienda == '3') {
            $this->db->insert('recibos_tienda_3', $datos_de_recibo);
        }
        elseif ($tienda == '4') {
            $this->db->insert('recibos_tienda_4', $datos_de_recibo);
        }
        elseif ($tienda == '5') {
            $this->db->insert('recibos_tienda_5', $datos_de_recibo);
        }
        elseif ($tienda == '6') {
            $this->db->insert('recibos_tienda_6', $datos_de_recibo);
        }

        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    function get_contratos_by_cliente_id($cliente_id)
    {
        $this->db->where('cliente_id', $cliente_id);
        // Get tienda data
        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('contrato');
        } elseif ($tienda == '2') {
            $query = $this->db->get('contrato_tienda_2');
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('contrato_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('contrato_tienda_4');
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('contrato_tienda_5');
        }
        elseif ($tienda == '6') {
            $query = $this->db->get('contrato_tienda_6');
        }

        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_facturas_by_cliente_id($cliente_id)
    {
        $this->db->where('cliente_id', $cliente_id);

        $tienda = tienda_id_h();
        // insertamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('facturas');
        } elseif ($tienda == '2') {
            $query = $this->db->get('facturas_tienda_2');
        }elseif ($tienda == '3') {
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
    }

    function get_info_contrato($contrato_id)
    {
        $this->db->where('contrato_id', $contrato_id);
        // Get tienda data
        $tienda = tienda_id_h();
        // insertamon en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('contrato');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato_tienda_2');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        } elseif ($tienda == '2') {
            $query = $this->db->get('contrato_tienda_2');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('contrato_tienda_3');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('contrato_tienda_4');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('contrato_tienda_5');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '6') {
            $query = $this->db->get('contrato_tienda_6');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
    }
    function get_info_contrato_sin_imagen($contrato_id, $tienda_origen)
    {
        $this->db->where('contrato_id', $contrato_id);
        // Get tienda data
        $tienda = $tienda_origen;
        // insertamon en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('contrato');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato_tienda_2');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        } elseif ($tienda == '2') {
            $query = $this->db->get('contrato_tienda_2');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('contrato_tienda_3');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('contrato_tienda_4');
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                $query = $this->db->get('contrato');
                if ($query->num_rows() > 0) return $query;
                else return false;
            }
        }
    }
    function actualizar_fecha_contrato($contrato_id, $nueva_fecha)
    {
        //tomamos nueva fecha y la modificamos para obtener nuevos dias de gracia
        $nueva_fecha_db = new DateTime($nueva_fecha);
        $dias_gracia_dt = new DateTime($nueva_fecha);
        $nuevo_dias_gracia = $dias_gracia_dt->modify('+7 days');

        $data = array(
            'fecha_pago' => $nueva_fecha_db->format('Y-m-d'),
            'dias_gracia' => $nuevo_dias_gracia->format('Y-m-d'),
        );
        //actualizamos tabla segun id de contrato
        $this->db->where('contrato_id', $contrato_id);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
    }
    function actualizar_estado_contrato($contrato_id, $estado)
    {

        $data = array(
            'estado' => $estado,
        );

        $this->db->where('contrato_id', $contrato_id);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $data);
        }
    }
    function actualizar_monto_contrato($contrato_id, $monto)
    {
        $data = array(
            'total_mutuo' => $monto,
        );
        $this->db->where('contrato_id', $contrato_id);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $data);
        }
    }
    function actualizar_contrato_refrendo($datos)
    {
        $data = array(
            'pago_interes' => $datos['pago_interes'],
            'costo_almacenaje' => $datos['costo_almacenaje'],
            'pago_iva' => $datos['pago_iva'],
            'referendo' => $datos['refrendo_h'],
            'desempeno' => $datos['desempeno'],
            'fecha_pago' => $datos['fecha_pago'],
            'fecha_pago_anterior' => $datos['fecha_pago_anterior'],
            'dias_gracia' => $datos['dias_gracia'],
            'dias_gracia_anterior' => $datos['dias_gracia_anterior'],
            'estado' => $datos['estado'],
            'estado_anterior' => $datos['estado_anterior'],
        );

        $this->db->where('contrato_id', $datos['contrato_id']);

        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $this->db->update('contrato_tienda_6', $data);
        }

    }
    function actualizar_contrato_anular_factura($datos)
    {

        if ($datos['tipo'] == ' desenmpeno') {
            $data = array(
                'estado' => $datos['estado'],
            );

        } else {
            $data = array(
                'fecha_pago' => $datos['fecha_pago'],
                'dias_gracia' => $datos['dias_gracia'],
                'estado' => $datos['estado'],
            );
        }

        $this->db->where('contrato_id', $datos['contrato_id']);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $data);
        }
    }
    function actualizar_contrato_desempeno($datos)
    {
        $fecha = new DateTime();
        $data = array(
            'estado' => $datos['estado'],
            'fecha_desempeno' => $fecha->format('Y-m-d'),
            'estado_anterior' => $datos['estado_anterior'],
            'fecha_pago_anterior' => $datos['fecha_pago_anterior'],
            'dias_gracia_anterior' => $datos['dias_gracia_anterior'],
        );

        $this->db->where('contrato_id', $datos['contrato_id']);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $data);
        }
    }
    function actualizar_estado_liquidacion($datos)
    {
        $data = array(
            'tototal_liquidado' => $datos['tototal_liquidado'],
            'total_mutuo' => $datos['total_mutuo'],
            'estado' => $datos['estado'],

        );
        $this->db->where('contrato_id', $datos['contrato_id']);
        // Get tienda data
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $query = $this->db->update('contrato', $data);
        } elseif ($tienda == '2') {
            $query = $this->db->update('contrato_tienda_2', $data);
        }
        elseif ($tienda == '3') {
            $query = $this->db->update('contrato_tienda_3', $data);
        }
        elseif ($tienda == '4') {
            $query = $this->db->update('contrato_tienda_4', $data);
        }
        elseif ($tienda == '5') {
            $query = $this->db->update('contrato_tienda_5', $data);
        }
        elseif ($tienda == '6') {
            $query = $this->db->update('contrato_tienda_6', $data);
        }

    }
    function numero_ultimo_contrato()
    {
        $this->db->order_by('contrato_id', 'DESC');
        $tienda = tienda_id_h();
        // insertamon en la base de datos
        if ($tienda == '1') {
            $query = $this->db->get('contrato');
        } elseif ($tienda == '2') {
            $query = $this->db->get('contrato_tienda_2');
        }
        elseif ($tienda == '3') {
            $query = $this->db->get('contrato_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->get('contrato_tienda_4');
        }
        elseif ($tienda == '5') {
            $query = $this->db->get('contrato_tienda_5');
        }
        elseif ($tienda == '6') {
            $query = $this->db->get('contrato_tienda_6');
        }
        if ($query->num_rows() > 0) return $query->row();
        else return false;
    }
    function guardar_seguimiento($data)
    {
        $datos_de_seguimiento = array(
            'cliente_id' => $data['cliente_id'],
            'contrato_id' => $data['contrato_id'],
            'fecha_seguimiento' => $data['fecha_seguimiento'],
            'accion' => $data['accion'],
            'comentario' => $data['comentario']
        );
        // insertamon en la base de datos
        $this->db->insert('seguimiento', $datos_de_seguimiento);
    }
    function get_resultados_seguimiento($contrato_id)
    {
        $this->db->where('contrato_id', $contrato_id);
        $query = $this->db->get('seguimiento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_log($datos)
    {
        $fecha = New DateTime();
        $data = array(
            'fecha_log' => $fecha->format('Y-m-d'),
            'accion_log' => $datos['accion'],
            'contrato_id' => $datos['contrato'],
            'cliente_id' => $datos['cliente'],
            'user_id' => $datos['usuario'],
        );
        // insertamon en la base de datos
        $this->db->insert('log_contratos', $data);
    }
    function get_logs()
    {
        $query = $this->db->get('log_contratos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function contratos_excel()
    {
        $tienda = tienda_id_h();
        $fields = $this->db->field_data('contrato');

        if ($tienda == '1') {
            $query = $this->db->select('*')->get('contrato');
        } elseif ($tienda == '2') {
            $query = $this->db->select('*')->get('contrato_tienda_2');

        }
        elseif ($tienda == '3') {
            $query = $this->db->select('*')->get('contrato_tienda_3');
        }
        elseif ($tienda == '4') {
            $query = $this->db->select('*')->get('contrato_tienda_4');

        }
        elseif ($tienda == '5') {
            $query = $this->db->select('*')->get('contrato_tienda_5');

        }
        elseif ($tienda == '6') {
            $query = $this->db->select('*')->get('contrato_tienda_6');

        }

        return array("fields" => $fields, "query" => $query);
    }
    public function contratos_html_excel($estado)
    {
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            $this->db->from('contrato');
            if($estado){
                $this->db->where('estado', $estado);
            }
            //$this->db->join('cliente', 'cliente.id = facturas_r.cliente_id','Left');
            //$this->db->order_by("facturas_r.fecha",'ASC');
        } elseif ($tienda == '2') {
            $this->db->from('contrato_tienda_2');
            if($estado){
                $this->db->where('estado', $estado);
            }
            //$this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id','Left');
            //$this->db->order_by("facturas_tienda_2_r.fecha",'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function contratos_html_excel_by_date($from, $to, $estado)
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
            $this->db->from('contrato_tienda_2');
            //$this->db->join('cliente', 'cliente.id = facturas_r.cliente_id','Left');
            $this->db->order_by("facturas_r.fecha",'ASC');
        } elseif ($tienda == '2') {
            if ($from != null) {
                $this->db->where('facturas_tienda_2_r.fecha  >=', $from);
            }
            if ($to != null) {
                $this->db->where('facturas_tienda_2_r.fecha  <=', $to);
            }
            $this->db->from('facturas_tienda_2_r');
            //$this->db->join('cliente', 'cliente.id = facturas_tienda_2_r.cliente_id','Left');
            $this->db->order_by("facturas_tienda_2_r.fecha",'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

}