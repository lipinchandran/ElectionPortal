<?php
  require_once('include/function.php');
  require_once('include/Connection.php');
  if(isset($_POST['btnlogin']))
  {
  	   if(!empty($_POST['txtuser']) && !empty($_POST['txtpass']) && !empty($_POST['selectlogin']))
	       {
		        $user=$_POST['txtuser'];
		        $password=$_POST['txtpass'];
		        $selectlogin=$_POST['selectlogin'];
            
		         if($selectlogin=='Voter')
		            {
                  $checklogin=mysql_query("select * from voter where v_id='$user' and password=md5('$password')");
                  //$result=mysql_query($checklogin);
                  $data=mysql_fetch_array($checklogin);
                  $register1=$data['register'];
                  $status1=$data['status'];
			            $count=mysql_num_rows($checklogin);
			             if($count==1 && $register1==1 && $status1==0)
			               {
                        session_start();
				                $_SESSION['id']=$user;
                        $_SESSION['login']=$selectlogin;
				                header("location:voting.php");
			               }
                     else
                     {
                        echo "<script language='javascript'>";
                        echo "alert('Username or Password is incorrect');";
                        echo "</script>";
                     }
		            }
		          if($selectlogin=='Candidate')
		            {
			               $checklogin=mysql_query("select * from candidate where c_id='$user' and password=md5('$password')");
			               $data=mysql_fetch_array($checklogin);
                     $register1=$data['register'];
                     $status1=$data['status'];
                     $count=mysql_num_rows($checklogin);
			               if($count==1 && $register1==1 && $status1==0)
			                 {
                          session_start();
				                  $_SESSION['id']=$user;
                          $_SESSION['login']=$selectlogin;
				                  header("location:voting.php");
			                 }
                       else
                       {
                          echo "<script language='javascript'>";
                          echo "alert('Username or Password is incorrect');";
                          echo "</script>";
                       }
		            }
		          if($selectlogin=='Booth')
		            {
			             $checklogin=mysql_query("select * from booth where booth_id='$user' and password=md5('$password')");
			             $count=mysql_num_rows($checklogin);
			             if($count==1)
			               {
                        session_start();
				                $_SESSION['bid']=$user;
				                header("location:booth.php");
			               }
		            }
		          if($selectlogin=='Admin')
		            {
			             $checklogin=mysql_query("select * from admin where admin_id='$user' and password=md5('$password')");
			             $count=mysql_num_rows($checklogin);
			             if($count==1)
			               {
                        session_start();
				                $_SESSION['aid']=$user;
				                header("location:sendadminmail.php");
			               }
		            }
	         }
  }
  /*if(login())
  {
  	header("location:voting.php");
  }*/
  ?>
<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Election Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/introjs.css">
    <link href="css/customstyles.css"rel="stylesheet">
    <link href="css/style.css"rel="stylesheet">

    <style>
      .forLastStep {
        font-weight: bold;
      }
      .customDefault { 
        color: gray;
      }
      .customDefault .introjs-skipbutton {
        border-radius: 0;
        color: red;
      }
      </style>

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
          <a class="navbar-brand" href="index.php">Election Portal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a data-step="2" data-intro="<b>Voter</b> can register himself by clicking this link." href="voter.php">Voter</a></li>
            <li><a data-step="3" data-intro="<b>Candidate</b> can register himself by clicking this link." href="candidate.php">Candidate</a></li>
            <li><a href="result.php">Result</a>
            <li><a href="generate_pdf.php">Downloads</a>
            <li><a href="#">About</a>
            <li><a data-step="6" data-intro="For any Feedback or Query contact us here.<b>Thank You</b>" href="contactus.html">Contact Us</a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#">Today:<?php print(date("l F ,Y")) ?></a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron jumbotron-cust">
        <h1 data-step="1" data-intro="This is a Tour to understand how to use the website.Use your <b><--</b> and<b> --></b> key to navigate this tour." class="lead white" align="center" ><b>Election</b><span class="text-muted-my"><b>Portal</b></span></h1>

        <p class="lead" align="center">
        <label class="label label-success" align="center">Vote without standing in queues.</label>
        </p>
        <p align="center">
          <a class="btn  btn-outline-inverse btn-lg" href="javascript:void(0);" onclick="javascript:introJs().setOption('showButtons',false,'showBullets', false,'tooltipClass', 'customDefault').start();">How it Works &raquo;</a>
        </p>
      </div>

      <div class="row">
          <div class="col-lg-7">
            <div class="well well-cust">
              <p class="lead">
                <span class="label label-primary">News and Latest Articles</span>
              </p>
              <div class="panel panel-info">
                  <div class="panel-heading">
                  <h3 class="panel-title">Latest News</h3>
                </div>
                <div class="panel-body">
                  Panel content
                </div>
            </div>
            </div>
          </div>
            <!--Log in Colum-->
          <div data-step="4" data-intro="<b>Voter</b> or <b>Candidate</b> can <strong>Login</strong> from here after succesfull registeration." data-position="left" class=" col-lg-5">
          
            
              <p class="lead">
              <span class="label label-info">Login in your Account</span>
              </p>

                <!--log in form-->
              <form id="login-form" class="form-horizontal" role="form" action="" method="post">
            
                <div class="form-group">
                 <label for="Id" class="col-lg-3 control-label">Voter Id   </label>
                  <div class="col-lg-9">
                  <input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Enter Your Voter/Candidate/Admin Id">
                  </div>
                </div>
                <div class="form-group">
                 <label for="inputPass" class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-9">
                    <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Enter Your Password">
                  </div>
                </div>
              <div class="form-group">
                 <label for="voterId" class="col-lg-3 control-label">Login Type</label>
                  <div class="col-lg-9">
                  Please select a Login type</label><br/>
                    <select  class="form-controlselect" id="selectlogin" name="selectlogin"/>
                        <option value="">Select</option>
                        <option value="Voter">Voter</option>
                        <option value="Candidate">Candidate</option>
                        <option value="Booth">Booth</option>
                        <option value="Admin">Admin</option>
                      </select>
               
                 <!-- <label class="radio-inline">
                      <input class="" type="radio" name="logintype" id="inlineradioVoter" value="voter"> Voter
                  </label>
                  <label class="radio-inline">
                      <input class="" type="radio" name="logintype" id="inlineradioCandidate" value="candidate"> Candidate
                  </label>
                  <label class="radio-inline">
                      <input class="" type="radio" name="logintype" id="inlineradioAdmin" value="admin"> Admin
                </label>-->
                

                  </div>
                </div>

                
                
              <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">

                  <button type="submit" class="btn-block btn-3d btn-green btn-greenh" id="btnlogin" name="btnlogin">Log in</button>
                  
                </div>
                <a data-step="5" data-intro="In case you loose your <b>Password</b> you can recover it here." class=" col-lg-offset-3 col-lg-9 login-link" href="lost.php"><b>Lost Your Password?</b></a>
              </div>
            </form>
                    
                    </div>
            </div>
            <hr>
      
    <div class="container footer">

        <p class="lead ">    © Election Portal</p>
      </div>
    </div> <!-- /container -->
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/intro.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
  </body>


</html>
