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
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Management<span class="caret"></span></a>
              <ul class="dropdown-menu">
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
            alert("Hostel authority has to login to access this page.");
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
          <div class="col-md-4">
            <h1>Report your problem :</h1>
            <hr style="box-shadow:1px 1px 1px black;">
            <div class="panel panel-default"  style="box-shadow:10px 10px 30px black;border:1px solid gray;border-radius:5px;overflow: hidden;padding:0px; background:#ddd;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">Report a complaint</h4>
              </div>
              <div class="panel-body">
                
                <form action="" class="form-horizontal" id="c_form" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                      <?php echo "<input class=\"form-control\" name=\"name\" type=\"text\" placeholder=\"$c_name\" value=\"$c_name\" readonly>"; ?>
                      <!-- <input type="text" name="name" class="form-control" placeholder="Your name"> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">USN:</label>
                    <div class="col-sm-10">
                      <?php echo "<input class=\"form-control\" name=\"usn\" type=\"text\" placeholder=\"$c_usn\" value=\"$c_usn\" readonly>"; ?>
                      <!-- <input type="text" name="usn" class="form-control" placeholder="Your USN"> -->
                    </div>
                  </div>
                  <div class="container-fluid">
                    <div class="form-group row radio">
                      <div class="col-md-6 col-xs-5"><label><strong>Select hostel block:</strong></label></div>
                      <div class="col-md-6 col-xs-7 form-group">
                        <b>
                          <select class="form-group" name="blk" id="blk">
                            <option value="New Block" selected="selected">New Block</option>
                            <option value="New Block X">New Block-X</option>
                            <option value="IH Block">IH Block</option>
                            <option value="IT Block">IT Block</option>
                            <option value="Mess Block">Mess Block</option>
                            <option value="MM Block">MM Block</option>
                          </select>
                        </b> 
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Room Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="room" class="form-control" placeholder="Room number" required/>
                        </div>
                      </div>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-4 col-xs-5"><label>Select complaint type:</label></div>
                          <div class="col-md-8 form-group">
                            <b>
                              <select class="form-group" name="type" id="id_js_wrap">
                                <option value="Electrical" selected="selected">Elcctrical</option>
                                <option value="Carpenter">Carpenter's complaint</option>
                                <option value="Plumber">Plumber's complaints</option>
                              </select>
                            </b> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   
                  <br>
                  <div class="container-fluid">              
                    <div class="row form-group">
                      <div class="col-md-3"><label class="control-label">Complaint:</label></div>
                      <div class="col-md-9">
                        <textarea name="complaint" class="form-control" rows="3" required></textarea>
                      </div>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="givecomplaint" style="float:right;" class="btn btn-primary pull-righ" value"Submit"/>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
<?php

?>


          <div class="col-md-8" >
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
      <h1 style="text-color:white;">The complaints are listed below :</h1> 
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
              <th>Cmp.No.</th>
              <th>Date</th>
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