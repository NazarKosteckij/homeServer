<?php
$data = file_get_contents("/var/www/html/scripts/usege");
sleep (1);
$data = $data - 0;
$name = "usage";
print("{\"$name\":\"$data\"}");
?>
