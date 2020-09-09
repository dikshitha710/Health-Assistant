<?php

if($_POST["psw"]==$_POST["psw1"] && $_POST["psw"]!="" && $_POST["uname"]!="")
{
	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");

	$result=mysqli_query($con,"SELECT uname FROM user_details WHERE uname='$_POST[uname]'");

	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$uid = uniqid();
		$sql="INSERT INTO user_details(uname,uemail,uage,ugen,psw,ubmi,userid) VALUES('$_POST[uname]','$_POST[uemail]','$_POST[uage]','$_POST[ugen]','$_POST[psw]',0,'$uid')";

		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error($con));
		}

		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Registeration Succesfull')
    window.location.href='index.php';
    </SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Username Already Exists')
    window.location.href='index.php';
    </SCRIPT>");
	}

	mysqli_close($con);
}
else
{
	if($_POST["psw"]!=$_POST["psw1"])
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert(' Password Mismatch')
	window.location.href='index.php';
	</SCRIPT>");
	else
		echo "Invalid Username  <br />";

}
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>