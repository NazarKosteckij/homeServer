<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 26.09.2015
 * Time: 10:26
 */
include'ArduinoConnector.php';
include 'Sensors.php';
 class OutsideSensorsService implements Sensors
 {
     private function doRequestToArduino($url){
         $ch = \curl_init($url);
         \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         \curl_setopt($ch, CURLOPT_HEADER, 0);
         $json = \curl_exec($ch);
         \curl_close($ch);
         return $json;
     }
   public function getTemperature(){

        $json = $this->doRequestToArduino("http://192.168.1.100/sensors/outside/temperature");
        $data = json_decode($json);
        $temperature =  $data->data;
        if (is_null($temperature)) {
            $temperature = "NaN";
        }
        return $temperature;
    }

    public function getHumidity()
    {
        $json = $this->doRequestToArduino("http://192.168.1.100/sensors/outside/humidity");
        $data = json_decode($json);
        $humidity =  $data->data;
        if (is_null($humidity)) {
            $humidity = "NaN";
        }
        return $humidity;
    }
}
