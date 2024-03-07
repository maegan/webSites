
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>City Entry Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .navbar-title{
      font-size:1.8em;
			margin-top:-30px;
    }
		.myTitle {
			color:beige;
			text-align: center;
		}
    #topRow {
      margin-top:50px;
      text-align: left;
    }
/*    #topRow h1 {
      font-size:300%;
    } */

    .contentContainer {
      height:500px;
    }
    #home {
			background-color:grey;
      height:800px;
      width:100%;
    }
    .bold {
      font-weight:bold;
    }
    .marginTop {
        margin-top:40px;
    }
    .center {
      text-align:center;
    }
    .title {
      margin-top:100px;
      font-size:300%;
    }
    #download {
      background-color:#C26551;
      width:100%;
      padding-top:70px;
    }
    .marginBottom {
      margin-bottom:30px;
    }
    #out {
      color:white;
    }

    </style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container myTitle">

      <h1>City Entry Form</h1>


	</div>
</div>

  <div class="container contentContainer" id="home">
		  <form class="marginTop" method="post" action="index.html">
      <div class="row">
          <div class="col-md-6 col-md-offset-3" id="entryRow">
              <h2 class="marginTop">The following information has been added to spreadsheet:</h2>
              <p class="out">

              <?php
                if(isset($_POST['submit_info']))
                {
                  $address = $_POST['city'].'+'.$_POST['country'];
                  $prepAddr = str_replace(' ','+',$address);
                  echo $prepAddr;
                  $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyBnhlRcgNsX2F2UqI3KwpFLSMf1pCTT_C0');
                  echo "<br>";
                  echo $geocode;
                  // $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
                  echo "<br>";
                  $output= json_decode($geocode);
                  $latitude = $output->results[0]->geometry->location->lat;
                  $longitude = $output->results[0]->geometry->location->lng;

                  $year = $_POST['year'];
                  $city = $_POST['city'];
                  $country = $_POST['country'];

                  $file = fopen("data.csv", "a");
                  fwrite($file,"\n");

                  foreach($_POST['names'] as $name) {
                    $line=$name.",".$city.",".$country.",".$latitude.",".$longitude.",".$year."\n";
                    fwrite($file, "$line");
                    echo $name.",".$city.",".$country.",".$latitude.",".$longitude.",".$year;
                    echo "<br/>";

                  }
                  fclose($file);
                }
              ?>

            </p>
          </div>
      </div>




			<input type="submit" class="btn btn-success" name="Enter more info" value="Enter more info">
</form>

			</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
