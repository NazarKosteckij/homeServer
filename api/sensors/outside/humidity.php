<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 16.10.2015
 * Time: 19:59
 */

header('Content-Type:application/json');
include '../../../services/OutsideSensorsService.php';

$outside = new OutsideSensorsService();
$humidity =  $outside->getHumidity();

print "{\"data\": \"$humidity\"}";

?>