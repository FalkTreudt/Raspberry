<?php
$servername = "192.168.178.47:3306";
$username = "admin";
$password = "falk";
$dbname = "temperature";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT* FROM wohnzimmer";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  $row["temp"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
