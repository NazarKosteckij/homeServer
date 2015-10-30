<?php
	header('Content-Type:application/json');
	$json = file_get_contents("http://192.168.1.100/start_server");
	header('Content-type: application/json');
	echo $json;
?>
