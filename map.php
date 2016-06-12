
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$con = mysqli_connect($servername,$username,$password, $dbname);
$sql = "SELECT * FROM user";
$result=mysqli_query($con,$sql);
//print_r($result);
 while($row = mysqli_fetch_assoc($result)) {
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

//echo $row[3]; // longitude
//echo $row[4]; // latitude
	$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$row["latitude"].",".$row["longitude"]."&destinations=".$latitude.",".$longitude."&key=AIzaSyBwbWEOHRjip1umqxCjN9s6b_7Vy4bBB0M";
	$arr = json_decode(file_get_contents($url));
	//echo "<pre>";
	$url2= "https://api.havenondemand.com/1/api/sync/mapcoordinates/v1?targets=country&targets=timezone&targets=zipcode_us&lat=".$latitude."&lon=".$longitude."&apikey=71f6cf9a-b874-4e87-ab4f-f6cb7197ea22";
	$arr2 = json_decode(file_get_contents($url2));
	echo $row["username"]."<br>"; 
	echo /*"<div class='element'>"*/$arr->rows[0]->elements[0]->distance->text."<br>";
	echo $arr->rows[0]->elements[0]->duration->text."<br>";
	echo $arr2->matches[0]->name."<br>";
	echo $arr2->matches[0]->additional_information->place_location."<br><br>";
	//print_r($arr);
	//echo "</pre>";
}
?>
<html>
<body>
<script src="js/jquery.js"></script>
<form id="a" action="#" method="post">
<input type="hidden" id="lat" name="latitude" value="">
<input type="hidden" id="lon" name="longitude" value="">
<!--<input type="submit">-->
</form>
<script>
	function showPosition(pos){
		$("#lon").val(pos.coords.longitude);
		$("#lat").val(pos.coords.latitude);
		$("#a").submit();
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