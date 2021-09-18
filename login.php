<?php

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

	$uid=$_POST['uid'];
	$pswd=$_POST['pswd'];


	$flag=FALSE;

	$sql = "SELECT userID,pswd FROM accounts";


	$result=mysqli_query($conn,$sql);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	    if(($uid===$row{'userID'}) and ($pswd===$row{'pswd'}))
	   	{	
	   		$flag=TRUE;
	   		session_start();
	   		$_SESSION['uid']=$uid;
	   		break;
	   	}
	}
	if($flag)
	{
		$script="<script>function{alert('Successfully Logged in');}</script>"
		echo '$script';
		header('Location:comp.html');
		exit;
	}
	else
	{
		header('Location:emplogin.html');
		exit;
	}


	$conn->close();

?>