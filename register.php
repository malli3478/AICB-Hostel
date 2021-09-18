<?php
	if(!empty($_POST['register']))
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

		$uid=$_POST['uid'];
		$pswd=$_POST['pswd'];
		$email=$_POST['email'];
		$name=$_POST['name'];

		$sql = "INSERT INTO accounts(name,userID,email,pswd) VALUES('$name','$uid','$email','$pswd')";


		if ($conn->query($sql) === TRUE) 
		{
		    //$last_id = $conn->insert_id;
		    //echo "New record created successfully. Last inserted ID is: " . $last_id;
		    echo "<script>alert(\"Registration successful.\")</script>";
		    header("location: sign.php");
			exit();
		}
		else
		{
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		    echo "<script>alert(\"Please try with other UserID and E-mail_ID.\")</script>";
		}

		$conn->close();
	}
	else
	{
		echo "<script>alert(\"Please fill all the fields.\")</script>";
		header("location: sign.php");
		exit();
	}


/*

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Hostel";


	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	$selected = mysql_select_db("Hostel") or die("Could not select Database<br>");
	// Check connection
	if ($conn == false)
	{
	    die("Connection failed<br>" );
	} 
	else
	{
		echo "Your Email : ".$_POST["email"]."<br><br>";
	}
	$query="INSERT INTO accounts('name','email','userID','pswd') values("
		."nameXX".","
		.$_POST['email'].","
		.$_POST['uid'].","
		.$_POST['pswd'].")";
	$ins=mysql_query($query);
	//execute the SQL query and return records
	$result = mysql_query("SELECT name,email FROM accounts");
	//fetch tha data from the database
	while ($row = mysql_fetch_array($result)) {
	   echo "Name : ".$row{'name'}."    "."E-mail : ".$row{'email'};
	   echo "<br>";
	}

	if (mysql_query($query)) {
	    echo "New record created successfully";
	} 


	//////////////////////////
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "INSERT INTO accounts(name,email,userID,pswd) values("
		.NULL.","
		."\"".$_POST['email']."\"".","
		."\"".$_POST['uid']."\"".","
		."\"".$_POST['pswd']."\"".");";
	    // use exec() because no results are returned
	    $conn->exec($sql);
	    echo "New record created successfully";
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;
	/////////////////////////////////

*/
?>