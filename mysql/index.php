<?php
	
	setcookie("id", "", time()-3600); // to delete the cookie, set it in the past

	echo $_COOKIE["id"];
	
/*	session_start();  // must appear before any html or code on the page...
	
	$_SESSION['loginid']=1;
	
	print_r($_SESSION);
	
	$link = mysqli_connect('egansienacscom.ipagemysql.com', 'mae', 'maeDB', 'exampledb'); 
	
	if (mysqli_connect_error()) {
		die("Could not connect to database");
	} 
	
	//$query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES('Kassie', 'kegan1028@gmail.com', 'abc')";
	
//	$query = "UPDATE `users` SET `email`='eganappr@gmail.com' WHERE `id`=3 LIMIT 1";	
//	mysqli_query($link, $query);
//	$query = "UPDATE `users` SET `name`='Timothy' WHERE `name`='Tim'";
//	mysqli_query($link, $query);

	$query = "UPDATE `users` SET name='Tim O\'Egan' WHERE id=2 LIMIT 1";
	mysqli_query($link, $query);
	
	$name="Tim O'Egan";
	$query = "SELECT `name` FROM users WHERE name='".mysqli_real_escape_string($link, $name)."'";
//	mysqli_query($link, $query);
	 	
//  	$query = "SELECT `name` FROM users";
	
	if ($result = mysqli_query($link, $query)) {
		echo mysqli_num_rows($result);
		while ($row = mysqli_fetch_array($result)) {
			print_r($row);
		}
	
	} else {
		echo "It failed";
	} 
	
*/


?>