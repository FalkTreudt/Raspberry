<?php
// Verbindung zur Datenbank herstellen
$servername = '192.168.178.47:3306';
$username = 'admin';
$password = 'falk';
$database = 'temperature';

$conn = new mysqli($servername, $username, $password, $database);

// Daten aus der Datenbank abrufen
$query = 'SELECT Zeit, Temp FROM bad';
$result = $conn->query($query);

// Arrays für x- und y-Werte erstellen
$xWerte = array();
$yWerte = array();

while ($row = $result->fetch_assoc()) {
    $xWerte[] = $row['Zeit'];
    $yWerte[] = $row['Temp'];
}

// Datenbankverbindung schließen
$conn->close();
?>

<script>
    // Plotly-Diagramm erstellen
    var diagrammDaten = [{
        x: <?php echo json_encode($xWerte); ?>,
        y: <?php echo json_encode($yWerte); ?>,
        type: 'scatter',
        mode: 'lines+markers',
        marker: { color: 'blue' },
        line: { shape: 'spline' }
    }];

    var layout = {
        title: 'Temperaturverlauf',
        xaxis: { title: 'Zeit' },
        yaxis: { title: 'Temperatur' }
    };

    Plotly.newPlot('graph', diagrammDaten, layout);
</script>
