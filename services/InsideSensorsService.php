<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 26.09.2015
 * Time: 10:26
 */

 class InsideSensorsService implements Sensors
{
   public function getTemperature(){
        $json = file_get_contents("http://192.168.1.100/sensors/temperature");
        $data = json_decode($json);
        $temperature =  $data->data;
        if (is_null($temperature)) {
            $temperature = "NaN";
        }
        return $temperature;
    }

    public function getHumidity()
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