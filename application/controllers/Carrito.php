<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 3/11/2018
 * Time: 1:01 PM
 */
class Carrito extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Caja_model');
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Proveedor_model');
        $this->load->library("pagination");
        $this->load->library('cart');
    }

    function index()
    {
        $data = compobarSesion();
        $data['clientes'] = $this->Cliente_model->listar_clientes();

        echo $this->templates->render('admin/lista_clientes', $data);
    }

    function agregar_producto(){

        //Id de producto desde segmento URL
        $data['Producto_id'] = $this->uri->segment(3);
        if($data['Producto_id']){
            //si se paso un producto
            $datos_producto = $this->Productos_model->datos_de_producto($data['Producto_id']);
            if($datos_producto){
                //si existe el producto
                $datos_producto = $datos_producto->row();
                //print_contenido($datos_producto);
                $precio_producto =0;
                if($datos_producto->precio_descuento!='0'){
                    $precio_producto = $datos_producto->precio_descuento;
                }else{
                    $precio_producto = mostrar_precio_producto($datos_producto->avaluo_comercial, $datos_producto->precio_venta);
                }

                $data_carrito = array(
                    'id'      => $datos_producto->producto_id,
                    'qty'     => 1,
                    'price'   => $precio_producto,
                    'name'    => $datos_producto->nombre_producto,
                    //'options' => array('Size' => 'L', 'Color' => 'Red')
                );
               // print_contenido($data_carrito);

               // exit();

                $this->cart->insert($data_carrito);

                //print_contenido($this->cart->contents());

                redirect(base_url().'Carrito/ver');
            }else{
                //devolver el producto no existe
            }


        }


    }
    function ver(){
        $data['contenido_carrito'] = $this->cart->contents();
        echo $this->templates->render('public/carrito', $data);
    }
    function actualizar(){


        //print_contenido($_POST);
        $productos = $_POST;
        print_contenido($productos);

        $data['contenido_carrito'] = $this->cart->contents();
       // $this->cart->update($productos);
        //redirect(base_url().'carrito/ver');
    }
    function formas_pago(){
        $data['contenido_carrito'] = '';
        echo $this->templates->render('public/formas_pago', $data);
    }
    function forma_envio(){
        $data['contenido_carrito'] = '';
        echo $this->templates->render('public/formas_envio', $data);
    }

}