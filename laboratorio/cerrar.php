<?php 
	
	session_start();
	$_SESSION = array(); // destroy all $_SESSION data
	setcookie("PHPSESSID", "", time() - 3600, "/");
	#session_destroy();

	mysqli_close($con);
	session_destroy();
	session_unset();
	header("location: /login/index.html");
?>