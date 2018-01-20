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
		$this->db->select('contrato.contrato_id, contrato.estado, contrato.total_mutuo, contrato.fecha, contrato.fecha_pago, contrato.tipo, contrato.dias_gracia, contrato.tototal_liquidado, cliente.id, cliente.nombre');
		$this->db->from('contrato');
		$this->db->join('cliente', 'cliente.id = contrato.cliente_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;


		$query = $this->db->get('contrato');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function listar_contratos_by_date($from, $to)
	{
		if ($from != null)
		{
			$this->db->where('contrato.fecha  >=', $from);
		}
		if ($to != null)
		{
			$this->db->where('contrato.fecha  <=', $to);
		}
		$this->db->from('contrato');
		$this->db->join('cliente', 'cliente.id = contrato.cliente_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;


		$this->db->from('contrato');
		$this->db->join('cliente', 'cliente.id = contrato.cliente_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;


		$query = $this->db->get('contrato');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function listar_contratos_perdidos()
	{
		$this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato.fecha, contrato.estado, contrato.fecha_pago, contrato.dias_gracia, cliente.nombre, cliente.id');
		$this->db->from('contrato');
		$this->db->where('contrato.estado', 'perdido');
		$this->db->join('cliente', 'cliente.id = contrato.cliente_id');
		$this->db->join('producto', 'producto.contrato_id  = contrato.contrato_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;

	}
	function listar_contratos_perdidos_by_date($from, $to)
	{
		if ($from != null)
		{
			$this->db->where('contrato.dias_gracia  >=', $from);
		}
		if ($to != null)
		{
			$this->db->where('contrato.dias_gracia  <=', $to);
		}
		$this->db->select('producto.nombre_producto, producto.categoria, producto.descripcion, producto.mutuo, producto.contrato_id,  contrato.fecha, contrato.estado, contrato.fecha_pago, contrato.dias_gracia, cliente.nombre, cliente.id');
		$this->db->from('contrato');
		$this->db->where('contrato.estado', 'perdido');
		$this->db->join('cliente', 'cliente.id = contrato.cliente_id');
		$this->db->join('producto', 'producto.contrato_id  = contrato.contrato_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function guardar_contrato($data)
	{
		$datos_de_contrato = array(
			//'contrato_id'=> $data['contrato_id'],
			'cliente_id'          => $data['cliente_id'],
			'fecha'               => $data['fecha_contrato_h'],
			'numero_de_productos' => $data['numero_de_productos'],
			'almacenaje'          => $data['almacenaje'],
			'total_mutuo'         => $data['total_mutuo'],
			'total_avaluo'        => $data['total_avaluo'],
			'plazo'               => $data['plazo'],
			'tasa_interes'        => $data['tasa_interes'],
			'pago_interes'        => $data['pago_interes'],
			'costo_almacenaje'    => $data['costo_almacenaje'],
			'pago_iva'            => $data['pago_iva'],
			'referendo'           => $data['refrendo_h'],
			'desempeno'           => $data['desempeno'],
			'fecha_pago'          => $data['fecha_pago'],
			'dias_gracia'         => $data['dias_gracia'],
			'tipo'                => $data['tipo'],
			'cotitular'           => $data['cotitular']
		);
		// insertamon en la base de datos
		$this->db->insert('contrato', $datos_de_contrato);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
	function guardar_editar_contrato($data)
	{
		$datos_de_contrato = array(
			'almacenaje'       => $data['almacenaje'],
			'total_mutuo'      => $data['total_mutuo'],
			'total_avaluo'     => $data['total_avaluo'],
			'plazo'            => $data['plazo'],
			'tasa_interes'     => $data['tasa_interes'],
			'pago_interes'     => $data['pago_interes'],
			'costo_almacenaje' => $data['costo_almacenaje'],
			'pago_iva'         => $data['pago_iva'],
			'referendo'        => $data['refrendo_h'],
			'desempeno'        => $data['desempeno'],
			'fecha_pago'       => $data['fecha_pago'],
			'dias_gracia'      => $data['dias_gracia'],
			'tipo'             => $data['tipo'],
			'cotitular'        => $data['cotitular']
		);

		$this->db->where('contrato_id', $data['contrato_id']);
		$query = $this->db->update('contrato', $datos_de_contrato);

	}
	function guardar_factura($data)
	{

		$serie_factura = 'A';

		if (isset($data['serie_factura']))
		{
			$serie_factura = $data['serie_factura'];
		}

		$datos_de_factura = array(
			'factura_id'   => $data['no_factura'],
			'cliente_id'   => $data['cliente_id'],
			'contrato_id'  => $data['contrato_id'],
			'fecha'        => $data['fecha'],
			'detalle'      => $data['detalle'],
			'intereses'    => $data['interese'],
			'almacenaje'   => $data['almacenaje'],
			'mora'         => $data['mora'],
			'recuperacion' => $data['recuperacion'],
			'subtotal'     => $data['sub_total'],
			'descuento'    => $data['descuento'],
			'total'        => $data['total'],
			'tipo'         => $data['tipo'],
			'serie'        => $serie_factura

		);
		// insertamon en la base de datos
		$this->db->insert('facturas', $datos_de_factura);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
	function guardar_recibo($data)
	{
		$datos_de_recibo = array(
			'cliente_id'      => $data['cliente_id'],
			'contrato_id'     => $data['contrato_id'],
			'fecha_recibo'    => $data['fecha'],
			'monto'           => $data['monto_recibo'],
			'monto_en_letras' => $data['monto_recibo_letras'],
			'tipo'            => $data['tipo'],
			'detalle'         => $data['detalle'],

		);
		// insertamon en la base de datos
		$this->db->insert('recibos', $datos_de_recibo);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
	function get_contratos_by_cliente_id($cliente_id)
	{
		$this->db->where('cliente_id', $cliente_id);
		$query = $this->db->get('contrato');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_facturas_by_cliente_id($cliente_id)
	{
		$this->db->where('cliente_id', $cliente_id);
		$query = $this->db->get('facturas');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_recibos_by_cliente_id($cliente_id)
	{

		$this->db->select('recibos.recibo_id, recibos.estado, recibos.fecha_recibo, recibos.contrato_id, recibos.monto, recibos.tipo, contrato.total_mutuo');
		$this->db->from('recibos');
		$this->db->join('contrato', 'recibos.contrato_id = contrato.contrato_id');
		$this->db->where('recibos.cliente_id', $cliente_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_info_contrato($contrato_id)
	{
		$this->db->where('contrato_id', $contrato_id);
		$query = $this->db->get('contrato');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function actualizar_fecha_contrato($contrato_id, $nueva_fecha)
	{
		//tomamos nueva fecha y la modificamos para obtener nuevos dias de gracia
		$nueva_fecha_db    = new DateTime($nueva_fecha);
		$dias_gracia_dt    = new DateTime($nueva_fecha);
		$nuevo_dias_gracia = $dias_gracia_dt->modify('+7 days');

		$data = array(
			'fecha_pago'  => $nueva_fecha_db->format('Y-m-d'),
			'dias_gracia' => $nuevo_dias_gracia->format('Y-m-d'),
		);
		//actualizamos tabla segun id de contrato
		$this->db->where('contrato_id', $contrato_id);
		$this->db->update('contrato', $data);
	}
	function actualizar_estado_contrato($contrato_id, $estado)
	{

		$data = array(
			'estado' => $estado,
		);

		$this->db->where('contrato_id', $contrato_id);
		$this->db->update('contrato', $data);

	}
	function actualizar_monto_contrato($contrato_id, $monto)
	{
		$data = array(
			'total_mutuo' => $monto,
		);
		$this->db->where('contrato_id', $contrato_id);
		$this->db->update('contrato', $data);
	}
	function actualizar_contrato_refrendo($datos)
	{
		$data = array(
			'pago_interes'         => $datos['pago_interes'],
			'costo_almacenaje'     => $datos['costo_almacenaje'],
			'pago_iva'             => $datos['pago_iva'],
			'referendo'            => $datos['refrendo_h'],
			'desempeno'            => $datos['desempeno'],
			'fecha_pago'           => $datos['fecha_pago'],
			'fecha_pago_anterior'  => $datos['fecha_pago_anterior'],
			'dias_gracia'          => $datos['dias_gracia'],
			'dias_gracia_anterior' => $datos['dias_gracia_anterior'],
			'estado'               => $datos['estado'],
			'estado_anterior'      => $datos['estado_anterior'],
		);

		$this->db->where('contrato_id', $datos['contrato_id']);
		$this->db->update('contrato', $data);
	}
	function actualizar_contrato_anular_factura($datos)
	{

		if ($datos['tipo'] == ' desenmpeno')
		{
			$data = array(
				'estado' => $datos['estado'],
			);

		}
		else
		{
			$data = array(
				'fecha_pago'  => $datos['fecha_pago'],
				'dias_gracia' => $datos['dias_gracia'],
				'estado'      => $datos['estado'],
			);
		}

		$this->db->where('contrato_id', $datos['contrato_id']);
		$this->db->update('contrato', $data);
	}
	function actualizar_contrato_desempeno($datos)
	{
		$data = array(
			'estado'               => $datos['estado'],
			'estado_anterior'      => $datos['estado_anterior'],
			'fecha_pago_anterior'  => $datos['fecha_pago_anterior'],
			'dias_gracia_anterior' => $datos['dias_gracia_anterior'],
		);

		$this->db->where('contrato_id', $datos['contrato_id']);
		$this->db->update('contrato', $data);
	}
	function actualizar_estado_liquidacion($datos)
	{
		$data = array(
			'tototal_liquidado' => $datos['tototal_liquidado'],
			'total_mutuo'       => $datos['total_mutuo'],
			'estado'            => $datos['estado'],

		);
		$this->db->where('contrato_id', $datos['contrato_id']);
		$this->db->update('contrato', $data);

	}
	function numero_ultimo_contrato()
	{
		$this->db->order_by('contrato_id', 'DESC');
		$query = $this->db->get('contrato');
		if ($query->num_rows() > 0) return $query->row();
		else return false;
	}
	function guardar_seguimiento($data)
	{
		$datos_de_seguimiento = array(
			'cliente_id'        => $data['cliente_id'],
			'contrato_id'       => $data['contrato_id'],
			'fecha_seguimiento' => $data['fecha_seguimiento'],
			'accion'            => $data['accion'],
			'comentario'        => $data['comentario']
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
	function guardar_log($datos){
		$fecha = New DateTime();
		$data = array(
			'fecha_log'=> $fecha->format('Y-m-d'),
			'accion_log'=>$datos['accion'],
			'contrato_id'=>$datos['contrato'],
			'cliente_id'=>$datos['cliente'],
			'user_id'=>$datos['usuario'],
		);
		// insertamon en la base de datos
		$this->db->insert('log_contratos', $data);
	}
	function get_logs(){
		$query = $this->db->get('log_contratos');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function contratos_excel()
	{
		$fields = $this->db->field_data('contrato');
		$query  = $this->db->select('*')->get('contrato');

		return array("fields" => $fields, "query" => $query);
	}

}