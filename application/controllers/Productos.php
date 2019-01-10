<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 26/06/2017
 * Time: 1:03 PM
 */
class Productos extends Base_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Caja_model');
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Proveedor_model');
        $this->load->library("pagination");
    }

    function index()
    {

        //categoria
        $categoria = $this->uri->segment(3);
        $data['categoria'] = $categoria;
        if ($data['categoria'] == null) {
            $data['categoria'] = 'todas';
        }

        echo $categoria;
        //tienda
        $tienda = $this->uri->segment(4);
        $data['tienda'] = $tienda;
        if ($data['tienda'] == null) {
            $data['categoria'] = 'todas';
        }

        exit();

        //categoria para usar en vista
        $data['categoria_actual'] = urldecode($this->uri->segment(3));

        $data['numero_resultados'] = $this->Productos_model->get_productos_liquidacion_by_categoria_public_numero($data['categoria']);
        // echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "productos/" . $data['categoria'];
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 18;
        $config["uri_segment"] = 4;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['categorias'] = $this->Productos_model->get_public_categorias();
        $data['productos'] = $this->Productos_model->get_producto_public($data['categoria'], $config["per_page"], $page);
        $data['monstrar_banners'] = false;


        echo $this->templates->render('public/categoria_productos', $data);

    }

    function agregar()
    {
        $data = compobarSesion();
        //Id de cliente desde segmento URL
        $data['cliente_id'] = $this->uri->segment(3);
        //datos del cliente
        $data['cliente_data'] = $this->Cliente_model->detalle_cliente($data['cliente_id']);

        //categorias
        $data['categorias'] = $this->Productos_model->get_categorias();
        echo $this->templates->render('admin/nuevo_producto', $data);
    }

    function guardar_producto()
    {
        //obtenemos los dastos del formulario desde post
        $datos_de_producto = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'fecha' => $this->input->post('fecha'),
            'categoria' => $this->input->post('categoria'),
            'nombre_producto' => $this->input->post('nombre_producto'),
            'no_serie' => $this->input->post('no_serie'),
            'modelo' => $this->input->post('modelo'),
            'marca' => $this->input->post('marca'),
            'descripcion' => $this->input->post('descripcion'),
            'fecha_avaluo' => $this->input->post('fecha_avaluo'),
            'avaluo_comercial' => $this->input->post('avaluo_comercial'),
            'avaluo_ce' => $this->input->post('avaluo_ce'),
            'mutuo' => $this->input->post('mutuo')
        );
        //guardamos datos de formulario en base de datos
        //print_r($datos_de_producto);
        $this->Productos_model->guardar_producto($datos_de_producto);
        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'));


    }

    function editar_producto()
    {
        $data = compobarSesion();
        //Id de cliente desde segmento URL
        $data['producto_id'] = $this->uri->segment(3);
        //datos del cliente
        $data['producto_data'] = $this->Productos_model->datos_de_producto($data['producto_id']);

        //categorias
        $data['categorias'] = $this->Productos_model->get_categorias();
        echo $this->templates->render('admin/editar_producto', $data);
    }

    function actualizar_producto()
    {

        $datos_de_producto = array(
            'producto_id' => $this->input->post('producto_id'),
            'categoria' => $this->input->post('categoria'),
            'nombre_producto' => $this->input->post('nombre_producto'),
            'no_serie' => $this->input->post('no_serie'),
            'modelo' => $this->input->post('modelo'),
            'marca' => $this->input->post('marca'),
            'descripcion' => $this->input->post('descripcion'),
            'avaluo_comercial' => $this->input->post('avaluo_comercial'),
            'avaluo_ce' => $this->input->post('avaluo_ce'),
            'mutuo' => $this->input->post('mutuo')
        );
        //guardamos datos de formulario en base de datos
        //print_r($datos_de_producto);
        $this->Productos_model->actualizar_producto($datos_de_producto);
        $producto = $this->Productos_model->datos_de_productos($datos_de_producto['producto_id']);
        $producto = $producto->row();
        //echo $producto->cliente_id;

        redirect(base_url() . 'index.php/cliente/detalle/' . $producto->cliente_id);


    }

    function categorias_json()
    {
        $data['categorias'] = $this->Productos_model->get_categorias();
        $categorias = $data['categorias']->result();
        echo json_encode($categorias);
    }

    function detalle()
    {
        $data = compobarSesion();
        //Id de cliente desde segmento URL
        $data['producto_id'] = $this->uri->segment(3);
        //datos del cliente
        $data['producto_data'] = $this->Productos_model->datos_de_producto($data['producto_id']);

        //categorias
        $data['categorias'] = $this->Productos_model->get_categorias();
        echo $this->templates->render('admin/detalle_producto', $data);
    }

    //liquidación
    function liquidacion()
    {
        $data = compobarSesion();

        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }

        // Get tienda data
        $tienda = tienda_id_h();

        $data['productos_contrato_tienda_1'] = false;
        $data['productos_contrato_tienda_2'] = false;
        $data['productos_contrato_tienda_3'] = false;

        if ($tienda == '1') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_1_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_1_contratos_2();

        } elseif ($tienda == '2') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_2_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_2_contratos_2();
        }
        elseif ($tienda == '3') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_3_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_3_contratos_2();
            $data['productos_contrato_tienda_3'] = $this->Productos_model->get_productos_tienda_3_contratos_3();
        }
        //$data['productos'] = $this->Productos_model->get_productos_liquidacion();

        echo $this->templates->render('admin/lista_productos_liquidacion', $data);
    }

    function liquidar()
    {
        $data = compobarSesion();
        $productos = array();
        if (!empty($_POST)) {
            //pasamos todos los post a un array
            foreach ($_POST as $key => $value) {
                //quitamos el valor de vista en la tabla
                if ($key == 'example1_length') {
                } else {
                    $productos[] = $value;
                }

            }
            //echo is_array($productos) ? 'Array' : 'No es un array';
            if (empty($productos)) {
                $this->session->set_flashdata('error', 'Para liquidar debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/productos/liquidacion');
            }
            //print_r($productos);
            $data['productos'] = $this->Productos_model->datos_de_productos($productos);
        } else {
        }

        if (isset($data['productos'])) {
            $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
            echo $this->templates->render('admin/liquidar_productos', $data);
        } else {
            $this->session->set_flashdata('error', 'Para liquidar debe seleccionar un producto');
        }

    }

    function guardar_liquidacion()
    {
        //dev state
        /*echo'liquidaciones en mantenimento escribirme al wp';

        print_contenido($_POST);

        exit();*/



        $fecha = New DateTime();
        $detalle_factura = '';
        $detalle_recibo = '';
        $contrados_recibo = '';
        $id_productos = '';
        $nombre_productos = '';
        $numero_productos = '';
        $suma_mutuos = 0;

        $numero_de_productos = $this->input->post('numero_productos');
        $i = 1;
        while ($i <= $numero_de_productos) {
            //Guardamos precio al que se vendio cada producto
            $this->Productos_model->guardar_precio_venta($this->input->post('producto_' . $i), $this->input->post('producto_' . $i . '_p'));
            //obtenemos datos del producto
            $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
            $datos_producto = $datos_producto->row();

            //vinculamos el numero de factura con la liquidacion de producto
            $datos_de_liquidacion = array(
                'id_factura' => $this->input->post('no_factura'),
                'id_producto' => $this->input->post('producto_' . $i),
            );
            $this->Productos_model->guardar_liquidacion_factura_producto($datos_de_liquidacion);
            //Datos del contrato
            $datos_contrato = $this->Contratos_model->get_info_contrato($datos_producto->contrato_id);
            $datos_contrato = $datos_contrato->row();

            $resultado_mutuo = (floatval($datos_contrato->total_mutuo) - floatval($datos_producto->mutuo));
            $resultado_liquidado = (floatval($datos_contrato->tototal_liquidado) + floatval($datos_producto->mutuo));
            $suma_mutuos = (floatval($suma_mutuos) + floatval($datos_producto->mutuo));

            $estado_contrato = 'perdido';
            if ($resultado_mutuo == 0) {
                $estado_contrato = 'liquidado';
            } else {
                $estado_contrato = 'liquidado_parcial';
            }

            $nuevos_datos_de_contrato = array(
                'contrato_id' => $datos_contrato->contrato_id,
                'tototal_liquidado' => $resultado_liquidado,
                'total_mutuo' => $resultado_mutuo,
                'estado' => $estado_contrato,
            );
            $this->Contratos_model->actualizar_estado_liquidacion($nuevos_datos_de_contrato);

            $gastos_administrativos = (floatval($this->input->post('producto_' . $i . '_p')) - floatval($datos_producto->mutuo));

            $detalle_factura .= '<tr style="height: auto;">';
            $detalle_factura .= '<td style="width: 1.90cm"></td>';
            $detalle_factura .= '<td colspan="2">Liquidacion de contrato  ' . $datos_contrato->contrato_id . '</td>';
            $detalle_factura .= '<td style="width: 3.51cm" ><span class="hide_print_dt">' . formato_dinero($datos_producto->mutuo) . '</span></td>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr style="height: auto;">';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '<td colspan="3">' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '</td>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr style="height: auto;">';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '<td colspan="2">' . 'Precio de venta' . '</td>';
            $detalle_factura .= '<td> <span class="">' . formato_dinero(floatval($this->input->post('producto_' . $i . '_p'))) . '</span><br>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr style="height: auto;">';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '<td colspan="2">' . 'Gastos administrativos' . '</td>';
            $detalle_factura .= '<td> <span class="hide_print_ga">' . formato_dinero($gastos_administrativos) . '</span><br>';
            $detalle_factura .= '</tr>';

            $contrados_recibo .= $datos_contrato->contrato_id . ', ';
            $id_productos .= $this->input->post('producto_' . $i) . ', ';
            $nombre_productos .= $datos_producto->nombre_producto . ', ';

            $i++;
        }


        $detalle_recibo .= 'Liquidación de contratos: ' . $contrados_recibo . '<br>';
        $detalle_recibo .= 'Suma de mutuos ' . formato_dinero($suma_mutuos);


        $datos_factura = array(
            'no_factura' => $this->input->post('no_factura'),
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'detalle' => $detalle_factura,
            'interese' => '',
            'almacenaje' => '',
            'mora' => '',
            'recuperacion' => '',
            'sub_total' => $this->input->post('sub_total'),
            'descuento' => $this->input->post('descuento'),
            'total' => $this->input->post('total'),
            'tipo' => 'venta',
            'serie_factura' => $this->input->post('serie_factura'),
        );

        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $suma_mutuos,
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'liquidacion',
            'detalle' => $detalle_recibo
        );


        //si la factura es seri r no guardamos recibo solo factura
        if ($this->input->post('serie_factura') == 'R' || $this->input->post('serie_factura') == 'RE') {
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
        } else {
            //guardamos factura
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
            //guardamos recibo
            $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
            //Guardamos la transaccion de factura y recibo
            $this->Factura_model->guardar_factura_recibo($factura_id, $recibo_id);
        }


        $registro_venta = array(
            'factura_id' => $factura_id,
            'recibo_id' => '',
            'serie' => $this->input->post('serie_factura'),
            'monto' => $datos_factura['total'],
            'id_producto' => $id_productos,
            'nombre_producto' => $nombre_productos,
        );
        $this->Caja_model->guardar_ventas_dia($registro_venta);
        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');
    }

    // administracion de productos
    function administrar_todos_los_productos()
    {
    }

    function administrar_liquidacion()
    {
        $data = compobarSesion();

        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        // Get tienda data
        $tienda = tienda_id_h();

        $data['productos_contrato_tienda_1'] = false;
        $data['productos_contrato_tienda_2'] = false;

        if ($tienda == '1') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_1_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_1_contratos_2();

        } elseif ($tienda == '2') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_2_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_2_contratos_2();
        }
        echo $this->templates->render('admin/administrar_productos_liquidacion', $data);
    }

    function administar_bodega()
    {
        $data = compobarSesion();

        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        // Get tienda data
        $tienda = tienda_id_h();


        echo $this->templates->render('admin/administrar_productos_bodega', $data);
    }

    //api administracion de productos
    function cargar_productos_en_liquidacion()
    {

        header("Content-Type: application/json");
        // Get tienda data
        $tienda = tienda_id_h();
        $productos_contrato_tienda_1 = false;
        $productos_contrato_tienda_2 = false;

        if ($tienda == '1') {
            $productos_contrato_tienda_1 = $this->Productos_model->get_productos_tienda_1_contratos_1();
            $productos_contrato_tienda_2 = $this->Productos_model->get_productos_tienda_1_contratos_2();
            $productos_contrato_tienda_3 = $this->Productos_model->get_productos_tienda_1_contratos_3();

        } elseif ($tienda == '2') {
            $productos_contrato_tienda_1 = $this->Productos_model->get_productos_tienda_2_contratos_1();
            $productos_contrato_tienda_2 = $this->Productos_model->get_productos_tienda_2_contratos_2();
            $productos_contrato_tienda_3 = $this->Productos_model->get_productos_tienda_2_contratos_3();
        } elseif ($tienda == '3') {
            $productos_contrato_tienda_1 = $this->Productos_model->get_productos_tienda_3_contratos_1();
            $productos_contrato_tienda_2 = $this->Productos_model->get_productos_tienda_3_contratos_2();
            $productos_contrato_tienda_3 = $this->Productos_model->get_productos_tienda_3_contratos_2();
        }
        if ($productos_contrato_tienda_1 or $productos_contrato_tienda_2 or $productos_contrato_tienda_3) {
            $productos = array();
            if ($productos_contrato_tienda_1) {
                $productos_contrato_tienda_1 = $productos_contrato_tienda_1->result();
                //echo json_encode($productos_contrato_tienda_1->result());
            } else {
                $productos_contrato_tienda_1 = array('');
            }

            if ($productos_contrato_tienda_2) {
                $productos_contrato_tienda_2 = $productos_contrato_tienda_2->result();
                //echo json_encode($productos_contrato_tienda_2->result());
            } else {
                $productos_contrato_tienda_2 = array('');
            }
            if ($productos_contrato_tienda_3) {
                $productos_contrato_tienda_3 = $productos_contrato_tienda_3->result();
                //echo json_encode($productos_contrato_tienda_2->result());
            } else {
                $productos_contrato_tienda_3 = array('');
            }

            $productos = array_merge($productos_contrato_tienda_1, $productos_contrato_tienda_2, $productos_contrato_tienda_3);
            echo json_encode($productos);
        } else {
            echo '';
        }
    }
    function cargar_productos_en_bodega()
    {

        header("Content-Type: application/json");
        // Get tienda data
        $tienda = tienda_id_h();
        $productos_contrato_tienda_1 = false;
        $productos_contrato_tienda_2 = false;

        $productos = $this->Productos_model->cargar_bodega();
        echo json_encode($productos->result());

    }
    function actualizar_producto_administrador()
    {
        header("Content-Type: application/json");

        parse_str(file_get_contents("php://input"), $_PUT);
        //print_contenido($_PUT);
        //header("Content-Type: application/json");
        $modificaciones_producto = array(
            "producto_id" => $_PUT['producto_id'],
            "categoria" => $_PUT['categoria'],
            "tienda_id" => $_PUT['tienda_actual'],
            "precio_venta" => $_PUT['precio_venta'],
            "precio_descuento" => $_PUT['precio_descuento'],
            //"estado"=>"perdido"
            //"fecha_avaluo"=>"2018-03-18",
            //"contrato_id"=>"3",
            //"tipo"=>"venta",
            //"mutuo"=>"400",
            //"avaluo_ce"=>"800",
            //"nombre_producto"=>"CELULAR",
        );

        //actualizar producto
        $this->Productos_model->actualizar_producto_administrador($modificaciones_producto);

        //leer datos de producto actualizados
        $producto = $this->Productos_model->datos_de_producto($_PUT['producto_id']);
        $producto = $producto->row();

        $datos_actualizados = array(
            'producto_id' => $producto->producto_id,
            'contrato_id' => $producto->contrato_id,
            'fecha_avaluo' => $producto->fecha_avaluo,
            'categoria' => $producto->categoria,
            'nombre_producto' => $producto->nombre_producto,
            'avaluo_ce' => $producto->avaluo_ce,
            'avaluo_comercial' => $producto->avaluo_comercial,
            'precio_venta' => $producto->precio_venta,
            'precio_descuento' => $producto->precio_descuento,
            'mutuo' => $producto->mutuo,
            'tipo' => $producto->tipo,
            'tienda_id' => $producto->tienda_id,
            'tienda_actual' => $producto->tienda_actual,
            'estado' => $_PUT['estado'],
        );


        echo json_encode($datos_actualizados);


    }
    function actualizar_producto_bodega()
    {
        header("Content-Type: application/json");

        parse_str(file_get_contents("php://input"), $_PUT);
        //print_contenido($_PUT);
        //header("Content-Type: application/json");
        $modificaciones_producto = array(
            "producto_id" => $_PUT['producto_id'],
            "categoria" => $_PUT['categoria'],
            "tienda_id" => $_PUT['tienda_actual'],
            "precio_venta" => $_PUT['precio_venta'],
            //"estado"=>"perdido"
            //"fecha_avaluo"=>"2018-03-18",
            //"contrato_id"=>"3",
            //"tipo"=>"venta",
            //"mutuo"=>"400",
            //"avaluo_ce"=>"800",
            //"nombre_producto"=>"CELULAR",
        );

        //actualizar producto
        $this->Productos_model->actualizar_producto_administrador($modificaciones_producto);

        //leer datos de producto actualizados
        $producto = $this->Productos_model->datos_de_producto($_PUT['producto_id']);
        $producto = $producto->row();

        $datos_actualizados = array(
            'producto_id' => $producto->producto_id,
            'contrato_id' => $producto->contrato_id,
            'fecha_avaluo' => $producto->fecha_avaluo,
            'categoria' => $producto->categoria,
            'nombre_producto' => $producto->nombre_producto,
            'avaluo_ce' => $producto->avaluo_ce,
            'avaluo_comercial' => $producto->avaluo_comercial,
            'precio_venta' => $producto->precio_venta,
            'mutuo' => $producto->mutuo,
            'tipo' => $producto->tipo,
            'tienda_actual' => $producto->tienda_actual,
        );


        echo json_encode($datos_actualizados);


    }



    //traslado
    function productos_trasladar()
    {
        $data = compobarSesion();
        $productos = array();

        //print_contenido($_POST);
        if (!empty($_POST)) {
            //pasamos todos los post a un array
            foreach ($_POST as $key => $value) {
                //quitamos el valor de vista en la tabla
                if ($key == 'example1_length') {
                } else {
                    $productos[] = $value;
                }
            }
            //echo is_array($productos) ? 'Array' : 'No es un array';
            if (empty($productos)) {
                $this->session->set_flashdata('error', 'Para trasladar debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/productos/liquidacion');
            }
            //print_r($productos);
            $data['productos'] = $this->Productos_model->datos_de_productos($productos);

            //print_contenido($data['productos']->result());
            $productos_id = array();


            //print_contenido($data['productos']->result());
            foreach ($data['productos']->result() as $producto) {
                //cambiar estado de tienda
                $tienda = tienda_id_h();
                // a que tienda se va a trasladar
                $tienda_actual = $this->input->post('select_tienda_traslado');
                // actualizamos en la base de datos
                /*if ($tienda == '1') {
                    $tienda_actual = 2;
                } elseif ($tienda == '2') {
                    $tienda_actual = 1;
                }*/
                $this->Productos_model->trasladar_producto($producto->producto_id, $tienda_actual);
                $productos_id[] = $producto->producto_id;
            }

            //cambiar estado de tienda
            $tienda_actual_r = tienda_id_h();
            $tienda_destino = $tienda_actual;
            // actualizamos en la base de datos
            /*if ($tienda_actual_r == '1') {
                $tienda_destino = 2;
            } elseif ($tienda_actual_r == '2') {
                $tienda_destino = 1;
            }*/
            //print_contenido($productos_id);
            $productos_json = json_encode($productos_id);

            //obtenemos los del traslado
            $datos_traslado = array(
                'traslado_tienda_actual' => $tienda_actual_r,
                'traslado_tienda_destino' => $tienda_destino,
                'traslado_productos' => $productos_json,
            );

            $this->Productos_model->guardar_traslado($datos_traslado);
            redirect(base_url() . 'productos/traslados');
        } else {
        }
    }

    function traslados()
    {
        $data = compobarSesion();
        //Id de cliente desde segmento URL
        //traslados
        $data['traslados'] = $this->Productos_model->get_traslados();
        echo $this->templates->render('admin/traslados', $data);
    }

    function imprimir_trslado()
    {
        $data = compobarSesion();
        //ID traslado
        $data['traslado_id'] = $this->uri->segment(3);

        $data['traslado'] = $this->Productos_model->get_traslado_by_id($data['traslado_id']);
        $traslado = $data['traslado']->row();
        $productos = json_decode($traslado->traslado_productos);
        $data['productos'] = $this->Productos_model->datos_de_productos($productos);
        //print_contenido($data['productos']->result());

        echo $this->templates->render('admin/imprimir_traslado', $data);
    }

    //inventario
    function productos_inventario()
    {
        $data = compobarSesion();
        //Id de cliente desde segmento URL

        //categorias
        $data['categorias'] = $this->Productos_model->get_categorias();
        echo $this->templates->render('admin/detalle_producto', $data);
    }

    function ingresar_producto_inventario()
    {
        $data = compobarSesion();
        //categorias
        $data['categorias'] = $this->Productos_model->get_categorias();
        echo $this->templates->render('admin/productos_inventario', $data);
    }

    function guardar_productos_inventario()
    {
        $datos_de_prorateo = array(
            'proveedor_id' => $_POST['proveedor_id'],
            'no_factura' => $_POST['no_factura'],
            'serie_factura' => $_POST['serie_factura'],
            'fecha_factura' => $_POST['fecha_factura'],
            'factura_tipo' => $_POST['factura_tipo'],
            'fecha' => $_POST['factura_tipo'],
            'no_productos' => $_POST['productos_distintos'],
            'flete_sin_iva_local' => $_POST['flete_sin_iva_local'],
            'gasto_no_deducible_local' => $_POST['gasto_no_deducible_local'],
            'total_cargo_extra' => $_POST['total_cargo_extra'],
            'cargo_extra_por_producto' => $_POST['cargo_extra_por_producto'],
            'total_productos' => $_POST['total_productos'],
            'total_precio_sin_iva' => $_POST['total_precio_sin_iva'],
            'total_iva' => $_POST['total_iva'],
            'total_costo_neto' => $_POST['total_costo_neto'],
            'total_precio_venta' => $_POST['total_precio_venta'],
            'total_total_producto' => $_POST['total_total_producto'],
        );
        $prorateo_id = $this->Proveedor_model->guardar_prorateo($datos_de_prorateo);

        $fecha = new DateTime();
        $productos_distintos = $_POST['productos_distintos'];

        for ($i = 1; $i <= $productos_distintos; $i++) {
            //echo $i;
            $datos_de_producto = array(
                'proveedor_id' => $_POST['proveedor_id'],
                'existencias' => $_POST['no_productos_p' . $i],
                'fecha' => $fecha->format('Y-m-d'),
                'categoria' => $_POST['categoria_p' . $i],
                'nombre_producto' => $_POST['nombre_producto_p' . $i],
                'no_serie' => $_POST['no_serie_p' . $i],
                'modelo' => $_POST['modelo_p' . $i],
                'marca' => $_POST['marca_p' . $i],
                'descripcion' => $_POST['descripcion_p' . $i],
                'precio_compra' => $_POST['costo_b_p' . $i],
                'precio_venta' => $_POST['precio_venta_p' . $i],
                'id_prorateo' => $prorateo_id,
                'tipo ' => 'compra',
            );
            /* echo '<pre>';
             print_r($datos_de_producto);
             echo '</pre>';*/

            $this->Productos_model->guardar_producto_inventario($datos_de_producto);


        }

        redirect(base_url() . 'index.php/proveedores/detalle/' . $_POST['proveedor_id']);


        /* echo '<pre>';
         print_r($datos_de_prorateo);
         echo '</pre>';*/
    }

    function productos_en_venta()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['productos'] = $this->Productos_model->get_productos_venta();
        echo $this->templates->render('admin/lista_productos_venta', $data);
    }

    function productos_vender()
    {
        $data = compobarSesion();
        $productos = array();
        if (!empty($_POST)) {
            //pasamos todos los post a un array
            foreach ($_POST as $key => $value) {
                //quitamos el valor de vista en la tabla
                if ($key == 'example1_length') {
                } else {
                    $productos[] = $value;
                }
            }
            //echo is_array($productos) ? 'Array' : 'No es un array';
            if (empty($productos)) {
                $this->session->set_flashdata('error', 'Para vender debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/productos/productos_en_venta');
            }
            //print_r($productos);
            $data['productos'] = $this->Productos_model->datos_de_productos($productos);
        } else {
        }

        if (isset($data['productos'])) {
            $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
            echo $this->templates->render('admin/vender_productos', $data);
        } else {
            $this->session->set_flashdata('error', 'Para vender debe seleccionar un producto');
            // user hasen't submitted anything yet!
            //redirect(base_url() . 'index.php/productos/liquidacion', 'refresh');
        }
    }

    function guardar_venta()
    {
        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        exit();
        */


        $fecha = New DateTime();
        $detalle_factura = '';
        $detalle_recibo = '';
        $contrados_recibo = '';
        $suma_mutuos = 0;

        $numero_de_productos = $this->input->post('numero_productos');
        $i = 1;
        while ($i <= $numero_de_productos) {

            //obtenemos datos del producto
            $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
            $datos_producto = $datos_producto->row();

            //actualizamos el producto
            $nueva_existencia = $datos_producto->existencias - $this->input->post('cantidad_producto_' . $i . '_p');
            $datos_venta_producto = array(
                'id' => $this->input->post('producto_' . $i),
                'precio_venta' => $this->input->post('producto_' . $i . '_p'),
                'cantidad_productos' => $nueva_existencia
            );

            $this->Productos_model->producto_vendido($datos_venta_producto);


            $gastos_administrativos = (floatval($this->input->post('producto_' . $i . '_p')) - floatval($datos_producto->mutuo));
            $monto_producto = $this->input->post('cantidad_producto_' . $i . '_p') * $this->input->post('producto_' . $i . '_p');
            //echo '<hr>';
            $detalle_factura .= '<tr>';
            $detalle_factura .= '<td style="width: 1.90cm">' . $this->input->post('cantidad_producto_' . $i . '_p') . '</td>';//TODO CANTIDAD
            $detalle_factura .= '<td colspan="3">' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '</td>'; //TODO DESCRIPCION PRODUCTO
            $detalle_factura .= '<td style="width: 3.51cm">' . formato_dinero($monto_producto) . '</td>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr>';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '</tr>';
            $detalle_recibo .= 'Producto: ' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '<br>';
            $detalle_recibo .= 'Total de productos ' . formato_dinero($monto_producto);
            $i++;
        }


        //echo '<table>' . $detalle_factura . '</table>';
        $datos_factura = array(
            'no_factura' => $this->input->post('no_factura'),
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'detalle' => $detalle_factura,
            'interese' => '',
            'almacenaje' => '',
            'mora' => '',
            'recuperacion' => '',
            'sub_total' => $this->input->post('sub_total'),
            'descuento' => $this->input->post('descuento'),
            'total' => $this->input->post('total'),
            'tipo' => 'venta',
            'serie_factura' => $this->input->post('serie_factura'),
        );
        /* echo '<pre>';
         print_r($datos_factura);
         echo '</pre>';
         echo '<hr>';*/
        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('total'),
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'venta',
            'detalle' => $detalle_recibo
        );
        /*echo '<pre>';
        print_r($datos_recibo);
        echo '</pre>';*/

        if ($_POST['comprobante'] == 'factura') {
            //guardamos factura
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
            //todo rodear con in while de productos para obtener el total de productos
            $registro_venta = array(
                'factura_id' => $factura_id,
                'recibo_id' => '',
                'serie' => $this->input->post('serie_factura'),
                'monto' => $this->input->post('total'),
                'id_producto' => '',
                'nombre_producto' => '',
            );
            $this->Caja_model->guardar_ventas_dia($registro_venta);

        } else if ($_POST['comprobante'] == 'recibo') {
            $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
            //todo rodear con in while de productos para obtener el total de productos
            $registro_venta = array(
                'factura_id' => '',
                'serie' => 'recibo',
                'recibo_id' => $recibo_id,
                'monto' => $this->input->post('total'),
                'id_producto' => '',
                'nombre_producto' => '',
            );
            $this->Caja_model->guardar_ventas_dia($registro_venta);
        }


        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');

    }

    //apartado
    function productos_apartados()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['productos'] = $this->Productos_model->get_productos_apartados();
        echo $this->templates->render('admin/lista_productos_apartados', $data);
    }

    function productos_apartar()
    {
        $data = compobarSesion();
        $productos = array();
        if (!empty($_POST)) {
            //pasamos todos los post a un array
            foreach ($_POST as $key => $value) {
                //quitamos el valor de vista en la tabla
                if ($key == 'example1_length') {
                } else {
                    $productos[] = $value;
                }
            }
            //echo is_array($productos) ? 'Array' : 'No es un array';
            if (empty($productos)) {
                $this->session->set_flashdata('error', 'Para vender debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/productos/productos_en_venta');
            }
            //print_r($productos);
            $data['productos'] = $this->Productos_model->datos_de_productos($productos);
        } else {
        }

        if (isset($data['productos'])) {
            $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
            echo $this->templates->render('admin/apartar_productos', $data);
        } else {
            $this->session->set_flashdata('error', 'Para vender debe seleccionar un producto');
            // user hasen't submitted anything yet!
            //redirect(base_url() . 'index.php/productos/liquidacion', 'refresh');
        }
    }

    function guardar_apartado()
    {

        $detalle_recibo = ''; //detalle de recibo a guardar
        $id_productos = '';
        $nombre_productos = '';
        $vencimientos = '';
        $saldos = '';

        // numero de productos y loop por producto
        $numero_de_productos = $this->input->post('numero_productos');
        $i = 1;
        while ($i <= $numero_de_productos) {
            //obtenemos datos del producto
            $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
            $datos_producto = $datos_producto->row();

            //actualizamos el producto
            $fecha_vencimiento_apartado = New DateTime();
            if ($this->input->post('producto_' . $i . '_p') > 600) {
                $fecha_vencimiento_apartado->modify('+30 days');
            } else {
                $fecha_vencimiento_apartado->modify('+15 days');
            }

            $nueva_existencia = $datos_producto->existencias - 1;
            if ($datos_producto->existencias == '0') {
                $nueva_existencia = 0;
            } else {
                $nueva_existencia = $datos_producto->existencias - 1;
            }
            $datos_apartado_producto = array(
                'id' => $this->input->post('producto_' . $i),
                'cliente_id' => $this->input->post('cliente_id'),
                'precio_venta' => $this->input->post('producto_' . $i . '_p'),
                'apartado' => $this->input->post('producto_' . $i . '_pa'),
                'cantidad_productos' => $nueva_existencia,
                'vencimiento_apartado' => $fecha_vencimiento_apartado->format('Y-m-d')
            );
            $this->Productos_model->apartar_producto($datos_apartado_producto);
            $gastos_administrativos = (floatval($this->input->post('producto_' . $i . '_p')) - floatval($datos_producto->mutuo));
            $precio_producto = $this->input->post('producto_' . $i . '_p');
            $monto_apartado = $this->input->post('producto_' . $i . '_pa');
            $saldo = $precio_producto - $monto_apartado;


            $detalle_recibo .= 'Producto: ' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '<br>';
            $detalle_recibo .= 'Total de apartado ' . formato_dinero($monto_apartado) . '<br>';
            $detalle_recibo .= 'precio de venta  ' . formato_dinero($this->input->post('producto_' . $i . '_p')) . '<br>';
            $detalle_recibo .= 'Saldo  ' . formato_dinero($saldo) . '<br>';
            $detalle_recibo .= 'fecha de vencimiento  ' . $fecha_vencimiento_apartado->format('Y-m-d') . '<br>';


            $id_productos .= $this->input->post('producto_' . $i) . ', ';
            $nombre_productos .= $datos_producto->nombre_producto . ', ';
            $saldos .= $saldo . ', ';
            $vencimientos .= $fecha_vencimiento_apartado->format('Y-m-d') . ', ';
            $i++;
        }

        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('total_apartado'),
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'apartado',
            'detalle' => $detalle_recibo
        );
        // print_contenido($_POST);
        // print_contenido($datos_recibo);

        $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
        $i = 1;
        while ($i <= $numero_de_productos) {
            //asignamos el numero de recibo a los productos apartados
            $datos_recibo_apartado_producto = array(
                'id' => $this->input->post('producto_' . $i),
                'recibo_id' => $recibo_id,
            );
            $this->Productos_model->asignar_recibo_apartado($datos_recibo_apartado_producto);
            $i++;
        }

        $datos_apartado = array(
            'recibo_id' => $recibo_id,
            'monto' => number_format($this->input->post('total_apartado'), 2),
            'id_producto' => $id_productos,
            'nombre_producto' => $nombre_productos,
            'saldo' => $saldos,
            'fecha_vencimiento' => $vencimientos,
        );
        $this->Caja_model->guardar_apartados($datos_apartado);
        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');

        /* echo '<pre>';
         print_r($_POST);
         print_r($datos_recibo);
         echo '</pre>';
         exit();*/

    }

    function facturar_parartado()
    {
        $data = compobarSesion();
        //obtenemos id de cliente
        $cliente_id = $data['segmento'] = $this->uri->segment(3);
        //obtenemos id producto desde url
        $producto_id = $data['segmento'] = $this->uri->segment(4);

        $data['productos'] = $this->Productos_model->datos_de_productos($producto_id);
        $data['cliente'] = $cliente_id;

        $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
        echo $this->templates->render('admin/facturar_apartado', $data);
    }

    function guardar_factura_apartado()
    {
        $fecha = New DateTime();
        $detalle_factura = '';
        $detalle_recibo = '';
        $contrados_recibo = '';
        $producto_recibo = '';
        $suma_mutuos = 0;

        //obtenemos datos

        //post
        $fecha = $this->input->post('fecha');
        $precio_producto = $this->input->post('producto_1_p');
        $producto_id = $this->input->post('producto_1');
        $cliente_id = $this->input->post('cliente_id');
        $descuento = $this->input->post('descuento');

        //producto
        $datos_producto = $this->Productos_model->datos_de_producto($producto_id);
        $datos_producto = $datos_producto->row();

        //contrato
        $datos_contrato = $this->Contratos_model->get_info_contrato($datos_producto->contrato_id);
        $datos_contrato = $datos_contrato->row();

        //Guardamos Comprobante
        $resultado_mutuo = (floatval($datos_contrato->total_mutuo) - floatval($datos_producto->mutuo));
        $resultado_liquidado = (floatval($datos_contrato->tototal_liquidado) + floatval($datos_producto->mutuo));
        $suma_mutuos = (floatval($suma_mutuos) + floatval($datos_producto->mutuo));

        $estado_contrato = 'perdido';
        if ($resultado_mutuo == 0) {
            $estado_contrato = 'liquidado';
        } else {
            $estado_contrato = 'liquidado_parcial';
        }
        $nuevos_datos_de_contrato = array(
            'contrato_id' => $datos_contrato->contrato_id,
            'tototal_liquidado' => $resultado_liquidado,
            'total_mutuo' => $resultado_mutuo,
            'estado' => $estado_contrato,
        );
        $this->Contratos_model->actualizar_estado_liquidacion($nuevos_datos_de_contrato);

        $gastos_administrativos = (floatval($precio_producto) - floatval($datos_producto->mutuo));

        $detalle_factura .= '<tr style="height: auto;">';
        $detalle_factura .= '<td style="width: 1.90cm"></td>';
        $detalle_factura .= '<td colspan="2">Liquidacion de contrato  ' . $datos_contrato->contrato_id . '</td>';
        $detalle_factura .= '<td style="width: 3.51cm">' . formato_dinero($datos_producto->mutuo) . '</td>';
        $detalle_factura .= '</tr>';
        $detalle_factura .= '<tr style="height: auto;">';
        $detalle_factura .= '<td></td>';
        $detalle_factura .= '<td colspan="3">' . $datos_producto->producto_id . '- ' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '</td>';
        $detalle_factura .= '</tr>';
        $detalle_factura .= '<tr style="height: auto;">';
        $detalle_factura .= '<td></td>';
        $detalle_factura .= '<td colspan="2">' . 'Gastos administrativos' . '</td>';
        $detalle_factura .= '<td>' . formato_dinero($gastos_administrativos) . '<br>';
        $detalle_factura .= '</tr>';

        $contrados_recibo .= $datos_contrato->contrato_id . ',';
        $producto_recibo .= $datos_producto->producto_id . ',';

        $detalle_recibo .= 'Liquidación de contratos: ' . $contrados_recibo . '<br>';
        $detalle_recibo .= 'productos: ' . $producto_recibo . '<br>';
        $detalle_recibo .= 'Suma de mutuos ' . formato_dinero($suma_mutuos);

        $datos_factura = array(
            'no_factura' => $this->input->post('no_factura'),
            'cliente_id' => $cliente_id,
            'contrato_id' => '0',
            'fecha' => $fecha,
            'detalle' => $detalle_factura,
            'interese' => '',
            'almacenaje' => '',
            'mora' => '',
            'recuperacion' => '',
            'sub_total' => $this->input->post('sub_total'),
            'descuento' => $descuento,
            'total' => $this->input->post('total'),
            'tipo' => 'venta',
            'serie_factura' => $this->input->post('serie_factura'),
        );
        $datos_recibo = array(
            'cliente_id' => $cliente_id,
            'contrato_id' => '0',
            'fecha' => $fecha,
            'monto_recibo' => $suma_mutuos,
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'liquidacion',
            'detalle' => $detalle_recibo
        );

        //si la factura es seri r no guardamos recibo solo factura
        if ($this->input->post('serie_factura') == 'R' || $this->input->post('serie_factura') == 'RE') {
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
            $recibo_id ='';
        } else {
            //guardamos factura
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
            //guardamos recibo
            $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
            //Guardamos la transaccion de factura y recibo
            $this->Factura_model->guardar_factura_recibo($factura_id, $recibo_id);
        }

        //registro de caja
        $registro_venta = array(
            'factura_id' => $factura_id,
            'serie' => $this->input->post('serie_factura'),
            'recibo_id' => $recibo_id,
            'monto' => $datos_factura['total'],
            'id_producto' => '',
            'nombre_producto' => '',
        );
        $this->Caja_model->guardar_ventas_dia($registro_venta);

        //actualizamos datos de producto
        $this->Productos_model->guardar_precio_venta($producto_id, $precio_producto);


        //guardar liquidacion producto
        $datos_de_liquidacion = array(
            'id_factura' => $this->input->post('no_factura'),
            'id_producto' => $producto_id,
        );
        $this->Productos_model->guardar_liquidacion_factura_producto($datos_de_liquidacion);


        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');
    }

    function abonar_apartado()
    {
        $data = compobarSesion();
        //obtenemos id de cliente
        $cliente_id = $data['segmento'] = $this->uri->segment(3);
        //obtenemos id producto desde url
        $producto_id = $data['segmento'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($cliente_id);

        $datos_producto = $this->Productos_model->datos_de_productos($producto_id);
        $data['productos'] = $datos_producto;

        echo $this->templates->render('admin/abonar_apartado', $data);
    }

    function guardar_abono_apartado()
    {
        //Datos de session
        $data = compobarSesion();
        //print_contenido($_POST);
        $contrato_id = $this->input->post('contrato_id');
        $producto_id = $this->input->post('producto_1');
        $datos_producto = $this->Productos_model->datos_de_productos($producto_id);

        $monto_abono = $this->input->post('monto_abono');
        $producto = $datos_producto->row();
        $precio_venta = $producto->precio_venta;
        $apartado = $producto->apartado;
        $nuevo_valor_apartado = $apartado + $monto_abono;
        $saldo_producto = $precio_venta - $nuevo_valor_apartado;


        $datos_abono_apartado = array(
            'producto_id' => $this->input->post('producto_1'),
            'apartado' => $nuevo_valor_apartado
        );

        $this->Productos_model->abonar_producto_apartado($datos_abono_apartado);
        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'producto_id' => $this->input->post('producto_1'),
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('monto_abono'),
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'abono_apartado',
            'detalle' => 'Abono a apartado de producto : ' . $this->input->post('producto_1') . ' Saldo: ' . $saldo_producto
        );
        $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);

        //guardamos log de caja de abono a capital
        $datos_abono = array(
            'recibo_id' => $recibo_id,
            'monto' => number_format($datos_recibo['monto_recibo'], 2),
            'id_producto' => $this->input->post('producto_1'),
            'saldo' => $saldo_producto,
        );
        $this->Caja_model->guardar_abonos_a_apartados($datos_abono);

        if ($contrato_id != '0') {
            //guardamos en el log de contraros
            $datos_log = array(
                'accion' => 'abono',
                'contrato' => $this->input->post('contrato_id'),
                'cliente' => $this->input->post('cliente_id'),
                'usuario' => $data['user_id'],
            );
            $this->Contratos_model->guardar_log($datos_log);
        }
        //redrigimos a detalle de cliente
        redirect(base_url() . 'cliente/detalle/' . $datos_recibo['cliente_id']);
    }

    //exportar
    function productos_excel()
    {
        $fecha = new DateTime();
        to_excel($this->Productos_model->productos_excel(), "productos_" . $fecha->format('Y-m-d'));
    }


    //para pagina publica
    function productos_sin_foto()
    {
        $data = compobarSesion();

        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['productos_sin_foto'] = $this->Productos_model->get_productos_liquidacion_sin_foto();
        echo $this->templates->render('admin/lista_productos_sin_imagen', $data);
    }

    function subir_imagenes_producto()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        //Id de producto desde segmento URL
        $data['producto_id'] = $this->uri->segment(3);
        //datos del producto
        $data['producto_data'] = $this->Productos_model->datos_de_producto($data['producto_id']);
        $data['fotos_producto'] = $this->Productos_model->get_fotos_de_producto_by_id($data['producto_id']);


        echo $this->templates->render('admin/subir_imagenes_producto', $data);
    }

    function guardar_imagen()
    {
        //print_contenido($_FILES);
        //obtenemos el id del producto desde una cabecera http enviada desde el dropzone
        $producto_id = $_SERVER['HTTP_PRODUCTO_ID'];
        //echo 'el id del producto es : ' . $producto_id;
        //obtenemos los datos del producto con el id de la cabecera
        $datos_de_producto = $this->Productos_model->datos_de_producto($producto_id);
        $datos_de_producto = $datos_de_producto->row();

        //obtenemos el numero de imagenes desde el producto
        $numero_de_imagenes = $datos_de_producto->imagen;

        //generamos el nombre para la imagen que se va a subir
        //comprobamos si hay algun nombre en la tabla de imagenes
        $imagenes_producto = $this->Productos_model->get_fotos_de_producto_by_id($producto_id);
        if ($imagenes_producto) {
            //si ya tiene imagenes y existe la primera
            if (file_exists('/home2/comproempeno/public_html/uploads/imagenes_productos/' . $producto_id . '.jpg')) {
                $poner_nombre = false;
                $i = 1;//numero de conteo que aumenta para modificar el nombre de la imagen
                do { // comprbar los nombres mientras no se pueda poner el nombre
                    if (file_exists('/home2/comproempeno/public_html/uploads/imagenes_productos/' . $producto_id . '_' . $i . '.jpg')) {
                        echo 'la imagen existe no ponerle asi';
                        $poner_nombre = false;
                    } else {
                        echo 'la imagen no se encuentra ponerle asi \n ';
                        $nombre_imagen = $producto_id . '_' . $i . '.jpg';
                        $poner_nombre = true;
                    }
                    $i = $i + 1;
                } while ($poner_nombre == false); //Loop minetras que no se pueda poner el nombre de la imagen
                echo $nombre_imagen;
            } else {
                //si no existe la primera imagen
                $nombre_imagen = $producto_id . '.jpg';
            }
        } else {
            //si no existen imagenes
            $nombre_imagen = $producto_id . '.jpg';
        }

        $tipo_imagen = $_FILES['imagen_producto']['type'];
        $tipo_imagen = explode("/", $tipo_imagen);
        $extension_imgen = $tipo_imagen[1]; // porción2

        //datos de imagen
        $datos_imagen = array(
            "producto_id" => $producto_id,
            "extencion" => $extension_imgen,
            "nombre_imagen" => $nombre_imagen
        );
        //guadramos el nombre generado de la imagen y la asignamos a producto
        $this->Productos_model->guardar_foto_tabla_fotos($datos_imagen);
        print_r($datos_imagen);

        if (!empty($_FILES['imagen_producto']['name'])) { //si se envio un archivo
            $tipo_imagen = $_FILES['imagen_producto']['type'];
            echo '<p>' . $nombre_imagen . '</p>';
            echo '<p>' . $tipo_imagen . '</p>';

            $config['upload_path'] = './uploads/imagenes_productos';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $nombre_imagen;
            $config['overwrite'] = TRUE;
            //$config['max_size']      = 100;
            //$config['max_width']     = 1024;
            //$config['max_height']    = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagen_producto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/imagenes_productos/' . $nombre_imagen;
                //$config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 800;
                //$config['height']       = 50;
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }


                $data = array('upload_data' => $this->upload->data());
                //$this->load->view('subir_documento', $data);
                echo $this->upload->data('file_name');
                echo $this->upload->data('file_size');
            }
        } else {

        }
    }

    function borrar_imagen()
    {

        //Id de imagen desde segmento URL
        $data['imagen_id'] = $this->uri->segment(3);
        //Id de producto desde segmento URL
        $data['prducto_id'] = $this->uri->segment(4);
        $imagen_id = $data['imagen_id'];
        $datos_imagen = $this->Productos_model->get_datos_imagen($imagen_id);
        if ($datos_imagen) {
            $datos_imagen = $datos_imagen->row();
            $nombre_imagen = $datos_imagen->nombre_imagen;

            //borrado de registro
            $this->Productos_model->borrar_registro_imagen($imagen_id);

            //borrado de imagen
            if (file_exists('/home2/comproempeno/public_html/uploads/imagenes_productos/' . $nombre_imagen)) {
                //echo 'imagen existe';
                if (unlink('/home2/comproempeno/public_html/uploads/imagenes_productos/' . $nombre_imagen)) {
                    $this->session->set_flashdata('mensaje', 'se borro la imagen');
                    redirect(base_url() . 'productos/subir_imagenes_producto/' . $data['prducto_id']);
                } else {
                    echo 'no se borro';
                }

            } else {

                //echo 'la imagen no existe';
            }


        } else {
            $this->session->set_flashdata('mensaje', 'imagen no existe');
            redirect(base_url() . 'productos/subir_imagenes_producto/' . $data['prducto_id']);

        }
    }

    function pedidos_de_pagina(){
        $data = compobarSesion();
        //obtenemos los pedidos de la pagina
        $data['pedidos'] = $this->Productos_model->pedidos_pagina();

        echo $this->templates->render('admin/abonar_apartado', $data);
    }

    //publico
    function get_productos_liquidacion_hompage_public()
    {

    }
    function categoria()
    {
        //categoria de productos
        $data['categoria'] = urldecode($this->uri->segment(3));
        //categoria para usar en vista
        $data['categoria_actual'] = urldecode($this->uri->segment(3));

        $data['numero_resultados'] = $this->Productos_model->get_productos_liquidacion_by_categoria_public_numero($data['categoria']);
        // echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "/productos/categoria/" . $data['categoria'];
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 18;
        $config["uri_segment"] = 4;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['categorias'] = $this->Productos_model->get_public_categorias();
        $data['productos'] = $this->Productos_model->get_productos_liquidacion_by_categoria_public($data['categoria'], $config["per_page"], $page);
        $data['monstrar_banners'] = false;


        echo $this->templates->render('public/categoria_productos', $data);
    }
    function ver()
    {
        //id del producto
        $data['producto_id'] = urldecode($this->uri->segment(3));
        //si no hay producto redirigir a listado general de productos
        if (!$data['producto_id']) {
            redirect(base_url() . 'home/productos');
        }
        //categorias publicas
        $data['categorias'] = $this->Productos_model->get_public_categorias();
        //obtenemos los datos del producto
        $data['producto_data'] = $this->Productos_model->datos_de_producto_public($data['producto_id']);

        echo $this->templates->render('public/vista_producto', $data);

    }
    function filtro(){
        //categoria
        $categoria = $this->uri->segment(3);

        if ($categoria == null) {
            $categoria = 'todas';
        }
        $data['categoria'] = $categoria;

        //tienda
        $tienda = $this->uri->segment(4);
        if ($tienda == null) {
            $tienda = 'todas';
        }
        $data['tienda'] = $tienda;

        //categoria para usar en vista
        $data['categoria_actual'] = urldecode($categoria);

        /* echo $categoria;
         echo'<br>';
         echo $tienda;*/

        $data['numero_resultados'] = $this->Productos_model->get_producto_public_numero($categoria, $tienda);
        //echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "productos/filtro/" . $categoria.'/'.$tienda;
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 18;
        $config["uri_segment"] = 5;
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
        $page = ($this->uri->segment(4)) ? $this->uri->segment(5) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['categorias'] = $this->Productos_model->get_public_categorias();
        $data['page']= $page;
        $data['productos'] = $this->Productos_model->get_producto_public($data['categoria'],$data['tienda'],$config["per_page"], $page);

        //print_contenido($data['productos']->result());
        //exit();
        $data['monstrar_banners'] = false;
        echo $this->templates->render('public/filtro_producto', $data);
    }
    function pedido_publico(){

        //comprobamos que exista post
        if($this->input->post('email_cliente')){
            //leemos datos desde post
            $nombre = $this->input->post('nombre_cliente');
            $correo = $this->input->post('email_cliente');
            $telefono= $this->input->post('telefono_cliente');
            $direccion= $this->input->post('direccion_cliente');
            $codigo_producto= $this->input->post('producto_id');
            $fecha = new DateTime();

            $dataFromulario = array(
                'nombre' => $nombre,
                'email' => $correo,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'codigo_producto' => $codigo_producto,
                'fecha' => $fecha->format('Y-m-d H:i:s')
            );

            $this->Productos_model->prducto_a_pedido($codigo_producto);

            //Guardamos el pedido
            $this->Productos_model->guardar_pedido_catalogo($dataFromulario);
            //actualizar el producto para pasarlo a pedido

            //configuracion de correo
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('pedidos@xn--comproempeo-beb.com', 'COMPROEMPEÑO');
            $this->email->to($correo);
            $this->email->cc('pedidos@xn--comproempeo-beb.com');
            $this->email->bcc('csamayoa@zenstudiogt.com');
            $this->email->subject('Pedido producto COD:'.$codigo_producto);
            //mensaje
            $message = '<html><body>';
            $message .= '<img src="'.base_url().'ui/public/images/logo_top.png" alt="compromepeño" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>nombre:</strong> </td><td>" .strip_tags($nombre) ."</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($correo) . "</td></tr>";
            $message .= "<tr><td><strong>Telefono:</strong> </td><td>" . strip_tags($telefono) . "</td></tr>";
            $message .= "<tr><td><strong>Dirección:</strong> </td><td>" . strip_tags($direccion) . "</td></tr>";
            $message .= "<tr><td><strong>Codigo de ptroducto:</strong> </td><td><a target='_blank' href='". base_url()."Productos/ver/".$codigo_producto."'>".strip_tags($codigo_producto) . "</a></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";

            $this->email->message($message);

            //enviar correo
            $this->email->send();


            echo'send';
        }else{
            //redirigir al home
            redirect(base_url());
        }

    }
}