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
}