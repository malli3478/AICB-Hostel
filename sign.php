<?php
	session_start();
	if(empty($_SESSION['uid']))
	{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>AICB Hostel</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">	
		<link rel="shortcut icon" type="image/x-icon" href="https://www.aicb.org.in/images/favicon.ico">
		<style>
			body
		      {
		        background-image: url("myBackground.png");
		        background-height: 100%;
		        background-width: 100%;
		        background-repeat: no-repeat;
		        background-attachment: fixed;
		      }
		     
		</style>
	</head>
	<body onload="init()">
		<!-- Navbar begin -->
		<div>
			<nav class="navbar navbar-inverse navbar-static-top navbar-wrapper">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
					  <a class="navbar-brand">
					    <img height="95%" alt="AICB" src="AICBlogo.png">
					  </a>

			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="aicb.html">AICB Hostel</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="">Home<span class="sr-only">(current)</span></a></li>
			        <li><a href="">About</a></li>
			        <li><a href="">Contacts</a></li>
			      </ul>
			      <form action="sign.php" class="navbar-form navbar-right">
			     	<button type="submit" class="btn btn-default" data-toggle="modal" data-whatever="@mdo">Sign in</button>
			      </form>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
		<!-- Navbar end -->


		<!-- Begin SignUp/SignIn -->

		<div class="container-fluid">
			<div class="row">
			<div class="container col-md-3 col-sm-6">
				<section class="login">
					<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
					<div class="titulo">Create student account</div>
					<form action="" method="post" enctype="application/x-www-form-urlencoded">
						<input type="text" name="name" required title="Your name" placeholder="Name">
		    			<input type="text" name="uid" required title="UserID required" placeholder="USN / Emp.ID">
		    			<input type="text" name="email" required title="E-mail ID required" placeholder="E-mail ID">
		       			<input type="password" name="pswd" required title="Password required" placeholder="Password" data-icon="x">
		       			<input type="password" name="cpswd" required title="Confirm password" placeholder="Confirm password" data-icon="x">
		       			<input type="submit" name="register" class="enviar" value="Register" method="post"/>
		    		</form>
				</section>
			</div>
			
			
			<div class="container col-md-3 col-sm-6">
				<section class="login">
					<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
					<div class="titulo">Student Login</div>
					<form action="" name="" id="l_form" method="post" enctype="application/x-www-form-urlencoded">
		    			<input type="text" name="uid" required title="UserID required" placeholder="USN" autofocus>
		       			<input type="password" name="pswd" required title="Password required" placeholder="Password">
		        		<div class="olvido">		        		
		       			<input type="submit" name="login" class="enviar" value="Log in" method="post"/>
		    		</form>
				</section>
			</div>

			<div class="container col-md-3 col-sm-6">
				<section class="login">
					<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
					<div class="titulo">Employee Login</div>
					<form action="emp_login.php" name="loginemp"  method="post" enctype="application/x-www-form-urlencoded">
		    			<input type="text" name="empid" required title="UserID required" placeholder="Emp.ID" autofocus>
		       			<input type="password" name="pswd" required title="Password required" placeholder="Password">
		        		<div class="olvido">		        		
		       			<input type="submit" name="loginemp" class="enviar" value="Log in" method="post"/>
		    		</form>
				</section>
			</div>

			<div class="container col-md-3 col-sm-6">
				<section class="login">
					<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
					<div class="titulo">LG / Parent Login</div>
					<form action="lgp_login.php" id="l_form" method="post" enctype="application/x-www-form-urlencoded">
		    			<input type="text" name="lgpid" required title="UserID required" placeholder="Lgp.ID" autofocus>
		       			<input type="password" name="pswd" required title="Password required" placeholder="Password">
		        		<div class="olvido">		        		
		       			<input type="submit" name="loginlgp" class="enviar" value="Log in" method="post"/>
		    		</form>
				</section>
			</div>
			</div>
		</div>

		<!-- End SignUp/SignIn -->



		<!-- Footer begin -->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<h4>Address</h4>
						<address>
							All India Confederation of the Blind<br>
							Behind Rajiv Gandhi Cancer Hospital<br>
							Braille Bhawan, Sector 5, Rohini<br>
							Delhi - 110085<br>
							Tel: +91 27054082<br>
							Mobile: 9810684208<br>
							Email: aicbdelhi@yahoo.com<br>
						</address>
					</div>



					<div class="col-md-offset-1 col-md-4" col-sm-6>
						<div>
							<div>
									<a href="https://goo.gl/maps/hyXVDZkvLsaFv2AXA" alt="Maps logo" style="color: white;">
									<img src="Maps1.png" width=40/>
									Locate in maps
									</a>
									<br>
								</div>
								<div>
								
									<a href="https://www.youtube.com/channel/UCXIge-1IQ9jMbErimdLTHnw/videos" style="color: white;">
									<img src="YouTubeLogo.png" alt="YouTube logo" width=40/>
									Visit YouTube channel
									</a><br>
								</div>
								<div>
								
									<a href="https://www.facebook.com/AICBDELHI/" style="color: white;">
									<img src="facebookLogo.png" alt="Facebook logo" width=40/>
									Visit facebook page
									</a><br>
								</div>								
							</div>		
							<br>				
						</div>
						<div class="col-md-4" style="border-radius: 5px; ">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.1033982138597!2d77.10830201496168!3d28.716455782384795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d014fd4555555%3A0xe98dcc8a07fe808d!2sAll%20India%20Confederation%20Of%20The%20Blinds!5e0!3m2!1sen!2sin!4v1631705485186!5m2!1sen!2sin" style="border: 5px; width: 100%;" height="250" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
			<div class="bottom-footer">
				<div class="col-md-5">© AICB | All rights reserved.</div>
					<div class="col-md-7">
						<ul class="footer-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contacts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer end -->


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function validate(){
		    var login = document.getElementById('l_form');
		    if (login.uid.value === "abc") {
		        alert(name);
		    } else {
		        login.uid.focus();
		    }
		}
	</script>
	</body>
</html>







<!-- Registration / Login verification begin -->

		<?php
			$test=1;
			if(!empty($_POST['login']))
			{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "Hostel";
				$test++;
				$flag=FALSE;
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection

				if ($conn->connect_error)
				{
				    die("Connection failed: " . $conn->connect_error);
				}


				$uid=$_POST['uid'];
				$pswd=$_POST['pswd'];

				$sql = "SELECT userID,pswd,name FROM accounts";

				$result=mysqli_query($conn,$sql);

				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
				    if(($uid===$row['userID']) and ($pswd===$row['pswd']))
				   	{	
				   		$flag=TRUE;
				   		session_start();

				   		$_SESSION['uid']=$uid;
				   		$_SESSION['name']=$row['name'];
				   		break;

				   	}
				}
				//echo "<script>alert(\"Test alert , flag=$flag.\")</script>";
				if($flag)
				{
					//$script="<script>function{alert('Successfully Logged in');}</script>"
					//echo '$script';
					//echo "<script>alert(\"Test alert.\")</script>";
					echo "<script type='text/javascript'>window.location.href = 'forms.php';</script>";
		        exit();
					//header("location: index.html?");
					exit();
				}
				else
				{
					?>

						<script>
							function fail()
							{
								alert("Oops! looks like something was wrong , please try to log in again.");
							}
							fail();
						</script>

					<?php
				}


				$conn->close();
			
			}
			else if(!empty($_POST['register']))
			{
				$test++;
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "Hostel";
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection

				if ($conn->connect_error)
				{
				    die("Connection failed: " . $conn->connect_error);
				} 

				$uid=$_POST['uid'];
				$pswd=$_POST['pswd'];
				$cpswd=$_POST['cpswd'];
				$email=$_POST['email'];
				$name=$_POST['name'];

				$sql = "INSERT INTO accounts(name,userID,email,pswd) VALUES('$name','$uid','$email','$pswd')";

				if($pswd===$cpswd)
				{
					if ($conn->query($sql) === TRUE) 
					{
					    //$last_id = $conn->insert_id;
					    //echo "New record created successfully. Last inserted ID is: " . $last_id;
					    echo "<script>alert(\"Registration successful.\")</script>";
					    //header("location: sign.php");
						//exit();
					}
					else
					{
					    //echo "Error: " . $sql . "<br>" . $conn->error;
					    echo "<script>alert(\"Seems like someone has an account with these UserID and E-mail_ID . Please try to register using other values for them.\")</script>";
					}
				}
				else
				{
					echo "<script>alert(\"Please enter same password in both PASSWORD and CONFIRM PASSWORD fields.\")</script>";
				}

				$conn->close();
			}
			else if($test!=1)
			{
				echo "<script>alert(\"Seems like something was wrong.Try again with valid field values.\")</script>";
			}

		}
		else
		{
			echo "<script>alert(\"You are already logged in.\"); window.location.href=\"complaint.php\";</script>";
		}
	?>

<!-- Registration / Login verification end -->


