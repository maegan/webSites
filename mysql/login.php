<?php

	session_start();
	
// what the if statement should be if session variables worked... it looks to see
// if user is logged in before logging them out
//	if ($_GET["logout"]==1 AND $_SESSION['id']) {	
	if ($_GET["logout"]==1) {
		session_destroy();
		$message="You have been logged out.  Have a nice day!";
	}
	
	include("connection.php");

	if ($_POST['submit'] == "Sign up") {
		if (!$_POST['email']) $error.="<br/>Please enter your email";
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br/>Please enter a valid email address";	

		if (!$_POST['password']) $error.="<br/>Please enter your password";
		else {
			if (strlen($_POST['password'])<8) $error.="<br/>Please enter a password with at least 8 characters";
			if (!preg_match('`[A-Z]`', $_POST['password'])) $error.="<br/>Please include at least 1 capital letter in your password.";
		}
	
		if ($error) $error= "There were error(s) in your signup details:".$error;
		else {


			/* the .mysqli_real_escape_string instruction prevents against security risks of SQL injection */
			$query="SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
			$result = mysqli_query($link, $query);
			$results = mysqli_num_rows($result);
			
			if ($results) $error=  "That email address is already registered.  Do you want to log in?";
			else {
				$query="INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";

				mysqli_query($link, $query);
				
				echo "You've been signd up!";
				
				$_SESSION['id']=mysqli_insert_id($link);
				
				// redirect to logged in page
				header("Location:mainpage.php");
				
			}
			
			
		}
	}
	
	if ($_POST['submit'] == "Log In") {
			$query="SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_array($result);	
			
			if ($row) {
				$_SESSION['id']= $row['id'];
			//	print_r($_SESSION);
				//$error=  print_r($_SESSION)."why doesn't this work?";
				
				// Redirect to logged in page
				header("Location:mainpage.php");
			} else {
				$error=  "Could not find a user with that email and password. Please try again.";
			}
	
	
	}
?>
