<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 25.10.2015
 * Time: 1:56
 */
header('Content-Type:application/json');
$ch = curl_init("http://192.168.1.100/status/server");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$json = curl_exec($ch);
curl_close($ch);
echo $json;
?>