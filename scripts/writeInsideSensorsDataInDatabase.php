
<?php
  $json = null;
    $json = file_get_contents("http://192.168.1.100/sensors/temperature");
  $data = json_decode($json);
  $temperature =  $data->data;
  echo $temperature;
  echo "C \n";

  $json2 = file_get_contents("http://192.168.1.100/sensors/humidity");

    $data2 = json_decode($json2);
    $humidity = $data2->data;

$servername = "localhost";
$username = "root";
$password = "1111";
$dbname = "SENSORS_DATA";

// Create connection
$date = date("Y-m-d H:i:s");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "INSERT INTO SENSORS VALUES(0, '$temperature', '$humidity', '$date');";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
if (mysqli_query($conn, $query)) {
    echo "Data inserted successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

?>
