<?php
        //define properties for example database
        $database = 'temperature';
        $user = 'admin';
        $password = 'falk';
        $host = '192.168.178.47:3306';

        
	$conn = mysqli_connect($host, $user, $password, $database);

	if (!$conn) {
    	die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
	}
	
	
	// SQL-Abfrage ausführen
	$sql = "SELECT temperature FROM temperature where currenttime ='11:28:32'";
	$result = $conn->query($sql);

	// Überprüfen Sie das Ergebnis der Abfrage
	if ($result->num_rows > 0) {
    	// Ausgabe der Daten für jede Zeile
   	 while($row = $result->fetch_assoc()) {
        	echo $row["temperature"];
    	}
	} else {
    	echo "0 Ergebnisse";
	}

	mysqli_close($conn);
	?>
