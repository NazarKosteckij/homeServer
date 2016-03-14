<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 01.11.2015
 * Time: 1:00
 */
class ArduinoConnector
{
    public function doRequestToArduino($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $json = curl_exec($ch);
        curl_close($ch);
        return $json;
    }

}