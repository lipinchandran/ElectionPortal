<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Election Portal::Details </title>

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
            
            
          
            
            <li><a href="#">Today:<?php print(date("l F ,Y")) ?></a></li>
            <li><a href="logout.php">Logout</a></li>
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
            <li class="active"><a href="voter_details.php">Voter Confirm</a></li>
            <li><a href="candidate_details.php">Candidates Confirm</a></li>
            <li><a href="voter_edit.php">Voter Edit</a></li>
            <li><a href="candidate_edit.php">Candidates Edit</a></li>
            
            
          </ul>
            
          
        </div>
        </div>
        <div class="">
          <h1 class="page-header" align="center">Candidate Details</h1>


          <form id="bth-setting-form" class=" form-horizontal" role="form" action="" method="post">
            
            <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                 <label for="oldPass" class="col-lg-3 control-label">Enter </label>
                  <div class="col-lg-9">
                  <input type="text" class="form-control" id="candidateid" name="candidateid" placeholder="Enter candidateid to search">
                  </br>
               		<input type="submit" id="btnsearch" name="btnsearch" value="Search"/>   
                  </div>
                </div><br/><br/>
                
 
                    <?php
                      session_start();
                      require_once('include/checkbooth.php');
                      require_once('include/connection.php');
                      if (isset($_POST['btnsearch'])) 
                      {
                        $cid=$_POST['candidateid'];
                        $query="select * from candidate where c_id='$cid';";
                        $result=mysql_query($query);
                        $data=mysql_fetch_array($result);
                      
                    ?>           
                    <center>    
                      <table style="font-size:18px">
                          <tr>
                            <th>Name</th>
                            <td><?php echo $data['name']; ?></td>
                          </tr>
                          <tr>
                            <th>Surname</th>
                            <td><?php echo $data['surname']; ?></td>
                          </tr>
                          <tr>
                            <th>Father Name</th>
                            <td><?php echo $data['father_name']; ?></td>
                          </tr>
                          <tr>
                            <th>Date of Birth</th>
                            <td><?php echo $data['gender']; ?></td>
                          </tr>
                          <tr>
                            <th>Photo</th>
                            <td><?php echo '<img src="data:image/*;base64,'.base64_encode($data['photo']).'" height=100 width=150/>'; ?></td>
                          </tr>
                          <tr>
                            <th>Party Name</th>
                            <td><?php echo $data['party_name']; ?></td>
                          </tr>
                          <tr>
                            <th>Party Symbol</th>
                            <td><?php echo '<img src="data:image/*;base64,'.base64_encode($data['party_symbol']).'" height=100 width=150/>'; ?></td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td><?php echo $data['address']; ?></td>
                          </tr>
                          <tr>
                            <th>Email Id</th>
                            <td><?php echo $data['email_id']; ?></td>
                          </tr>
                          <tr>
                            <th>Mobile</th>
                            <td><?php echo $data['mobile']; ?></td>
                          </tr>
                          <tr>
                            <th>Ward No.</th>
                            <td><?php echo $data['ward_no']; ?></td>
                          </tr>
                          <tr>
                            <th>Id Proof</th>
                            <td><?php echo $data['candi_id_proof']; ?></td>
                          </tr>
                          
                      </table>
					  <form action="" enctype="multipart/form-data" method="post">
      						<input type="text" name="id" value="<?php echo $cid; ?>" style="display:none;">
 							<input type="submit" name="btnconfirm" id="btnconfirm" value="Confirm"/>
							<input type="submit" name="btndelete" id="btndelete" value="Delete"/>
							<input type="submit" name="btnedit" id="btnedit" value="Edit"/> 
					 </form>
                      </center>
                      <?php
                        
                        }

                      ?>


						<?php
							 if (isset($_POST['btnconfirm'])) 
               {
                 $id=$_POST['id'];
                 $updatequery="update candidate set register='1' where c_id=$id";
                 $updateresult=mysql_query($updatequery);
               }
               if (isset($_POST['btndelete'])) 
               {
                 $id=$_POST['id'];
                 $deletequery="delete from candidate where c_id=$id;";
                 $deleteresult=mysql_query($deletequery);
               }
               if (isset($_POST['btnedit'])) 
               {
                 $id=$_POST['id'];
                 header("location:candidate_edit.php?id=$id");
               }
						?>                                          
                      <br/>
                      <br/>
                    <div class="col-lg-offset-3">
                    
                      </div>
                      
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
