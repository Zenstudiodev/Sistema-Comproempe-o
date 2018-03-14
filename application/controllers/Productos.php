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

    function liquidacion()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['productos'] = $this->Productos_model->get_productos_liquidacion();
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

    function guardar_liquidacion()
    {
        $fecha = New DateTime();
        //echo '<pre>';
        //print_r($_POST);
        //echo '</pre>';
        //echo '<hr>';
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

            //echo '<pre>';
            //print_r($datos_producto);
            //echo '</pre>';
            //echo 'Contrato: ' . $datos_producto->contrato_id;

            $datos_contrato = $this->Contratos_model->get_info_contrato($datos_producto->contrato_id);
            $datos_contrato = $datos_contrato->row();
            //echo '<pre>';
            //print_r($datos_contrato);
            //echo '</pre>';
            //echo 'modificar contrato <br>';
            //echo 'Restar mutuo de producto ' . $datos_producto->mutuo . ' de contrato' . $datos_contrato->contrato_id . ' ' . $datos_contrato->total_mutuo . '<br>';
            $resultado_mutuo = (floatval($datos_contrato->total_mutuo) - floatval($datos_producto->mutuo));
            $resultado_liquidado = (floatval($datos_contrato->tototal_liquidado) + floatval($datos_producto->mutuo));
            $suma_mutuos = (floatval($suma_mutuos) + floatval($datos_producto->mutuo));
            //echo 'Resultado = ' . $resultado_mutuo . '<br>';
            $estado_contrato = 'perdido';
            if ($resultado_mutuo == 0) {
                $estado_contrato = 'liquidado';
            } else {
                $estado_contrato = 'liquidado_parcial';
            }
            //echo $estado_contrato;

            $nuevos_datos_de_contrato = array(
                'contrato_id' => $datos_contrato->contrato_id,
                'tototal_liquidado' => $resultado_liquidado,
                'total_mutuo' => $resultado_mutuo,
                'estado' => $estado_contrato,
            );
            $this->Contratos_model->actualizar_estado_liquidacion($nuevos_datos_de_contrato);

            $gastos_administrativos = (floatval($this->input->post('producto_' . $i . '_p')) - floatval($datos_producto->mutuo));

            //echo '<hr>';
            $detalle_factura .= '<tr>';
            $detalle_factura .= '<td style="width: 1.90cm"></td>';
            $detalle_factura .= '<td colspan="2">Liquidacion de contrato  ' . $datos_contrato->contrato_id . '</td>';
            $detalle_factura .= '<td style="width: 3.51cm">' . formato_dinero($datos_producto->mutuo) . '</td>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr>';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '<td colspan="3">' . $datos_producto->nombre_producto . ' | ' . $datos_producto->marca . ' | ' . $datos_producto->modelo . '</td>';
            $detalle_factura .= '</tr>';
            $detalle_factura .= '<tr>';
            $detalle_factura .= '<td></td>';
            $detalle_factura .= '<td colspan="2">' . 'Gastos administrativos' . '</td>';
            $detalle_factura .= '<td>' . formato_dinero($gastos_administrativos) . '<br>';
            $detalle_factura .= '</tr>';

            $contrados_recibo .= $datos_contrato->contrato_id . ',';

            $i++;
        }

        $detalle_recibo .= 'Liquidación de contratos: ' . $contrados_recibo . '<br>';
        $detalle_recibo .= 'Suma de mutuos ' . formato_dinero($suma_mutuos);


        //echo 'Guardar Factura: <br>';
        //echo $detalle_factura;
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
        //echo '<pre>';
        //print_r($datos_factura);
        //echo '</pre>';

        //echo '<hr>';

        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $suma_mutuos,
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'liquidacion',
            'detalle' => $detalle_recibo
        );
        /*echo'<pre>';
        print_r($datos_recibo);
        echo'</pre>';*/

        //guardamos factura
        $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
        $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
        //Guardamos la transaccion de factura y recibo
        $this->Factura_model->guardar_factura_recibo($factura_id, $recibo_id);

        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');

    }

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
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';



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

            //$this->Productos_model->guardar_precio_venta($this->input->post('producto_' . $i), $this->input->post('producto_' . $i . '_p'));
            $datos_producto = $this->Productos_model->datos_de_producto($this->input->post('producto_' . $i));
            $datos_producto = $datos_producto->row();

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

        echo '<table>' . $detalle_factura . '</table>';

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
        echo '<pre>';
        print_r($datos_factura);
        echo '</pre>';

        echo '<hr>';

        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => '0',
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('total'),
            'monto_recibo_letras' => $this->input->post('monto_recibo_letras'),
            'tipo' => 'venta',
            'detalle' => $detalle_recibo
        );
        echo '<pre>';
        print_r($datos_recibo);
        echo '</pre>';
        exit();

        if ($_POST['comprobante'] == 'factura') {
            //guardamos factura
            $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
        } else if ($_POST['comprobante'] == 'recibo') {
            $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
        }

        redirect(base_url() . 'index.php/cliente/detalle/' . $this->input->post('cliente_id'), 'refresh');

    }

    function productos_excel()
    {
        $fecha = new DateTime();
        to_excel($this->Productos_model->productos_excel(), "productos_" . $fecha->format('Y-m-d'));
    }
}