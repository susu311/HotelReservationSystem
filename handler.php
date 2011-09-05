<?php
//handler.php is to authenticate username and password and redirect to associated to url.
	require_once('../HotelReservationSystem/mysqli_connect.php');
	
	function absolute_url($page='home.php'){
		$url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		
		$url=rtrim($url, '/\\');
		
		$url.='/'.$page;
		return $url;
		
	}
	
	
	
 
    function go_back()
	{
		//redirect to the form with an error
		$string = " Please type your correct username and password to login";
		echo $string;
		die();
	}
	if($_POST['email'] == "" || $_POST['password'] == "")
	{
		go_back();
	}
	
	$email = mysqli_real_escape_string($dbc,$_POST['email']);
    $password = mysqli_real_escape_string($dbc,$_POST['password']);
	$sql="SELECT name, guestId FROM guest WHERE email='$email' AND password=SHA1('$password')";
	$r= @mysqli_query($dbc,$sql);
	 $row_cnt = mysqli_num_rows($r);
	 if ($row_cnt<1)
	{
		go_back();
	}
      
	    $name; $id;
		while ($obj = mysqli_fetch_object($r)) {
		$name=$obj->name;
		$id=$obj->guestId;
       // echo $type;
		}

    
        mysqli_free_result($r);
		session_start();
		$_SESSION['email']=$email;
		$_SESSION['name']=$name;
		$_SESSION['id']=$id;
	
			
		
		
	 //redirect:	
      $link=absolute_url('home.php');
	  header("Location:$link");
	  exit();  
    
    
		mysqli_close($dbc);
		exit();
 

?>