<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */

header('Content-Type:application/json');
$outside = new OutsideSensorsService();

$humidity =  $outside->getHumidity();

print "{\"data\": \"";
print $humidity;
print "\"}";

?>