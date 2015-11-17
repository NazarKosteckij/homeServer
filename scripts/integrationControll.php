<?php
$condition = false;

require("../services/InsideSensorsService.php");
require("../services/OutsideSensorsService.php");

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
	shell_exec('python rebootArduino.py');

} else echo 'ok';

?>
