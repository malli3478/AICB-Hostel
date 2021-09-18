<?php
  session_start();
  if(empty($_SESSION['name']))
  {
    header("location: sign.php");
    exit();
  }
?>              
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Requests</title>
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
        color: white;
        text-shadow: 1px 1px black ;
      }
      select
      {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        color:white;
        padding: 2px;
        margin: 1px;
        background-color:black;
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


          </ul>
          <div class="navbar-form navbar-right" style="font-color=#fff;">
            <?php
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

      // $id=$_POST['complid'];
      $c_name=$_SESSION['name'];
      $c_usn=$_SESSION['uid'];


      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection

      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }
      if(!empty($_POST['givecomplaint']))
      {
        $block=$_POST['blk'];
        $room=$_POST['room'];
        $name=$_POST['name'];
        $usn=$_POST['usn'];
        $type=$_POST['type'];
        $complaint=$_POST['complaint'];
        $date=date("Y-m-d H:i:s<br>", time());
        
        $query = "INSERT INTO complaints values('','$usn','$name','$complaint','$type','$block','$room','$date')";
        $result = $conn->query($query);
        if($result)
        {
          echo "<script>alert('Complaint registered successfully.');</script>";
        }
        else
        {
          echo "<script>alert('Complaint not registered.');</script>";

        }
      }


    }
  ?>




    <div class="container-fluid">
      <div class="panel-body">

        <div class="row">
<div class="col-md-12" >
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





    <div class="container col-md-12" >
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
                      echo "Allowed";
                    else{
                      echo '
                <form method="post" action="permission_gatepass.php">
                  <input type="text" id="status" name="status" value="1" hidden/>
                  <input type="text" id="id" name="id" value="'.$row{'id'}.'" hidden/>
                  <input type="submit" value="Permit" name= style="color:green;"/> 
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
                  <input type="submit" value="Reoprt" name= style="color:green;"/> 
                </form>

              ';}
              ?></td>
              
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
    </div></div>


          <div class="col-md-6" >
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


</div>


    <div class="container col-md-12" >
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
    <div class="table-responsive "  style="box-shadow:10px 10px 30px black;border:2px solid gray;border-radius:10px;background-color:#d2d2d2;">

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
              <th>Date of reaching destination</th>
              <th>Time of reaching destination</th>
              <th>Date of departure at destination</th>
              <th>Time of departure at destination</th>
              <th>Return report</th>
            </tr>

  <?php
      $query = "SELECT * FROM complaints";

      $result = mysqli_query($conn,$query);

      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
  ?>
            <tr>
              <td><?php echo $row{'id'};?></td>
              <td><?php echo $row{'date'};?></td>
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
          </div>
        </div>
      </div>
    </div>

  <script>

  function fun()
  {
   x=new XMLHttpRequest();

  x.onreadystatechange=function()
  {
     
    if(x.readyState==4 && x.status==200)
      {
        var out=x.responseText;
        
    alert(document.getElementById("name").value=out);
      }
    
  }

    x.open("GET","complaint.php",true);
      x.send();
      
  }
  </script>







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