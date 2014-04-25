<?php 
  session_start();
  require_once('include/checklogin.php');
  require_once('include/connection.php');

  if (isset($_POST['btnupdate'])) 
  {
    $old=$_POST['oldPass'];
    $new=$_POST['newPass'];
    $id=$_SESSION['id'];
    echo $id;

    $query="select * from candidate where c_id='$id';";
    $result=mysql_query($query);
    $data=mysql_fetch_array($result);
    $pass=$data['password'];
    if ($old==$pass) 
    {
      $update="update candidate set password='$new' where c_id='$id';";
    }
    if(!$result3)
      {
          die("Error-->".mysql_error());
      }  

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

    <title>Election Portal::Candidate</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customstyles.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    


    

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
            
            
          
            
            <li><a href="#">Today:<?php print(date("D F ,Y")) ?></a></li>
            <li><a href="logout.php">log out</a></li>

          </ul>
      
          
      
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            <li><a href="candidate_setting.php">Setting</a></li>

              
            
            
          </ul>
            
          
        </div>
        </div>
        <div class="">
          <h1 class="page-header" align="center">Candidate Setting</h1>


          <form id="bth-setting-form" class=" form-horizontal" role="form" action="" method="post">
            <h1 class="text-muted" align="center"> Change Password </h1>
            <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                 <label for="oldPass" class="col-lg-3 control-label">Old Password  </label>
                  <div class="col-lg-9">
                  <input type="text" class="form-control" id="oldPass" name="oldPass" placeholder="Enter Your Current Password">
                  </div>
                </div>
                <div class="form-group">
                 <label for="newPass" class="col-lg-3 control-label">New Password</label>
                  <div class="col-lg-9">
                    <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Enter Your New Password">
                    </br>
                  

                    
                    <input type="submit" id="btnupdate" name="btnupdate" value="Update" />
                      <input type="submit" id="btncancle" name="btncancle" value="cancle" />
                      </br>
                      </br>
                      
                      
                  </div>
                </div>



            


        </div>
        </form>
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
