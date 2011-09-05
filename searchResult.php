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
	session_start();
	if(isset($_SESSION['email']))
	{		
		$name= $_SESSION['name'];
		$id= $_SESSION['id'];
	  	echo "<h5>Welcome! ".$name;
	  	echo '&nbsp;&nbsp;&nbsp;<a href="history.php">Reservations History</a>';


  		echo'&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a></h5>';
	
	  

	}
 
  $checkin =($_GET['checkIn']);
  $checkout=($_GET['checkOut']);
  $type=($_GET['type']);
  $no=($_GET['noguests']);
  
	require_once ('../HotelReservationSystem/mysqli_connect.php');


   $sql= "SELECT  h.location, h.name, r.roomNo,r.type, r.price, r.facilities, b.checkIndate
FROM ((room AS r
INNER JOIN hotel as h ON h.hotelId=r.hotelId)
LEFT OUTER JOIN reservationdetail AS d ON r.roomNo= d.roomNo)
LEFT OUTER JOIN reservation AS b ON b.reservationId=d.reservationId
WHERE r.type='$type' 
AND (b.checkIndate > '$checkin' OR b.checkOutdate<'$checkin'
OR b.checkIndate is null)
AND (b.checkIndate>'$checkout' OR b.checkOutdate < '$checkout'
OR b.checkIndate is null)

   ";
	
	$r= @mysqli_query($dbc,$sql);
	$count=0;
	 $count = mysqli_num_rows($r);
	 if ($count<1)
	{
		echo "Sorry, there is no room available at the moment.";
	}
	else{
			echo' <form name="reserve" method="post" action="reserve.php">
			<input type="hidden" name="checkin" value='.$checkin.'/>
			<input type="hidden" name="checkout" value='.$checkout.'/>
			<input type="hidden" name="roomCount" value='.$count.'/>
			<input type="hidden" name="type" value='.$type.'/>';
			
			
			
			echo'<p>Available rooms</p>';
			echo '<table id="searchResult"><tr><th>Place</th><th>Hotel Name </th><th>Room No</th><th>Room Type</th><th>Price per night</th><th>Facilities   </th></tr>';
			 $roomList= array();
			
			//fetch the records
			while($row=mysqli_fetch_array($r, MYSQLI_ASSOC)){
				echo '<tr><td>'.$row['location'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['roomNo'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['price'].'</td>
				<td>'.$row['facilities'].'</td></tr>';
				
			   $roomList[]=$row['roomNo'];
			   
				
			  
				
			}
			
			 
			echo '</table>';
			
				echo '<p>'.$count.' rooms are available</p>';
				
				
		   echo '<p>Please type the number of rooms to book.
		   <input type="text" name="requiredRoom" value=""/></p><br/><br/>
			<input type="submit" name="reserve" value="Reserve room/s"/>';
			echo '</form>';
			#print_r($roomList);
						
			mysqli_free_result($r);
			$_SESSION['list']=$roomList;
			
	  }
		mysqli_close($dbc);
		exit();
?>
<br/>


</div>
</div> 
<div id="footer">
</div>

</div>

</body>
</html>
