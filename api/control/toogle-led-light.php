<?php
$json = file_get_contents("http://192.168.1.100/controll/led");
header('Content-type: application/json');
echo $json;
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
