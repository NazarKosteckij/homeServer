<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */
$json = file_get_contents("http://192.168.1.100/sensors/temperature");
$data = json_decode($json);
$temperature =  $data->data;
if (is_null($temperature)) {
    $temperature = "NaN";
}
echo $temperature;

?>