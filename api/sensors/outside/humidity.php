<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */
$json = file_get_contents("http://192.168.1.100/sensors/humidity");
$data = json_decode($json);
$humidity =  $data->data;
if (is_null($humidity)) {
    $humidity = "NaN";
}

print "{\"data\": \"";
print $humidity;
print "\"}";

?>