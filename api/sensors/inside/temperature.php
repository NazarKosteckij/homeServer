<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */

header('Content-Type:application/json');
include '../../../services/InsideSensorsService.php';
use \sensors\InsideSensorsService;

$inside = new InsideSensorsService();
$temperature = $inside->getTemperature();

print "{\"data\": \"";
print $temperature;
print "\"}";
?>