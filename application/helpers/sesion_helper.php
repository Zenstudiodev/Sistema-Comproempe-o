<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/09/2017
 * Time: 1:06 PM
 */

function compobarSesion()
{
	$ci =& get_instance();
	$data = array();

	//si esta  logueado tomar datos de usuario desde la sesión
	if (isset($ci->session->userdata['logged_in'])) {
		$data['user_id'] = $ci->session->userdata['logged_in']['id'];
		$data['username'] = $ci->session->userdata['logged_in']['username'];
		$data['email'] = $ci->session->userdata['logged_in']['email'];
		$data['nombre'] = $ci->session->userdata['logged_in']['nombre'];
		$data['rol'] = $ci->session->userdata['logged_in']['rol'];
		$data['tienda_id'] = $ci->session->userdata['logged_in']['tienda_id'];
	} else {
		redirect('/login', 'refresh');
	}
	return $data;
}
function get_user_id()
{
    $ci =& get_instance();
    //si esta  logueado tomar datos de usuario desde la sesión
    if (isset($ci->session->userdata['logged_in'])) {
        $user_id = $ci->session->userdata['logged_in']['id'];
    } else {
        redirect('/login', 'refresh');
    }
    return $user_id;
}
function id_to_nombre($id){
    $ci =& get_instance();
    $ci->load->model('User_model');
    $user_data =$ci->User_model->userData($id);
    if($user_data){
        $user_data = $user_data->row();
        $user_name = $user_data->nombre;
    }else{
        $user_name =0;
    }

    return$user_name;
}
function mostrar_tienda(){
    $ci =& get_instance();
    $tienda_id = $ci->session->userdata['logged_in']['tienda_id'];
    echo'Tienda '.$tienda_id;
}

function tienda_id_h(){

    $ci =& get_instance();
    $user_data =$ci->session->userdata('logged_in');
    $tienda_id = $user_data['tienda_id'];
    return $tienda_id;
}
function user_rol(){
    $ci =& get_instance();
    $user_data =$ci->session->userdata('logged_in');
    $rol = $user_data['rol'];
    return $rol;
}