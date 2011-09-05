<?php
//all users including memebers, moderators, admin can see this page
session_start();
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title> Hotel Reservation System
</title>


<link rel="stylesheet" type="text/css" href="/HotelReservationSystem/css/datePicker.css" />
<link rel="stylesheet" type="text/css" href="/HotelReservationSystem/css/hotel.css" />




<script type="text/javascript" src="/HotelReservationSystem/js/jquery-1.5.1.min.js">

</script>
<script type="text/javascript" src="/HotelReservationSystem/js/date.js">

</script>
<script type="text/javascript" src="/HotelReservationSystem/js/jquery.datePicker.js">

</script>
<script type="text/javascript">
$(function()
{
	$('.date-pick').datePicker();
});
</script>

</head>
<body>

<div id="wrapper">

<div id="nav">
<ul>
<li><a class="login" href="../HotelReservationSystem/register.html">Register</a></li>
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
if(isset($_SESSION['email']))
{		
	$name= $_SESSION['name'];
	$id= $_SESSION['id'];
	  echo "<h5>Welcome! ".$name;
	  echo '&nbsp;&nbsp;&nbsp;<a href="history.php">Reservations History</a>';


  echo'&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a></h5>';
	
	  

}
?>
</div>
<div id="roomSearch">
<form name="roomSearch" method="get" action="searchResult.php">
<h3>Find the room to check availablilty</h3>
<!--  
<ol>
<li>
<label for="date1">Date 1:</label>
<input id="date1" class="date-pick" name="date1">
<a class="dp-choose-date" title="Choose date" href="#">Choose date</a>
</li>
<li>
<label for="date2">Date 2:</label>
<input id="date2" class="date-pick" name="date2">
<a class="dp-choose-date" title="Choose date" href="#">Choose date</a>
</li>
</ol>-->


<label>Check-in Date</label>   <input type="text" name="checkIn" id="checkin" value=""/><br/><br/>
<label>Check-out Date</label>  <input type="text" name="checkOut" value=""/><br/><br/>
<label>Type</label><select name="type">
<option value="single">Single</option>
<option value="double">Double</option>
<option value="twin">Twin</option>
<option value="family">Family*</option>
</select><br/><br/>
<label>No of guests</label>
<select name="noguests">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select><br/><br/>
<input type="submit" name="search" id="search" value="Search"/>

</form>
</div>

<br/>
<div id="register" >
<form name=login method="post" action="handler.php">
<h3>Guest Log-in</h3><br/>
<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="email" id="email" value=""/><br/><br/>
<label>Password</label>
<input type="password" name="password" id="password" value=""/><br/><br/>
<input type="submit" name="login" id="login" value="Log in"/><br/><br/>

</form>
</div>

</div>
</div> 
<div id="footer">
</div>

</div>

</body>
</html>