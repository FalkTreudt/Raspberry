<?php
  //define properties for example database
  $dbname = 'login';
  $dbuser = 'admin';
  $dbpass = 'falk';
  $dbhost = '192.168.178.47:3306';

  //connect to database
  $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //test if connection succeeded
  if(!$connect){
    echo "Error: " . mysqli_connect_error();
    exit();
  }
  //give feedback that connection succeeded
  //echo "Connection Sucess!<br><br>";

  //get values for name and id
  $user = $_GET["user"];
//  $pass = $_GET["pass"];

  //escaping user inputs to avoid SQL injection
  $user = mysqli_real_escape_string($connect, $user);
  $pass = mysqli_real_escape_string($connect, $pass);

  $sql = "SELECT user_ FROM login WHERE user_='$user'"; // AND pass_='$pass'
	//echo $sql;
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo $row["user_"];
    }
  } else {
    echo "Fehler bei der Anmeldung: User oder Passwort flasch!";
  }

  mysqli_close($connect);
?>
