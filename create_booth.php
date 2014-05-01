<?php
  //session_start();
  require_once('include/connection.php');
  //require_once('include/checkadmin.php');
  if (isset($_POST['btncreate'])) 
  {
    $id=$_POST['boothid'];
    $name=$_POST['nameSuper'];
    $address=$_POST['addressSuper'];
    $mobile=$_POST['mnumberSuper'];
    $ward=$_POST['wardSuper'];
    $email=$_POST['emailSuper'];
    $password=md5($_POST['passwordSuper']);
    $query="INSERT INTO voting_system.booth(booth_id,supervisor_name,address,email_id,mobile,ward_no,password) VALUES ('$id','$name','$address','$email','$mobile','$ward','$password');";
    $result=mysql_query($query);
  }





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

    <title>Election Portal::Create Booth </title>

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
            <li><a href="">Today:<?php print(date("l F ,Y")) ?></a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="#">Log out</a></li>
            
            
          
            
            

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
            <li><a href="create_booth.php">Create Booth</a></li>
            <li><a href="delete_booth.php">Delete Booth</a></li>
            <li><a href="voting_enable.php">Enable/Disable Voting</a></li>
            <li><a href="result_enable.php">Enable/Disable Result</a></li>
            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" align="center">Create Booth</h1>

          <div class="col-lg-offset-3 col-lg-7">
      <form id="create-booth" action="" role="form" method="post">
                <!--<legend class="text-primary" align="center">Create Booth Form</legend>-->
                      <div class="form-group">
                        <label class="control-label" for="boothid">Booth ID</label>
                        <input type="text" class="form-control" id="boothid" name="boothid" placeholder="Enter Booth ID">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="nameSuper">Supervisor Name</label>
                        <input type="text" class="form-control" id="nameSuper" name="nameSuper" placeholder="Enter Name">
                      </div>
                      
                     
                
                       

                    <div class="form-group">
                        <label class="control-label" for="addressSuper">Address</label>
                        <textarea class="form-control" name="addressSuper" rows="3"></textarea>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label" for="mnumberSuper">Mobile Number</label>
                        <input type="tel" class="form-control" id="mnumberSuper" name="mnumberSuper" placeholder="Enter 10 digit mobile number">
                     </div>              
                     
                      <div class="form-group">
                        <label class="control-label" for="wardSuper">Ward no</label>
                        <input type="tel" class="form-control" id="wardSuper" name="wardSuper" placeholder="Enter ward no">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="emailSuper">Email Address</label>
                        <input type="email" class="form-control" id="emailSuper" name="emailSuper" placeholder="Enter email  ">
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="passwordSuper">Password</label>
                        <input type="password" class="form-control" id="passwordSuper" name="passwordSuper" placeholder="Enter your password">
                     </div>

                       

                      <div class="">
                      <button type="submit" name="btncreate" id="btncreate" class="btn-block btn-3d btn-green btn-greenh">Create</button>
                    </br></br>
                      <button type="reset" class="btn-block btn-3d btn-red btn-redh">Reset</button>
                      </div>
                    
                    </form>
                    <?php
                      echo $mobile;
                    ?>
                    </br>

         

          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
    
  </body>
</html>
