<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 15/06/2017
 * Time: 11:35 AM
 */
class Cliente extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
		// Modelos
		$this->load->model('Cliente_model');
		$this->load->model('Productos_model');
		$this->load->model('Contratos_model');
		$this->load->model('Factura_model');
		$this->load->model('Recibo_model');
        $this->load->library('NumeroALetras');
	}

	function index()
	{
		$data = compobarSesion();

		if ($this->uri->segment(3))
		{
			$data['from'] = $this->uri->segment(3);
		}
		if ($this->uri->segment(4))
		{
			$data['to'] = $this->uri->segment(4);
		}

		if ($this->uri->segment(3) && $this->uri->segment(4))
		{
			$data['clientes'] = $this->Cliente_model->listar_clientes_by_date($data['from'], $data['to']);
		}
		else
		{
			$data['clientes'] = $this->Cliente_model->listar_clientes();
		}

		echo $this->templates->render('admin/lista_clientes', $data);
	}
	function lista_completa()
	{
		$data             = compobarSesion();
		$data['clientes'] = $this->Cliente_model->listar_clientes();

		echo $this->templates->render('admin/lista_completa', $data);
	}
	function Crear()
	{
		$data = compobarSesion();
		echo $this->templates->render('admin/nuevo_cliente', $data);
	}
	function Guardar()
	{
		$data       = array(
			'nombre'           => $this->input->post('nombre'),
			'dpi'              => $this->input->post('dpi'),
			'nit'              => $this->input->post('nit'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'celular'          => $this->input->post('celular'),
			'telefono'         => $this->input->post('telefono'),
			'email'            => $this->input->post('email'),
			'direccion'        => $this->input->post('direccion'),
			'publicidad'       => $this->input->post('publicidad'),
			'ciudad'       => $this->input->post('ciudad'),
			'zona'       => $this->input->post('zona'),
			'colonia'       => $this->input->post('colonia'),
		);
		$cliente_id = $this->Cliente_model->crear_cliente($data);


		redirect(base_url() . 'cliente/detalle/' . $cliente_id);
	}
	function datos_cliente($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('cliente');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function Detalle()
	{
		$data = compobarSesion();
		//obtenemos id cliente desde url
		$data['segmento'] = $this->uri->segment(3);
		// si no hay id de cliente regresamos a la lista de clietes
		if (!$data['segmento'])
		{
			redirect(base_url() . 'cliente/');
		}
		else
		{
			$data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento']);
		}
		//empeños
		$data['enmpenos'] = $this->Productos_model->get_enmpenos($data['segmento']);
		//contratos
		$data['contratos'] = $this->Contratos_model->get_contratos_by_cliente_id($data['segmento']);
		//Facturas
		$data['facturas'] = $this->Contratos_model->get_facturas_by_cliente_id($data['segmento']);

		//Facturas Liquidacion
		$data['facturas_l'] = $this->Factura_model->get_facturas_liquidacion_by_cliente_id($data['segmento']);
		$data['facturas_l_r'] = $this->Factura_model->get_facturas_liquidacion_r_by_cliente_id($data['segmento']);

		//Recibos
		$data['recibos']        = $this->Recibo_model->get_recibos_enmpeno_by_cliente_id($data['segmento']);
		$data['recibos_liquidacion']        = $this->Recibo_model->get_recibos_liquidacion_by_client_id($data['segmento']);

		$data['recibos_apartado']        = $this->Recibo_model->get_recibos_apartado_by_client_id($data['segmento']);
		$data['productos_apartado']        = $this->Productos_model->get_porductos_apartado_by_client_id($data['segmento']);
		$data['Numero_empenos'] = $this->Cliente_model->listar_empenos($data['segmento']);
		if ($this->session->flashdata('error'))
		{
			$data['error'] = $this->session->flashdata('error');
		}

		echo $this->templates->render('admin/detalle_cliente', $data);

	}
	function firmar(){
        $data = compobarSesion();
        //obtenemos id cliente desde url
        $data['cliente_id'] = $this->uri->segment(3);
        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['cliente_id']);
        echo $this->templates->render('admin/firmar', $data);
    }
    function guardar_firma(){
	    print_contenido($_POST);


        //$image = file_get_contents($_FILES['imagen']['tmp_name']);
        $encoded_image = explode(",", $_POST['imagen'])[1];
        $decoded_image = base64_decode($encoded_image);
        $id_cliente = $_POST['id_cliente'];
        $this->Cliente_model->cliente_firmo($id_cliente);
       // $numero_foto =$_POST['img_number'];
        file_put_contents('/home2/comproempeno/public_html/firmas/'.$id_cliente.'_f.png', $decoded_image);
        //file_put_contents('/home2/comproempeno/public_html/firmas/'.$id_cliente.'_f.png', $image);
    }
	function Editar()
	{
		$data = compobarSesion();
		//obtenemos id cliente desde url
		$data['segmento'] = $this->uri->segment(3);
		// si no hay id de cliente regresamos a la lista de clietes
		if (!$data['segmento'])
		{
			redirect(base_url() . 'cliente/');
		}
		else
		{
			$data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento']);
		}
		//empeños
		$data['enmpenos'] = $this->Productos_model->get_enmpenos($data['segmento']);;

		echo $this->templates->render('admin/editar_cliente', $data);
	}
	function Actualizar()
	{
		$datos = array(
			'nombre'           => $this->input->post('nombre'),
			'dpi'              => $this->input->post('dpi'),
			'nit'              => $this->input->post('nit'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'celular'          => $this->input->post('celular'),
			'telefono'         => $this->input->post('telefono'),
			'email'            => $this->input->post('email'),
			'direccion'        => $this->input->post('direccion'),
			'cliente_id'       => $this->input->post('cliente_id'),
			'publicidad'       => $this->input->post('publicidad'),
            'ciudad'       => $this->input->post('ciudad'),
            'zona'       => $this->input->post('zona'),
            'colonia'       => $this->input->post('colonia'),

		);
		$this->Cliente_model->actualizar_cliente($datos);

		redirect(base_url() . 'cliente/detalle/' . $datos['cliente_id']);
	}
	function clientes_json()
	{
		$data['clientes'] = $this->Cliente_model->listar_clientes_json();
		$clientes         = $data['clientes']->result();
		echo json_encode($clientes);
	}
	function ciudad_json(){
		$data['clidades'] = $this->Cliente_model->listar_ciudades_json();
		$ciudades         = $data['clidades']->result();
		echo json_encode($ciudades);
	}
	function colonia_json(){
		$data['colonias'] = $this->Cliente_model->listar_colonias_json();
		$colonias        = $data['colonias']->result();
		echo json_encode($colonias);
	}
	function clientes_excel()
	{
		$fecha = new DateTime();
		to_excel($this->Cliente_model->clientes_excel(), "Clientes_" . $fecha->format('Y-m-d'));
	}
	function estado_de_cuenta(){
        $data = compobarSesion();
        //obtenemos id cliente desde url
        $data['segmento'] = $this->uri->segment(3);
        // si no hay id de cliente regresamos a la lista de clietes
        if (!$data['segmento'])
        {
            redirect(base_url() . 'cliente/');
        }
        else
        {
            $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento']);
        }
        //contratos
        $data['contratos'] = $this->Contratos_model->get_contratos_by_cliente_id($data['segmento']);
        echo $this->templates->render('admin/estado_de_cuenta', $data);
    }

}