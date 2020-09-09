
<?php
	ini_set( "display_errors", 0);
	include ("connection.php");

	$result=mysqli_query($con,"SELECT uname,psw FROM user_details WHERE uname='$_POST[uname]' && psw='$_POST[psw]'");

	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong Login, Go back & try again')
    window.location.href='index.php';
    </SCRIPT>");
	}
	else
	{
		$_SESSION["access"]=1;
		$_SESSION["user"]=$_POST[uname];
		$_SESSION["n"]=1;
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Login Succesfull')
    window.location.href='view.php';
    </SCRIPT>");
		//header('Location: homepage.php');
    }

	mysqli_close($con);
?>
