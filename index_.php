<html manifest="mycache.manifest">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>PES_BH|Home page</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">		
		<style>
			body
			{
			    background-image: url("bg5.jpg");
	    		
			}
		</style>
		<script>
		if(!document.cookie)
{
mystr="name=namitha";
document.cookie=mystr+";max-age=3000";
mystr="dept="+encodeURIComponent("is;e");
document.cookie=mystr;
dat=new Date(2013,4,24);  
mystr="course=WT";
document.cookie=mystr+";expires="+dat.toString();                                                  ;
}
else
{
alert(decodeURIComponent(document.cookie));
}
if (sessionStorage.clickcount)
  {
  sessionStorage.clickcount=Number(sessionStorage.clickcount)+1;
  }
else
  {
  sessionStorage.clickcount=1;
  }
document.write("Website Visited : " + 
        sessionStorage.clickcount + " time(s)."); 
		</script>
	</head>

	<body background="bg4.jpg" onload="init()">
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
		      </ul>
		      <form action="sign.php" class="navbar-form navbar-right">
		     	<button type="submit" class="btn btn-default" data-toggle="modal" data-whatever="@mdo">log_in</button>
		      </form>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>



		<div>
			<div class="container" style="background:black;padding-bottom:10px">
				
					<p></p>
					<img class="img-responsive" id="myimg">
				
			</div>
			<p></p>
		</div>
		
		<div class="container justified">
			<div class="jumbotron" style="background:#eee">
			<h2>PES Boys Hostel :</h2>
			<p align="justify"> PES Boys hostel is situated in the PES University campus. Hostelites will therefore have the advantage of deriving the benefit of various facilities available in the PES University campus, that includes: sports, gymnasium, campus store, campus mart, banking, travel booking, on going live projects in various departments / CORI centre and can participate in various National and International seminars / condferences / events keep happening round the year etc. </p>
			<br>
		</div>
		</div>
		
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
				<div class="col-md-5">© Copyright PES Institutions.</div>
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
		<script type="text/javascript">
			//someOp();
			count = 1;
			function init()
			{
				//Some functionality
				//win = window.open("","mywin");
				//doc = win.document;
				//document.write("<h2>hello there</h2>");
				//doc.close();
				img = document.getElementById("myimg");
				if(img)
				{
					startAnimation();
				}
			}

			function startAnimation()
			{
				if(count > 3)
					count = 1;
					
				img.src = "image" + count + ".jpg";
				
				//Set the timer
				count++;
				setTimeout(startAnimation,2250);
			}
		</script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
