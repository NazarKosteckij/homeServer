<?php
	use dao\ArduinoConnector;

	header('Content-Type:application/json');
	$arduinoConnector = new ArduinoConnector();
	echo $arduinoConnector->doRequestToArduino("http://192.168.1.100/controll/light");
?>
