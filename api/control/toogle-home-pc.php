<?php

include 'ArduinoConnector';

header('Content-Type:application/json');
$arduinoConnector = new ArduinoConnector();
echo $arduinoConnector->doRequestToArduino("http://192.168.1.100/start_home-pc");
?>
