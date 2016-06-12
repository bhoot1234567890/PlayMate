<!-- <html>
<body>
<script src="js/jquery.js"></script>
<form action="#" method="post">
Name: <input type="text" name="name"><br>
Password: <input type="password" name="password"><br>
<input type="hidden" id="lat" name="latitude" value="">
<input type="hidden" id="lon" name="longitude" value="">
<input type="submit">
</form>

<script>
	function showPosition(pos){
		$("#lon").val(pos.coords.longitude);
		$("#lat").val(pos.coords.latitude);
	}
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
	getLocation();
	
</script>
</body>
</html>
 -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["name"];
$pass = $_POST["password"];
$long = $_POST["longitude"];
$lat = $_POST["latitude"];

$sql = "INSERT INTO user (username, password, longitude, latitude)
VALUES ('".$user."','".$pass."','".$long."','".$lat."')";

if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">location.href='test.php';</script> ";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

