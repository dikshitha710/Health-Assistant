<?php
if(session_status() == PHP_SESSION_NONE)
{
    //session has not started
    session_start();
}
if(!isset($_SESSION['user']))
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('You have no permission to view this page, Login First!')
	window.location.href='index.php';
	</SCRIPT>");
}
else
{
    ini_set( "display_errors", 0);
    include ("connection.php");

    $query="SELECT * FROM user_details WHERE uname='$_SESSION[user]'";

    if($result = $con->query($query))
    {
        $row = $result->fetch_assoc();
        $bmi=$row["ubmi"];
        $gender = $row["ugen"];
    }


    $sug1=' ';$w1=0;$w2=0;
    if($bmi==0)   // if bmi = 0, user didnt entered atleast step-1
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Enter correct Height & Weight')
        window.location.href='view.php';
        </SCRIPT>");
    }
    else        //
    {
        $sug1 = 'Hey '.$_SESSION[user].',';
        $h = $_SESSION["h"];
        $w = $_SESSION["w"];
        $w1 = (18.5*$h*$h)/10000;
        $w2 = (24.9*$h*$h)/10000;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Health Assistant | Health Pediction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="image/x-icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/bmi.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php require_once("header.php"); ?>
<div class="topnav">

</div>
<div class="totalpage">
  <br>

  <div class="bgimage w3-spin"><img src="images/circle.png" width="500px"alt="Health Prediction"></div>
  <div class="output" style="color:black;align:left;margin-left:50px;">
    <?php

        if( $gender == 'male' )
        {
          echo '<div class="image"><img src="images/manbmi.jpg" width="500px"alt="BODY_MASS_INDEX"></div>';
        }
        else
        {
          echo '<div class="image"><img src="images/womenbmi.jpg" width="500px"alt="BODY_MASS_INDEX"></div>';
        }
        echo '<p style="font-size:25px;">'.$sug1.' <br>';
        echo 'Your <b>BMI</b> = '.round($bmi,2).'<br>';
        echo 'Weight of a <b>'.$gender.'</b> with your height should range from <b>'.round($w1,1).'Kg</b> to <b>'.round($w2,1).'Kg</b><br><br>';
        if(round($bmi,2)<18.5)
        {
            echo 'Sorry to say this, You are considered as a person with <b>Under-weight</b><br>';
            echo 'You have to eat well to be <b>Healthy & Fit</b><br>';
        }
        if(round($bmi,2)>24.9)
        {
            echo 'Sorry to say this, You are considered as a person with <b>Over-weight</b><br>';
            echo 'You have to work hard to be <b>Healthy & Fit</b><br>';
        }
        else
        {
           echo 'No worries, You are considered as a person with <b>Ideal-weight</b><br>';
           echo 'Congrats, You are on a <b>Good Diet</b><br><br>';
        }
    include ("symptom_prediction.php");
        if($p!=0)
            echo 'According to your symptoms,<br> It seems like you may have the chance of having ';
        echo '<b>'.$suggestion.'</b><br>';
    include ("data.php");
        echo '</p>';
        //echo '<p style="color:red;">Click on the title of the page to reset all the data & try again. Thankyou !</p>';
     ?>
  </div>
  <div class="instructions" style="margin:50px;">
  <br><p style="font-size:25px;"><b>INSTRUCTIONS</b><br>
     1. Click on start & enter all the details & Symptoms<br>
     2. Save each step individually & then goto next step<br>
     3. The buttons next & prev are used only to change the saved data<br>
     4. On clicking on next wont take your input, just move onto the next step<br>
     5. To reset all your details, Click on the title of the page<br>
     6. To logout from your account, double click on the top right corner<br>
     7. To goto your homepage, click on the title logo</p><br>
</div>
  <br><br>
  <br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	<?php require_once("footer.php"); ?>
</body>
</html>