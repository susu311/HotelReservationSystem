<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Hotel Reservation System, Registration</title>

<link rel="stylesheet" type="text/css" href="/HotelReservationSystem/css/jquery-ui-1.8.13.custom.css" />
<link rel="stylesheet" type="text/css" href="/HotelReservationSystem/css/hotel.css" />




<script type="text/javascript" src="/HotelReservationSystem/js/jquery-1.5.1.min.js">

</script>
<script type="text/javascript" src="/HotelReservationSystem/js/jquery-ui-1.8.13.custom.min.js">

</script>
</head>
<body>

<div id="wrapper">

<div id="nav">
<ul>
<li><a class="register" href="../HotelReservationSystem/home.php">Home</a></li>
<li><a class="contact" href=#>Contact us</a></li>
<li><a class="about" href=#>About</a></li>
</ul>
</div>
<div id="header">
<a href="#">
<img title="Hotel" alt="Hotel_paradise" src="/HotelReservationSystem/images/logo.png"/>
</a>
</div>
<div id="contentWrapper">
<div id="content">
<div>
<?php 
if(!isset($_SESSION['email']))
{	
	exit();
}
else{
	$_SESSION=array();
	session_destroy();
	echo "<h2>Log out</h2>";
	

}
?>
<p>Successfully logged out the system!</p>
<a href="home.php">To Login</a>

<br/>


</div>
</div> 
<div id="footer">
</div>

</div>

</body>
</html>

