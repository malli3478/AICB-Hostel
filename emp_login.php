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


		$empid=$_POST['empid'];
		$pswd=$_POST['pswd'];
		$sql = "SELECT empid,pswd,name FROM accounts_emp";
		$result=mysqli_query($conn,$sql);
		//echo $empid;
		//echo $pswd;
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		    if(($empid===$row['empid']) and ($pswd===$row['pswd']))
		   	{	
		   		$flag=TRUE;
		   		session_start();
		   		$_SESSION['empid']=$empid;
		   		//echo "matched";
		   		$_SESSION['name']=$row['name'];
		   		break;
		   	}
		}
		if($flag)
		{
			//echo "true";
			echo "<script type='text/javascript'>window.location.href = 'complaintslist.php';</script>";
		    exit();
		}
		else
		{
			//echo "false";
			echo '
			<script>
			
				alert("Oops! looks like something was wrong , please try to log in again.");
				window.location.href="sign.php";
			
			</script>';
		}

		$conn->close();
	
?>