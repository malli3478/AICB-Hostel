<?php
$con=mysqli_connect('localhost','root','','pes_placement')
or 
die("Unable to connect");

if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

   $sql="INSERT INTO Alumni(Email,Name,Dept_Code,Company,Designation)
VALUES
('$_POST[Email]','$_POST[Name]','$_POST[Dept_Code]','$_POST[Company]','$_POST[Designation]')";



   

 if (!mysqli_query($con,$sql))
 {
  die('Data Error');
 }
echo "<h2>1 Record Successfully Added</h2>";	
       


mysqli_close($con);
?>