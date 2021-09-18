<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Complaint</title>
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

  <body onload="init()">
    <nav class="container-fluid navbar navbar-inverse navbar-static-top navbar-wrapper">
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


          <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="emplogin.html">Log in as Enployee</a></li>
                <li><a href="studlogin.html">Login as Student</a></li>                
              </ul>
            </li>
          -->
          </ul>
          <div class="navbar-form navbar-right" style="font-color=#fff;">
            <?php
              session_start();
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
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- End of navigation bar -->

    <div class="container-fluid">
      <div class="row">
        <div> 
          <div class="container" >
            <div>
              <div style="width:100%;background:black;padding:10px">        
                <img class="img-responsive" style="width:100%;" id="myimg">
              </div>
              <p></p>
            </div>
            <div>
              <div class="jumbotron" style="background:#eee">
                <p align="justify"> PES Boys hostel is situated in the PES University campus. Hostelites will therefore have the advantage of deriving the benefit of various facilities available in the PES University campus, that includes: sports, gymnasium, campus store, campus mart, banking, travel booking, on going live projects in various departments / CORI centre and can participate in various National and International seminars / condferences / events keep happening round the year etc. </p>
                <br>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row">
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
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($conn,$query);
                    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                ?>


                <div class="col-xs-12 col-md-4">
                  <div class="thumbnail">
                    <img src="image1.jpg" alt="Paris" width="400" height="300">
                    <h4><strong><?php echo $row{'title'};?></strong></h4>
                    <p><?php print htmlspecialchars(substr($row['matter'], 0,23)."...");?>
                    <p><?php echo $row{'date'};?></p>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Details</button>
                  </div>
                </div>

                <?php            
                    }
                  }
                  else
                  {
                    echo "<script type='text/javascript'alert(\"Please Login.\");>window.location.href = 'sign.php';</script>";
                    exit();
                  }
                ?>   
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>

    <!-- Announcement section begin -->
 

    <!-- Announcement section end -->

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

    <script type="text/javascript">
      var count=1;
      function init()
      {
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