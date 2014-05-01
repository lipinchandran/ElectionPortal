<?php
  //session_start();
  //require_once('include/checkadmin.php');
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
          <h1 class="page-header" align="center">Delete Booth</h1>

          <div class="col-lg-offset-3 col-lg-7">
      <form id="delete-booth" action="" role="form" method="post">
                <!--<legend class="text-primary" align="center">Create Booth Form</legend>-->
                      <div class="form-group">
                        <label class="control-label" for="searchBooth">Enter BoothID</label>
                        <input type="text" class="form-control" id="searchBooth" name="searchBooth" placeholder="Enter BoothID">
                      </div>              
                      <div class="">
                      <button type="submit" name="btnsearch" id="btnsearch" class="btn-block btn-3d btn-green btn-greenh">Search</button>
                    </br></br>
                    
                      </div>
                    
                    </form>
                    </br>
                    <?php
                        if (isset($_POST['btnsearch'])) 
                        {
                          $id=$_POST['searchBooth'];
                          $selectquery="select * from booth where booth_id='$id';";
                          $selectresult=mysql_query($selectquery);
                          $data=mysql_fetch_array($selectresult);
                          
                        ?>
                        
                          <table>
                            <tr>
                              <th> Booth ID </th>
                              <td><?php echo $data['booth_id']; ?></td>
                            </tr>
                            <tr>
                              <th> Supervisor name </th>
                              <td><?php echo $data['supervisor_name']; ?></td>
                            </tr>
                            <tr>
                              <th> Address </th>
                              <td><?php echo $data['address']; ?></td>
                            </tr>
                            <tr>
                              <th> Email ID </th>
                              <td><?php echo $data['email_id']; ?></td>
                            </tr>
                            <tr>
                              <th> Mobile No. </th>
                              <td><?php echo $data['mobile']; ?></td>
                            </tr>
                            <tr>
                              <th> Ward No. </th>
                              <td><?php echo $data['ward_no']; ?></td>
                            </tr>
                          </table>

                          <form action="" enctype="multipart/form-data" method="post">
                            <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
                            <input type="submit" name="btndelete" id="btndelete" value="Delete" />
                          </form>
                        <?php
                        }

                    ?>
                    <?php
                      if (isset($_POST['btndelete'])) 
                      {
                         $bid=$_POST['id'];
                         $deletequery="delete from booth where booth_id='$bid';";
                         $deleteresult=mysql_query($deletequery);
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
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
    
  </body>
</html>
