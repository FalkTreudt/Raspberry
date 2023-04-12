document.addEventListener("DOMContentLoaded", function() {
  const button = document.getElementById("takePicture");
  const liveImage = document.getElementById("live-image");
  const canvas = document.getElementById("capturedImage");
  const context = canvas.getContext("2d");
  const tempCanvas = document.createElement("canvas");
  const tempContext = tempCanvas.getContext("2d");
  const images = [];

  button.addEventListener("click", function() {
    const duration = document.getElementById("duration").value;
    const fps = 10;
    const interval = 1000 / fps;
    const numFrames = duration * fps;
    let framesRecorded = 0;

    // Set up a timer to capture frames at regular intervals
    const timer = setInterval(function() {
      // Draw the live image onto the temporary canvas
      tempCanvas.width = liveImage.width;
      tempCanvas.height = liveImage.height;
      tempContext.drawImage(liveImage, 0, 0);

      // Push a copy of the temporary canvas onto the images array
      images.push(tempCanvas.toDataURL());

      // Increment the number of frames recorded
      framesRecorded++;

      // If we have recorded the desired number of frames, stop the timer and display the captured images
      if (framesRecorded === numFrames) {
        clearInterval(timer);
        images.forEach(function(imageSrc) {
          const image = new Image();
          image.src = imageSrc;
          const imageContainer = document.createElement("div");
          imageContainer.appendChild(image);
          document.body.appendChild(imageContainer);
        });
      }
    }, interval);
  });
});

