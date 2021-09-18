<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>PES_BH|Student LogIn</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">		
		    <style>
      body
      {
        background-image: url("bg5.jpg");
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
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
		      <a class="navbar-brand" href="index.php">PES Boys Hostel</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
		        <li><a href="about.php">About</a></li>
		        <li><a href="contacts.php">Contacts</a></li>
		      </ul>
		      <?php
		      	session_start();
		      	if(isset($_SESSION['name']))
		      	{
		      print_r('<form action="sign.php" class="navbar-form navbar-right">
		     	<button type="submit" class="btn btn-default" data-toggle="modal" data-whatever="@mdo">Log in</button>
		      </form>');}
		  		else{
		  			print_r('<form action="logout.php" class="navbar-form navbar-right">
		     	<button type="submit" class="btn btn-default" data-toggle="modal" data-whatever="@mdo">Log out</button>
		      </form>');}
		      ?>
		      
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<!-- Begin js login -->

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			    <div>
			        <div class="modal-body">
				        <div class="container">
							<section class="login">
								<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
								<div class="titulo">Enter your credentials</div>
								<form action="#" method="post" enctype="application/x-www-form-urlencoded">
					    			<input type="text" required title="Username required" placeholder="Username" data-icon="U">
					       			<input type="password" required title="Password required" placeholder="Password" data-icon="x">
					        		<div class="olvido">
					        		<div class="col"><a href="#" title="Ver Carásteres">Register</a></div>
					            	<div class="col"><a href="#" title="Recuperar Password">Fotgot Password?</a></div>
					        		</div>
					       			<a href="#" class="enviar">Submit</a>
					    		</form>
							</section>
						</div>
			        </div>
			    </div>			   
			</div>
		</div>

		<!-- end js login -->
		<div class="container" >
			<h2>Phone numbers to which student / parents can contact to inform about any symptoms / attempt to rag - when comes to their notice</h2>
		</div>
		<div class="container">
			<div class="container">
				<h4>PES INSTITUTE OF TECHNOLOGY</h4>
			</div>
			<div class="container" style="overflow: hidden;margin:0px;padding:0px; background:#d1e2d1">
				<table class="table table-responsive table-hover table-condensed table-bordered">
					<tbody>
						<tr>
							<th>S.No.</th>
							<th>NAME</th>
							<th>DESIGNATION</th>
							<th>CONTACT No.</th>
						</tr>
						<tr>
							<td>1</td>
							<td>Dr. K.N.B.Myrthy</td>
							<td>Member</td>
							<td>9449807737</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Mr. P.Sreenivas</td>
							<td>Convener</td>
							<td>9901666521</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Prof. M.V.Sathyanarayan</td>
							<td>Chairman counsleor of Wardens</td>
							<td>9880189444</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Sun-Inspector, Girinagar Police Station, B'lore-85</td>
							<td>Member</td>
							<td>080-22942577</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Mr. Malatesh Y Annigeri</td>
							<td>Member</td>
							<td>9845842363</td>
						</tr>
						<tr>
							<td>6</td>
							<td>Mr. Ratan Kumar , Parent</td>
							<td>Member</td>
							<td>9886745518</td>
						</tr>
						<tr>
							<td>7</td>
							<td>Boys/Girls Hostel Warden</td>
							<td>Member</td>
							<td>8861207041/43</td>
						</tr>
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
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contacts.php">Contacts</a></li>
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
