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
		case 'desempenado':
			$clase_estado = 'bg-gray-active color-palette';
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
		case 'desempenado':
			$texto_estado = 'Desempeñado';
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


?>