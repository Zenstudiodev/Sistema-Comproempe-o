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
        $data['desenpenos']= $this->Caja_model->get_desempeno();
        $data['intereses_refrendo']= $this->Caja_model->get_intereses_refrendo();
        $data['intereses_desempeno']= $this->Caja_model->get_intereses_desempeno();
        $data['empenos']= $this->Caja_model->get_empenos();
        $data['compras']= $this->Caja_model->get_compras();
        $data['otros_gastos']= $this->Caja_model->get_otros_gastos();
        $data['depositos']= $this->Caja_model->get_depositos();
        $data['visanets']= $this->Caja_model->get_visanet();
        echo $this->templates->render('admin/cierre_caja', $data);
    }
    function reporte(){

    }
    function ingreso_deposito(){
        $data = compobarSesion();
        $data['depositos']= $this->Caja_model->get_depositos();
        echo $this->templates->render('admin/ingreso_depositos', $data);
    }
    function guardar_deposito(){
        $data                     = compobarSesion();
        $datos_deposito = array(
            'boleta'    => $this->input->post('boleta'),
            'monto'    => $this->input->post('monto'),
            'banco'   => $this->input->post('banco'),
            'tipo'         => $this->input->post('tipo'),
            'documento'       => $this->input->post('documento'),

        );
        //guardamos deposito
        $this->Caja_model->guardar_deposito($datos_deposito);
        //redirigimos a depositos
        redirect(base_url() . 'Caja/ingreso_deposito');
    }


}