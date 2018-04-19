<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 17/03/2018
 * Time: 3:48 PM
 */
class Caja extends Base_Controller
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
        $this->load->model('Caja_model');
    }

    function index()
    {

    }
    function cierre(){
        $data = compobarSesion();

        $data['ventas']= $this->Caja_model->get_ventas_dia();
        $data['apartados']= $this->Caja_model->get_apartados_dia();
        $data['abonos_enpenos']= $this->Caja_model->get_abono_empeno_dia();
        $data['desenpeños']= $this->Caja_model->get_desempeno();
        echo $this->templates->render('admin/cierre_caja', $data);
    }
    function reporte(){

    }


}