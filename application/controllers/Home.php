<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 31/07/2017
 * Time: 2:45 PM
 */

class home extends Base_Controller
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
    }

    function index()
    {
        echo $this->templates->render('public/home');
    }
    function exportar(){

	    $data = compobarSesion();
	    echo $this->templates->render('admin/exportar_datos', $data);
    }
    function registros(){
	    $data = compobarSesion();
	    $data['registros'] = $this->Contratos_model->get_logs();
	    echo $this->templates->render('admin/listar_registros', $data);
    }
    function pd(){
        $data['productos'] = $this->Productos_model->get_productos_liquidacion_hompage_public();
        echo $this->templates->render('public/dp', $data);
    }
}