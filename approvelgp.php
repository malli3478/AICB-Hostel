<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Hostel";
	//$test++;
	$flag=FALSE;
	$id = $_POST['id'];
	$dest_indate = $_POST['indate'];
	$dest_intime = $_POST['intime'];
	$dest_outdate = $_POST['outdate'];
	$dest_outtime = $_POST['outtime'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	{
	    die("Connection failed: " . $conn->connect_error);
	}
	//$query1 = "SELECT * from lgprequests";
	//$result1 = mysqli_query($conn,$query1);
	//while( )
	$query = "UPDATE `lgprequests` SET `dest_indate`='$dest_indate',`dest_intime`='$dest_intime', `dest_outdate`='$dest_outdate',`dest_outtime`='$dest_outtime' WHERE `id`='$id'";
	//print $query;
	$result = mysqli_query($conn,$query);
	
	if($result)
	{
		echo '<script>
			alert("Thank you for the approval");
			window.location.href="lgpapproval.php"
			</script>
		';

	}
	else
	{
		echo '<script>
			alert("Sorry,try again with correct id.");
			window.location.href="lgpapproval.php";
			</script>
		';
	}
?>