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
</div>


<h2>Confirmation of your booking:</h2>

<?php 
	if(isset($_SESSION['email']))
	{		
		$name= $_SESSION['name'];
		$id= $_SESSION['id'];
	  	echo "<h5>Welcome! ".$name;
	  	echo '&nbsp;&nbsp;&nbsp;<a href="history.php">Reservations History</a>';


  		echo'&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a></h5>';
	
	  

	}
 

 $roomList=array();
 $roomList=$_SESSION['list'];
 

$checkin= ($_POST['checkin']);
$checkout= ($_POST['checkout']);
$type= ($_POST['type']);
$roomCount= ($_POST['roomCount']);
//$rows=($_POST['rows']);
$requiredRooms=($_POST['requiredRoom']);
//get the number of available rooms
require_once ('../HotelReservationSystem/mysqli_connect.php');	
	
		//insert the value into reservation table first
			$q1="INSERT INTO reservation(reservationId,guestId, checkIndate,checkOutdate)VALUES ('','$id', '$checkin','$checkout')";
		
			$r1=@mysqli_query($dbc, $q1);
			$my_id=mysqli_insert_id($dbc);
			
		
		
	//reserve the room
	//check the available room is greater than required room
	//show error if the required rooms are more than the available room
	 $roomCount=5;
		 if ($roomCount>$requiredRooms){
		 	#$count= count($roomList);
		    for($i=0; $i<$requiredRooms; $i++ ) {
		    	$q2= " INSERT INTO reservationdetail(roomNo, reservationId)VALUES ('$roomList[$i]','$my_id')";
				$r2=@mysqli_query($dbc, $q2);
				
		    } 
		
			if ($r2)
			{
				echo "Details have been saved!";
			}
		 }
		 
		 else {
		 	echo "Sorry, there is no more vacancy";
		 }
		 $sql="SELECT  SUM(price),b.reservationId
FROM guest AS g, reservation AS b, reservationdetail AS d, room AS r WHERE g.guestId=b.guestId AND b.reservationId=d.reservationId AND
d.roomNo=r.roomNo AND b.reservationId='$my_id'";
		 $r3=@mysqli_query($dbc, $sql);
		 if($r3)
		 {
		 	while($row=mysqli_fetch_array($r3, MYSQLI_ASSOC)){
		 			echo "<br/><h4>This is your reservation Id : ".$row['reservationId']."</h4>";
		 			echo "<br/><h5>Total cost is £".$row['SUM(price)']."</h5>";
		 			
		 			
		 	}
		 	
		 }
		 	mysqli_close($dbc);
		exit();
		echo date('l jS \of F Y h:i:s A');
	
?>

<p>Thank you so much.</p>
<br/>


</div>
</div> 
<div id="footer">
</div>

</div>

</body>
</html>

