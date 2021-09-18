<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Home</title>
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

      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
      width: 100%;
      padding: 0px;
    }

    </style>
  </head>

  <body onload="init()">
    <nav class="container-fluid navbar navbar-inverse navbar-static-top navbar-wrapper">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header" style="padding:0px;margin:0px;">
          <a class="navbar-brand">
            <img alt="PES" src="logo3.png"/>
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


          <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="emplogin.html">Log in as Enployee</a></li>
                <li><a href="studlogin.html">Login as Student</a></li>                
              </ul>
            </li>
          -->
          </ul>
          <?php session_start();
          if(isset($_SESSION['uid']))
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
            echo '<button type="submit" class="btn btn-default navbar-right" onClick="thank_user2()">Log in</button>
          <script type="text/javascript">
            function thank_user2()
            {
              window.location.href="sign.php";
            }
          </script>
          ';
          ?>

          </ul>
          <?php if(isset($_SESSION['uid'])){?>
          <div class="navbar-right">
            <?php echo "<p class=\"navbar-brand\">".$_SESSION['name']."(".$_SESSION['uid'].")!</p>"; ?>
          </div><?php } ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- End of navigation bar -->


    <?php
      $test=1;
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
      $id = $_GET['id'];
      $query = "SELECT * FROM posts where `id`='$id'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    ?>
      <h2 style="color:white;text-align:center;"><u><?php echo $row{'title'}; ?></u></h2>
      <br/>
      <div class="container img-responsive" style="background:#000;padding:10px;border-radius:10px;">
        <?php echo "<img src=\"showimage.php?id=".$row{'id'}."\" alt=\"No image uploaded\" style=\"height:auto;width:100%;border-radius:5px\"/>" ; ?>
      </div><br/>
      <div>
    <div class="container">

 
      <div class="jumbotron" style="background:#ccc;border:1px solid black;border-radius:10px;box-shadow:10px 10px 30px black;">
        <?php echo "<p align=\"justify\">".$row{'matter'}."</p>" ;?>
      </div>
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