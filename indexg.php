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



    <div class="container-fluid">
      <div class="row">
        <div> 
          <div class="container">


<div>
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel"  style="box-shadow:10px 10px 30px black;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image1.jpg">
      </div>
      <div class="item">
        <img src="image2.jpg">
      </div>
      <div class="item">
        <img src="image3.jpg">
      </div>
     
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

            <br>
            <br>
            <div>
              <div class="jumbotron" style="border:1px solid black;border-radius:10px;box-shadow:10px 10px 30px black;">
                <p align="justify"> PES Boys hostel is situated in the PES University campus. Hostelites will therefore have the advantage of deriving the benefit of various facilities available in the PES University campus, that includes: sports, gymnasium, campus store, campus mart, banking, travel booking, on going live projects in various departments / CORI centre and can participate in various National and International seminars / condferences / events keep happening round the year etc. </p>
                
              </div>
            </div>


        <!-- Announcement section begin -->


            <div id="ann" class="container-fluid">
              <div class="row container-fluid" style="border-radius:10px;box-shadow:10px 10px 30px black;background:#A1887F;background-color:rgba(0, 0, 0, 0.5);">
                
                <h1 align="center">Announcements</h1>
                <hr style="box-shadow:1px 1px 1px black;">
                <style type="text/css">
                  h1
                  {
                    color:white;
                    text-shadow:1px 1px black;
                  }
                </style>
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
                    
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($conn,$query);
                    //if(!($row=mysqli_fetch_array($result,MYSQLI_ASSOC)))
                     // echo '<script>
                      //        var ann = getElementById("ann");
                     //         ann.style.display="none"
                      //      </script>';
                    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                ?>


                <div class="col-xs-12 col-md-4 container">
                  <div class="thumbnail"  style="background:#D7CCC8;border:1px solid black;border-radius:10px;box-shadow:6px 6px 30px black;">
                    <?php echo "<img src=\"showimage.php?id=".$row{'id'}."\" alt=\"No image uploaded\" style=\"height:150px;width:auto;border-radius:5px\"/>" ; ?>

                    <h4 class="text-center"> <strong> <?php echo $row{'title'};?> </strong> </h4>
                    <p class="text-center"><?php print htmlspecialchars(substr($row['matter'], 0,65)."...");?></p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xs-6">
                          <i> <p>Posted on : </i> <?php echo $row{'date'}; ?> </p>
                        </div>
                        <div class="col-xs-6">
                          <form action="detailedpost.php" method="get">
                            <input type="text" name="id" value=<?php echo '"'.$row{'id'}.'"';?> hidden/>
                          <b> <button type="submit" <?php echo "name=\"".$row{'id'}."\"";?> class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModa2">Show details</button> </b>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                      <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel"><?php echo $row{'title'} ;?></h4>
                            </div>
                            <div class="modal-body">
                                  <img src="image1.jpg" style="width:100%;">
                                  <h4 for="message-text" class="control-label"><?php echo $row{'matter'} ;?></h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>    

                </div>

                <?php            
                    }

                ?>   
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>

 

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