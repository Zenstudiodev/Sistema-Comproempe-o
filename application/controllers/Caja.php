<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 17/03/2018
 * Time: 3:48 PM
 */
class Caja extends Base_Controller
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
        $this->load->model('Caja_model');
    }

    function index()
    {

    }
    function cierre()
    {
        $data = compobarSesion();

        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        //fecha
        $ayer = New DateTime();
        $ayer->modify('-1 days');
        $ayer = $ayer->format('Y-m-d');


        $data['caja_dia_anterior'] = $this->Caja_model->get_caja_dia_anterior($ayer);
        $data['ingresos_caja'] = $this->Caja_model->get_fondos_caja($hoy);

        $data['ventas'] = $this->Caja_model->get_ventas_dia($hoy);
        $data['apartados'] = $this->Caja_model->get_apartados_dia($hoy);
        $data['abono_apartados'] = $this->Caja_model->get_abono_apartado_dia($hoy);
        $data['abonos_enpenos'] = $this->Caja_model->get_abono_empeno_dia($hoy);
        $data['desenpenos'] = $this->Caja_model->get_desempeno($hoy);
        $data['intereses_refrendo'] = $this->Caja_model->get_intereses_refrendo($hoy);
        $data['intereses_desempeno'] = $this->Caja_model->get_intereses_desempeno($hoy);
        $data['empenos'] = $this->Caja_model->get_empenos($hoy);
        $data['compras'] = $this->Caja_model->get_compras($hoy);
        $data['otros_gastos'] = $this->Caja_model->get_otros_gastos($hoy);
        $data['depositos'] = $this->Caja_model->get_depositos($hoy);
        $data['visanets'] = $this->Caja_model->get_visanet($hoy);
        $data['vales'] = $this->Caja_model->get_vales_activos($hoy);
        $data['vales_cobrados'] = $this->Caja_model->get_vales_cobrados_dia($hoy);

        echo $this->templates->render('admin/cierre_caja', $data);
    }
    function guardar_cierre_de_caja()
    {

        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');

        $datos_cierre = array(
            'total_ingreso' => $this->input->post('total_ingreso'),
            'total_egreso' => $this->input->post('total_egreso'),
            'total_deposito_i' => $this->input->post('total_deposito_i'),
            'total_visanet_i' => $this->input->post('total_visanet_i'),
            'saldo_caja' => $this->input->post('saldo_caja'),
            'total_dinero_i' => $this->input->post('total_dinero_i'),
            'total_vales' => $this->input->post('total_vales')
        );
        $cierre_id = $this->Caja_model->guardar_cierre($datos_cierre);
        // echo $cierre_id;

        $datos_dinero = array(
            'cierre_id' => $cierre_id,
            'b_200' => $this->input->post('b_200'),
            'b_100' => $this->input->post('b_100'),
            'b_50' => $this->input->post('b_50'),
            'b_20' => $this->input->post('b_20'),
            'b_10' => $this->input->post('b_10'),
            'b_5' => $this->input->post('b_5'),
            'b_1' => $this->input->post('b_1'),
            'm_1' => $this->input->post('m_1'),
            'm_50' => $this->input->post('m_50'),
            'm_25' => $this->input->post('m_25'),
            'm_10' => $this->input->post('m_10'),
            'm_5' => $this->input->post('m_5'),
        );
        $this->Caja_model->guardar_dinero($datos_dinero);

        //fondos caja
        //$ingresos_caja = $this->Caja_model->get_fondos_caja();

        /*if ($ingresos_caja) {
            print_contenido($ingresos_caja);
            foreach ($ingresos_caja->result() as $ingreso) {
               // print_contenido($ingreso);
                $datos_fondo = array(
                    'fondo_id'=>$ingreso->id_fc,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_fondo_a_cierre($datos_fondo);
            }
        }
        //ventas dia
        $ventas = $this->Caja_model->get_ventas_dia($hoy);
        if($ventas){
            foreach ($ventas->result() as $venta) {
                $datos_venta = array(
                    'ingreso_id'=>$venta->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);

            }
        }
       // apartados
        $apartados = $this->Caja_model->get_apartados_dia();
        if($apartados){
            foreach ($apartados->result() as $apartado) {
                $datos_apartado = array(
                    'ingreso_id'=>$apartado->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);
            }
        }
       //abonos
        $abonos_enpenos = $this->Caja_model->get_abono_empeno_dia();
        if($abonos_enpenos){
            foreach ($abonos_enpenos->result() as $abonos) {
                $datos_apartado = array(
                    'ingreso_id'=>$abonos->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);
            }
        }
        //desempenos
        $desenpenos = $this->Caja_model->get_desempeno();
        if($desenpenos){
            foreach ($desenpenos->result() as $desenpeno) {
                $datos_venta = array(
                    'ingreso_id'=>$desenpeno->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);
            }
        }
        //intereses refrendo
        $intereses_refrendo = $this->Caja_model->get_intereses_refrendo();
        if($intereses_refrendo){
            foreach ($intereses_refrendo->result() as $interes_refrendo) {
                $datos_venta = array(
                    'ingreso_id'=>$interes_refrendo->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);
            }
        }
        //intereses desenmpeño
        $intereses_desempeno = $this->Caja_model->get_intereses_desempeno();
        if($intereses_desempeno){
            foreach ($intereses_desempeno->result() as $interes_desempeno) {
                $datos_venta = array(
                    'ingreso_id'=>$interes_desempeno->ingreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_ingreso($datos_venta);
            }
        }
        //empeños
        $empenos = $this->Caja_model->get_empenos();
        if($empenos){
            foreach ($empenos->result() as $empeno) {
                $datos_venta = array(
                    'egreso_id'=>$empeno->egreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_egresos($datos_venta);
            }
        }
        //compras
        $compras = $this->Caja_model->get_compras();
        if($compras){
            foreach ($compras->result() as $compra) {
                $datos_venta = array(
                    'egreso_id'=>$compra->egreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_egresos($datos_venta);
            }
        }
        //otros gastos
        $otros_gastos = $this->Caja_model->get_otros_gastos();
        if($otros_gastos){
            foreach ($otros_gastos->result() as $gasto) {
                $datos_venta = array(
                    'egreso_id'=>$gasto->egreso_id,
                    'cierre_id'=>$cierre_id
                );
                $this->Caja_model->asignar_cierre_egresos($datos_venta);
            }
        }
        //despositos
        $depositos = $this->Caja_model->get_depositos();

        //visanet
        $visanets = $this->Caja_model->get_visanet();

*/
        //print_contenido($_POST);
        redirect(base_url() . 'caja/reporte');
    }
    function reporte()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $fecha = new DateTime($this->uri->segment(3));
            $dia_anterior = new DateTime($this->uri->segment(3));


        } else {
            $fecha = new DateTime();
            $dia_anterior = new DateTime();
        }
        $dia_anterior->modify('-1 day');
        $dia_anterior = $dia_anterior->format('Y-m-d');
        $fecha = $fecha->format('Y-m-d');
        //echo $fecha;
        echo '-'.$dia_anterior;


        $data['fecha'] = $fecha;
        $data['caja_dia_anterior'] = $this->Caja_model->get_caja_dia_anterior($dia_anterior);
        $data['caja_dia'] = $this->Caja_model->get_caja_dia($fecha);
        $data['ingresos_caja'] = $this->Caja_model->get_fondos_caja($fecha);
        $data['ventas'] = $this->Caja_model->get_ventas_dia($fecha);
        $data['apartados'] = $this->Caja_model->get_apartados_dia($fecha);
        $data['abono_apartados'] = $this->Caja_model->get_abono_apartado_dia($fecha);
        $data['abonos_enpenos'] = $this->Caja_model->get_abono_empeno_dia($fecha);
        $data['desenpenos'] = $this->Caja_model->get_desempeno($fecha);
        $data['intereses_refrendo'] = $this->Caja_model->get_intereses_refrendo($fecha);
        $data['intereses_desempeno'] = $this->Caja_model->get_intereses_desempeno($fecha);
        $data['empenos'] = $this->Caja_model->get_empenos($fecha);
        $data['compras'] = $this->Caja_model->get_compras($fecha);
        $data['otros_gastos'] = $this->Caja_model->get_otros_gastos($fecha);
        $data['depositos'] = $this->Caja_model->get_depositos($fecha);
        $data['visanets'] = $this->Caja_model->get_visanet($fecha);
        $data['dinero_dia']= $this->Caja_model->get_dinero_dia($fecha);
        $data['vales_cobrados'] = $this->Caja_model->get_vales_cobrados_dia($fecha);

        echo $this->templates->render('admin/cierre_reporte', $data);
    }

    //saldo de caja
    function ingresar_saldo_caja(){
        $data = compobarSesion();
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        $data['depositos'] = $this->Caja_model->get_depositos($hoy);
        echo $this->templates->render('admin/ingresar_saldo_caja', $data);
    }
    function guardar_saldo_caja(){
        $monto = $this->input->post('monto');
        $this->Caja_model->guardar_saldo_caja($monto);
        redirect(base_url().'caja/cierre');
    }
    //depositos
    function ingreso_deposito()
    {
        $data = compobarSesion();
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        $data['depositos'] = $this->Caja_model->get_depositos($hoy);
        echo $this->templates->render('admin/ingreso_depositos', $data);
    }
    function guardar_deposito()
    {
        $data = compobarSesion();
        $datos_deposito = array(
            'boleta' => $this->input->post('boleta'),
            'monto' => $this->input->post('monto'),
            'banco' => $this->input->post('banco'),
            'tipo' => $this->input->post('tipo'),
            'documento' => $this->input->post('documento'),

        );
        //guardamos deposito
        $this->Caja_model->guardar_deposito($datos_deposito);
        //redirigimos a depositos
        redirect(base_url() . 'Caja/ingreso_deposito');
    }
    function anular_deposito(){
        $data = compobarSesion();
        $deposito_id = $this->uri->segment(3);
        $this->Caja_model->anular_deposito($deposito_id);
        redirect(base_url().'Caja/cierre');
    }
    //vales
    function crear_vale()
    {
        $data = compobarSesion();
        $data['vales']= $this->Caja_model->get_vales_dia();
        echo $this->templates->render('admin/crear_vale', $data);
    }
    function guardar_vale()
    {
        // print_contenido($_POST);
        $data = compobarSesion();
        $datos_vale = array(
            'nombre' => $this->input->post('nombre'),
            'detalle' => $this->input->post('datalle'),
            'monto' => $this->input->post('monto'),
        );
        //guardamos deposito
        $this->Caja_model->guardar_vale($datos_vale);
        //redirigimos a depositos
        redirect(base_url() . 'Caja/crear_vale');
    }
    function cobrar_vale()
    {
        $data = compobarSesion();
        $data['vale_id'] = $this->uri->segment(3);
        $data_vale = $this->Caja_model->get_datos_vale_by_id($data['vale_id']);
        $data_vale = $data_vale->row();

        //actualizamos registro de vale a cobrado
        $this->Caja_model->cobrar_vale($data_vale->vale_id);

        $datos_vale = array(
            'vale_id' => $data_vale->vale_id,
            'detalle' => $data_vale->vale_id,
            'monto' => $data_vale->vale_id,
        );
        //guardamos datos del vale en ingresos
        $this->Caja_model->guardar_vale_cobrado($datos_vale);
        //redirigimos a depositos
        redirect(base_url() . 'Caja/crear_vale');
    }
    function lista_vales()
    {
        $data = compobarSesion();
        $data['vales'] = $this->Caja_model->get_vales_activos();
        echo $this->templates->render('admin/cobrar_vale', $data);
    }
    function ingreso_visanet()
    {
        $data = compobarSesion();
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        $data['visanets'] = $this->Caja_model->get_visanet($hoy);
        echo $this->templates->render('admin/ingreso_visanet', $data);
    }
    function guardar_visanet()
    {
        $data = compobarSesion();
        $datos_visanet = array(
            'factura_id' => $this->input->post('factura_id'),
            'recibo_id' => $this->input->post('recibo_id'),
            'monto' => $this->input->post('monto'),
        );
        //guardamos visanet
        $this->Caja_model->guardar_visanet($datos_visanet);
        //redirigimos a visanet
        redirect(base_url() . 'Caja/ingreso_visanet');
    }
    function anular_visanet(){
        $data = compobarSesion();
        $visanet_id = $this->uri->segment(3);
        $this->Caja_model->anular_visanet($visanet_id);
        redirect(base_url().'Caja/cierre');
    }
    function ingreso_otros_gastos()
    {
        $data = compobarSesion();
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        $data['otros_gastos'] = $this->Caja_model->get_otros_gastos($hoy);
        echo $this->templates->render('admin/ingreso_otros_gastos', $data);
    }
    function guardar_otros_gastos()
    {
        $data = compobarSesion();
        $datos_otros_gastos = array(
            'detalle' => $this->input->post('datalle'),
            'monto' => $this->input->post('monto'),
        );
        //guardamos visanet
        $this->Caja_model->guardar_otros_gastos($datos_otros_gastos);
        //redirigimos a visanet
        redirect(base_url() . 'Caja/ingreso_otros_gastos');
    }
    function ingresar_fondo_caja()
    {
        $data = compobarSesion();
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');

        $data['ingresos'] = $this->Caja_model->get_fondos_caja($hoy);
        echo $this->templates->render('admin/ingresar_fondo_caja', $data);
    }
    function guardar_fondo_caja()
    {
        $data = compobarSesion();
        $datos_fondos_caja = array(
            'no_cheque' => $this->input->post('no_cheque'),
            'monto' => $this->input->post('monto'),
            'banco' => $this->input->post('banco'),
        );
        //guardamos visanet
        $this->Caja_model->guardar_fondo_caja($datos_fondos_caja);
        //redirigimos a visanet
        redirect(base_url() . 'Caja/ingresar_fondo_caja');
    }
    function anular_fondo_caja(){
        $data = compobarSesion();
        $fondo_caja_id = $this->uri->segment(3);
        $this->Caja_model->anular_ingreso_caja($fondo_caja_id);
        redirect(base_url().'Caja/cierre');
    }

    function anular_ingreso(){
        $data = compobarSesion();
        $ingreso_id = $this->uri->segment(3);
        $this->Caja_model->anular_ingreso($ingreso_id);
        redirect(base_url().'Caja/cierre');
    }
    function anular_egreso(){
        $data = compobarSesion();
        $egreso_id = $this->uri->segment(3);
        $this->Caja_model->anular_egreso($egreso_id);
        redirect(base_url().'Caja/cierre');
    }

    function anular_egresos(){

    }

}