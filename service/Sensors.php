<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 26.09.2015
 * Time: 10:37
 */

namespace service;


interface Sensors
{
    function getTemperature();
    function getHumidity();
}