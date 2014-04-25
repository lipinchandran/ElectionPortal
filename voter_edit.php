<?php
  //session_start();
  //require_once('include/checkbooth.php');
  require_once('include/Connection.php');
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
  $edit_query=mysql_query("select * from voter where v_id='$id'");
  if(!$edit_query)
  {
    die("Error-->".mysql_error());
  }
  $data=mysql_fetch_array($edit_query);
?>


<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Election Portal::Edit</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customstyles.css"rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/style.css"rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
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
            <li><a href="logout.php">log out</a></li>
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
        </div>
      
          <h1 class="page-header" align="center">Voter Correction/Editing</h1>
      <div class="col-lg-offset-3 col-lg-7">
      <form id="voter-form" action="" role="form">
                <legend class="text-primary" align="center">Voter Editing Form</legend>
                      <div class="form-group">
                        <label class="control-label" for="nameVoter">Name</label>
                        <input type="text" class="form-control" value="<?php echo $data['name']; ?>" id="nameVoter" name="nameVoter" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="surNameVoter">Surname</label>
                        <input type="text" class="form-control" value="<?php echo $data['surname']; ?>" id="surNameVoter" name="surNameVoter" placeholder="Enter Surname">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="fNameVoter">Father name</label>
                        <input type="text" class="form-control" value="<?php echo $data['father_name']; ?>" id="fNameVoter" name="fNameVoter" placeholder="Enter Father Name">
                      </div>
                     
                
                       <div class="form-group"> 
                      
                      <label class="control-label" for="GenderV">Gender 
                      </label>

                        <input type="text" class="form-control" value="<?php echo $data['gender']; ?>" id="selectGender" name="selectGender"/>
                        
                        
                      
                        </div>

                    <div class="form-group">
                        <label class="control-label" for="addressVoter">Address</label>
                        <input type="text" class="form-control" value="<?php echo $data['address']; ?>" id="addressVoter" name="addressVoter"/>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="cityVoter">City</label>
                        <input type="text" class="form-control" value="" id="cityVoter" name="cityVoter" placeholder="Enter City">
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="mnumberVoter">Mobile Number</label>
                        <input type="number" pattern="\d\d\d\d\d\d\d\d\d\d\" class="form-control" value="<?php echo $data['mobile'] ?>" id="mnumberVoter" name="mnumberVoter" placeholder="Enter 10 digit mobile number">
                     </div>              
                      <div class="form-group">
                        <label class="control-label" for="voterPhoto">Upload Photo</label>
                        
                        <input type="file" class="form-control "name="voterPhoto" id="voterPhoto">
                        <p class="help-block">Upload Your Photo .</p>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="wardVoter">Ward no</label>
                        <input type="number" class="form-control" value="<?php echo $data['ward_no']; ?>" id="wardVoter" name="wardVoter" placeholder="Enter ward no">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="emailVoter">Email Address</label>
                        <input type="email" class="form-control" value="<?php echo $data['email_id']; ?>" id="emailVoter" name="emailVoter" placeholder="Enter email  ">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="datev">Date Of Birth</label>
                        <input type="date" class="form-control" value="<?php echo $data['DOB']; ?>" name="datev"id="datev">
                        </div>

                        <div class="form-group"> 
                      
                            <label class="control-label" for="voterProof">Select Identity Proof
                            </label>

                        <select  class="form-controlselect" id="selectVProof" name="voterProof"/>
                        <option value="<?php echo $data['voter_id_proof']; ?>"><?php echo $data['voter_id_proof']; ?></option>
                        <option value="1">Driving license</option>
                        <option value="2">Aadhar Card</option>
                        <option value="3">Ration Card</option>
                        
                      </select>
                        </div>

                      <div class="">
                      <button type="submit" name="updatebtn" class="btn-block btn-3d btn-green btn-greenh">Update</button>
                    </br></br>
                      <button type="reset" class="btn-block btn-3d btn-red btn-redh">Cancel</button>
                      </div>
                    
                    </form>
                    </br>
                  </div>  

      
    </div> <!-- //container -->
    
    <?php
      if(isset($_POST['updatebtn']))
      {
        echo "Update Details";
      }
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
  </body>


</html>
