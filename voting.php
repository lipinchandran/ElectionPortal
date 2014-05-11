<?php
  session_start();
  require_once('include/checklogin.php');
  require_once('include/Connection.php');
  
?>

<?php
  if(isset($_POST['vote']))
  {
    
      $cid=$_POST['vote'];
      header("Location:sendmail.php?cid=$cid");
    
  }
  /*if(isset($_POST['vote']) && isset($_POST['opt']))
  {
  	$opt=$_POST['opt'];
	if($opt==$_SESSION['num'])
	{
    	$cid=$_POST['vote'];
    	$resultquery="select * from result where c_id=$cid";
    	$result1=mysql_query($resultquery);
    	$data1=mysql_fetch_array($result1);
    	$votenum=$data1['vote'];
    	$votenum++;
   	 	$updatequery="update result set vote=$votenum where c_id=$cid";
   	 	$result3=mysql_query($updatequery);
    	if(!$result3)
    	{
      		die("Error-->".mysql_error());
    	}
	}
	else
	{
		header("location:voting.php?fail=wrong password");
	}*/
    //UPDATE  `voting_system`.`result` SET  `vote` =  '1' WHERE  `result`.`c_id` =  '1' AND  `result`.`name` =  'naveen' AND  `result`.`ward_no` =12 AND  `result`.`vote` =0 LIMIT 1 ;
    //}
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
          <a class="navbar-brand" href="index.php">Election Portal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Today:<?php print(date("l F ,Y")) ?></a></li>
            
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
            <li><a href="candidate_setting.php">Candidate Setting</a></li>
            
            
            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Voting Dashboard</h1>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="images/usp.png" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>



          
          <h2 class="sub-header"></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>Button</th>
                    <th>Name</th>
                    <th>Party Name</th>
                </tr>
                  <?php
                  $query="select * from candidate where register=1";
                  $result=mysql_query($query);
                  while($data=mysql_fetch_array($result))
                  {
                    ?>
                    <tr>
                    <td>
                    <form action="voting.php" method="POST">
                      <input type="radio" name="vote" value="<?php echo $data['c_id']; ?>" />
                    </td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['party_name']; ?></td>
                    </tr> 
                  <?php }
                ?>
                
            </table>
			<?php
				if(isset($_GET['fail']))
				{
					$msg=$_GET['fail'];
					echo "$msg";
				}
			?>


            <button type="submit">Vote</button>
          </form>
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
