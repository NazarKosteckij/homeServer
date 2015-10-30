<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */
namespace sensors;
$outside = new OutsideSensorsService();
$temperature = $outside->getTemperature();
print "{\"data\": \"";
print $temperature;
print "\"}";
?>