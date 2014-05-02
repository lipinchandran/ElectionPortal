<?php
require_once('include/connection.php');
if (isset($_FILES['CandidPhoto']))
  {
      $candi_image=addslashes(file_get_contents($_FILES['CandidPhoto']['tmp_name']));
      $party_image=addslashes(file_get_contents($_FILES['partyPhoto']['tmp_name']));
      $candiname=$_POST['nameCandid'];
      $candisurname=$_POST['surNameCandid'];
      $candifname=$_POST['fNameCandid'];
      $candigender=$_POST['GenderC'];
      $candiaddr=$_POST['addressCandid'];
      $candimobile=$_POST['mnumberCandid'];
      $candiparty=$_POST['selectParty'];
      $candiward=$_POST['wardCandid'];
      $candiemail=$_POST['emailCandid'];
      $candidate=$_POST['dateC'];
      $candipwd=md5($_POST['passwordCandid']);
      $candiproof=$_POST['candidateProof'];
      $connect=mysql_connect("localhost","root","");
      mysql_select_db("voting_system",$connect);
      
      $selectquery="select * from candidate;";
      $selectresult=mysql_query($selectquery);
      $count=mysql_num_rows($selectresult);
      $count++;
      $cid="C".$candiward.$count;
      

      $query="INSERT INTO voting_system.candidate(c_id,name,surname,father_name,DOB,gender,photo,party_name,party_symbol,address,email_id,mobile,ward_no,password,candi_id_proof) VALUES ('$cid','$candiname','$candisurname','$candifname','$candidate','$candigender','$candi_image','$candiparty','$party_image','$candiaddr','$candiemail','$candimobile','$candiward','$candipwd','$candiproof');";
      mysql_query($query,$connect);
      
      $insertquery="INSERT INTO voting_system.result(c_id,name,ward_no) VALUES ('$cid','$candiname','$candiward');";
      mysql_query($insertquery);         
      echo "<script language='javascript'>";
      echo "alert('Your Login ID is : $cid');";
      echo "</script>";
  }
?>

<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Election Portal::Candidate</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customstyles.css"rel="stylesheet">
    <link href="css/style.css"rel="stylesheet">

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
          <a class="navbar-brand" href="#">Election Portal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="voter.php">Voter</a></li>
            <li><a href="Candidate.php">Candidate</a></li>
            <li><a href="Result.php">Result</a>
            <li><a href="#">Downloads</a>
            <li><a href="#">About</a>
            <li><a href="#">Contact Us</a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#">Today:<?php print(date("l F ,Y")) ?></a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <div class="col-lg-offset-5 col-lg-7">
      <form id="candidate-form" action="candidate.php" role="form" method="post" enctype="multipart/form-data">
                <legend class="text-primary">Candidate Registeration Form</legend>
                      <div class="form-group">
                        <label class="control-label" for="nameCandid">Name</label>
                        <input type="text" class="form-control" lettersonly="50" id="nameCandid" name="nameCandid" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="surNameCandid">Surname</label>
                        <input type="text" class="form-control" lettersonly="50" id="surNameCandid" name="surNameCandid" placeholder="Enter Surname">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="fNameCandid">Father name</label>
                        <input type="text" class="form-control" id="fNameCandid" lettersonly="50" name="fNameCandid" placeholder="Enter Father Name">
                      </div>
                     
                
                       <div class="form-group"> 
                      
                      <label class="control-label" for="GenderC">Gender 
                      </label>

                        <select  class="form-controlselect" id="GenderC" name="GenderC"/>
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                      </select>
                      </div>

                    <div class="form-group">
                        <label class="control-label" for="addressCandid">Address</label>
                        <textarea class="form-control" name="addressCandid" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="cityCandid">City</label>
                        <input type="text" class="form-control" id="cityCandid" name="cityCandid" placeholder="Enter City">
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="mnumberCandid">Mobile Number</label>
                        <input type="tel" class="required phone valid form-control" id="mnumberCandid" name="mnumberCandid" placeholder="Enter 10 digit mobile number">
                     </div> 
					 <div class="form-group"> 
                      
                      <label class="control-label" for="selectParty">Select Party Name 
                      </label>

                        <select  class="form-controlselect" id="selectParty" name="selectParty"/>
                        <option value=""></option>
                        <option value="BJP">BJP</option>
                        <option value="AAP">AAP</option>
                        
                      </select>
                      </div>             
                      <div class="form-group">
                        <label class="control-label" for="CandidPhoto">Upload Photo</label>
                        
                        <input type="file" accept="image/*" maxfilesize="1024" class="form-control "name="CandidPhoto" id="CandidPhoto">
                        <p class="help-block">Upload Your Photo .</p>
                        
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label" for="partyPhoto">Upload Party Photo</label>
                        
                        <input type="file" accept="image/*" maxfilesize="1024" class="form-control "name="partyPhoto" id="partyPhoto">
                        <p class="help-block">Upload Your Party Photo .</p>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="wardCandid">Ward no</label>
                        <input type="tel" class="required phone valid form-control" id="wardCandid" name="wardCandid" placeholder="Enter ward no">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="emailCandid">Email Address</label>
                        <input type="email" class="form-control" id="emailCandid" name="emailCandid" placeholder="Enter email  ">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="dateC">Date Of Birth</label>
                        <input type="date" class="form-control" name="dateC"id="dateC">
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="passwordCandid">Password</label>
                        <input type="password" class="form-control" id="passwordCandid" name="passwordCandid" placeholder="Enter your password">
                     </div>
                        <div class="form-group"> 
                      
                            <label class="control-label" for="candidateProof">Select Identity Proof
                            </label>

                        <select  class="form-controlselect" id="candidateProof" name="candidateProof"/>
                        <option value=""></option>
                        <option value="Driving license">Driving license</option>
                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Ration Card">Ration Card</option>
                        
                      </select>
                        </div>
                      
                      <button type="submit" class="btn-hg btn-3d btn-green btn-greenh" id="btnsubmit" name="btnsubmit">Submit</button>
                      <button type="reset" class="btn-hg btn-3d btn-red btn-redh">Reset</button>
                    
                    </form>
                  </div>  
                  
      
    </div> <!-- //container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.js"></script>


    <script src="js/script.js"></script>
  </body>


</html>
