<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 25.10.2015
 * Time: 1:56
 */

$json = file_get_contents("http://192.168.1.100/status/home-pc");
header('Content-type: application/json');
echo $json;
?>