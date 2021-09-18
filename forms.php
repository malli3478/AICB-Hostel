<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>PES_BH|StudentRequestForms</title>
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
    <script>
function showCustomer(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showcomplaints.php?q="+str,true);
xmlhttp.send();
}

function CheckColors(val){
 var element=document.getElementById('otherplace');
 if(val=='Other')
 {  element.style.display='block';
    element.innerHTML()="wtyu";
  }
 else  
   element.style.display='none';
}


</script>
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
            <h1>Complaint registration form :</h1>
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




          <div class="col-md-4">
            <h1>LG / Parent - permission form:</h1>
            <hr style="box-shadow:1px 1px 1px black;">
            <div class="panel panel-default"  style="box-shadow:10px 10px 30px black;border:1px solid gray;border-radius:5px;overflow: hidden;padding:0px; background:#ddd;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">LG / Parent permission form</h4>
              </div>
              <div class="panel-body">
                
                <form action="requestlgp.php" class="form-horizontal" id="c_form" method="post">
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
                      <div class="col-xs-5"><label><strong>Select hostel block:</strong></label></div>
                      <div class="col-xs-7 form-group">
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
                    <div class="container-fluid">
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Room Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="room" class="form-control" placeholder="Room number" required/>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Student's mobile Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="stud_ph_no" class="form-control" placeholder="Your mobile number" required/>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Parent's mobile Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="parent_ph_no" class="form-control" placeholder="Parent's mobile number" required/>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                    <div class="form-group row radio">
                      <div class=" col-xs-5"><label><strong>Going to,</strong></label></div>
                      <div class=" col-xs-7 form-group">
                        <b>
                          <select class="form-group" name="destination" id="destination"  onchange='CheckColors(this.value);'>
                            <option value="LG place" selected="selected">LG's place</option>
                            <option value="Parent place">Parent's place</option>
                            <option value="Other">Other</option>
                          </select>
                          
                        </b>  <textarea name="destination_detail" id="otherplace" placeholder="Enter the place and perpose of going." name="otherplace" style='display:none;'></textarea>
                        
                      </div>
                     
                         
                  

                    </div>
                  </div>
                  
                   
                  <div>
                    <div class="container">
                      <h5>Outing date and time :</h5>
                      <div class="fluid-container">
                        <div class="row">
                          <div class="col-md-2 col-xs-6">
                            <label>Date</label><input class="form-control" type="date" id="outdate" name="outdate" min="2015-07-01">
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <label>Time</label> <input class="form-control" type="time" id="outtime" name="outtime" min="2015-07-01">
                          </dov>
                        </div>
                      </div>
                    </div>
                    
                      <h5>Expected date and time of return :</h5>
                      <div class="fluid-container">
                        <div class="row">
                          <div class="col-md-2 col-xs-6">
                            <label>Date</label><input class="form-control" type="date" id="exp_indate" name="exp_indate" min="2015-07-01">
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <label>Time</label> <input class="form-control" type="time" id="exp_intime" name="exp_intime" min="2015-07-01">
                          </div>
                        </div>
                      </div>
                    
                  </div></div>
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="submit" name="lgpsubmit" style="float:right;" class="btn btn-primary pull-right" value="Request LG/P permission"/>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>






          <div class="col-md-4">
            <h1>Gatepass - permission form:</h1>
            <hr style="box-shadow:1px 1px 1px black;">
            <div class="panel panel-default"  style="box-shadow:10px 10px 30px black;border:1px solid gray;border-radius:5px;overflow: hidden;padding:0px; background:#ddd;border-radius:10px">
              <div class="panel panel-heading" style="background:#ccc">
                <h4 class="panel-title">Gatepass permission form</h4>
              </div>
              <div class="panel-body">
                
                <form action="requestgatepass.php" class="form-horizontal" id="c_form" method="post">
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
                      <div class="col-xs-5"><label><strong>Select hostel block:</strong></label></div>
                      <div class="col-xs-7 form-group">
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
                    
                  <div class="container-fluid">
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Room Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="room" class="form-control" placeholder="Room number" required/>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Student's mobile Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="stud_ph_no" class="form-control" placeholder="Your mobile number" required/>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div  class="col-md-4 col-xs-4"><label>Parent's mobile Number:</label></div>
                        <div class="col-md-8 col-xs-8">
                        <input type="number" name="parent_ph_no" class="form-control" placeholder="Parent's mobile number" required/>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <h5>Outing date and time :</h5>
                  <label>Date</label><input class="form-control" type="date" id="outdate" name="outdate" min="2015-07-01">
                   
                  <div>
                    <div class="container">
                      <div class="fluid-container">
                        <div class="row">
                          <div class="col-md-2 col-xs-6">
                            <label>Out Time</label> <input class="form-control" type="time" id="outtime" name="outtime" min="2015-07-01">
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <label>In Time</label> <input class="form-control" type="time" id="intime" name="intime" min="2015-07-01">
                          </dov>
                        </div>



                      </div>
                    </div>  
                  </div>
                  <br/>
                  <div class="container-fluid">              
                    <div class="row form-group">
                      <div class="col-md-3"><label class="control-label">Purpose:</label></div>
                      <div class="col-md-9">
                        <textarea name="purpose" placeholder="Enter the perpose." class="form-control" rows="3" required></textarea>
                      </div>
                    </div>
                  </div>     
                </div>
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="submit" name="requestgatepass" style="float:right;" class="btn btn-primary pull-right" value="Request gatepass"></input>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div></div></div></div>




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