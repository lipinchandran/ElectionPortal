<?php
  //session_start();
  //require_once('include/checkbooth.php');
  require_once('include/Connection.php');
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
  $edit_query=mysql_query("select * from candidate where c_id='$id'");
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

        <h1 class="page-header" align="center">Candidate Correction/Editing</h1>
      <div class="col-lg-offset-3 col-lg-7">
      <form id="candidate-form" action="" role="form">
                <legend class="text-primary" align="center">Candidate Editing Form</legend>
                      <div class="form-group">
                        <label class="control-label" for="nameCandid">Name</label>
                        <input type="text" class="form-control" value="<?php echo $data['name']; ?>" id="nameCandid" name="nameCandid" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="surNameCandid">Surname</label>
                        <input type="text" class="form-control" value="<?php echo $data['surname']; ?>" id="surNameCandid" name="surNameCandid" placeholder="Enter Surname">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="fNameCandid">Father name</label>
                        <input type="text" class="form-control" value="<?php echo $data['father_name']; ?>" id="fNameCandid" name="fNameCandid" placeholder="Enter Father Name">
                      </div>
                     
                
                       <div class="form-group"> 
                      
                      <label class="control-label" for="GenderC">Gender 
                      </label>

                        <select  class="form-controlselect" id="selectGender" name="GenderC"/>
                        <option value="<?php echo $data['gender']; ?>"><?php echo $data['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                      </select>
                      </div>

                    <div class="form-group">
                        <label class="control-label" for="addressCandid">Address</label>
                        <input type="text" class="form-control" value="<?php echo $data['address']; ?>" id="addressCandid" name="addressCandid" />
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="cityCandid">City</label>
                        <input type="text" class="form-control" id="cityCandid" name="cityCandid" placeholder="Enter City">
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="mnumberCandid">Mobile Number</label>
                        <input type="number" class="form-control" value="<?php echo $data['mobile']; ?>" id="mnumberCandid" name="mnumberCandid" placeholder="Enter 10 digit mobile number">
                     </div>              
                      <div class="form-group">
                        <label class="control-label" for="CandidPhoto">Upload Photo</label>
                        
                        <input type="file" class="form-control "name="CandidPhoto" id="CandidPhoto">
                        <p class="help-block">Upload Your Photo .</p>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="wardCandid">Ward no</label>
                        <input type="number" class="form-control" value="<?php echo $data['ward_no']; ?>" id="wardCandid" name="wardCandid" placeholder="Enter ward no">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="emailCandid">Email Address</label>
                        <input type="email" class="form-control" value="<?php echo $data['email_id']; ?>" id="emailCandid" name="emailCandid" placeholder="Enter email  ">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="dateC">Date Of Birth</label>
                        <input type="date" class="form-control" value="<?php echo $data['DOB']; ?>" name="dateC" id="dateC">
                        </div>

                        <div class="form-group"> 
                      
                            <label class="control-label" for="candidateProof">Select Identity Proof
                            </label>

                        <select  class="form-controlselect" id="selectCProof" name="candidateProof"/>
                        <option value="<?php echo $data['candi_id_proof']; ?>"><?php echo $data['candi_id_proof']; ?></option>
                        <option value="Driving license">Driving license</option>
                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Ration Card">Ration Card</option>
                        
                      </select>
                        </div>
                      <div class="">
                      <button type="submit" class="btn-block btn-3d btn-green btn-greenh">Update</button>
                      </br></br>
                      <button type="reset" class="btn-block btn-3d btn-red btn-redh">Cancel</button>
                    
                    </form>

                  </div>  
                  </br>
                  
      
    </div> <!-- //container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script src="js/script.js"></script>
  </body>


</html>
