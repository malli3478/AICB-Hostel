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
      if(!empty($_POST['postcomplaint']))
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
          echo "<script>alert('Complaint registered successfully.');</script>";

        }
      }


    }
  ?>