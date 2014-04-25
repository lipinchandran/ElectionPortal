

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Lost Password</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customstyles.css"rel="stylesheet">
    <link href="css/style.css"rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-cust navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Election Portal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="voter.php">Voter</a></li>
            <li><a href="Candidate.php">Candidate</a></li>
            <li><a href="Result.php">Result</a>
            <li><a href="#">Downloads</a>
            <li><a href="#">About</a>
            <li><a href="#">Contact Us</a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#">Today:<?php print(date("l F ,Y")) ?></a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <div class="col-lg-offset-3 col-lg-6  ">
      <form id="lost-form" action="" role="form" method="Post">
                <h1 class="text-muted" align="center"> Lost Password ,Enter your Voter ID to recover </h1>
                
                <!--<hr>-->
                  
                  <div class="form-group">
                        <label class="control-label" for="lostVoterID">Enter Voter ID</label>
                        <input type="text" class="form-control" id="lostVoterID" name="lostVoterID">
                       
                  </div>
						        <button type="submit" class="btn-block btn-3d btn-green btn-greenh" id="btnVerify" name="btnVerify">Submit</button>
                        
                      
                     
                    
                    </form>

                  </div>  
                  
      
    </div> <!-- //container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
  </body>


</html>
