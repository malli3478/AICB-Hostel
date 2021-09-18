<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hostel";

		// Create connection
		mysql_connect($servername, $username, $password);	
		mysql_select_db($dbname);
		//if($conn) print "connected";
		//if(empty($_GET['id'])) print "<br>empty get";
		//$id= $_GET['id'];
		if(isset($_GET['id']))
		{
			
			$id = mysql_real_escape_string($_GET['id']);
			$query = "SELECT * FROM posts WHERE id=$id";
			$result = mysql_query($query);
			
			while ($row=mysql_fetch_assoc($result))
			{
				$imageData = $row{'imageData'};
			}
			header("content-type: image/jpeg");
			echo $imageData;
		}
		else
		{
			echo "<script>alert('Could not get')</script>";
		}
	
?>