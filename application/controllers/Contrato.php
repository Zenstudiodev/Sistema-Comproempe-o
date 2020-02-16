<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/07/2017
 * Time: 2:32 PM
 */
class Contrato extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Contratos_model');
        $this->load->model('Caja_model');
        $this->load->model('Factura_model');
        $this->load->model('Caja_model');
        $this->load->library('NumeroALetras');
    }

    function index()
    {
        $data = compobarSesion();

        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            $data['contratos'] = $this->Contratos_model->listar_contratos_by_date($data['from'], $data['to']);
        } else {
            $data['contratos'] = $this->Contratos_model->listar_contratos();
        }
        echo $this->templates->render('admin/lista_contratos', $data);
    }
    function actualizar_estado()
    {
        $contratos_tienda_1 = $this->Contratos_model->contratos_actuaizador_t1();

        $contratos_tienda_2 = $this->Contratos_model->contratos_actuaizador_t2();
        $contratos_tienda_3 = $this->Contratos_model->contratos_actuaizador_t3();
        $contratos_tienda_4 = $this->Contratos_model->contratos_actuaizador_t4();
        $contratos_tienda_5 = $this->Contratos_model->contratos_actuaizador_t5();
        $contratos_tienda_6 = $this->Contratos_model->contratos_actuaizador_t6();
        if ($contratos_tienda_1) {
            echo '<p>' . $contratos_tienda_1->num_rows() . ' Contratos en tienda 1</p>';
        }
        if ($contratos_tienda_2) {
            echo '<p>' . $contratos_tienda_2->num_rows() . ' Contratos en tienda 2</p>';
        }
        if ($contratos_tienda_3) {
            echo '<p>' . $contratos_tienda_3->num_rows() . ' Contratos en tienda 3</p>';
        }
        if ($contratos_tienda_4) {
            echo '<p>' . $contratos_tienda_4->num_rows() . ' Contratos en tienda 4</p>';
        }
        if ($contratos_tienda_5) {
            echo '<p>' . $contratos_tienda_5->num_rows() . ' Contratos en tienda 5</p>';
        }
        if ($contratos_tienda_6) {
            echo '<p>' . $contratos_tienda_6->num_rows() . ' Contratos en tienda 6</p>';
        }

        $fecha_actual = new DateTime();

        if ($contratos_tienda_1) {
            echo '<h1>CONTRATOS TIENDA 1</h1>';

            foreach ($contratos_tienda_1->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual < $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $fecha_contrato->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 10) {

                                $this->Contratos_model->actualizar_estado_contrato_t1($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo '<p>Contrato Vencido</p>';
                                $this->Contratos_model->actualizar_estado_contrato_t1($contrato->contrato_id, 'perdido');
                                echo '<p>Contrato actualizado</p>';
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '1');

                                foreach ($productos->result() as $producto) {
                                    echo $producto->tienda_id . '<br>';
                                    $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                }
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        if ($contratos_tienda_2) {
            echo '<h1>CONTRATOS TIENDA 2</h1>';

            foreach ($contratos_tienda_2->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual <= $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $fecha_contrato->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 10) {

                                $this->Contratos_model->actualizar_estado_contrato_t2($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo '<p>Contrato Vencido</p>';
                                $this->Contratos_model->actualizar_estado_contrato_t2($contrato->contrato_id, 'perdido');
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '2');
                                if($productos){
                                    foreach ($productos->result() as $producto) {
                                        $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                    }
                                }
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        if ($contratos_tienda_3) {
            echo '<h1>CONTRATOS TIENDA 3</h1>';

            foreach ($contratos_tienda_3->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual <= $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $fecha_contrato->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 10) {

                                $this->Contratos_model->actualizar_estado_contrato_t3($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo '<p>Contrato Vencido</p>';

                                $this->Contratos_model->actualizar_estado_contrato_t3($contrato->contrato_id, 'perdido');
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '3');
                                if($productos){
                                    foreach ($productos->result() as $producto) {
                                        $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                    }
                                }
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        if ($contratos_tienda_4) {
            echo '<h1>CONTRATOS TIENDA 4</h1>';

            foreach ($contratos_tienda_4->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);
                $inicia_dias_gracia = new DateTime($contrato->fecha_pago);
                $inicia_dias_gracia->modify('+1 days');

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'Días de gracia: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual <= $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $inicia_dias_gracia->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 8) {

                                $this->Contratos_model->actualizar_estado_contrato_t4($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo $contrato->contrato_id;
                                $this->Contratos_model->actualizar_estado_contrato_t4($contrato->contrato_id, 'perdido');
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '4');
                                if($productos){
                                    foreach ($productos->result() as $producto) {
                                        $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                    }
                                }
                                echo '<p>Contrato Vencido</p>';
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        if ($contratos_tienda_5) {
            echo '<h1>CONTRATOS TIENDA 5</h1>';

            foreach ($contratos_tienda_5->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual <= $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $fecha_contrato->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 8) {

                                $this->Contratos_model->actualizar_estado_contrato_t5($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo '<p>Contrato Vencido</p>';

                                $this->Contratos_model->actualizar_estado_contrato_t5($contrato->contrato_id, 'perdido');
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '5');
                                if($productos){
                                    foreach ($productos->result() as $producto) {
                                        $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                    }
                                }
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        if ($contratos_tienda_6) {
            echo '<h1>CONTRATOS TIENDA 6</h1>';

            foreach ($contratos_tienda_6->result() as $contrato) {
                $fecha_contrato = new DateTime($contrato->fecha_pago);

                if ($contrato->estado == 'vigente' || $contrato->estado == 'gracia' || $contrato->estado == 'refrendado') {
                    echo '<p>' . $contrato->contrato_id . '</p>';
                    echo '<p> estado de contrato: ' . $contrato->estado . '</p>';
                    echo 'fecha de pago: ' . $fecha_contrato->format('Y-m-d') . '<br>';
                    echo 'fecha de actual: ' . $fecha_actual->format('Y-m-d') . '<br>';

                    if ($fecha_actual <= $fecha_contrato) {
                        echo '<p>Aun no se ha pasado la fecha de pago</p>';
                    } else {
                        echo '<p>ya se paso la fecha de pago</p>';

                        $interval = $fecha_contrato->diff($fecha_actual);
                        $diferencia_dias = intval($interval->format('%R%a'));
                        if ($contrato->tipo == 'Empeno') {
                            //echo '<p>Es un empeño</p>';

                            echo '<p>diferencia de dias = ' . $diferencia_dias . '</p>';


                            if ($diferencia_dias < 8) {

                                $this->Contratos_model->actualizar_estado_contrato_t6($contrato->contrato_id, 'gracia');

                                echo '<p>en dias de gracia</p>';
                            } else {
                                echo '<p>Contrato Vencido</p>';

                                $this->Contratos_model->actualizar_estado_contrato_t6($contrato->contrato_id, 'perdido');
                                $productos = $this->Productos_model->get_productos_by_contrato_actualizador($contrato->contrato_id, '6');
                                if($productos){
                                    foreach ($productos->result() as $producto) {
                                        $this->Productos_model->cambiar_producto_a_venta($producto->producto_id);
                                    }
                                }
                            }
                        }
                    }
                    echo '<hr>';
                }
            }
        }
        echo'enviar mensaje';
        $this->email->from('info@xn--comproempeo-beb.com', 'Comproempeño');
        $this->email->to('la_samayoa@hotmail.com');
        $this->email->cc('comproempeno@gmail.com');
        $this->email->bcc('csamayoa@zenstudiogt.com');
        $this->email->subject('Contratos actualizados');
        $this->email->message('Se actualizaron los contratos');
        $this->email->send();
        echo'enviado';
        //echo '<pre>';
        //print_r($data['contratos']->result());
        //echo '</pre>';
    }
    function test_mail(){
        $this->email->from('info@xn--comproempeo-beb.com', 'Comproempeño');
        $this->email->to('csamayoa@zenstudiogt.com');
        $this->email->cc('dlatios@gmail.com');
        //$this->email->to('la_samayoa@hotmail.com');
        //$this->email->cc('comproempeno@gmail.com');
        //$this->email->bcc('csamayoa@zenstudiogt.com');
        $this->email->subject('Contratos actualizados prueba');
        $this->email->message('Se actualizaron los contratos');
        $this->email->send();
        // Will only print the email headers, excluding the message subject and body
        $this->email->print_debugger(array('headers'));
    }
    function nuevo()
    {
        $data = compobarSesion();
        //ID cliente
        $data['segmento_c'] = $this->uri->segment(3);
        $data['ultimo_contrato'] = $this->Contratos_model->numero_ultimo_contrato();
        //si no hay segmento en la url
        if (!$data['segmento_c']) {
            //enviamos a la lista de clientes
            redirect(base_url() . 'cliente/');
        } else {
            $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_c']);
        }
        //print_r($data['cliente']);
        $productos = array();
        if (!empty($_POST)) {
            //pasamos todos los post a un array
            foreach ($_POST as $key => $value) {
                //quitamos el valor de vista en la tabla
                if ($key == 'empeno_productos_table_length' || $key == 'contratos_table_length') {
                } else {
                    $productos[] = $value;
                }

            }
            //echo is_array($productos) ? 'Array' : 'No es un array';
            if (empty($productos)) {
                $this->session->set_flashdata('error', 'Para crear un contrato debe seleccionar un producto');
                // user hasen't submitted anything yet!
                redirect(base_url() . 'index.php/cliente/detalle/' . $data['segmento_c'], 'refresh');
            }
            //print_r($productos);
            //print_r($_POST);

            $data['productos'] = $this->Productos_model->datos_de_productos($productos);
        } else {

        }
        if (isset($data['productos'])) {
            echo $this->templates->render('admin/contrato', $data);
        } else {
            $this->session->set_flashdata('error', 'Para crear un contrato debe seleccionar un producto');
            // user hasen't submitted anything yet!
            redirect(base_url() . 'index.php/cliente/detalle/' . $data['segmento_c'], 'refresh');


        }

    }
    function guardar_contrato()
    {
        $productos = array();
        foreach ($_POST as $key => $value) {
            //quitamos el valor de vista en la tabla
            if ($key == 'empenos_table_length') {
            } else {
                $productos[] = $value;
            }
        }

        //print_r($_POST);
        $estado_contrato = 'vigente';
        //tomamos el plazo del contrato
        $plazo = $this->input->post('plazo');

        if ($plazo == '1') {//si el plazo del contrato es 1 dia se genera perdido
            $estado_contrato = 'perdido';
        }

        $datos = array(
            'contrato_id' => $this->input->post('no_contrato'),
            'cliente_id' => $this->input->post('cliente_id'),
            'fecha_contrato_h' => $this->input->post('fecha_contrato_h'),
            'numero_de_productos' => $this->input->post('numero_de_productos'),
            'total_mutuo' => $this->input->post('total_mutuo'),
            'total_avaluo' => $this->input->post('total_avaluo'),
            'almacenaje' => $this->input->post('almacenaje'),
            'plazo' => $this->input->post('plazo'),
            'tasa_interes' => $this->input->post('tasa_interes'),
            'pago_interes' => $this->input->post('pago_interes'),
            'costo_almacenaje' => $this->input->post('costo_almacenaje'),
            'pago_iva' => $this->input->post('pago_iva'),
            'refrendo_h' => $this->input->post('refrendo_h'),
            'desempeno' => $this->input->post('desempeno_h'),
            'fecha_pago' => $this->input->post('fecha_pago'),
            'dias_gracia' => $this->input->post('dias_gracia'),
            'tipo' => $this->input->post('tipo'),
            'estado' => $this->input->post('tipo'),
            'cotitular' => $this->input->post('cotitular'),
            'estado' => $estado_contrato,
        );
        //
        $contrato_id = $this->Contratos_model->guardar_contrato($datos);



        //echo $contrato_id;
        $numero_de_productos = $this->input->post('numero_de_productos');

        //Si es solo un producto
        if ($numero_de_productos == 1) {
            $producto_numero = 'producto_1';
            $producto_id = $this->input->post($producto_numero);
            //echo "asignar contrato id:". $contrato_id.' a producto' . $producto_id;
            $this->Productos_model->asignar_contrato($producto_id, $contrato_id);
            //si el plazo del contrato es 1 dia pasar producto a liquidación
            if ($plazo == '1') {
                $this->Productos_model->cambiar_producto_a_venta($producto_id);
            }
        } else { //loop asignar contrato a productos
            $x = 1;
            while ($x <= $numero_de_productos) {
                $producto_numero = 'producto_' . $x;
                $producto_id = $this->input->post($producto_numero);
                //echo "asignar contrato id:". $contrato_id.' a producto' . $producto_id;
                $this->Productos_model->asignar_contrato($producto_id, $contrato_id);
                //si el plazo del contrato es 1 dia pasar producto a liquidación
                if ($plazo == '1') {
                    $this->Productos_model->cambiar_producto_a_venta($producto_id);
                }
                $x++;
            }
        }

        //log a cierre de contrato
        $datos_cierre_contrato = array(
            'contrato_id' => $contrato_id,
            'intereses' => $this->input->post('pago_interes'),
            'dias' => $this->input->post('plazo'),
            'monto' => $this->input->post('total_mutuo'),
            'monto_refrendo' => $this->input->post('refrendo_h'),
        );
        //guardamos los datos de contacto en tabla de egresos
        $this->Caja_model->guarda_contratos_del_dia($datos_cierre_contrato);

        redirect(base_url() . 'cliente/detalle/' . $datos['cliente_id']);
    }
    function imprimir_contrato()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);
        echo $this->templates->render('admin/imprimir_contrato', $data);


    }
    function refrendo()
    {
        $data = compobarSesion();        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);
        $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
        echo $this->templates->render('admin/refrendo_contrato', $data);


    }
    function guardar_factura()
    {
        $data = compobarSesion();
        $datos_factura = array(
            'no_factura' => $this->input->post('no_factura'),
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'fecha' => $this->input->post('fecha'),
            'detalle' => '',
            'interese' => $this->input->post('interese'),
            'almacenaje' => $this->input->post('almacenaje'),
            'mora' => $this->input->post('mora'),
            'recuperacion' => $this->input->post('recuperacion'),
            'sub_total' => $this->input->post('sub_total'),
            'descuento' => $this->input->post('descuento'),
            'total' => $this->input->post('total_i'),
            'tipo' => $this->input->post('tipo'),
            'serie_factura' => $this->input->post('serie_factura'),
        );
        //nueva fecha de pago
        $nueva_fecha = $this->input->post('nueva_fecha');
        //guardamos factura
        $this->Contratos_model->guardar_factura($datos_factura);
        //actualizamos fecha a contrato
        //$this->Contratos_model->actualizar_fecha_contrato($datos_factura['contrato_id'], $nueva_fecha);
        //actualizamos estado contraro
        //$this->Contratos_model->actualizar_estado_contrato($datos_factura['contrato_id'], $estado_contrato);

        //* recalcular datos de contrato
        $contrato = $this->Contratos_model->get_info_contrato($datos_factura['contrato_id']);
        $contrato = $contrato->row();
        /*echo '<pre>';
        print_r($contrato);
        echo '</pre>';*/
        $mutuo = $contrato->total_mutuo;
        $tasa_interes = $contrato->tasa_interes;
        $plazo = $contrato->plazo;
        $almacenaje = $contrato->almacenaje;
        $fecha_actual = new DateTime();
        $fecha_pago = new DateTime($contrato->fecha_pago);
        $nueva_fecha_de_pago = new DateTime($contrato->fecha_pago);
        //echo'nueva fecha de pago '. $nueva_fecha_de_pago->format('Y-m-d') .'<br>';

        if ($fecha_actual < $fecha_pago) {
            //echo'fecha actual es menor que la fecha de pago <br>';
            $nueva_fecha_de_pago->modify('+ ' . $plazo . ' days');
        } else {
            //echo'fecha actual es mayor que la fecha de pago <br>';
            $nueva_fecha_de_pago = new DateTime();
            $nueva_fecha_de_pago->modify('+ ' . $plazo . ' days');
        }
        $dias_de_gracia = new DateTime($nueva_fecha_de_pago->format('Y-m-d'));
        $dias_de_gracia = $dias_de_gracia->modify('+ 7 days');
        //echo'nueva fecha de pago despues de modificar'. $nueva_fecha_de_pago->format('Y-m-d') .'<br>';
        //echo'dias de gracia'. $dias_de_gracia->format('Y-m-d') .'<br>';

        //interes
        $pago_interes = $tasa_interes / 30;
        $pago_interes = $pago_interes * $mutuo;
        $pago_interes = $pago_interes * $plazo;
        $pago_interes = $pago_interes / 100;

        //almacenaje
        $pago_almacenaje = $almacenaje / 30;
        $pago_almacenaje = $pago_almacenaje * $mutuo;
        $pago_almacenaje = $pago_almacenaje * $plazo;
        $pago_almacenaje = $pago_almacenaje / 100;

        //Pago iva
        $pago_iva = $pago_interes;
        $pago_iva = $pago_iva + $pago_almacenaje;
        $pago_iva = $pago_iva * 0.12;

        //refrendo
        $refrendo = $pago_interes + $pago_almacenaje + $pago_iva;

        //desempeño
        $desempeno = $refrendo + $mutuo;


        $nuevos_datos_de_contrato = array(
            'contrato_id' => $contrato->contrato_id,
            'pago_interes' => $pago_interes,
            'costo_almacenaje' => $pago_almacenaje,
            'pago_iva' => $pago_iva,
            'refrendo_h' => $refrendo,
            'desempeno' => $desempeno,
            'fecha_pago' => $nueva_fecha_de_pago->format('Y-m-d'),
            'fecha_pago_anterior' => $contrato->fecha_pago,
            'dias_gracia' => $dias_de_gracia->format('Y-m-d'),
            'dias_gracia_anterior' => $contrato->dias_gracia,
            'estado' => 'refrendado',
            'estado_anterior' => $contrato->estado,
        );
        //si el contrato esta vencido pasar los productos vinculados al contrato a vigentes
        if ($contrato->estado == 'perdido') {
            $tienda = tienda_id_h();
            $productos_contrato = $this->Productos_model->get_productos_by_contrato($contrato->contrato_id);

            foreach ($productos_contrato->result() as $producto) {
                $this->Productos_model->regresar_a_vigente($producto->producto_id);
            }
        }

        //actualizamos contrato
        $this->Contratos_model->actualizar_contrato_refrendo($nuevos_datos_de_contrato);

        //guardamos en el log de contraros
        $datos_log = array(
            'accion' => 'refrendo',
            'contrato' => $this->input->post('contrato_id'),
            'cliente' => $this->input->post('cliente_id'),
            'usuario' => $data['user_id'],
        );
        $this->Contratos_model->guardar_log($datos_log);

        //guardamos el movimiento en caja
        $intereses_refrendo = array(
            'factura_id' => $datos_factura['no_factura'],
            'monto' => $datos_factura['total'],
            'contrato' => $datos_factura['contrato_id'],
            'monto_refrendado' => $contrato->total_mutuo,
        );
        $this->Caja_model->guardar_intereses_refrendo($intereses_refrendo);


        //redrigimos a detalle de cliente
        redirect(base_url() . 'cliente/detalle/' . $datos_factura['cliente_id']);
    }
    function desempeno()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);
        $data['facturas_activas'] = $this->Factura_model->get_lote_activo();
        echo $this->templates->render('admin/desempeno_contrato', $data);

    }
    function guardar_factura_desempeno()
    {
        $data = compobarSesion();

        //
        $datos_factura = array(
            'no_factura' => $this->input->post('no_factura'),
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'fecha' => $this->input->post('fecha'),
            'detalle' => '',
            'interese' => $this->input->post('interese'),
            'almacenaje' => $this->input->post('almacenaje'),
            'mora' => $this->input->post('mora'),
            'recuperacion' => $this->input->post('recuperacion'),
            'sub_total' => $this->input->post('sub_total'),
            'descuento' => $this->input->post('descuento'),
            'total' => $this->input->post('total_i'),
            'tipo' => $this->input->post('tipo'),
            'serie_factura' => $this->input->post('serie_factura'),
        );

        $datos_recibo = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'fecha' => $this->input->post('fecha'),
            'monto_recibo' => $this->input->post('monto_recibo'),
            'monto_recibo_letras' => $this->input->post('total_en_letras_recibo_i'),
            'tipo' => 'desempeno',
            'detalle' => 'Desempeño de contrato ' . $datos_factura['contrato_id']

        );

        //guardamos factura y recibo y obtenemos los id
        $factura_id = $this->Contratos_model->guardar_factura($datos_factura);
        $recibo_id = $this->Contratos_model->guardar_recibo($datos_recibo);
        //Guardamos la transaccion de factura y recibo
        $this->Factura_model->guardar_factura_recibo($factura_id, $recibo_id);


        $estado_contrato = 'vigente';
        if ($datos_factura['tipo'] == 'referendo') {
            $estado_contrato = 'referendo';
        } elseif ($datos_factura['tipo'] == 'desenmpeno') {
            $estado_contrato = 'desempenado';
        }

        $datos_contrato = $this->Contratos_model->get_info_contrato($this->input->post('contrato_id'));
        $datos_contrato = $datos_contrato->row();

        $nuevos_datos_contrato = array(
            'contrato_id' => $this->input->post('contrato_id'),
            'estado' => $estado_contrato,
            'fecha_pago_anterior' => $datos_contrato->fecha_pago,
            'dias_gracia_anterior' => $datos_contrato->dias_gracia,
            'estado_anterior' => $datos_contrato->estado
        );

        //si el contrato esta vencido pasar los productos vinculados al contrato a vigentes
        if ($datos_contrato->estado == 'perdido') {

            $productos_contrato = $this->Productos_model->get_productos_by_contrato($datos_contrato->contrato_id);

            foreach ($productos_contrato->result() as $producto) {
                $this->Productos_model->regresar_a_vigente($producto->producto_id);
            }
        }
        $this->Contratos_model->actualizar_contrato_desempeno($nuevos_datos_contrato);

        //guardamos en el log de contraros
        $datos_log = array(
            'accion' => 'desenmpeno',
            'contrato' => $this->input->post('contrato_id'),
            'cliente' => $this->input->post('cliente_id'),
            'usuario' => $data['user_id'],
        );
        $this->Contratos_model->guardar_log($datos_log);

        //guardamos log de caja desempeño

        $datos_desenpeno = array(
            'recibo_id' => $recibo_id,
            'monto' => $datos_recibo['monto_recibo'],
            'id_contrato' => $datos_factura['contrato_id'],
        );
        $this->Caja_model->guardar_desenpenos($datos_desenpeno);
        //guardamos log de caja intereses desempeño
        $datos_intereses_desenpeno = array(
            'factura_id' => $factura_id,
            'monto' => $datos_factura['total'],
            'id_contrato' => $datos_factura['contrato_id'],
        );
        $this->Caja_model->guardar_intereses_desempeno($datos_intereses_desenpeno);



        //redrigimos a detalle de cliente
        redirect(base_url() . 'cliente/detalle/' . $datos_factura['cliente_id']);
    }
    function abono_a_apital()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);
        echo $this->templates->render('admin/abono_capital', $data);

    }
    function editar()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);
        echo $this->templates->render('admin/editar_contrato', $data);
    }
    function guardar_editar()
    {
        //print_r($_POST);
        $datos = array(
            'cliente_id' => $this->input->post('cliente_id     '),
            'contrato_id' => $this->input->post('contrato_id'),
            'total_mutuo' => $this->input->post('total_mutuo'),
            'total_avaluo' => $this->input->post('total_avaluo'),
            'almacenaje' => $this->input->post('almacenaje'),
            'plazo' => $this->input->post('plazo'),
            'tasa_interes' => $this->input->post('tasa_interes'),
            'pago_interes' => $this->input->post('pago_interes'),
            'costo_almacenaje' => $this->input->post('costo_almacenaje'),
            'pago_iva' => $this->input->post('pago_iva'),
            'refrendo_h' => $this->input->post('refrendo_h'),
            'desempeno' => $this->input->post('desempeno_h'),
            'fecha_pago' => $this->input->post('fecha_pago'),
            'dias_gracia' => $this->input->post('dias_gracia'),
            'tipo' => $this->input->post('tipo'),
            'estado' => $this->input->post('tipo'),
            'cotitular' => $this->input->post('cotitular')

        );
        /*echo '<pre>';
        print_r($datos);
        echo '</pre>';*/

        $contrato_id = $this->Contratos_model->guardar_editar_contrato($datos);
        redirect(base_url() . 'cliente/detalle/' . $datos['cliente_id']);
    }
    function anular()
    {

        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['contrato'] = $this->Contratos_model->get_info_contrato($data['segmento_contrato']);
        $data['productos'] = $this->Productos_model->get_productos_by_contrato($data['segmento_contrato']);

        $contrato = $data['contrato']->row();
        $cliente = $data['cliente']->row();


        //echo $contrato->contrato_id;
        //echo '<pre>';
        //print_r($data['productos']->result());
        //echo '</pre>';
        if ($data['productos']) {

            foreach ($data['productos']->result() as $producto) {
                $this->Productos_model->liberar_producto_de_contrato($producto->producto_id);
                //echo 'Asignar contrato 0 a producto '. $producto->producto_id.' del contrato '.$contrato->contrato_id.'<br>';
            }

        } else {
            //echo'no hay productos';
        }
        $estado_contrato = 'anulado';
        $this->Contratos_model->actualizar_estado_contrato($contrato->contrato_id, $estado_contrato);
        redirect(base_url() . 'cliente/detalle/' . $cliente->id);

    }
    function guardar_seguimiento()
    {
        $fecha_seguimiento = New DateTime();
        $datos_de_seguimiento = array(
            'cliente_id' => $this->input->post('cliente_id'),
            'contrato_id' => $this->input->post('contrato_id'),
            'fecha_seguimiento' => $fecha_seguimiento->format('Y-m-d'),
            'accion' => $this->input->post('accion'),
            'comentario' => $this->input->post('comentario')
        );

        $this->Contratos_model->guardar_seguimiento($datos_de_seguimiento);

    }
    function get_resultados_seguimiento()
    {
        //ID Contrato
        $data['segmento_contrato'] = $this->uri->segment(3);
        $seguimientos = $this->Contratos_model->get_resultados_seguimiento($data['segmento_contrato']);

        if ($seguimientos) {

            echo '<div class="list-group">';


            foreach ($seguimientos->result() as $seguimiento) {

                echo '<a href="#" class="list-group-item ">';
                echo '<h4 class="list-group-item-heading">' . $seguimiento->accion . '</h4>';
                echo '<p class="list-group-item-text">' . $seguimiento->fecha_seguimiento . '</p>';
                echo '<p class="list-group-item-text">' . $seguimiento->comentario . '</p>';
                echo '</a>';

            }
            echo '</div>';
        } else {
            echo '<div class="alert alert-info alert-dismissible">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo '<h4><i class="icon fa fa-info"></i> Alert!</h4>';
            echo 'Aún no hay seguimientos para este contrato';
            echo '</div>';
        }


    }
    function contratos_vencidos()
    {
        $data = compobarSesion();

        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            $data['contratos'] = $this->Contratos_model->listar_contratos_perdidos_by_date($data['from'], $data['to']);
        } else {
            $data['contratos'] = $this->Contratos_model->listar_contratos_perdidos();
        }
        echo $this->templates->render('admin/lista_contratos_perdidos', $data);
    }
    function contratos_vigentes()
    {
        $data = compobarSesion();
        $data['contratos'] = $this->Contratos_model->listar_contratos_vigentes();
        echo $this->templates->render('admin/lista_contratos_vigentes', $data);
    }
    function contratos_excel()
    {
        $fecha = new DateTime();
        to_excel($this->Contratos_model->contratos_excel(), "Contratos_" . $fecha->format('Y-m-d'));
    }
    function contratos_html_excel()
    {
        $data = compobarSesion();
        $estado= null;



        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        if ($this->uri->segment(5)) {
            $data['estado'] = $this->uri->segment(5);
            $estado =  $data['estado'];
        }

        if ($this->uri->segment(3) !='1' && $this->uri->segment(4) !='1') {
        //if ($this->uri->segment(3)  && $this->uri->segment(4) ) {
            echo'<h1>fintrando fechas</h1>';
            $data['contratos'] = $this->Contratos_model->contratos_html_excel_by_date($data['from'], $data['to'], $estado);
        } else {
            echo'<h1>no fintrando fechas</h1>';
            $data['contratos'] = $this->Contratos_model->contratos_html_excel($estado);
        }
        echo $this->templates->render('admin/contratos_excel_html', $data);

    }
}