<?php
	if(empty($_SESSION['uid']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Hostel";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

	  	if ($conn->connect_error)
	  	{
	    	die("Connection failed: " . $conn->connect_error);
		}
	  	$id = $_POST['id'];
	  	$tim = $_POST['reporttime'];
		$query = "UPDATE lgprequests SET return_report_status='$tim' WHERE id = '$id';";
		//echo $query;
		$result = mysqli_query($conn,$query);
		//echo $conn->error;
		if($result)
		{
			//echo "hi";
			echo "<script type='text/javascript'alert(\"Edited successfully.\");>window.location.href = 'lgprequests.php';</script>";
    	exit();
		}
		else
		{
			echo "<script type='text/javascript'alert(\"Failed to report! Please try again.\");>window.location.href = 'lgprequests.php';</script>";
    	exit();
		}
	}
	else
    {
    	echo "<script type='text/javascript'alert(\"Please LogIn as an EMPLOYEE.\");>window.location.href = 'sign.php';</script>";
    	exit();
    }
	
?>