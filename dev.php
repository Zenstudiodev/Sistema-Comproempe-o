<?php
/**
 * Created by PhpStorm.
 * User: Potato
 * Date: 07/01/2019
 * Time: 03:31 PM
 */

echo 'dev';
echo '<hr>';
$miles = '1,0000';
$miles_float = floatval($miles);
echo $miles_float;
echo '<br>';
$formateado = number_format($miles_float, 2);

echo $formateado;


?>