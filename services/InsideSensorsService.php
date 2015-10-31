<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 26.09.2015
 * Time: 10:26
 */
namespace sensors;
use dao\ArduinoConnector;

include("Sensors.php");
 class InsideSensorsService implements Sensors
{
   private function doRequestToArduino($url){
       $arduinoConnector = new ArduinoConnector();
       return $arduinoConnector->doRequestToArduino($url);
   }

   public function getTemperature(){
        $json = $this->doRequestToArduino("http://192.168.1.100/sensors/temperature");
        $data = json_decode($json);
        $temperature =  $data->data;
        if (is_null($temperature)) {
            $temperature = "NaN";
        }
        return $temperature;
    }

    public function getHumidity()
    {
        $json = $this->doRequestToArduino("http://192.168.1.100/sensors/humidity");
        $data = json_decode($json);
        $humidity =  $data->data;
        if (is_null($humidity)) {
            $humidity = "NaN";
        }
        return $humidity;
    }
}
