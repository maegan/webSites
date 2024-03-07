<!doctype html>
<html>
<head>
	<title>My First Webpage</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>

<body>
<div>
	<?php
		$emailTo="maegan@siena.edu";
		$subject="I hope this works!";
		$body="I think you're great";
		$headers="From: maegan12110@gmail.com";
		
		if (mail($emailTo, $subject, $body, $headers)) {
			echo "Mail sent successfully!";
		
		} else {
			echo "Mail not sent!";
		}
	
	?>
	
</div>
</body>
</html>

