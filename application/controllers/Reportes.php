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
        $this->load->model('Contratos_model');
        $this->load->model('Factura_model');
        $this->load->model('Recibo_model');
        $this->load->model('User_model');

    }

    function index()
    {
        $data = compobarSesion();
    }

    function movimiento_diario()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        echo $this->templates->render('admin/movimiento_diario', $data);
    }

    function movimiento_diario_global()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/movimiento_diario_global', $data);
    }

    function movimiento_diario_global_excel()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/movimiento_diario_global_excel', $data);
    }

    function inventario_tienda()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }


        echo $this->templates->render('admin/movimiento_diario_global', $data);
    }

    function inventario_global()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/inventario_global', $data);
    }

    function inventario_global_excel()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/inventario_global_excel', $data);
    }

    function egresos_diarios_global()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/egresos_diario_global', $data);
    }

    function egresos_diarios_global_excel()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }
        echo $this->templates->render('admin/egresos_diario_global_excel', $data);
    }

    function transacciones_visa()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        echo $this->templates->render('admin/reporte_visa', $data);
    }

    function depositos()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        echo $this->templates->render('admin/reporte_depositos', $data);
    }

    function contratos()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        echo $this->templates->render('admin/reporte_contratos', $data);
    }

    function contratos_excel()
    {
        $data = compobarSesion();
        if ($this->uri->segment(3)) {
            $data['from'] = $this->uri->segment(3);
        }
        if ($this->uri->segment(4)) {
            $data['to'] = $this->uri->segment(4);
        }

        echo $this->templates->render('admin/reporte_contratos_excel', $data);
    }

    function planilla()
    {
        $data = compobarSesion();

        $data['empleados'] = $this->User_model->listar_empleados_planilla();

        echo $this->templates->render('admin/planilla', $data);
    }

    function guardar_planilla()
    {
        $data = compobarSesion();

        $empleados = $this->User_model->listar_empleados_planilla();

        $datos_planilla_totales = array(
            'total_sueldo_base' => $this->input->post('total_sueldo_base'),
            'total_bonificacion' => $this->input->post('total_bonificacion'),
            'total_bonificacion_incentivo' => $this->input->post('total_bonificacion_incentivo'),
            'total_sueldo_mensual' => $this->input->post('total_sueldo_mensual'),
            'total_anticipo_sueldo' => $this->input->post('total_anticipo_sueldo'),
            'total_sueldo_por_pagar' => $this->input->post('total_sueldo_por_pagar'),
            'total_descuentos_varios' => $this->input->post('total_descuentos_varios'),
            'total_igss' => $this->input->post('total_igss'),
            'total_descuentos_retenciones' => $this->input->post('total_descuentos_retenciones'),
            'total_cuota_irtra' => $this->input->post('total_cuota_irtra'),
            'total_cuota_intecap' => $this->input->post('total_cuota_intecap'),
            'total_cuotas_patronales' => $this->input->post('total_cuotas_patronales'),
            'total_total_cuotas_patronales' => $this->input->post('total_total_cuotas_patronales'),
            'total_indemnizacion' => $this->input->post('total_indemnizacion'),
            'total_bono_14' => $this->input->post('total_bono_14'),
            'total_aguinaldo' => $this->input->post('total_aguinaldo'),
            'total_vacaciones' => $this->input->post('total_vacaciones'),

        );
        print_contenido($datos_planilla_totales);
        foreach ($empleados->result() as $empleado) {
            $empleado_id = $empleado->id;
            $datos_planilla_empleado = array(
                'sueldo_base' => $this->input->post('sueldo_base_' . $empleado_id),
                'bonificacion' => $this->input->post('bonificacion_' . $empleado_id),
                'bonificacion_incentivo' => $this->input->post('bonificacion_incentivo_' . $empleado_id),
                'anticipo_sueldo' => $this->input->post('anticipo_sueldo_' . $empleado_id),
                'sueldo_por_pagar' => $this->input->post('sueldo_por_pagar_' . $empleado_id),
                'descuentos_varios' => $this->input->post('descuentos_varios_' . $empleado_id),
                'iggs' => $this->input->post('iggs_' . $empleado_id),
                'total_descuento' => $this->input->post('total_descuento_' . $empleado_id),
                'cuotas_irtra' => $this->input->post('cuotas_irtra_' . $empleado_id),
                'cuotas_intecap' => $this->input->post('cuotas_intecap_' . $empleado_id),
                'cuotas_patronales' => $this->input->post('cuotas_patronales_' . $empleado_id),
                'indemnización' => $this->input->post('indemnización_' . $empleado_id),
                'bono_14' => $this->input->post('bono_14_' . $empleado_id),
                'aguinaldo' => $this->input->post('aguinaldo_' . $empleado_id),
                'vacaciones' => $this->input->post('vacaciones_' . $empleado_id),

            );
            print_contenido($datos_planilla_empleado);
        }


        print_contenido($_POST);
    }

    function reporte_planilla()
    {
    }

    function imprimir_recibo_planilla()
    {
    }

    function vanta_celulares()
    {
        $data = compobarSesion();
        $data['celulares_vendidos'] = $this->Reportes_model->get_celulares_vendidos();
        echo $this->templates->render('admin/celulares_vendidos', $data);
    }

}