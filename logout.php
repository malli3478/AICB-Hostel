<?php  
  
	session_start();//session is a way to store information (in variables) to be used across multiple pages.  
	session_unset(); 
	session_destroy();  
	header("Location: sign.php");//use for the redirection to some page  

?>  