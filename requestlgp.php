<?php

  extract($_POST);
  if(isset($_POST['lgpsubmit']))
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname); 
    if($destination == 'Other')
    {
      if(empty($destination_detail))
      {
        $conn->close();
        echo "<script>alert('Enter detail about your destination and try again.');window.location.href='forms.php';</script>";
        exit();
      }
      else
        $destination .= " - ".$destination_detail;
    }
    $query = "INSERT INTO lgprequests values('','$name','$blk','$room','$stud_ph_no','$parent_ph_no','$outdate','$outtime','$exp_indate','$exp_intime','$destination',0,'','','','',0)";
    $result = mysqli_query($conn,$query);
    //echo $result;
    $requestid=mysqli_insert_id($conn);
    if($result)
    {
      echo "<script>alert('Your request for LG/Parent request submitted successfully.Your ID number is $requestid.');window.location.href='forms.php';</script>";
      $conn->close();
    }
    else
      //print $conn->error;
      //echo $query; 
    {
      echo "<script>alert('Something went wrong. Please try again');window.location.href='forms.php';</script>";
      $conn->close();
    }
  }

?>