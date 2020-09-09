<?php
	include ("connection.php");
	if(!isset($_SESSION['user']))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='index.php';
		</SCRIPT>");
	}
	$result=mysqli_query($con,"SELECT uname FROM user_details WHERE uname='$_SESSION[user]'");
	if(mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
			$sql="UPDATE user_details SET ubmi=0 WHERE uname='$_SESSION[user]'";
			if(!mysqli_query($con,$sql))
			{
				die('Error :'.mysqli_error($con));
			}
			$sql1=mysqli_query($con,"SELECT user FROM user_symptoms WHERE user='$_SESSION[user]'");
			if(mysqli_fetch_array($sql1,MYSQLI_ASSOC))
			{
					$sql2="DELETE FROM user_symptoms WHERE user='$_SESSION[user]'";
					if(!mysqli_query($con,$sql2))
					{
						die('Error :'.mysqli_error($con));
					}
			}
			$sql3=mysqli_query($con,"SELECT user FROM user_labresults WHERE user='$_SESSION[user]'");
			if(mysqli_fetch_array($sql3,MYSQLI_ASSOC))
			{
					$sql4="DELETE FROM user_labresults WHERE user='$_SESSION[user]'";
					if(!mysqli_query($con,$sql4))
					{
									die('Error :'.mysqli_error($con));
					}
			}
			$sql5=mysqli_query($con,"SELECT user FROM user_examine WHERE user='$_SESSION[user]'");
			if(mysqli_fetch_array($sql5,MYSQLI_ASSOC))
			{
					$sql6="DELETE FROM user_examine WHERE user='$_SESSION[user]'";
					if(!mysqli_query($con,$sql6))
					{
									die('Error :'.mysqli_error($con));
					}
			}
					echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Reset Succesfull')
								window.location.href='view.php';
								</SCRIPT>");

	}

	mysqli_close($con);
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>
