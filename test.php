<!DOCTYPE html>
<html>
<head>
	<title>File Existence Checker</title>
</head>
<body>
	<button onclick="checkFileExistence()">Check File Existence</button>
	<p id="result"></p>

	<script>
		function checkFileExistence() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4) {
					if (this.status == 200) {
						document.getElementById("result").innerHTML = "File exists!";
					} else if (this.status == 404) {
						document.getElementById("result").innerHTML = "File does not exist!";
					} else {
						document.getElementById("result").innerHTML = "An error occurred.";
					}
				}
			};
			xmlhttp.open("HEAD", "/Pictures/123.jpeg", true);
			xmlhttp.send();
		}
	</script>
</body>
</html>
