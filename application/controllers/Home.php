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
        $this->load->library("pagination");
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
        $data['monstrar_banners'] = true;
        echo $this->templates->render('public/dp', $data);
    }
    function productos(){

        $data['numero_resultados'] = $this->Productos_model->get_productos_liquidacion_public_numero();
        // echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "/home/productos";
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["num_tag_open"] = '<li class="page-item">';
        $config["num_tag_close"] = '</li>';
        $config["cur_tag_open"] = '<li class="page-item active"><a class="page-link">';
        $config["cur_tag_close"] = '</a></li>';
        $config["first_tag_open"] = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li class="page-item">';
        $config["last_tag_close"] = '</li>';
        $config["next_tag_open"] = '<li class="page-item">';
        $config["next_tag_close"] = '</li>';
        $config["prev_tag_open"] = '<li class="page-item">';
        $config["prev_tag_close"] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['categorias'] = $this->Productos_model->get_public_categorias();
        $data['productos'] = $this->Productos_model->get_productos_liquidacion_public($config["per_page"], $page);
        $data['monstrar_banners'] = false;
        echo $this->templates->render('public/productos', $data);
    }
}