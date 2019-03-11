<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 06/02/2019
 * Time: 05:25 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Anticipos extends Base_Controller
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
        $this->load->model('Anticipos_model');
        $this->load->library("pagination");
    }

    function index()
    {
        $data['productos'] = $this->Productos_model->get_productos_liquidacion_hompage_public();
        $data['productos_descuento'] = $this->Productos_model->get_productos_descuento_hompage_public();
        $data['monstrar_banners'] = true;
        echo $this->templates->render('public/nosotros', $data);
    }
    function solicitud(){
        $data['productos'] = $this->Productos_model->get_productos_liquidacion_hompage_public();
        $data['productos_descuento'] = $this->Productos_model->get_productos_descuento_hompage_public();
        $data['monstrar_banners'] = true;
        echo $this->templates->render('public/solicitud_anticipo', $data);
    }
    function guardar_solicitud(){

        $datos_solicitud = array(
            'nombre_cliente'=>$this->input->post('nombre_cliente'),
            'direccion_cliente'=>$this->input->post('direccion_cliente'),
            'dpi_cliente'=>$this->input->post('dpi_cliente'),
            'dpi_emitido_cliente'=>$this->input->post('dpi_emitido_cliente'),
            'nit_cliente'=>$this->input->post('nit_cliente'),
            'correo_cliente'=>$this->input->post('correo_cliente'),
            'celular_cliente'=>$this->input->post('celular_cliente'),
            'estado_civil'=>$this->input->post('estado_civil'),
            'nombre_empresa'=>$this->input->post('nombre_empresa'),
            'direccion_empresa'=>$this->input->post('direccion_empresa'),
            'puesto'=>$this->input->post('puesto'),
            'telefono_empresa'=>$this->input->post('telefono_empresa'),
            'salario'=>$this->input->post('salario'),
            'monto_deseado'=>$this->input->post('monto_deseado')
        );
        //guardar anticipo
        $this->Anticipos_model->guardar_anticipo($datos_solicitud);
        //redirec
        redirect(base_url().'anticipos/solicitud_recibida');
    }
    function solicitud_recibida(){
        $data['monstrar_banners'] = true;
        echo $this->templates->render('public/solicitud_anticipo', $data);
    }
    function listado_solicitudes_de_anticipo(){
        $data = compobarSesion();
        $data['solicitudes'] = $this->Anticipos_model->get_solicitudes_pendientes();
        echo $this->templates->render('admin/lista_solicitud_anticipos', $data);
    }
    function atender_solicitud(){

    }

}