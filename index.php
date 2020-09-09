<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Health Assistant | Health Pediction </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
	<?php include_once("header.php"); ?>
	<div class="topnav" >
	</div>
	<div  class="totalpage">
		<br>
			<div id="id02" class="modal" style="display:none;color:white;">
			<center>
					<form class="box2" action="signup_page.php" method="post">
							<h2> REGISTER</h2>
							<input type="text" placeholder="Enter Username" name="uname" required><br>
							<input type="email" placeholder="Email ID" name="uemail" required><br>
							<input type="number" placeholder="Enter your age" name="uage" required><br>
							Gender:
							<input type="radio" id="male" name="ugen" value="male">
									<label for="male">Male</label>
							<input type="radio" id="female" name="ugen" value="female">
									<label for="female">Female</label><br>
							<input type="password" placeholder="Enter Password" name="psw" required><br>
							<input type="password" placeholder="Repeat Password" name="psw1" required><br>
							<button type="submit" class="signupbtn">Sign Up</button><br>
					</form>
			</div>                                                                                          <!-- Close of Register -->
			<div id="id01" class="modal" style="display:none">
			<center>
						<form class="box1" action="login_page.php" method="post">
							<h2>LOGIN</h2>
							<input type="text" placeholder="Username" name="uname" required><br>
							<input type="password" placeholder="Password" name="psw" required><br>
							<button type="submit">Login</button><br>
						</form>
			</center>
		</div>
		<div class="bgimage w3-spin"><img src="images/circle.png" width="500px"alt="Health Prediction"></div>                                                                                        <!-- Close of Login -->
		<div class="content">

			<p class="head">Health Assistant</p>
			<p id="line1" ></p>
			<?php
			if(isset($_SESSION['user']))
			{
					echo
					'<button style="background-color:red;border:none;border-radius:10px;"><a href="view.php" style="text-decoration:none;color:white;border:none;">Try Now</a></button>';
			} ?>
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
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>                                                                                              <!-- Close of Total page  -->
	

	<?php include_once("footer.php"); ?>
	<script>
	function showlogin()
	{
		var l2 = document.getElementById('id01');
		var r2 = document.getElementById('id02');
		if(l2.style.display==="none")
		{
			r2.style.display="none";
			l2.style.display="block";
		}
		else
		{
			l2.style.display="none";
		}
	}
	function showregister()
	{
		var l1 = document.getElementById('id01');
		var r1 = document.getElementById('id02');
		if(r1.style.display==="none")
		{
			l1.style.display="none";
			r1.style.display="block";
		}
		else
		{
			r1.style.display="none";
		}
	}
	function show1()
	{
		var a3=document.getElementById("line1");
		a3.innerHTML="is free!";
		setTimeout(show2,1500);
	}
	function show2()
	{
		var a3=document.getElementById("line1");
		a3.innerHTML="is helpful!";
		setTimeout(show1,1500);
	}
	show1();
	</script>
	</body>

	</html>