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
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Caja_model');
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Proveedor_model');
    }

    function index()
    {
        $data['clientes'] = $this->Cliente_model->listar_clientes();

        echo $this->templates->render('admin/lista_clientes', $data);
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

        if ($tienda == '1') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_1_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_1_contratos_2();

        } elseif ($tienda == '2') {
            $data['productos_contrato_tienda_1'] = $this->Productos_model->get_productos_tienda_2_contratos_1();
            $data['productos_contrato_tienda_2'] = $this->Productos_model->get_productos_tienda_2_contratos_2();
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
            // user hasen't submitted anything yet!
            //redirect(base_url() . 'index.php/productos/liquidacion', 'refresh');
        }

    }

    function guardar_liquidacion()
    {
        $fecha = New DateTime();
        $detalle_factura = '';
        $detalle_recibo = '';
        $contrados_recibo = '';
        $suma_mutuos = 0;

        $numero_de_productos = $this->input->post('numero_productos');
        $i = 1;
        while ($i <= $numero_de_productos) {
            //echo 'Producto: ' . $this->input->post('producto_' . $i);
            //echo ' Guardar precio de venta: ' . $this->input->post('producto_' . $i . '_p');

            $this->Productos_model->guardar_precio_venta($this->input->post('producto_' . $i), $this->input->post('producto_' . $i . '_p'));
            $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
            $datos_producto = $datos_producto->row();

            //guardar liquidacion producto
            $datos_de_liquidacion = array(
                'id_factura' => $this->input->post('no_factura'),
                'id_producto' => $this->input->post('producto_' . $i),
            );
            $this->Productos_model->guardar_liquidacion_factura_producto($datos_de_liquidacion);

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

            $contrados_recibo .= $datos_contrato->contrato_id . ',';

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


        //todo rodear con in while de productos para obtener el total de productos
        $registro_venta= array(
            'factura_id'=>$factura_id,
            'recibo_id'=>'',
            'monto'=>$datos_factura['total'],
            'id_producto'=>'',
            'nombre_producto'=>'',
        );
        $this->Caja_model->guardar_ventas_dia($registro_venta);
        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');
    }

    function productos_trasladar()
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
                $this->session->set_flashdata('error', 'Para trasladar debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/productos/liquidacion');
            }
            //print_r($productos);
            $data['productos'] = $this->Productos_model->datos_de_productos($productos);

            //print_contenido($data['productos']->result());
            foreach ($data['productos']->result() as $producto) {
                //cambiar estado de tienda
                $tienda = tienda_id_h();
                $tienda_actual = $tienda;
                // actualizamos en la base de datos
                if ($tienda == '1') {
                    $tienda_actual = 2;
                } elseif ($tienda == '2') {
                    $tienda_actual = 1;
                }
                $this->Productos_model->trasladar_producto($producto->producto_id, $tienda_actual);
            }
            redirect(base_url() . 'productos/liquidacion');
        } else {
        }
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
            $registro_venta= array(
                'factura_id'=>$factura_id,
                'recibo_id'=>'',
                'monto'=>$datos_factura['total'],
                'id_producto'=>'',
                'nombre_producto'=>'',
            );
            $this->Caja_model->guardar_ventas_dia($registro_venta);

        } else if ($_POST['comprobante'] == 'recibo') {
            $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
            //todo rodear con in while de productos para obtener el total de productos
            $registro_venta= array(
                'factura_id'=>'',
                'recibo_id'=>$recibo_id,
                'monto'=>$datos_factura['total'],
                'id_producto'=>'',
                'nombre_producto'=>'',
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
            'monto' => $this->input->post('total_apartado'),
            'id_producto' => '',
            'saldo' => '',
            'fecha_vencimiento' => '',
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
        $suma_mutuos = 0;

        print_contenido($_POST);

        $fecha = $this->input->post('fecha');
        $precio_producto = $this->input->post('producto_1_p');
        $producto_id = $this->input->post('producto_1');
        $cliente_id = $this->input->post('cliente_id');
        $descuento = $this->input->post('descuento');


        exit();

        $numero_de_productos = $this->input->post('numero_productos');


        $this->Productos_model->guardar_precio_venta($this->input->post('producto_' . $i), $this->input->post('producto_' . $i . '_p'));
        $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
        $datos_producto = $datos_producto->row();

        //guardar liquidacion producto
        $datos_de_liquidacion = array(
            'id_factura' => $this->input->post('no_factura'),
            'id_producto' => $this->input->post('producto_' . $i),
        );
        $this->Productos_model->guardar_liquidacion_factura_producto($datos_de_liquidacion);

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
        $detalle_factura .= '<td style="width: 3.51cm">' . formato_dinero($datos_producto->mutuo) . '</td>';
        $detalle_factura .= '</tr>';
        $detalle_factura .= '<tr style="height: auto;">';
        $detalle_factura .= '<td></td>';
        $detalle_factura .= '<td colspan="3">' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '</td>';
        $detalle_factura .= '</tr>';
        $detalle_factura .= '<tr style="height: auto;">';
        $detalle_factura .= '<td></td>';
        $detalle_factura .= '<td colspan="2">' . 'Gastos administrativos' . '</td>';
        $detalle_factura .= '<td>' . formato_dinero($gastos_administrativos) . '<br>';
        $detalle_factura .= '</tr>';

        $contrados_recibo .= $datos_contrato->contrato_id . ',';


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

        $datos_abono_apartado = array(
            'producto_id' => $this->input->post('producto_1'),
            'apartado' => $nuevo_valor_apartado
        );

        $this->Productos_model->abonar_producto_apartado($datos_abono_apartado);
        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('monto_abono'),
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'abono_apartado',
            'detalle' => 'Abono a apartado de producto : ' . $this->input->post('producto_1')
        );
        $this->Contratos_model->guardar_recibo($datos_recibo);
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
}