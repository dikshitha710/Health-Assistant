<?php
	include ("connection.php");

	$result=mysqli_query($con,"SELECT user FROM user_symptoms WHERE user='$_SESSION[user]'");
	$uname = $_SESSION['user'];
	$input = file_get_contents("php://input");
	if ($input)
	{
			$symptoms=$_POST['symptom'];
	}
	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql1 = "INSERT INTO user_symptoms(user,Fever,Cold,Headache,Rashes,Pains,LossofAppetite,Patches,Vomiting,Cough) VALUES('$uname',0,0,0,0,0,0,0,0,0)";
		if(!mysqli_query($con,$sql1))
		{
			die('Error :'.mysqli_error($con));
		}
	}
	else
	{
		$sql3 = "UPDATE user_symptoms SET Fever = 0, Cold = 0, Headache = 0, Rashes = 0, Pains = 0, LossofAppetite = 0, Patches = 0, Vomiting = 0, Cough = 0 WHERE user = '$uname'";
		if(!mysqli_query($con,$sql3))
		{
			die('Error :'.mysqli_error($con));
		}
	}
	if($input)
	{
				for ($i=0; $i<sizeof($symptoms);$i++)
				{
						$sql2 = "UPDATE user_symptoms SET $symptoms[$i] = 1 WHERE user='$uname' ";
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
