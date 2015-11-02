<?php
$data = file_get_contents("python //var/www/html/scripts/getCoreTemperature.py");
$data = $data - 0;
$name = "temperature";
print("{\"$name\":\"$data\"}");
?>
