<?php
/**
 * Created by PhpStorm.
 * User: Íàçàð
 * Date: 16.10.2015
 * Time: 19:59
 */
include "../../../services/InsideSensorsService.php";
$outside = new InsideSensorsService();
echo"{"data": "$outside->getHumidity()"} ;
?>
