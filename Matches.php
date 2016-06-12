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
  //echo $row["username"]."<br>"; 
  //echo /*"<div class='element'>"*/$arr->rows[0]->elements[0]->distance->text."<br>";
  //echo $arr->rows[0]->elements[0]->duration->text."<br>";
  //echo $arr2->matches[0]->name."<br>";
  //echo $arr2->matches[0]->additional_information->place_location."<br>";
  //print_r($arr);
  //echo "</pre>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PlayTime</title>
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
    <h4 class="logo">PlayMate </h4>
  </header>
  <!-- Hero Section -->
  <section class="intro">
    <div class="column">
      <h3>You</h3>
    <img src="images/profile.png" alt="" class="profile"> </div>
    <div class="column">
      <p><h2>You Live at these :- <?php echo $arr2->matches[0]->additional_information->place_location; ?></h2></p>
</div>
  </section>
  <!-- Stats Gallery Section -->
  <div class="gallery">
    <div class="thumbnail"> <a href="#"><img src="images/bkg_06.jpg" alt="" width="2000" class="cards"/></a>
      <h4>chaitanyamalhotra</h4>
      <p class="tag">6 m 1 min</p>
      <form action="index2.php">
    <input type="submit" value="Chat">
</form>
</div>
    <div class="thumbnail"> <a href="#"><img src="images/bkg_06.jpg" alt="" width="2000" class="cards"/></a>
      <h4>RohanSharma</h4>
      <p class="tag">9 m 1 min</p>
       <form action="index2.php">
    <input type="submit" value="Chat">
</form>
</div>
<div class="thumbnail"> <a href="#"><img src="images/bkg_06.jpg" alt="" width="2000" class="cards"/></a>
      <h4>HershChopra</h4>
      <p class="tag">28.1 km 44 mins</p>
       <form action="index2.php">
    <input type="submit" value="Chat">
</form>
</div>
<div class="thumbnail"> <a href="#"><img src="images/bkg_06.jpg" alt="" width="2000" class="cards"/></a>
      <h4>BruceWayne</h4>
      <p class="tag">1 m 1 min</p>
       <form action="index2.php">
    <input type="submit" value="Chat">
</form>
</div>
</div>
<!-- Footer Section -->
  <footer id="contact">
    <p class="hero_header">GET IN TOUCH WITH ME</p>
    <div class="button">EMAIL ME </div>
  </footer>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2016 - <strong>AngelHack</strong></div>
</div>
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
<!-- Main Container Ends -->
</body>
</html>
