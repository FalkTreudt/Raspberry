<!DOCTYPE html>
<html>
  <head>
    <title>Live-Bild von ESP32-CAM</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <div class="video-container">
        <h1>Live-Bild von ESP32-CAM</h1>
        <img id="live-image" src="http://192.168.178.61:81/stream" width="640" height="480">
        <div class="controls">
          <label for="duration">Aufnahmezeit (Sekunden):</label>
          <input type="range" id="duration" name="duration" min="1" max="20" value="1">
          <button type="button" id="takePicture">Momentaufnahmen machen</button>
        </div>
      </div>
      <div class="video-container">
        <h1>Momentaufnahmen</h1>
        <canvas id="capturedImage" width="640" height="480"></canvas>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>

