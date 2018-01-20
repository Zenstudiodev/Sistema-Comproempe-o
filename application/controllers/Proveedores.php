<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/12/2017
 * Time: 8:24 AM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Proveedores extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
		// Modelos
		$this->load->model('Cliente_model');
		$this->load->model('Productos_model');
		$this->load->model('Contratos_model');
		$this->load->model('Factura_model');
		$this->load->model('Proveedor_model');
	}

	function index(){
		$data = compobarSesion();
		$data['title'] ='Proveedores';
		$data['proveedores'] = $this->Proveedor_model->get_proveedores();
		echo $this->templates->render('admin/lista_proveedores', $data);
	}
	function crear(){
		$data = compobarSesion();
		echo $this->templates->render('admin/nuevo_proveedor', $data);
	}

	function Guardar(){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$data = array(
			'nombre'=> $this->input->post('nombre'),
			'direccion'=> $this->input->post('direccion'),
			'telefono'=> $this->input->post('telefono'),
			'razon_social'=> $this->input->post('razon_social'),
			'email'=> $this->input->post('email'),
			'nit'=> $this->input->post('nit'),
		);

		$cliente_id = $this->Proveedor_model->crear_proveedor($data);


		//redirect(base_url().'cliente/detalle/'.$cliente_id);
	}

}