	
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
            <li><a href="booth_setting.php">Setting</a></li>
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
          <h1 class="page-header" align="center">Voter Details</h1>


          <form id="bth-setting-form" class=" form-horizontal" role="form" action="" method="post">
            
            <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                 <label for="oldPass" class="col-lg-3 control-label"></label>
                  <div class="col-lg-9">
                  <input type="text" class="form-control" id="voterid" name="voterid" placeholder="Enter voter id to search">
                  </br>
                  
                  <input type="submit" name="btnsearch" id="btnsearch" value="Search">
                  </div>
                </div>
              </form>
                
                    </br ></br> 

<?php
  session_start();
  require_once('include/checkbooth.php');
  require_once('include/connection.php');
    if (isset($_POST['voterid'])) 
    {

      if (!empty($_POST['voterid'])) 
      {
              
        $id=$_POST['voterid'];
        $selectquery="select * from voter where v_id='$id';";
        $selectresult=mysql_query($selectquery);
        
        $data=mysql_fetch_array($selectresult);
    
    ?>
	<center>
    <table style="font-size:18px">
      <tr>
        <th><b>Name</b></th>
        <td><?php echo $data['name']; ?></td>
      </tr>
      <tr>
        <th><b>Surname</b></th>
        <td><?php echo $data['surname']; ?></td>
      </tr>
      <tr>
        <th><b>Father Name</b></th>
        <td><?php echo $data['father_name']; ?></td>
      </tr>
      <tr>
        <th><b>Date of Birth</b></th>
        <td><?php echo $data['DOB']; ?></td>
      </tr>
      <tr>
        <th><b>Gender</b></th>
        <td><?php echo $data['gender']; ?></td>
      </tr>
      <tr>
        <th><b>Photo</b></th>
        <td><?php echo '<img src="data:image/*;base64,'.base64_encode($data['photo']).'" height=100 width=150/>'; ?></td>
      </tr>
      <tr>
        <th><b>Address</b></th>
        <td><?php echo $data['address']; ?></td>
      </tr>
      <tr>
        <th><b>Email-Id</b></th>
        <td><?php echo $data['email_id']; ?></td>
      </tr>
      <tr>
        <th><b>Mobile No.</b></th>
        <td><?php echo $data['mobile']; ?></td>
      </tr>
      <tr>
        <th><b>Ward No.</b></th>
        <td><?php echo $data['ward_no']; ?></td>
      </tr>
      <tr>
        <th><b>Id Proof</b></th>
        <td><?php echo $data['voter_id_proof']; ?></td>
      </tr>
    </table>
    <br/>
    <br/>
    <form action="" enctype="multipart/form-data" method="post">
      <input type="text" name="vid" value="<?php echo $id; ?>" style="display:none;">
 <input type="submit" name="btnconfirm" id="btnconfirm" value="Confirm"/>
<input type="submit" name="btndelete" id="btndelete" value="Delete"/>
<input type="submit" name="btnedit" id="btnedit" value="Edit"/> 
 </form> 
	<br/>
  </center>
  <?php  
    }
    else
    {
      Echo "<b>Please enter valid voter id</b>";
    }
  }
?>

<?php
    if (isset($_POST['btnconfirm'])) 
    {
       
        $id=$_POST['vid'];
        $updatequery="update voter set register='1' where v_id=$id;";
        $updateresult=mysql_query($updatequery);
    }
    if(isset($_POST['btndelete']))
    {
        $id=$_POST['vid'];
        $deletequery="delete from voter where v_id=$id;";
    }
    if(isset($_POST['btnedit']))
    {
      $id=$_POST['vid'];
      echo $id;
      header("location:voter_edit.php?id=$id");
    }
  ?>
  






                                          
                  <!--<form id="bth-settings-form" class=" form-horizontal" role="form" action="" method="post">
                    <div class="col-lg-offset-3">
                    <button type="submit" class="btn btn-3d btn-green btn-greenh">Confirm</button>
                      
                      
                      <button type="button" class="btn btn-3d btn-red btn-redh">Delete</button>

                      <button type="button" class="btn btn-3d btn-blue btn-blueh"> Edit </button>
                      </div>
                      
                  </div>
                </div>



            


        </div>-->
      
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
