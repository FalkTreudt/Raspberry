<?php
if (isset($_POST['image'])) {
    $image = $_POST['image'];
    $image = str_replace(" ", "\ ", $image); // Ersetzt Leerzeichen durch "\ "
    if (unlink($_SERVER['DOCUMENT_ROOT'] . $image)) {
        echo "Datei erfolgreich gelöscht: " . $image;
    } else {
        echo "Fehler beim Löschen der Datei: " . $image;
    }
}
?>
