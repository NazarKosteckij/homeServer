<?php
$dbh = new PDO("mysql:host=localhost;dbname=SENSORS_DATA", 'root', '1111');

$sql = "SELECT * FROM SENSORS";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){
    $return[]=array('id'=>$row['id'],
                    'temperature'=>$row['temperature'],
                    'humidity'=>$row['humidity'],
                    'date'=>$row['date']);
}
$dbh = null;

header('Content-type: application/json');
echo json_encode($return);
?>
