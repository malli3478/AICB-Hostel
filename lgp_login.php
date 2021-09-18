<?php
	$test = 1;

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "Hostel";
		$test++;
		$flag=FALSE;
		//echo "HI";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
		{
		    die("Connection failed: " . $conn->connect_error);
		}


		$lgpid=$_POST['lgpid'];
		$pswd=$_POST['pswd'];
		$sql = "SELECT lgpid,pswd,name FROM accounts_lgp";
		$result=mysqli_query($conn,$sql);
		//echo $lgpid;
		//echo $pswd;
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		    if(($lgpid===$row{'lgpid'}) and ($pswd===$row{'pswd'}))
		   	{	
		   		$flag=TRUE;
		   		session_start();
		   		$_SESSION['lgpid']=$lgpid;
		   		//echo "matched";
		   		$_SESSION['name']=$row{'name'};
		   		break;
		   	}
		}
		if($flag)
		{
			//echo "true";
			echo "<script type='text/javascript'>window.location.href = 'lgpapproval.php';</script>";
		    exit();
		}
		else
		{
			//echo "false";
			echo '
			<script>
			function fail()
			{
				alert("Oops! looks like something was wrong , please try to log in again.");
				window.location.href="sign.php";
			}
			fail();
			</script>';
		}

		$conn->close();
	
?>