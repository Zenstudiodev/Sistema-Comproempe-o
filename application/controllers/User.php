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
		$this->load->library('NumeroALetras');
	}

}