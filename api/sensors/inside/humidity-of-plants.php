<?php
header('Content-Type:application/json');
 $json = file_get_contents("http://192.168.1.100/sensors/humidity-of-plants");
        $data = json_decode($json);
        $humidity =  $data->data;
        if (is_null($humidity)) {
            $humidity = "NaN";
        }
print "{\"data\": \"";
print $humidity;
print "\"}";
?>
