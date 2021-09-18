<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hostel";

		// Create connection
		//mysql_connect($servername, $username, $password);	
		//mysql_select_db($dbname);
		//if($conn) print "connected";
		//if(empty($_GET['id'])) print "<br>empty get";
		//$id= $_GET['id'];
		$conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

		if(isset($_POST['id']))
		{
			
			$id = mysql_real_escape_string($_POST['id']);
			$time = $_POST['time'];
			//echo $_POST['time'];
			$query = "UPDATE `gatepassrequests` SET `reportingtime`='$time' WHERE `id`='$id'";

			//echo $query;
			$result = $conn->query($query);

			//echo $conn->mysql_error();
			if($result)
			{
				
				echo "<script>alert('Sussess');
						window.location.href='gatepassrequests.php';
				</script>";
			}
			else
			{
				//echo "hi".$result;
				echo "<script>alert('Failed to report');
				window.location.href='gatepassrequests.php';
				</script>";
			}
		}
	
?>