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
        $this->load->model('Productos_model');
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
    function movimiento_diario_global(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/movimiento_diario_global', $data);
    }
    function movimiento_diario_global_excel(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/movimiento_diario_global_excel', $data);
    }
    function inventario_tienda(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }


        echo $this->templates->render('admin/movimiento_diario_global', $data);
    }
    function inventario_global(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/inventario_global', $data);
    }
    function inventario_global_excel(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/inventario_global_excel', $data);
    }
    function egresos_diarios_global(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/egresos_diario_global', $data);
    }
    function egresos_diarios_global_excel(){
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/egresos_diario_global_excel', $data);
    }

}