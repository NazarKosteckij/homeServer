<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 16.10.2015
 * Time: 19:59
 */
namespace sensors;
$outside = new OutsideSensorsService();
echo $outside->getTemperature();
?>