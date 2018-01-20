<?php
defined('BASEPATH') OR exit('No direct script acces allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/06/2017
 * Time: 12:48 PM
 */
class Base_Controller extends CI_Controller
{
    public $templates;

    public function __construct()
    {
        parent::__construct();
        $this->templates = new League\Plates\Engine(APPPATH . "/views");
    }

}