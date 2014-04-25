<?php
	session_start();
	require_once('include/checklogin.php');
	require_once('include/connection.php');
	$vid=$_SESSION['id'];
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
            
            
            <li><a href="logout.php">Logout</a></li>
            
          <!-- 
            <li>Welcome //<?php echo $_SESSION['username'] ?></li>
          -->
          </ul>
      
          
      
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            
          </ul>
          <ul class="nav nav-sidebar">
            
            <li><a href="voter_setting.php">Voter Setting</a></li>
            
            
            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          


          <div class="col-lg-offset-3 col-lg-6  ">
                
                
                <!--<hr>-->
                  <form method="post">
                  <div class="form-group">
                      <h1 class="text-muted"> Enter your One Time Password </h1>
                        <label class="control-label" for="nameVoter">Enter OTP</label>
                        <input type="text" class="form-control" id="nameVoter" name="nameVoter" placeholder="Enter One Time Password">
                        <p class="help-block">The Password was sent to your Registerd Email Address</p>
                      </div>

                        </br>
                      <input type="submit" value="Submit" name="passwordbtn" class="btn-block btn-3d btn-green btn-greenh" />
					  </form>
                      </br>
                      </br>
          <?php
		  if(isset($_GET['cid']))
		  {
		  	$cid=$_GET['cid'];
		  }
	if(isset($_POST['passwordbtn']))
	{
		$otppassword=$_POST['nameVoter'];
		if(!empty($otppassword))
		{
			//$getOtp_query=mysql_query("select * from otp where otp_password=md5('$otppassword')");
			$getOtp_query=mysql_query("select * from otp where otp_password='$otppassword'");
			if(!$getOtp_query)
			{
				die("Error-->".mysql_error());
			}
			$count=mysql_num_rows($getOtp_query);
			if($count==1)
			{
				//mysql_query("delete from otp where otp_password=md5('$otppassword')");
				mysql_query("delete from otp where otp_password='$otppassword'");
				$resultquery="select * from result where c_id='$cid'";
    			$result1=mysql_query($resultquery);
    			$data1=mysql_fetch_array($result1);
    			$votenum=$data1['vote'];
    			$votenum++;
   	 			$updatequery="update result set vote=$votenum where c_id='$cid'";
   	 			$result3=mysql_query($updatequery);
				$update_voter_status=mysql_query("update voter set status=1 where v_id='$vid'");
				header("Location:logout.php");
				echo "Your Vote is Counted";
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
