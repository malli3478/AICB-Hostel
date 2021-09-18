<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Application</title>
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
      .carousel-inner > .item > a > img 
      {
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


<div class="container">
            <div class="panel panel-default" style="overflow: hidden;padding:0px; background:#ddd;box-shadow:10px 10px 30px black;border:2px solid gray;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">Carefully fill the form,correctly:</h4>
              </div>
              <div class="panel-body">
                <form action="" class="form-horizontal" id="c_form" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" placeholder="Enter your full name" required></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Father's name:</label>
                    <div class="col-sm-10">
                      <input type="text" name="fathername" class="form-control" placeholder="Enter your father's name" required></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile number:</label>
                    <div class="col-sm-10">
                      <input type="number" size="10" name="name" class="form-control" placeholder="Enter your mobile number." required></input>
                    </div>
                  </div>              
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Parent address:</label>
                    <div class="col-sm-10">
                      <textarea name="post" class="form-control" placeholder="Parent's address" rows="4" required></textarea>
                    </div>
                  </div>
                  <div class="container-fluid">         
                    <div class="form-group row">
                      <div class="col-md-6 col-xs-6">
                        <label>Upload image:</label>
                        <input type="file" class="form-group" name="imagefilename" accept="image/x-png, image/gif, image/jpeg" />
                      </div>
                      <div class="col-xs-6">
                        <input type="submit" name="makepost" style="float:right;" class="btn btn-primary pull-right" value"Submit"/>
                      </div>
                    </div>
                  </div>

                </form>
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