<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hostel";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);	
		//if($conn) print "connected";
		//if(empty($_GET['id'])) print "<br>empty get";
		if(isset($_GET['id']))
		{
			
			$id = mysqli_real_escape_string($conn,$_GET['id']);
			$result = mysqli_query($conn,"SELECT * FROM posts WHERE id=$id");
			
			
			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				//echo "looping";
				$imageData = $row{'image'};
				
			}
			//echo "$imageData fetched<br>";
			header("content-type: image/jpeg");
			echo $imageData;
		}
		else
		{
			echo "<script>alert('Could not get')</script>";
		}
	
?>