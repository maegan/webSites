<?php 

	session_start();
	include("connection.php");

//doesn't work because I can't get session variables to work, so will just use id 8
//	$query="SELECT diary FROM `users` where id='".$_SESSION['id']."' LIMIT 1";
	$query="SELECT diary FROM `users` where id='8' LIMIT 1";
	$result = mysqli_query($link, $query); 
	$row=mysqli_fetch_array($result);
	$diary=$row['diary'];	

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .navbar-brand{
      font-size:1.8em;
    }
    #topRow {
      margin-top:80px;
      text-align: center;
    }
    #topRow h1 {
      font-size:300%;
    }

/*    #home {
      background-color:blue;
    }
    #about {
      background-color:red;
    }
    #download {
      background-color: green;
    } */
    .contentContainer {
      height:500px;
    }
    #home {
      background-image:url("sunsetSm.jpg");
      height:800px;
      width:100%;
      background-size:cover;  /*displays whole image */
    }
    .bold {
      font-weight:bold;
    }
    .marginTop {
        margin-top:50px;
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
    .appStoreImage {
      width:250px;
    }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">


<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header pull-left">
      <a href="" class="navbar-brand">Secret Diary</a>
	</div>
      <div class="pull-right">
      	<ul class="navbar-nav nav pull-right">
      		<li><a href="diary.php?logout=1">Log Out </a></li>
      	</ul>
      </div>
    </div>


  </div>

  <div class="container contentContainer" id="home">
      <div class="row">

        <div class="col-md-6 col-md-offset-3" id="topRow">
        	<textarea class="form-control"><?php echo $diary;?> </textarea>
        
    	</div>
      </div>
  </div>

 
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <script>
    $("#topContainer").css("min-height",$(window).height());
    $("textarea").css("height", $(window).height()-110);
    $("textarea").keyup(function() {
    	$.post("updatediary.php", {diary:$("textarea").val()  } );
    });
	</script>
</body>
</html>



