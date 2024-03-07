<?php
	session_start();
	
	include("connection.php");
	
//	$query="UPDATE `users` SET diary='".mysqli_real_escape_string($link, $_POST['diary'])."' WHERE id='".$_SESSION['id']."' LIMIT 1"; 

//changing to id = 8 just to make it work without session variables
	$query="UPDATE `users` SET diary='".mysqli_real_escape_string($link, $_POST['diary'])."' WHERE id='8' LIMIT 1"; 

	mysqli_query($link, $query);
	

?>
