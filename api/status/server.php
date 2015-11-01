<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 25.10.2015
 * Time: 1:56
 */
include("../ArduinoConnector.php");

header('Content-Type:application/json');
$arduinoConnector = new ArduinoConnector();
echo $arduinoConnector->doRequestToArduino("http://192.168.1.100/status/server");
?>