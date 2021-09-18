<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|LG/P Requests</title>
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
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Management<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="posts.php">Make an announcement</a></li>
                <li><a href="complaintslist.php">Complaints</a></li>
                <li><a href="lgprequests.php">LG/P Permission requests</a></li>
                <li><a href="gatepassrequests.php">Gatepass requests</a></li>
              </ul>
            </li>
          </ul>
          <?php session_start();
          if(isset($_SESSION['empid']))
            echo '
          <form action="logout.php" class="navbar-form navbar-right">
            <button type="submit" class="btn btn-default navbar-right" onClick="thank_user()">Log out</button>
          </form>
          <script type="text/javascript">
            function thank_user()
            {
              alert("Thank you for using our website! We hope you liked it!");
            }
          </script>';
          else
            echo '
          <script type="text/javascript">
            alert("Login as employee to access this page");
            window.location.href="sign.php";
          </script>
          ';
          ?>

          
          <?php if(isset($_SESSION['empid'])){?>
          <div class="navbar-right">
            <?php echo "<p class=\"navbar-brand\">".$_SESSION['name']."(".$_SESSION['empid'].")!</p>"; ?>
          </div><?php } ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- End of navigation bar -->


    





    <div class="col-md-6" >
  <?php
    $test=1;
    if(!empty($_SESSION['empid']))
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

  ?>


</div>


    <div class="container" >
      <h1 style="text-color:white;">The LG / Parent permission requests are listed below :</h1> 
      <hr style="box-shadow:1px 1px 1px black;">
      <style>
h1{
    color: white;
    text-shadow: 1px 1px black ;
}
select {
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   color:white;
   padding: 2px;
   margin: 1px;
   background-color:black;
}
      </style>
    <div class="table-responsive"  style="box-shadow:10px 10px 30px black;border:2px solid gray;border-radius:10px;background-color:#d2d2d2;">
        <table class="table table-bordered table-hover" >
          <tbody>
  




<!--
      <div class="container">
        <h4><?php echo $row{'compltype'};?></h4>
      </div>
-->
            
            <tr>
              <th>Req.No.</th>
              <th>Student Name</th>
              <th>Block</th>
              <th>Room</th>
              <th>Outgoing Date</th>
              <th>Outgoing time</th>
              <th>Destination</th>
              <th>Expected Date of return</th>
              <th>Expected time of return</th>
              <th>Permission status</th>
              <th>Return report</th>
              <th>Date of reaching destination</th>
              <th>Time of reaching destination</th>
              <th>Date of departure at destination</th>
              <th>Time of departure at destination</th>
              
            </tr>

  <?php
      $query = "SELECT * FROM lgprequests";

      $result = mysqli_query($conn,$query);

      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
  ?>
            <tr>
              <td><?php echo $row{'id'};?></td>
              <td><?php echo $row{'stud_name'};?></td>
              <td><?php echo $row{'block'};?></td>
              <td><?php echo $row{'room'};?></td>
              <td><?php echo $row{'outdate'};?></td>
              <td><?php echo $row{'outtime'};?></td>
              <td><?php echo $row{'destination'};?></td>
              <td><?php echo $row{'exp_indate'};?></td>
              <td><?php echo $row{'exp_intime'};?></td>
              <td><?php if($row{'status'} == "1")
                echo "<p style='color:green;'>Permitted</p>";
                else
                {
                  echo '
                  <form action="permission_lgp.php" method="post">
                    <input id="id" name="id" hidden value="'.$row{'id'}.'"/>
                    <input class="btn btn-primary btn-sm" type="submit" name="permitlgp" id="permitlgp" value="Permit"/>
                  </form>

                  ';
                }

              ?></td>
              <td><?php if($row{'return_report_status'} == "0")
              {
                date_default_timezone_set('Asia/Calcutta');
                $tim = time();
                $tim = date("l d/m/y h:i sa",$tim);
              echo '
                <form method="post" action="returnreport.php">
                  <input hidden type="number" id="id" name="id" value="'.$row{'id'}.'"/>
                  <input type="text" name="reporttime" value="'.$tim.'" hidden/>
                  <input class="btn btn-sm btn-primary" type="submit" name="report" id="report" value="Report now"/>
                </form>
                ';
              }
              else echo $row{'return_report_status'};

              ?></td>
              <td><?php echo $row{'dest_indate'};?></td>
              <td><?php echo $row{'dest_intime'};?></td>
              <td><?php echo $row{'dest_outdate'};?></td>
              <td><?php echo $row{'dest_outtime'};?></td>
              
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