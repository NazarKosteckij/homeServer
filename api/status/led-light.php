<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 22.10.2015
 * Time: 23:38
 */
use dao\ArduinoConnector;

header('Content-Type:application/json');
$arduinoConnector = new ArduinoConnector();
echo $arduinoConnector->doRequestToArduino("http://192.168.1.100/status/led-light");
?>