<?php
/**
* run this script in cron every 1-5 minutest
*/

$condition = false;
require('../services/NotificationService.php');
require_once('../services/InsideSensorsService.php');
require_once('../services/OutsideSensorsService.php');

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
	 $notifications->sendNotification('Inside_sensor_is_unconnected');
}

if($outsideH === '0'){
        //send notification
         $notifications->sendNotification('Outside_sensor_is_unconnected');
}


if($condition)
{

	$message = '';
	$date = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
	$notifications->sendNotification('Hard_resert_of_arduino');
}

?>
