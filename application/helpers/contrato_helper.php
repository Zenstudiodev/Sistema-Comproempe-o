<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/09/2017
 * Time: 1:37 PM
 */

function color_por_estaado($estado)
{
	$clase_estado = '';

	switch ($estado)
	{
		case 'vigente':
			$clase_estado = 'bg-green color-palette';
			break;
		case 'gracia':
			$clase_estado = 'bg-yellow color-palette';
			break;
		case 'perdido':
			$clase_estado = 'bg-red-active color-palette';
			break;
		case 'refrendado':
			$clase_estado = 'bg-aqua color-palette';
			break;
		case 'liquidado':
			$clase_estado = 'bg-orange color-palette';
			break;
		case 'liquidado_parcial':
			$clase_estado = 'bg-yellow color-palette';
			break;
		case 'desempenado':
			$clase_estado = 'bg-gray-active color-palette';
			break;
        case 'anulado':
            $clase_estado = 'bg-black color-palette';
            break;
	}
	echo $clase_estado;
}

function texto_estado($estado){
	$texto_estado = '';

	switch ($estado)
	{
		case 'vigente':
			$texto_estado = 'Vigente';
			break;
		case 'gracia':
			$texto_estado = 'En gracia';
			break;
		case 'perdido':
			$texto_estado = 'Vencido';
			break;
		case 'refrendado':
			$texto_estado = 'Refrendado';
			break;
        case 'liquidado':
            $texto_estado = 'Liquidado';
            break;
        case 'liquidado_parcial':
            $texto_estado = 'Liquidado parcial';
            break;
		case 'desempenado':
			$texto_estado = 'Desempeñado';
			break;
        case 'anulado':
            $texto_estado = 'Anulado';
            break;

	}
	return $texto_estado;
}

function estado_contrato($fecha_contrato_s)
{
	$fecha_actual   = new DateTime();
	$fecha_contrato = new DateTime($fecha_contrato_s);
	$dias_gracia    = new DateTime($fecha_contrato_s);
	$dias_gracia    = $dias_gracia->modify('+8 day');

	//format
	$fecha_actual_f   = $fecha_actual->format('Y-m-d');
	$fecha_contrato_f = $fecha_contrato->format('Y-m-d');
	$dias_gracia_f    = $dias_gracia->format('Y-m-d');
	$estado_contrato  = '';
	if ($fecha_actual_f <= $fecha_contrato_f)
	{
		$estado_contrato = 'normal';
	}
	else
	{
		if ($fecha_actual_f < $dias_gracia_f)
		{
			$estado_contrato = 'gracia';
		}
		else
		{
			$estado_contrato = 'vencido';
		}
	}

	return $estado_contrato;
}

function diferencia_dias($fecha_pago)
{
	$fecha_actual = new DateTime();

	$d1        = $fecha_actual;
	$d2        = new DateTime($fecha_pago);
	//$d2->modify('+1 days');
	$diff      = $d1->diff($d2);
	$d1_format = $d1->format('Y-m-d');
	$d2_format = $d2->format('Y-m-d');
	$diferencia_dias = intval($diff->format('%R%a'));

	if ($d1_format <= $d2_format)
	{
		echo 'Faltan <span class=" badge bg-green-active">' . $diferencia_dias . '</span> días para que venza el contrato <br>';
	}
	else
	{
		echo 'El contrato vencio hace <span class=" badge bg-red-active">' . $diferencia_dias . '</span> días<br>';
	}

}

function descuento_sugerido($fecha_pago){

	$fecha_actual = new DateTime();

	$d1        = $fecha_actual;
	$d2        = new DateTime($fecha_pago);
    //$d2->modify('+1 days');
    $diff      = $d1->diff($d2);
	$d1_format = $d1->format('Y-m-d');
	$d2_format = $d2->format('Y-m-d');
	$diferencia_dias = intval($diff->format('%R%a'));



	if ($d1_format <= $d2_format)
	{
		if($diferencia_dias >= 15){
			return true;
		}else{
			return false;
		}
	}
	else
	{
		return false;
	}

}

function diferencia_en_dias($fecha_pago)
{
	$fecha_actual = new DateTime();

	$d1   = $fecha_actual;
	$d2   = new DateTime($fecha_pago);
	$diff = $d2->diff($d1);
	$diferencia_dias = intval($diff->format('%R%a'));

	return $diferencia_dias;

}

function display_formato_dinero($valor)
{
	$valor_formateado = number_format($valor, 2, '.', ',');
	echo $valor_formateado;
}

function formato_dinero($valor)
{
	$valor_formateado = number_format($valor, 2, '.', ',');
	return $valor_formateado;
}

function display_formato_dinero_return($valor)
{
	$valor_formateado = number_format($valor, 2, '.', ',');
	return $valor_formateado;
}
function tipo_factura_text($tipo){
	$tipo_text = '';

	switch ($tipo)
	{
		case 'refrendo':
			$tipo_text = 'refrendo';
			break;
		case 'desenmpeno':
			$tipo_text = 'desempeño';
			break;
	}
	return $tipo_text;
}

function print_contenido($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function normalizeDecimal($val,  $precision = 2)
{
    $input = str_replace(' ', '', $val);
    $number = str_replace(',', '.', $input);
    if (strpos($number, '.')) {
        $groups = explode('.', str_replace(',', '.', $number));
        $lastGroup = array_pop($groups);
        $number = implode('', $groups) . '.' . $lastGroup;
    }
    return bcadd($number, 0, $precision);
}

function dato_pago_contrato($contrato_id){
    /**
    * variables para operaciones
    **/

    $ci =& get_instance();


    $contrato = $ci->Contratos_model->get_info_contrato($contrato_id);
    $contrato = $contrato->row();
	$fecha     = new DateTime();
	$intereses = floatval($contrato->pago_interes);
	//interese + iva
	$intereses  = $intereses * 1.12;
	$almacenaje = floatval($contrato->costo_almacenaje);
	//almacenaje + iva
	$almacenaje              = $almacenaje * 1.12;
	$estado_contrato         = estado_contrato($contrato->fecha_pago);
	$plazo                   = $contrato->plazo;
	$fecha_vencimiento     = new DateTime();
	$nueva_fecha_vencimiento = $fecha_vencimiento->modify('+' . $plazo . ' days');
	//mora
	$mora      = false;
	$pago_mora = 0;
	$descuento = 0;

	if($plazo == 30){
        if(descuento_sugerido($contrato->fecha_pago)){

            $descuento_almacenage = ($almacenaje / 2);
            $descuento_interes = ($intereses / 2);

            $descuento_sugerido = $descuento_interes + $descuento_almacenage;

            $descuento = $descuento_sugerido;
        }
    }



	if ($estado_contrato != 'normal')
    {
        //echo 'cargar mora';
        $dias_pasados = diferencia_en_dias($contrato->fecha_pago);
        $mora         = true;
        $pago_mora    = $intereses + $almacenaje;
        $pago_mora    = $pago_mora / $plazo;
        $pago_mora    = $pago_mora * $dias_pasados;
    }
	//recuperacion
	$recuperacion      = false;
	$pago_recuperacion = 0;
	if ($estado_contrato == 'vencido' || $contrato->estado =='liquidado_parcial')
    {
        //echo 'cargar recuperacion';
        $recuperacion      = true;
        $pago_recuperacion = $contrato->referendo;
    }

	$total_factura = $intereses + $almacenaje + $pago_mora + $pago_recuperacion;

	$pago_contrato = array(
	    'intereses_refrendo'=>$intereses,
	    'almacenaje'=>$almacenaje,
	    'Mora'=>$pago_mora,
	    'recuperacion'=>$pago_recuperacion,
	    'total'=>$total_factura,
    );
	return $pago_contrato;

	//$total_en_letras = NumeroALetras::convertir($total_factura);

}

?>