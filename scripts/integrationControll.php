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

if(($insideH === '0') && !file_exists("arduino.connection.inside.lock")){
        //send notification
	$notifications->sendNotification('Inside_sensor_is_unconnected');
	$lock = fopen("arduino.connection.lock", "w") ;
	$date = date("Y-m-d H:i:s");
	fwrite($lock, "arduino locked at $date becouse inside sensors isn\'t connected");
	fclose($lock);	
	
} else {
	if(file_exists("arduino.connection.inside.lock")){
		unlink('arduino.connection.inside.lock');	
	}
}

if(($outsideH === '0') && !file_exists("arduino.connection.outside.lock")){
        //send notification
	$notifications->sendNotification('Outside_sensor_is_unconnected');
	$lock = fopen("arduino.connection.lock", "w") ;
	$date = date("Y-m-d H:i:s");
	fwrite($lock, "arduino locked at $date becouse outside sensors isn\'t connected");
	fclose($lock);	
} else {
	if(file_exists("arduino.connection.outside.lock")){
		unlink('arduino.connection.outside.lock');	
	}
}


if($condition)
{
	if(!file_exists("arduino.lock")){
		$notifications->sendNotification('Hard_resert_of_arduino');
		$lock = fopen("arduino.lock", "w") ;
		$date = date("Y-m-d H:i:s");
		fwrite($lock, 'arduino locked at ');
		fwrite($lock, $date);
		fclose($lock);	
	}
	shell_exec('python rebootArduino.py');
	
} else {
	if(!file_exists("arduino.lock")){
		unlink('arduino.lock');
	 	$notifications->sendNotification('Arduino_is_alive');
	}
}
?>
