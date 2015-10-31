<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 26.09.2015
 * Time: 10:37
 */

namespace sensors;
interface Sensors
{
    function getTemperature();
    function getHumidity();
}