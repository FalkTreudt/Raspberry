<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Falks Bilder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="imagesStyle.css" />
</head>
<body>
    <div class="header">
        Falks Bilder
    </div>
    <div class="sidebar" id="sidebar">
        <i class="fas fa-trash-alt"></i>
    </div>
    <div class="container" id="container">
        <?php
            $dirname = "Pictures/";
            $images = glob($dirname."*.jpeg");
            foreach($images as $image) {
                $imageName = ucwords(str_replace('-', ' ', basename($image, '.jpeg')));
                echo '<div class="image-container">';
                echo '<div class="image-wrapper" draggable="true" ondragstart="drag(event)" id="'.$image.'">';
                echo '<img src="'.$image.'" />';
                echo '<div class="image-name">'.$imageName.'</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Wollen Sie das Bild wirklich löschen?</p>
            <button id="delete-yes">Ja</button>
            <button id="delete-no">Nein</button>
        </div>
    </div>
    <script>
        var sidebar = document.getElementById("sidebar");
        var container = document.getElementById("container");
        var modal = document.getElementById("myModal");
        var yesBtn = document.getElementById("delete-yes");
        var noBtn = document.getElementById("delete-no");
        var draggedItem = null;
        var deleteConfirmed = false;

        sidebar.addEventListener('dragover', function(e) {
            e.preventDefault();
        });

        sidebar.addEventListener('drop', function(e) {
            e.preventDefault();
            showModal();
        });

        function showModal() {
            modal.style.display = "block";
        }

        function hideModal() {
            modal.style.display = "none";
        }

        function drag(e) {
            draggedItem = e.target;
        }

        container.addEventListener('dragover', function(e) {
            e.preventDefault();
        });

        container.addEventListener('drop', function(e) {
            e.preventDefault();
            if (deleteConfirmed && draggedItem) {
                var container = draggedItem.parentNode.parentNode;
                if (container.parentNode.id == "container") {
                    container.parentNode.removeChild(container);
                }
                deleteConfirmed = false;
            }
        });

        yesBtn.onclick = function() {
    deleteConfirmed = true;
    hideModal();

    if (deleteConfirmed && draggedItem) {
        var image = document.getElementById(draggedItem.id);
        image.parentNode.removeChild(image);
        deleteConfirmed = false;
        var imageName = image.querySelector('.image-name').textContent;
        imageName = "/Pictures/" + imageName + ".jpeg";
        console.log(imageName);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Deleted file: " + this.responseText);
            }
        };
        xmlhttp.open("POST", "deleteImage.php");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("image=" + imageName);
    }
}



        noBtn.onclick = function() {
            deleteConfirmed = false;
            hideModal();
        }
    </script>
</body>
</html>
