<?php
$data = shell_exec("python //var/www/html/scripts/getCoreTemperature.py");
$data = $data - 0;
$name = "temperature";
print("{\"$name\":\"$data\"}");
?>
