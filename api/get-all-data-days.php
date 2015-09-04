<?php
$dbh = new PDO("mysql:host=localhost;dbname=SENSORS_DATA", 'root', '1111');

$sql = "SELECT DISTINCT(DATE(SENSORS.date)) as 'date' FROM SENSORS";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){
    $return[]=array('date'=>$row['date']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
?>
