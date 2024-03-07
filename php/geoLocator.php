<?php

	session_start();
	
	$data = $connection->get("https://maps.googleapis.com/maps/api/geocode/json?address=St.,+Petersburg,+Russia&key=AIzaSyABlyv3uW5OuG_ysfVngBY697WLmhTn9Jc");
	
	print_r($data);
	
	foreach($data as $piece) {
		echo $piece->
	
?>