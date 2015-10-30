<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 25.10.2015
 * Time: 1:56
 */
header('Content-Type:application/json');
$json = file_get_contents("http://192.168.1.100/status/server");
header('Content-type: application/json');
echo $json;
?>