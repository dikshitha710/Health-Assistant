<?php
if(session_status() == PHP_SESSION_NONE){
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

  <div class="bgimage w3-spin"><img src="images/circle.png" width="500px"alt="Health Prediction"></div>                                                                                        <!-- Close of Login -->
  <div class="content">
    <p id="line1" ></p>
    <p class="head">Health Assistant</p>
  </div>
  <center>
	<?php
	ini_set( "display_errors", 0);
	include ("connection.php");

	$query="SELECT ubmi FROM user_details WHERE uname='$_SESSION[user]'";
	$query1="SELECT user FROM user_symptoms WHERE user='$_SESSION[user]'";
  $query2="SELECT user FROM user_labresults WHERE user='$_SESSION[user]'";
  $query3="SELECT user FROM user_examine WHERE user='$_SESSION[user]'";
	if($result = $con->query($query))
	{
		$row = $result->fetch_assoc();
		$r=$row["ubmi"];
	}
	if($result1 = $con->query($query1))
	{
		$row = $result1->fetch_assoc();
		$r1=$row["user"];
	}
  if($result2 = $con->query($query2))
  {
    $row = $result2->fetch_assoc();
    $r2=$row["user"];
  }
  if($result3 = $con->query($query3))
  {
    $row = $result3->fetch_assoc();
    $r3=$row["user"];
  }
	if($r==0)   // if bmi = 0, user didnt saved step-1. So, go to step1
	{
		echo '<center><button id="start" onclick="start()" style="border-radius:5px;width:95px;">START</button></center>';
	}
	else if($r1) // if there is a value in user_symptoms table, then user entered step-2
	{
    if($r2)  // if there is a value in user_labresults table, then user entered step-3.
     {
       if($r3) // if there is a value in user_examine table, then user entered step-4. So, goto submit
       {
         echo '<button id="start" style="border-radius:5px;width:95px;"><a href="submit.php" style="text-decoration:none;color:white;">submit</a></button>';

       }
       else // since user entered step-4. Goto Submit
       {
            echo '<button id="start" onclick="step4()" style="border-radius:5px;width:95px;">next</button>';
            echo '<script type="text/javascript">
             step4();
             </script>';
       }
     }
     else  // since user entered step-2. Goto Step-3
     {
		     echo '<button id="start" onclick="step3()" style="border-radius:5px;width:95px;">next</button>';
		     echo '<script type="text/javascript">
					step3();
		      </script>';
     }
  }
	else     // if there is value in bmi, user entered step-1. So, got to step2
	{
		echo '<button id="start" onclick="step2()" style="border-radius:5px;width:95px;">next</button>';
		echo '<script type="text/javascript">
					step2();
		</script>';
	}
	?>


<!-- Step-1 Code -->
<div class="bmi" id="s1">
	<h1>STEP-1</h1>
	<center>
	<form action="bmi.php" method="post">
		<table>
			<tr>
				<td><label for="uhtf" >Height</label></td>
				<td><input type="number" placeholder="Feet" name="uhtf" required></td>
				<td><input type="number" placeholder="Inches" name="uhti" required></td>
			</tr>
			<tr>
				<td><label for="uwt" >Weight</label></td>
				<td><input type="number" placeholder="Kilograms" name="uwt" required><br></td>
				<td></td>
			</tr>
		</table><br>
		<button type="submit" style="outline:none;">save</button>&nbsp;&nbsp;
		<button type="button" style="outline:none;" onclick="step2()">next</button>
	</form>
	</center>
</div>
<!-- Step -2 Code -->
<div class="symptoms" id="s2">
	<h1 style="color:red;">STEP-2</h1>
	<center>
	<form action="symptoms.php" method="post">
		<table>
			<tr>
				<td><input type="checkbox" id="Fever" name="symptom[]" value="Fever"></td>
				<td><label for="Fever">Fever</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Cold" name="symptom[]" value="Cold"></td>
				<td><label for="Cold">Cold</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Headache" name="symptom[]" value="Headache"></td>
				<td><label for="Headache">Headache</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Rashes" name="symptom[]" value="Rashes"></td>
				<td><label for="Rashes">Rashes</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Pains" name="symptom[]" value="Pains"></td>
				<td><label for="Pains">Pains</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Loss of Appetite" name="symptom[]" value="LossofAppetite"></td>
				<td><label for="Loss of Appetite">Loss of Appetite</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Patches" name="symptom[]" value="Patches"></td>
				<td><label for="Patches">Patches</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Vomiting" name="symptom[]" value="Vomiting"></td>
				<td><label for="Vomiting">Vomiting</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Cough" name="symptom[]" value="Cough"></td>
				<td><label for="Cough">Cough</label></td>
			</tr>
		</table>
		<br>
    <button type="button" style="outline:none;" onclick="start()">prev</button>&nbsp;&nbsp;
		<button type="submit" style="outline:none;">save</button>&nbsp;&nbsp;
		<button type="button" style="outline:none;" onclick="step3()">next</button>
  </form>
</center>
</div>
<!-- Step -3 Code -->
<div class="lab_results" id="s3">
	<h1 style="color:red;">STEP-3</h1>
	<center>
	<form action="lab_results.php" method="post">
		<table>
			<tr>
				<td><input type="checkbox" id="HighBP" name="lab_result[]" value="HighBP"></td>
				<td><label for="HighBP">High BP</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Sugar" name="lab_result[]" value="Sugar"></td>
				<td><label for="Sugar">Sugar</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="LowBP" name="lab_result[]" value="LowBP"></td>
				<td><label for="LowBP">Low BP</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</table>
		<br>
    <button type="button" style="outline:none;" onclick="step2()">prev</button>&nbsp;&nbsp;
		<button type="submit" style="outline:none;">save</button>&nbsp;&nbsp;
		<button type="button" style="outline:none;" onclick="step4()">next</button>
	</form>
</center>
</div>
<!-- Step -4 Code -->
<div class="symptoms" id="s4">
	<h1 style="color:red;">STEP-4</h1>
	<center>
	<form action="examine.php" method="post">
		<table>
			<tr>
				<td><input type="checkbox" id="SkinAllergy" name="examine[]" value="SkinAllergy"></td>
				<td><label for="SkinAllergy">Skin Allergy</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Conjuctives" name="examine[]" value="Conjuctives"></td>
				<td><label for="Conjuctives">Conjuctives</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Sweat" name="examine[]" value="Sweat"></td>
				<td><label for="Sweat">Sweat</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Distress" name="examine[]" value="Distress"></td>
				<td><label for="Distress">Distress</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="Tachycardia" name="examine[]" value="Tachycardia"></td>
				<td><label for="Tachycardia">Tachycardia</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="checkbox" id="Dehydration" name="examine[]" value="Dehydration"></td>
				<td><label for="Dehydration">Dehydration</label></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="SunkenEyes" name="examine[]" value="SunkenEyes"></td>
				<td><label for="SunkenEyes">Sunken Eyes</label></td>
			</tr>
		</table>
		<br>
    <button type="button" style="outline:none;" onclick="step3()">prev</button>&nbsp;&nbsp;
		<button type="submit" style="outline:none;">save</button>&nbsp;&nbsp;
		<button type="button" style="outline:none;"><a href="submit.php" style="text-decoration:none;color:white;">Submit</a></button>
  </form>
</center>
</div>
</center>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
	<?php require_once("footer.php"); ?>
	<script>
  function show1()
	{
		var a3=document.getElementById("line1");
		a3.innerHTML="Welcome to";
		setTimeout(show2,1500);
	}
	function show2()
	{
		var a3=document.getElementById("line1");
		a3.innerHTML="Hello, I am";
		setTimeout(show1,1500);
	}
	show1();
		function start()
		{
			document.getElementById('s1').style.display="block";
			document.getElementById('start').style.display="none";
      document.getElementById('s2').style.display="none";
		}
		function step2()
		{
			document.getElementById('s2').style.display="block";
			document.getElementById('s1').style.display="none";
			document.getElementById('start').style.display="none";
      document.getElementById('s3').style.display="none";
		}
		function step3()
		{
			document.getElementById('s3').style.display="block";
			document.getElementById('s2').style.display="none";
			document.getElementById('start').style.display="none";
      document.getElementById('s4').style.display="none";
		}
    function step4()
    {
      document.getElementById('s4').style.display="block";
      document.getElementById('s3').style.display="none";
      document.getElementById('start').style.display="none";
    }
	</script>
</body>
</html>