<?php
	include ("connection.php");

	$result=mysqli_query($con,"SELECT user FROM user_labresults WHERE user='$_SESSION[user]'");
	$uname = $_SESSION['user'];
	$input = file_get_contents("php://input");
	if ($input)
	{
			$labresults=$_POST['lab_result'];
	}
	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql1 = "INSERT INTO user_labresults(user,HighBP,Sugar,LowBP) VALUES('$uname',0,0,0)";
		if(!mysqli_query($con,$sql1))
		{
			die('Error :'.mysqli_error($con));
		}
	}
	else
	{
		$sql3 = "UPDATE user_labresults SET HighBP = 0, Sugar = 0, LowBP = 0 WHERE user = '$uname'";
		if(!mysqli_query($con,$sql3))
		{
			die('Error :'.mysqli_error($con));
		}
	}
	if($input)
	{
				for ($i=0; $i<sizeof($labresults);$i++)
				{
						$sql2 = "UPDATE user_labresults SET $labresults[$i] = 1 WHERE user='$uname' ";
						if(!mysqli_query($con,$sql2))
						{
								die('Error :'.mysqli_error($con));
						}
				}
	}
	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Saved Succesfully')
				window.location.href='view.php';
				</SCRIPT>");


		mysqli_close($con);
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>
