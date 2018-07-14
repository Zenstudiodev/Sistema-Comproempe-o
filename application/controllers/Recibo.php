<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/09/2017
 * Time: 12:34 PM
 */

class Recibo extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
		// Modelos
		$this->load->model('Cliente_model');
		$this->load->model('Productos_model');
		$this->load->model('Contratos_model');
		$this->load->model('Recibo_model');
	}

	function index()
	{
		$data['recibos'] = $this->Recibo_model->listar_recibos();

		echo $this->templates->render('admin/lista_recibos', $data);
	}

	function guardar_recibo_abono()
	{
		//Datos de session
		$data   = compobarSesion();

		$datos_recibo = array(
			'cliente_id'          => $this->input->post('cliente_id'),
			'contrato_id'         => $this->input->post('contrato_id'),
			'fecha'               => $this->input->post('fecha'),
			'monto_recibo'        => $this->input->post('monto_recibo'),
			'monto_recibo_letras' => $this->input->post('total_en_letras_recibo_i'),
			'tipo'                => 'abono',
			'detalle'             => 'Abono a capital a contrato: ' . $this->input->post('contrato_id')

		);

		$this->Contratos_model->guardar_recibo($datos_recibo);

		$contrato = $this->Contratos_model->get_info_contrato($datos_recibo['contrato_id']);
		$contrato = $contrato->row();

		$montoactual = $contrato->total_mutuo;

		$nuevo_monto = $montoactual - $datos_recibo['monto_recibo'];

		//actualizar monto de contrato
		$this->Contratos_model->actualizar_monto_contrato($datos_recibo['contrato_id'], $nuevo_monto);

		//guardamos en el log de contraros
		$datos_log = array(
			'accion'=> 'abono',
			'contrato'=> $this->input->post('contrato_id'),
			'cliente'=>  $this->input->post('cliente_id'),
			'usuario'=> $data['user_id'],
		);
		$this->Contratos_model->guardar_log($datos_log);

		//redrigimos a detalle de cliente
		redirect(base_url() . 'cliente/detalle/' . $datos_recibo['cliente_id']);

	}

	function imprimir_recibo()
	{
		$data = compobarSesion();
		//ID Contrato
		$data['segmento_cliente'] = $this->uri->segment(3);
		//ID Contrato
		$data['segmento_recibo'] = $this->uri->segment(4);

		$data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
		$data['recibo']  = $this->Recibo_model->get_info_recibo($data['segmento_recibo']);

		$recibo           = $data['recibo']->row();
		$data['contrato'] = $this->Contratos_model->get_info_contrato($recibo->contrato_id);


		echo $this->templates->render('admin/imprimir_recibo', $data);
	}

	function anular_recibo()
	{
		$data = compobarSesion();
		//ID Contrato
		$data['segmento_cliente'] = $this->uri->segment(3);
		//ID Contrato
		$data['segmento_recibo'] = $this->uri->segment(4);

		$this->Recibo_model->anular_recibo($data['segmento_recibo']);

		//redrigimos a detalle de cliente
		redirect(base_url() . 'cliente/detalle/' . $data['segmento_cliente']);


	}
	function recibos_excel()
	{
		$fecha = new DateTime();
		to_excel($this->Recibo_model->recibos_excel(), "recibos_".$fecha->format('Y-m-d'));
	}


}