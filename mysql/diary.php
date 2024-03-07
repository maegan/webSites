<?php include("login.php"); 

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
      margin-top:100px;
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
    <div class="navbar-header">
      <a href="" class="navbar-brand">Secret Diary</a>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">
      
      <form class="navbar-form navbar-right" method="post">
        <div class="form-group">
          <input type="email" name="loginemail" class="form-control" placeholder="Email" value="<?php echo addslashes($_POST['loginemail']); ?>" ></input>
        </div>
        <div class="form-group">
          <input type="password" name="loginpassword" class="form-control" placeholder="Password" value="<?php echo addslashes($_POST['loginpassword']); ?>"></input>
        </div>
        <input type="submit" class="btn btn-success" name="submit" value="Log In">Log In
      </form>
    </div>


  </div>
</div>

  <div class="container contentContainer" id="home">
      <div class="row">

        <div class="col-md-6 col-md-offset-3" id="topRow">
          <h1 class="marginTop">Secret Diary</h1>

          <p class="lead">Your own private diary, with you wherever you go.</p>
          
          <?php
          	if ($error) {
          		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
          	}
            if ($message) {
          		echo '<div class="alert alert-success">'.addslashes($message).'</div>';
          	}
          ?>

          <p class="bold marginTop">Interested? Sign up below!</p>

          <form class="marginTop" method="post">
            <div class="form-group">
            	<label for="email" name="email">Email Address </label>
              	<input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo addslashes($_POST['email']); ?>" />
            </div>
            <div class="form-group">
            	<label for="password" name="password">Password </label>
              	<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo addslashes($_POST['email']); ?>" />
            </div>            
            
            <input type="submit" class="btn btn-success btn-lg marginTop" name="submit" value="Sign up"/>
          </form>
        </div>
      </div>
  </div>

 
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <script>
    $("#topContainer").css("min-height",$(window).height());
	</script>
</body>
</html>



