<?php

	extract($_POST);
	if(isset($_POST['requestgatepass']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hostel";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);	
		$query = "INSERT INTO gatepassrequests values('','$name','$blk','$room','$stud_ph_no','$parent_ph_no','$outdate','$purpose','$outtime','$intime',0,'x')";
		$result = mysqli_query($conn,$query);
		$requestid=mysqli_insert_id($conn);
		if($result)
			echo "<script>alert('Your request for gatepass submitted successfully.Your ID number is $requestid.');window.location.href='forms.php';</script>";
		else 
			echo "bye";
	}

?>