<?php
// Aktivieren des Fehler-Logging
ini_set('log_errors', 1);
ini_set('error_log', '/var/log/php_errors.log');

// Überprüfen, ob ein Bild gesendet wurde
if(isset($_FILES['image'])){
    // Ordnerpfad, in dem das Bild gespeichert werden soll
    $target_dir = "/var/www/html/Pictures/";
    // Name des Bildes
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // Überprüfen, ob das Bild bereits vorhanden ist
    if (file_exists($target_file)) {
        error_log("Bild bereits vorhanden.");
        echo "Bild bereits vorhanden.";
    } else {
        // Verschieben des temporären Bildes in den Zielordner
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Das Bild " . basename($_FILES["image"]["name"]) . " wurde erfolgreich hochgeladen.";
        } else {
            error_log("Beim Hochladen des Bildes ist ein Fehler aufgetreten.");
            echo "Beim Hochladen des Bildes ist ein Fehler aufgetreten.";
        }
    }
}
?>
