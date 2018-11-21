<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/11/2018
 * Time: 7:53 PM
 */
class Reportes extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Reportes_model');
        $this->load->model('Caja_model');

    }
    function index()
    {
        $data = compobarSesion();
    }
    function movimiento_diario(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }


        echo $this->templates->render('admin/movimiento_diario', $data);
    }

}