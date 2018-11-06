<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 19/09/2017
 * Time: 12:34 PM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Factura extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        // Modelos
        $this->load->model('Cliente_model');
        $this->load->model('Productos_model');
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Recibo_model');
    }

    function index()
    {
        $data = compobarSesion();
        $data['facturas'] = $this->Factura_model->listar_facturas();

        echo $this->templates->render('admin/lista_facturas', $data);
    }

    function serie_r()
    {
        $data = compobarSesion();
        $data['facturas'] = $this->Factura_model->listar_facturas_serie_r();

        echo $this->templates->render('admin/lista_facturas_r', $data);
    }

    function guardar_factura()
    {

    }

    function imprimir_factura()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_factura'] = $this->uri->segment(4);
        $serie_factura = $this->uri->segment(5);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['factura'] = $this->Factura_model->get_info_factura($data['segmento_factura'], $serie_factura);

        $factura = $data['factura']->row();
        $data['contrato'] = $this->Contratos_model->get_info_contrato($factura->contrato_id);


        echo $this->templates->render('admin/imprimir_factura', $data);
    }

    function imprimir_factura_r()
    {
        $data = compobarSesion();
        //ID Contrato
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $data['segmento_factura'] = $this->uri->segment(4);

        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['factura'] = $this->Factura_model->get_info_factura_r($data['segmento_factura']);

        $factura = $data['factura']->row();
        $data['contrato'] = $this->Contratos_model->get_info_contrato($factura->contrato_id);


        echo $this->templates->render('admin/imprimir_factura_r', $data);
    }

    function anular_factura()
    {
        $data['segmento_cliente'] = $this->uri->segment(3);
        //ID Contrato
        $factura_id = $this->uri->segment(4);
        $serie_factura = $this->uri->segment(5);
        $data['cliente'] = $this->Cliente_model->detalle_cliente($data['segmento_cliente']);
        $data['factura'] = $this->Factura_model->get_info_factura($factura_id, $serie_factura);
        $factura = $data['factura']->row();
        //print_contenido($factura);


        /**
         * si es anulacion de factura de liquidación
         */
        if ($factura->tipo == 'venta') {
           // echo 'venta';
            //echo '<br>';
            //echo $factura->factura_id;
            $transacciones_liquidacion = $this->Productos_model->get_transacciones_liquidacio_by_factura($factura_id);
            //print_contenido($transacciones_liquidacion->result());
            foreach ($transacciones_liquidacion->result() as $transaccion) {
                //echo 'poner producto: '.$transaccion->id_producto.' en venta <br>';
                $this->Productos_model->liberar_producto__anular_factura_liquidacion($transaccion->id_producto);
            }

            //echo 'Anular factura: '.$factura->factura_id;
           $this->Productos_model->borrar_transacciones_liquidacion($factura->factura_id);
        } else {
            /**
             * si es factura de refrendo o desempeño
             */
            $contrato = $this->Contratos_model->get_info_contrato($factura->contrato_id);
            $contrato = $contrato->row();

            $datos_controato = array(
                'contrato_id' => $contrato->contrato_id,
                'tipo' => $factura->tipo,
                'fecha_pago' => $contrato->fecha_pago_anterior,
                'dias_gracia' => $contrato->dias_gracia_anterior,
                'estado' => $contrato->estado_anterior,
            );
            $this->Contratos_model->actualizar_contrato_anular_factura($datos_controato);
        }

        //obtenemos transacciones segun id de factura
        $transaccion = $this->Factura_model->obtener_transaccion($factura->factura_id);
        //

        if ($transaccion) {
            $transaccion = $transaccion->row();

            $this->Recibo_model->anular_recibo($transaccion->recibo_id);
        }


        $this->Factura_model->anular_factura($factura_id, $serie_factura);
        //redrigimos a detalle de cliente
        redirect(base_url() . 'cliente/detalle/' . $data['segmento_cliente']);

    }

    /**
     * control de facturas
     */
    function control_facturas()
    {
        $data = compobarSesion();
        $data['title'] = 'Control de facturas';
        $data['series'] = $this->Factura_model->get_series();
        echo $this->templates->render('admin/control_facturas', $data);
    }

    function nueva_serie()
    {
        $data = compobarSesion();

        echo $this->templates->render('admin/nueva_serie_facturas', $data);
    }

    function guardar_lote_fcturas()
    {

        $data = array(
            'correlativo_del' => $this->input->post('correlativo_del'),
            'correlativo_al' => $this->input->post('correlativo_al'),
            'cantidad' => $this->input->post('cantidad'),
            'usadas' => $this->input->post('usadas'),
            'serie' => $this->input->post('serie'),
            'fecha_vencimiento' => $this->input->post('fecha_vencimiento')
        );
        $cliente_id = $this->Factura_model->guardar_lote($data);
        //redrigimos a detalle de cliente
        redirect(base_url() . 'factura/control_facturas');

    }

    function activar_lote_facturas()
    {

        //ID lote
        $data['segmento_lote'] = $this->uri->segment(3);

        $lote_data = $this->Factura_model->lote_data_by_id($data['segmento_lote']);
        $lote_data = $lote_data->row();


        $this->Factura_model->desactivar_lotes($lote_data->serie);
        $this->Factura_model->activar_lote($lote_data->id, $lote_data->serie);
        //redrigimos a detalle de cliente
        redirect(base_url() . 'factura/control_facturas');
    }

    function datos_serie()
    {
        //OBTENEMOS VARIABLES DE LA URL
        $serie = $_GET['serie'];
        //pasamos variablea al modelo
        $marcas = $this->Factura_model->get_info_serie_activa($serie);
        //imprimimos en formato json el resultado
        echo json_encode($marcas->result_array());

    }
    function ultima_factura(){
        //OBTENEMOS VARIABLES DE LA URL
        $serie = $_GET['serie'];
        //pasamos variablea al modelo

        $marcas = $this->Factura_model->get_info_serie_activa($serie);
        //imprimimos en formato json el resultado
        echo json_encode($marcas->result_array());
    }

    function facturas_excel()
    {
        $fecha = new DateTime();
        $tienda = tienda_id_h();
        // actualizamos en la base de datos
        if ($tienda == '1') {
            to_excel($this->Factura_model->facturas_excel(), "facturas_" . $fecha->format('Y-m-d'));
        } elseif ($tienda == '2') {
            to_excel($this->Factura_model->facturas_excel(), "facturas_cn_" . $fecha->format('Y-m-d'));
        }
    }

    function facturas_html_excel()
    {
        $data = compobarSesion();


        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            $data['facturas'] = $this->Factura_model->facturas_html_excel_by_date($data['from'], $data['to']);
        } else {
            $data['facturas'] = $this->Factura_model->facturas_html_excel();
        }

        echo $this->templates->render('admin/facturas_excel_html', $data);

    }
    function facturas_r_html_excel()
    {
        $data = compobarSesion();

        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            $data['facturas'] = $this->Factura_model->facturas_r_html_excel_by_date($data['from'], $data['to']);
        } else {
            $data['facturas'] = $this->Factura_model->facturas_r_html_excel();
        }

        echo $this->templates->render('admin/facturas_excel_html', $data);

    }
}