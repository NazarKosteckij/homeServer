<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 26.09.2015
 * Time: 10:26
 */

namespace service;


 class InsideSensorsService implements Sensors
{
    function getTemperature(){
        $json = file_get_contents("http://192.168.1.100/sensors/temperature");
        $data = json_decode($json);
        $temperature =  $data->data;
        if (is_null($temperature)) {
            $temperature = "NaN";
        }
        return $temperature;
    }

    function getHumidity()
    {
        $json = file_get_contents("http://192.168.1.100/sensors/humidity");
        $data = json_decode($json);
        $humidity =  $data->data;
        if (is_null($humidity)) {
            $humidity = "NaN";
        }
        return $humidity;
    }
}