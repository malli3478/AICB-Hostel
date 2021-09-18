<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|LG/P Approval</title>
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
            <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Management<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="complaintslist.php">Complaints</a></li>
                <li><a href="lgprequests.php">LG/P Permission requests</a></li>
                <li><a href="gatepassrequests.php">Gatepass requests</a></li>
              </ul>
            </li>
          </ul>
          <?php session_start();
          if(isset($_SESSION['lgpid']))
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

          
          <?php if(isset($_SESSION['lgpid'])){?>
          <div class="navbar-right">
            <?php echo "<p class=\"navbar-brand\">".$_SESSION['name']."(".$_SESSION['lgpid'].")!</p>"; ?>
          </div><?php } ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- End of navigation bar -->








    <div class="container-fluid">
      <div class="panel-body">

        <div class="row row-centered">
          <div class="col-md-8 col-md-offset-2">
            <h1 style="text-align:center;">Approve arrival of your ward at your place:</h1>
            <hr style="box-shadow:1px 1px 1px black;">
            <div class="panel panel-default"  style="box-shadow:10px 10px 30px black;border:1px solid gray;border-radius:5px;overflow: hidden;padding:0px; background:#ddd;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">Give details on the arrival and departure of your ward:</h4>
              </div>
              <div class="panel-body">
                
                <form action="approvelgp.php" class="form-horizontal" id="c_form" method="post">
                  <h3>Date and time at which your ward arrived:</h3>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" name="indate" id="indate"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Time:</label>
                    <div class="col-sm-10">
                      <input type="time" name="intime" id="intime"/>
                    </div>
                  </div>
                  <h3>Date and time of departure of your ward:</h3>
                  <div class="form-group">
                    <div class="container-fluid">
                    <div class="row">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" name="outdate" id="outdate"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Time:</label>
                    <div class="col-sm-10">
                      <input type="time" name="outtime" id="outtime"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Enter permission id:</label>
                    <div class="col-sm-10">
                      <input type="number" name="id" id="id"/>
                    </div>
                  </div>
                  
      
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="givecomplaint" style="float:right;" class="btn btn-primary pull-righ" value"Approve"></input>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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

   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>