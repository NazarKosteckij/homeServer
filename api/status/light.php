<?php
/**
 * Created by PhpStorm.
 * User: Назар
 * Date: 22.10.2015
 * Time: 23:38
 */
header('Content-Type:application/json');
$json = file_get_contents("http://192.168.1.100/status/light");
header('Content-type: application/json');
echo $json;
?>