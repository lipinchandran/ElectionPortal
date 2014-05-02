<?php
	require_once('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Election Portal::Voting </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customstyles.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8s support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Election Portal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            
            
            
          <!-- 
            <li>Welcome //<?php echo $_SESSION['username'] ?></li>
          -->
          </ul>
      
          
      
        </div>
      </div>
    </div>
    <div class="container-fluid">
	
      <div class="row">

          <div class="col-lg-offset-3 col-lg-6  ">
                
                
                <!--<hr>-->
                  <form method="post">
                  <div class="form-group">
                      <h1 class="text-muted"> Admin 1 One Time Password </h1>
                        <label class="control-label" for="nameVoter">Enter OTP</label>
                        <input type="text" class="form-control" id="nameVoter" name="password1" placeholder="Enter One Time Password">
                        <p class="help-block">The Password was sent to your Registerd Email Address</p>
                      </div>

                      <div class="form-group">
                      <h1 class="text-muted"> Admin 2 One Time Password </h1>
                        <label class="control-label" for="nameVoter">Enter OTP</label>
                        <input type="text" class="form-control" id="nameVoter" name="password2" placeholder="Enter One Time Password">
                        <p class="help-block">The Password was sent to your Registerd Email Address</p>
                      </div>

                      <!--<div class="form-group">
                      <h1 class="text-muted"> Admin 3 One Time Password </h1>
                        <label class="control-label" for="nameVoter">Enter OTP</label>
                        <input type="text" class="form-control" id="nameVoter" name="password3" placeholder="Enter One Time Password">
                        <p class="help-block">The Password was sent to your Registerd Email Address</p>
                      </div>

                      <div class="form-group">
                      <h1 class="text-muted"> Admin 4 One Time Password </h1>
                        <label class="control-label" for="nameVoter">Enter OTP</label>
                        <input type="text" class="form-control" id="nameVoter" name="password4" placeholder="Enter One Time Password">
                        <p class="help-block">The Password was sent to your Registerd Email Address</p>
                      </div>-->

                     

                        </br>
                      <input type="submit" name="passwordbtn" class="btn-block btn-3d btn-green btn-greenh" />
					  </form>
                      </br>
                      </br>
					  <?php
					  		if(isset($_POST['passwordbtn']))
							{
								$password1=$_POST['password1'];
								$password2=$_POST['password2'];
								$password3=$_POST['password3'];
								$password4=$_POST['password4'];
								if(!empty($password1) && !empty($password2) && !empty($password3) && !empty($password4))
								{
									$result=mysql_query("select * from temppassword where password1='$password1' && password2='$password2'");
									$count=mysql_num_rows($result);
									if($count==1)
									{
										mysql_query("delete from temppassword");
										header("Location:admin.php");
									}
								}
								else
								{
									echo "Field is Empty";
								}
							}
					  ?>
          
          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
