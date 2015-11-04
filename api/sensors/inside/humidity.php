<?php
/**
 * Created by PhpStorm.
 * User: Íàçàð
 * Date: 16.10.2015
 * Time: 19:59
 */

header('Content-Type:application/json');
include '../../../services/InsideSensorsService.php';

$inside = new InsideSensorsService();

print "{\"data\": \"";
print $inside->getHumidity();
print "\"}";
?>
