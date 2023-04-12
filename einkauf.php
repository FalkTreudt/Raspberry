<?php
// Datenbank-Verbindung herstellen
$servername = "192.168.178.47:3306";
$username = "admin";
$password = "falk";
$dbname = "einkaufsliste";

$conn = new mysqli($servername, $username, $password, $dbname);

// Prüfen, ob Verbindung erfolgreich
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-Abfrage zusammenstellen
$sql = "SELECT * FROM einkauf WHERE Nutzer='10'";

// Abfrage an die Datenbank senden
$result = $conn->query($sql);

// Ergebnis ausgeben
if ($result->num_rows > 0) {
    // Ausgabe für jede Zeile in der Ergebnismenge
    while($row = $result->fetch_assoc()) {
        echo  $row["Bezeichnung"] ."-". $row["Anzahl"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
