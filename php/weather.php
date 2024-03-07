<?php

	unlink("temp.txt");
	
?>

<!doctype html>
<html>
<head>
	<title>Weather Scraper</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<style>
		html, body {
			height:100%;
		}
		
		.container {
			background-image: url("rain.jpg") ;
			background-size: cover;
			width:100%;
			height:100%;
			background-position:center;
			padding-top: 100px;
		}
		
		.center {
			text-align:center;
		
		}
		
		.white {
			color:white;
		}
		
		p {
			padding-top:15px;
			padding-bottom:15px;
		}
		
		button {
			margin-top:20px;
			margin-bottom:20px;
		}
		
		.alert {
			margin-top:20px;
			display:none;
		}
		
	</style>

</head>

<body>

<script
  src="//code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center">

				<h1 class="center white">My Weather Scraper</h1>
				
				<p class="lead center white">Enter your city below to get a weather forecast.</p>
				
				<form>
					<div class="form-group">
					
						<input type="text" class="form-control" name="city" id="city" 
							placeholder="Eg. London, Paris, San Francisco..." />
					</div>
					
					<button class="btn btn-success btn-lg" id="findMyWeather">Find My Weather</button>
				
				</form>
						<div class="alert alert-success" id="success">Success!</div>	
						<div class="alert alert-danger" id="fail">Could not find weather data for that city. Please try again.</div>	
						<div class="alert alert-danger" id="noCity">Please enter a city.</div>
				</div>
			

		</div>

	</div>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</script>
	<script>
		$("#findMyWeather").click(function(event) {
			event.preventDefault();
			$(".alert").hide();
			
			if($("#city").val()!="") {
				$.get("scraper.php?city="+$("#city").val(), function(data) {
					
					if (data=="") {
						$("#fail").fadeIn();

					} else {
						$("#success").html(data).fadeIn();
					}
				});
			} else {
				$("#noCity").fadeIn();
			}
		});
	</script>

</body>
</html>
