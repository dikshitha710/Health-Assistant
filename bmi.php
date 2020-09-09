<?php
	if(session_status() == PHP_SESSION_NONE)
	{
	//session has not started
			session_start();
	}
	include ("connection.php");

	$result=mysqli_query($con,"SELECT uname FROM user_details WHERE uname='$_SESSION[user]'");

	if(mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$hf = $_POST['uhtf'];
		$hi = $_POST['uhti'];
		$h = (($hf*12)+$hi)*2.54;
		$w = $_POST['uwt'];
		$_SESSION["h"]=$h;
		$_SESSION["w"]=$w;
		$bmi = ($w/($h*$h))*10000;
		$sql="UPDATE user_details SET ubmi='$bmi' WHERE uname='$_SESSION[user]'";
		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error($con));
		}
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Saved Succesfully')
		window.location.href='view.php';
    </SCRIPT>");

	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Register first as an user')
    window.location.href='index.php';
    </SCRIPT>");
	}

	mysqli_close($con);
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>
