<?php
	$json = file_get_contents("http://192.168.1.100/start_home-pc");
	header('Content-type: application/json');
	echo $json;
?>
