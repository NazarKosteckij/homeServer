<?php
	if($_GET['brightness']){
		$s = "python write.py " . $_GET['brightness'];
		shell_exec($s);
		echo "{\"status\":\"ok\"}";
	} else {
	  	shell_exec("python write.py 0");
	}
?>
