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
	  	$id = $_GET['id'];
		$query = "DELETE FROM posts WHERE id = $id;";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			echo "<script type='text/javascript'alert(\"Deleted successfully.\");>window.location.href = 'posts.php';</script>";
    	exit();
		}
		else
		{
			echo "<script type='text/javascript'alert(\"Could not delete! Please try again.\");>window.location.href = 'posts.php';</script>";
    	exit();
		}
	}
	else
    {
    	echo "<script type='text/javascript'alert(\"Please LogIn as an EMPLOYEE.\");>window.location.href = 'sign.php';</script>";
    	exit();
    }
	
?>