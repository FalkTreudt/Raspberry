<?php
$database = 'wohnzimmer';
$user = 'admin';
$pass = 'falk';
$host = '192.168.178.47:3306';

$connect = mysqli_connect($host,$user,$pass,$database);

if(!$connect){
die("Verbindung fehlgeschlagen".mysqli_connect_error());
}

$value = $_GET["value"];

$sql = "Update Lichter SET one=".$value;
if(mysqli_query($connect,$sql)){
echo "Success";
}else{
echo $sql;
}
?>
