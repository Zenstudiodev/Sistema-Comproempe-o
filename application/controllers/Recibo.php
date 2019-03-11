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
		$this->load->model('Caja_model');
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

        $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);

		$contrato = $this->Contratos_model->get_info_contrato($datos_recibo['contrato_id']);
		$contrato = $contrato->row();

		$montoactual = $contrato->total_mutuo;

		$nuevo_monto = $montoactual - $datos_recibo['monto_recibo'];

		//actualizar monto de contrato
		$this->Contratos_model->actualizar_monto_contrato($datos_recibo['contrato_id'], $nuevo_monto);

		//guardamos log de caja de abono a capital
        $datos_abono = array(
            'recibo_id' => $recibo_id,
            'monto' => $datos_recibo['monto_recibo'],
            'id_contrato' => $this->input->post('contrato_id'),
            'saldo' => $nuevo_monto,
        );
        $this->Caja_model->guardar_abonos_a_capital($datos_abono);

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

        //datos del recibo
		$recibo_data= $this->Recibo_model->get_info_recibo($data['segmento_recibo']);
        $recibo_data = $recibo_data->row();
        $tipo_recibo = $recibo_data->tipo;
        //datos del contrato
        $contrato_info = $this->Contratos_model->get_info_contrato($recibo_data->contrato_id);
        $contrato_info = $contrato_info->row();


        switch ($tipo_recibo) {
            case 'desempeno':
                echo "es desempeno";
                break;
            case 'venta':
                echo "es venta";
                break;
            case 'abono':
               // echo "es abono";
                $nuevo_monto = $contrato_info->total_mutuo + $recibo_data->monto;
                //anulamos el recibo
                $this->Recibo_model->anular_recibo($data['segmento_recibo']);
                //agregamos el monto del recibo al mutuo del contrato
                $this->Contratos_model->actualizar_monto_contrato($recibo_data->contrato_id, $nuevo_monto);
                break;
            case 'liquidacion':
                echo "es de liquidacion";
                break;
            case 'apartado':
                //echo "es apartado";
                $productos_apartados = $this->Productos_model->get_productos_apartados_by_recibo($recibo_data->recibo_id);
                foreach ($productos_apartados->result() as $producto) {
                    $nuevo_monto_apartado ='0';
                  //  echo $producto->producto_id;
                    //actualizamos el valor del apartado del producto
                    $datos_abono_apartado = array(
                        'producto_id' => $producto->producto_id,
                        'apartado' => $nuevo_monto_apartado
                    );
                    $this->Productos_model->abonar_producto_apartado($datos_abono_apartado);
                    $this->Productos_model->liberar_producto_apartado($producto->producto_id);
                }
                //anulamos el recibo
                $this->Recibo_model->anular_recibo($data['segmento_recibo']);
                break;
            case 'abono_apartado':
                //echo "es abono de apartado";
                //obtenemos los datos de producto asignados al recibo
                $producto_abonado = $this->Productos_model->datos_de_producto($recibo_data->producto_id);
                $producto_abonado = $producto_abonado->row();
                $nuevo_monto_apartado = $producto_abonado->apartado -$recibo_data->monto;

                //actualizamos el valor del apartado del producto
                $datos_abono_apartado = array(
                    'producto_id' => $producto_abonado->producto_id,
                    'apartado' => $nuevo_monto_apartado
                );
                $this->Productos_model->abonar_producto_apartado($datos_abono_apartado);

                //anulamos el recibo
                $this->Recibo_model->anular_recibo($data['segmento_recibo']);
                break;
        }
        //print_contenido($recibo_data);
        //print_contenido($contrato_info);

		//redrigimos a detalle de cliente
		redirect(base_url() . 'cliente/detalle/' . $data['segmento_cliente']);


	}
	function recibos_excel()
	{
		$fecha = new DateTime();
		to_excel($this->Recibo_model->recibos_excel(), "recibos_".$fecha->format('Y-m-d'));
	}


}