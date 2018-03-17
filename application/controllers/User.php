<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/09/2017
 * Time: 11:23 AM
 */

class User extends Base_Controller
{
	function __construct()
	{
		parent::__construct();
		// Modelos
		$this->load->model('Cliente_model');
		$this->load->model('Productos_model');
		$this->load->model('Contratos_model');
		$this->load->model('User_model');
		$this->load->library('NumeroALetras');
	}

	public function index(){

    }
    public function lista_de_usuarios(){
        $data = compobarSesion();
        $data['usuarios']= $this->User_model->listar_usuarios();
        //$session_test= $this->Test_model->test_model();

        echo $this->templates->render('admin/lista_usuarios', $data);
    }
    public function asignar_tienda(){
        $user_id = $this->uri->segment(3);
        $tienda_id = $this->uri->segment(4);
        $data['usuarios']= $this->User_model->asignar_tienda($user_id, $tienda_id);
        redirect(base_url() . '/user/lista_de_usuarios');
    }

    public function cambiar_tienda(){
        $data = compobarSesion();
        $user_data =$this->session->userdata('logged_in');
        $tienda_id = $this->uri->segment(3);

        $session_data = array(
            'id' => $user_data['id'],
            'username' => $user_data['username'],
            'email' => $user_data['email'],
            'nombre' => $user_data['nombre'],
            'rol' => $user_data['rol'],
            'tienda_id' => $tienda_id,
        );
        // Modificar data de session
        $this->session->set_userdata('logged_in', $session_data);

        //redirect
        redirect(base_url() . 'cliente');
    }


}