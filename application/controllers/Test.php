<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 16/03/2018
 * Time: 4:10 PM
 */
class Test extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Test_model');
        $this->load->library('NumeroALetras');
    }

    function index()
    {
        $data = compobarSesion();
        $session_test= $this->Test_model->test_model();




        echo $this->templates->render('admin/test', $data);
    }

}