<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|Announcement</title>
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
      <div class="container-flempid">
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
      </div><!-- /.container-flempid -->
    </nav>

    <!-- End of navigation bar -->

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

        // $id=$_POST['complid'];
        $c_name=$_SESSION['name'];
        $c_usn=$_SESSION['empid'];


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        if(!empty($_POST['submit']))
        {

          $post=$_POST['post'];
          $title=$_POST['title'];
          $imageName = mysql_real_escape_string($_FILES['image']['name']);
          $imageType = mysql_real_escape_string($_FILES['image']['type']);
          if(!empty($_FILES['image']['name']))$imageData = mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
          else
            $imageData = '';
          $date=date("Y-m-d H:i:s", time());
          //echo "xxxx".$imageName;
          //echo "xxxx".$imageType ;
          $query = "INSERT INTO posts values('','$date','$title','$post','$imageName','$imageData')";
          $result = $conn->query($query);
          //echo $conn->error;
          if($result)
          {
            echo "<script>alert('Post submitted successfully.');</script>";
          }
          else
          {
            echo "<script>alert('Oops! Something went wrong. Please try again.');</script>";

          }
        }
        //echo "<script>alert('empty form .');</script>";

      }
    ?>



    <div class="container-flempid">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <h1>Create New Post :</h1>
            <hr style="box-shadow:1px 1px 1px black;">
            <style type="text/css">
              h1
              {
                text-shadow:1px 1px black;
              }
            </style>
            <div class="panel panel-default" style="overflow: hidden;padding:0px; background:#ddd;box-shadow:10px 10px 30px black;border:2px solid gray;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">Write the matter below :</h4>
              </div>
              <div class="panel-body">
                <form action="" name="image" enctype="multipart/form-data" class="form-horizontal" id="c_form" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title:</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" required></input>
                    </div>
                  </div>            
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Matter:</label>
                    <div class="col-sm-10">
                      <textarea name="post" class="form-control" rows="4" required></textarea>
                    </div>
                  </div>
                  <div class="container-flempid">         
                    <div class="form-group row">
                      <div class="col-md-6 col-xs-6">
                        <label>Upload image:</label>
                        <input type="file" class="form-group" id="image" onchange="myFunction()" name="image" accept="image/x-png, image/gif, image/jpeg" />
                      </div>
                      <div class="col-xs-6">
                        <input type="submit" name="submit" style="float:right;" class="btn btn-primary pull-right" value"Submit"/>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
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
                $c_name=$_SESSION['name'];
                $c_usn=$_SESSION['empid'];
            ?>
            <div class="container col-md-12" >
              <h1 style="text-color:white;">The posts are listed below :</h1>
              <hr style="box-shadow:1px 1px 1px black;"> 
              <style>
                h1 
                {
                  color: white;
                }
              </style>
            <div class="table-responsive" style="border-radius:10px;border:2px solid gray;box-shadow:10px 10px 30px black;background-color:#d2d2d2;">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <th>Post.No.</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Matter</th>
                    <th>Operations</th>
                  </tr>

                    <?php
                      $query = "SELECT * FROM posts";
                      $result = mysqli_query($conn,$query);
                      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                      {
                    ?>
                  <tr>
                    <td><?php echo $row{'id'};?></td>
                    <td><?php echo $row{'date'};?></td>
                      <form class="form-group" action="editpost.php" method="POST">
                    <td><textarea class="form-control" cols="25" name="title"><?php echo $row{'title'};?></textarea></td>
                    <td><textarea class="form-control" cols="25" name="matter"><?php echo $row{'matter'};?></textarea></td>
                    <input type="number" name="id" value=<?php echo $row{'id'}; ?> hidden/>
                    <td>
                      
                        
                        <b><button type="submit" style="color:yellow;background-color:black;border:1px solid gray;border-radius:3px;">Edit</button> </b>
                      </form>
                      <form action="deletepost.php" method="get">
                        <input type="number" name="id" value=<?php echo $row{'id'}; ?> hidden/>
                        <b><button type="submit" style="color:white;background-color:red;border:1px solid gray;border-radius:3px;" >Delete</button> </b>
                      </form>
                      <div class="modal fade" <?php echo 'id="exampleModal"'.$row{'id'}; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Edit your post here</h4>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="message-text" class="control-label">Title :</label>
                                  <textarea class="form-control" id="message-text"><?php echo $row{'title'}; ?></textarea>
                                  <label for="message-text2" class="control-label">Matter :</label>
                                  <textarea class="form-control" id="message-text"><?php echo $row{'matter'}; ?></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-primary">Edit Post</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                        echo '<script>document.getElementById("deletebut").onclick = function () {
                              alert($row{\'id\'});
                              //location.href = "deletepost.php?id="+postid;
                              };</script>';
                      ?>

                    <!--
                      <script type="text/javascript">
                          posttitle = "<?php echo $row{'title'}; ?>";
                          postid = "<?php echo $row{'id'}; ?>";
                          document.getElementById("deletebut").onclick = function () {
                              alert(postid);
                              //location.href = "deletepost.php?id="+postid;
                          };

                      </script>

                    -->

                      <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Confirm your delete request:</h4>
                            </div>
                            <div class="modal-body">
                                  <label for="message-text" class="control-label">Are you sure, you want to delete this post?</label>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="button" <?php echo 'id="deletebut'.$row{'id'}.'"';?> class="btn btn-danger">Delete post</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
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

    <script>
      function myFunction()
      {
          var x = document.getElementById("myFile");
          var txt = "";
          if ('files' in x)
          {
              if (x.files.length == 0)
              {
                  txt = "Select one or more files.";
              }
              else
              {
                  for (var i = 0; i < x.files.length; i++)
                  {
                      txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                      var file = x.files[i];
                      if ('name' in file)
                      {
                          txt += "name: " + file.name + "<br>";
                      }
                      if ('size' in file)
                      {
                          txt += "size: " + file.size + " bytes <br>";
                      }
                  }
              }
          } 
          else
          {
              if (x.value == "")
              {
                  txt += "Select one or more files.";
              }
              else
              {
                  txt += "The files property is not supported by your browser!";
                  txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
              }
          }
          document.getElementById("demo").innerHTML = txt;
      }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>