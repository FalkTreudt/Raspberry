<?php
$pass = "falk";
$user = "admin";
$host = "192.168.178.47:3306";
$database = "wohnzimmer";

$connect = mysqli_connect($host,$user,$pass,$database);

if(!$connect){
die("Verbindung fehlgeschlagen".mysqli_connect_error());
}

$sql = "SELECT * FROM Lichter WHERE 1";

$result = mysqli_query($connect,$sql);

if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
	echo $row["one"];
	}
}

?>
