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
	  	$title = $_POST['title'];
	  	$matter = $_POST['matter'];
		$query = "UPDATE posts SET title='$title',matter='$matter' WHERE id = '$id';";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			//echo "hi";
			echo "<script type='text/javascript'alert(\"Edited successfully.\");>window.location.href = 'posts.php';</script>";
    	exit();
		}
		else
		{
			echo "<script type='text/javascript'alert(\"Could not edit! Please try again.\");>window.location.href = 'posts.php';</script>";
    	exit();
		}
	}
	else
    {
    	echo "<script type='text/javascript'alert(\"Please LogIn as an EMPLOYEE.\");>window.location.href = 'sign.php';</script>";
    	exit();
    }
	
?>