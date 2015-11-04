<?php
include 'ArduinoConnector.php';
header('Content-Type:application/json');
$arduinoConnector = new ArduinoConnector();
echo $arduinoConnector->doRequestToArduino("http://192.168.1.100/controll/led");
/*
	if($_GET['brightness']){
		$s = "python write.py " . $_GET['brightness'];
		shell_exec($s);
		echo "{\"status\":\"ok\"}";
	} else {
	  	shell_exec("python write.py 0");
	}
*/
?>
