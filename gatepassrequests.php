<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Gatepass Requests</title>
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
      h1
      {
        color:white;
        text-align: center;
      }
      body { padding-top: 70px; }
    </style>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-wrapper">
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


    <div class="container" >
      <h1 style="text-color:white;">The gatepass requests are listed below :</h1> 
      <hr style="box-shadow:1px 1px 1px black;">
    <div class="table-responsive "  style="box-shadow:10px 10px 30px black;border:2px solid gray;border-radius:10px;background-color:#d2d2d2;">

        <table class="table table-bordered table-hover" >
          <tbody>
  




<!--
      <div class="container">
        <h4><?php echo $row{'compltype'};?></h4>
      </div>
-->
            
            <tr>
              <th>Req. No.</th>
              <th>Date</th>
              <th>Student name</th>
              <th>Block</th>
              <th>Room. No.</th>
              <th>Mobile No.</th>
              <th>Parent's mobile No.</th>
              <th>Purpose</th>
              <th>Check out time</th>
              <th>Check in time</th>
              <th>Permission status</th>
              <th>Reporting time</th>
            </tr>

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
        $query = "SELECT * FROM gatepassrequests";

        $result = mysqli_query($conn,$query);

        while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
    ?>
            <tr>
              <td><?php echo $row{'id'};?></td>
              <td><?php echo $row{'date'};?></td>
              <td><?php echo $row{'stud_name'};?></td>
              <td><?php echo $row{'stud_block'};?></td>
              <td><?php echo $row{'stud_room'};?></td>
              <td><?php echo $row{'stud_ph_no'};?></td>
              <td><?php echo $row{'parent_ph_no'};?></td>
              <td><?php echo $row{'purpose'};?></td>
              <td><?php echo $row{'outtime'};?></td>
              <td><?php echo $row{'intime'};?></td>
              <td><?php 
                    if($row{'permission_status'})
                      echo "<h4 style='color:green;'>Permitted</h4>";
                    else{
                      echo '
                <form method="post" action="permission_gatepass.php">
                  <input type="text" id="status" name="status" value="1" hidden/>
                  <input type="text" id="id" name="id" value="'.$row{'id'}.'" hidden/>
                  <input class="btn btn-sm btn-primary" type="submit" value="Permit" name= style="color:green;"/> 
                </form>

              ';}
              ?></td>
              <td><?php 
              if(($row{'reportingtime'}!="x"))
                echo $row{'reportingtime'};
              else{
                date_default_timezone_set('Asia/Calcutta');
                $tim = time();
                $tim = date("l h:i sa",$tim);
                //$tim = date("Y-m-d",$tim);
                echo '
                <form method="post" action="report.php">
                  <input type="text" id="time" name="time" value="'.$tim.'" hidden/>
                  <input type="text" id="id" name="id" value="'.$row{'id'}.'" hidden/>
                  <input class="btn btn-sm btn-primary" type="submit" value="Reoprt" name= style="color:green;"/> 
                </form>

              ';}
              ?></td>
              
            </tr>
  <?php
      }
    
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