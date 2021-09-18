<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>PES_BH|Complaints</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">		
		<style>
			body
			{
			    background-image: url("bg5.jpg");
	    		background-repeat: no-repeat;
			}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-static-top navbar-wrapper">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
				  <a class="navbar-brand">
				    <img alt="PES" src="logo3.png">
				  </a>

		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.html">PES Boys Hostel</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.html">Home<span class="sr-only">(current)</span></a></li>
		        <li><a href="about.html">About</a></li>
		        <li><a href="contacts.html">Contacts</a></li>
            	<li><a href="complaint.php">Complain</a></li>
            	<li><a href="showcomplaints.php">Show complaints</a></li>		      
            </ul>
            <div class="navbar-form navbar-right" style="font-color=#fff;">
            <?php

              if(empty($_SESSION['name']))
              {
                header("location: sign.php");
                exit();
              }
          //  <a class="navbar-brand" href="index.html">PES Boys Hostel</a>

              echo "<p class=\"navbar-brand\">".$_SESSION['name']."(".$_SESSION['uid'].")!</p>";
              ?>
          </div>
          <form action="logout.php" class="navbar-form navbar-right">
            <button type="submit" class="btn btn-default navbar-right" data-toggle="modal" data-target="#exampleModal" onClick="thank_user()" data-whatever="@mdo">Log out</button>
          </form>
          <script type="text/javascript">
            function thank_user()
            {
              alert("Thank you for using our website! We hope you liked it!");
            }
          </script>
		      
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>





	<?php
		$test=1;
		if(!empty($_SESSION['uid']))
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


			// $id=$_POST['complid'];
			$c_name=$_SESSION['name'];
			$c_usn=$_SESSION['uid'];
	?>





		<div class="container" >
			<h1>The complaints are listed below :<h1>

		<div class="table-responsive " style="background-color:#d2d2d2;">

				<table class="table table-bordered table-hover">
					<tbody>
	




<!--
			<div class="container">
				<h4><?php echo $row{'compltype'};?></h4>
			</div>
-->
						
						<tr>
							<th>Complaint Number</th>
							<th>Complaint Typer</th>
							<th>The complaint</th>
							<th>Student name</th>
							<th>Block</th>
							<th>Room No.</th>
						</tr>

	<?php
			$query = "SELECT * FROM complaints";

			$result = mysqli_query($conn,$query);

			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
	?>
						<tr>
							<td><?php echo $row{'id'};?></td>
							<td><?php echo $row{'type'};?></td>
							<td><?php echo $row{'complaint'};?></td>
							<td><?php echo $row{'name'};?></td>
							<td><?php echo $row{'block'};?></td>
							<td><?php echo $row{'room'};?></td>
						</tr>
	<?php
			}
		}
		else
		{
			echo "<script type='text/javascript'alert(\"Please Login.\");>window.location.href = 'sign.php';</script>";
	        exit();
		}

	?>					
					</tbody>
				</table>
		</div>
		</div>

		<!-- Footer begin -->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h4>Contact Address</h4>
						<address>
							PESIT Campus, 100 Feet Ring Road,<br>
							BSK 3rd Stage, Hosakerelli,<br>
							Bangalore - 560 085
						</address>
					</div>
				</div>
			<div class="bottom-footer">
				<div class="col-md-5">© PES Institutions - All rights reserved.</div>
					<div class="col-md-7">
						<ul class="footer-nav">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>

		<!-- Footer end -->

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
