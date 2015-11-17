<?php
/**
* run this script in cron every 1-5 minutest
*/

$condition = false;
require_once('../services/NotificationService.php');
require_once("../services/InsideSensorsService.php");
require_once("../services/OutsideSensorsService.php");

$notifications = new NotificationService();

$inside = new InsideSensorsService();
$insideT =  $inside->getTemperature();
$insideH =  $inside->getHumidity();

$outside = new OutsideSensorsService();
$outsideT = $outside->getTemperature();
$outsideH = $outside->getHumidity();


if(($outsideT === 'NaN')&&($outsideH === 'NaN')){
	$condition = true;
}
if(($insideT === 'NaN') && ($outsideH === 'NaN')){
	$condition = true;
}

if($insideH === '0'){
	//send notification
}

if($condition)
{
	$notifications->sendNotification();
	shell_exec('python rebootArduino.py');

} else echo 'ok';

?>
