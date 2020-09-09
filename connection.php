<?php
	if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
	}
	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");

?>