<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 16.10.2015
 * Time: 19:59
 */

header('Content-Type:application/json');
include '../../../services/OutsideSensorsService.php';

$outside = new OutsideSensorsService();
$temperature = $outside->getTemperature();

print "{\"data\": \"";
print $temperature;
print "\"}";
?>