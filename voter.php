<?php
  if(isset($_FILES['voterPhoto']['tmp_name']))
  {
    //$file=$_FILES['voterPhoto']['tmp_name'];
    //echo $_FILES['voterPhoto']['tmp_name'];
    $image=addslashes(file_get_contents($_FILES['voterPhoto']['tmp_name']));
    $image_name=addslashes($_FILES['voterPhoto']['name']);
    $name=$_POST['nameVoter'];
    $surName=$_POST['surNameVoter'];
    $fName=$_POST['fNameVoter'];
    $gender=$_POST['GenderV'];
    $address = $_POST['addressVoter'];
    $city = $_POST['cityVoter'];
    $mnumber = $_POST['mnumberVoter'];
    $ward = $_POST['wardVoter'];
    $email = $_POST['emailVoter'];
    $date = $_POST['datev'];
    $selectProof = $_POST['selectVProof'];
    $password = md5($_POST['passwordVoter']);
    
    $connect=mysql_connect("localhost","root","");
    $result=mysql_select_db("voting_system",$connect);

    $selectquery="select * from voter;";
    $selectresult=mysql_query($selectquery);
    $count=mysql_num_rows($selectresult);
    $count++;
    $vid="V".$ward.$count;
    $query="INSERT INTO voter(v_id,name,surname,father_name,dob,gender,Photo,address,email_id,mobile,ward_no,password,voter_id_proof) VALUES ('$vid','$name','$surName','$fName','$date','$gender','$image','$address','$email','$mnumber','$ward','$password','$selectProof');";
    
   mysql_query($query,$connect);
   
  }
  

?>


<!DOCTYPE html>
<html lang="en">
  

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Election Portal::Voter</title>

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
            <li><a href="candidate.php">Candidate</a></li>
            <li><a href="result.php">Result</a>
            <li><a href="#">Downloads</a>
            <li><a href="#">About</a>
            <li><a href="#">Contact Us</a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#">Today:31st October 2013</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <div class="col-lg-offset-5 col-lg-7">
      <form id="voter-form" action="voter.php" role="form" method="post" enctype="multipart/form-data">
                <legend class="text-primary">Voter Registeration Form</legend>
                      <div class="form-group">
                        <label class="control-label" for="nameVoter">Name</label>
                        <input type="text" class="form-control" lettersonly="50" id="nameVoter" name="nameVoter" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="surNameVoter">Surname</label>
                        <input type="text" class="form-control" lettersonly="50" id="surNameVoter" name="surNameVoter" placeholder="Enter Surname">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="fNameVoter">Father name</label>
                        <input type="text" class="form-control" lettersonly="50" id="fNameVoter" name="fNameVoter" placeholder="Enter Father Name">
                      </div>
                     
                
                       <div class="form-group"> 
                      
                      <label class="control-label" for="GenderV">Gender 
                      </label>

                        <select  class="form-controlselect" id="GenderV" name="GenderV"/>
                       <option value="" ></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option> 
                        
                      </select>
                        </div>

                    <div class="form-group">
                        <label class="control-label" for="addressVoter">Address</label>
                        <textarea class="form-control" name="addressVoter" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="cityVoter">City</label>
                        <input type="text" class="form-control" id="cityVoter" name="cityVoter" placeholder="Enter City">
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="mnumberVoter">Mobile Number</label>
                        <input type="tel" class="required phone valid form-control" id="mnumberVoter" name="mnumberVoter" placeholder="Enter 10 digit mobile number">
                     </div>              
                      <div class="form-group">
                        <label class="control-label" for="voterPhoto">Upload Photo</label>
                        
                        <input type="file" accept="image/*" maxfilesize="1024" class="form-control "name="voterPhoto" id="voterPhoto">
                        <p class="help-block">Upload Your Photo .</p>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="wardVoter">Ward no</label>
                        <input type="tel" class="required phone valid form-control" id="wardVoter" name="wardVoter" placeholder="Enter ward no">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="emailVoter">Email Address</label>
                        <input type="email" class="form-control" id="emailVoter" name="emailVoter" placeholder="Enter email  ">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="datev">Date Of Birth</label>
                        <input type="date" class="form-control" name="datev"id="datev">
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="passwordVoter">Password</label>
                        <input type="password" class="form-control" id="passwordVoter" name="passwordVoter" placeholder="Enter your password">
                     </div>

                        <div class="form-group"> 
                      
                            <label class="control-label" for="voterProof">Select Identity Proof
                            </label>

                        <select  class="form-controlselect" id="selectVProof" name="selectVProof"/>
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
//<?php
  /*$query="SELECT * FROM voting_system.voter";
  $connect=mysql_connect("localhost","root","");
  $result1=mysql_query($query,$connect);
  while($data=mysql_fetch_array($result1))
  {
    echo '<img src="data:image/*;base64,'.base64_encode($data['photo']).'"/>';
  }*/
?>