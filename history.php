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
if(isset($_SESSION['email']))
{		
	$name= $_SESSION['name'];
	$id= $_SESSION['id'];
	  echo "<h5>Hello! ".$name."</h5>";
	 	

 
  
  require_once ('../HotelReservationSystem/mysqli_connect.php');
  
  $sql1="SELECT DISTINCT b.reservationId, r.type, b.checkIndate, b.checkOutdate
FROM guest AS g, reservation AS b, reservationdetail AS d, room AS r WHERE g.guestId=b.guestId AND b.reservationId=d.reservationId AND
d.roomNo=r.roomNo AND g.guestId='$id'";
   $result= @mysqli_query($dbc,$sql1);
	
	 if (!$result)
	{
		echo "No history of booking is found";
	}else {
		
		echo'<p>History of reservation</p>';
			echo '<table id="searchResult"><tr><th>Reservation Id</th><th>Room Type </th><th>Check In Date</th><th>Check Out Date</th</tr>';
			
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo '<tr><td>'.$row['reservationId'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['checkIndate'].'</td>
				<td>'.$row['checkOutdate'].'</td></tr>';
			}
					echo '</table>';
					echo'<br/><a href="home.php">To make a new reservation</a>';
					 echo'&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a>';
					mysqli_free_result($result);
			
			
	  }
		mysqli_close($dbc);
		exit();

		
	
   
	
	  

}

?>



<br/>


</div>
</div> 
<div id="footer">
</div>

</div>

</body>
</html>
