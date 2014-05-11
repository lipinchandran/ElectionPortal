<?php
   require_once('include/fpdf/fpdf17/fpdf.php');
   require_once('include/connection.php');
   
   if (isset($_POST['txtid'])) 
   {
     $id=$_POST['txtid'];
     $query="select * from voter where v_id='$id';";
     $result=mysql_query($query);
     $count=mysql_num_rows($result);
     if ($count==1) 
     {
     $data=mysql_fetch_array($result);
     $row=mysql_fetch_assoc($result);
     $vid=$data['v_id'];
     $name=$data['name'];
     $surname=$data['surname'];
     $father=$data['father_name'];
     $birth=$data['DOB'];
     $gender=$data['gender'];
     $image=$row['photo'];
     $address=$data['address'];
     $email=$data['email_id'];
     $mobile=$data['mobile'];
     $ward=$data['ward_no'];
     $proof=$data['voter_id_proof'];
     $pdf=new fpdf();
     $pdf->AddPage();
     $pdf->SetFont('Times','',15);
     $pdf->Cell(20,10,'Voter ID: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$vid,0,1);
     $pdf->Cell(13,10,'Name: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$name,0,1);
     $pdf->Cell(10,10,'Surname: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$surname,0,1);
     $pdf->Cell(20,10,'Father Name: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$father,0,1);
     $pdf->Cell(20,10,'Date of Birth: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$birth,0,1);
     $pdf->Cell(20,10,'Gender: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$gender,0,1);
     $pdf->Cell(20,10,'Photo: ');
     $pdf->Setx(50);
     $pdf->Image('G:\mobile backup\Camera\20130511_142441.jpg',51,73,40,25);
     $pdf->Cell(20,10,' ',0,1);
     $pdf->Cell(20,10,' ',0,1);
     $pdf->Cell(20,10,' ',0,1);
     $pdf->cell(20,10,'address: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$address,0,1);
     $pdf->Cell(20,10,'Email ID: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$email,0,1);
     $pdf->Cell(20,10,'Mobile NO.: ');
     $pdf->Setx(50);
     $pdf->Cell(20,10,$mobile,0,1);
     $pdf->Cell(20,10,'Ward NO.: ');
     $pdf->Setx(50);
     $pdf->cell(20,10,$ward,0,1);
     $pdf->cell(20,10,'ID Proof');
     $pdf->Setx(50);
     $pdf->cell(20,10,$proof,0,1);
     

     $pdf->Output();
     }
     else
     {
      echo "<script language='javascript'>";
      echo "alert('Please Enter Your Valid Voter Id');";
      echo "</script>";
     }
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
      <form id="candidate-form" action="" role="form" method="post" enctype="multipart/form-data">
                <legend class="text-primary">Candidate Registeration Form</legend>
                      <div class="form-group">
                        <label class="control-label" for="nameCandid">Voter ID</label>
                        <input type="text" class="form-control" id="txtid" name="txtid" placeholder="Enter Voter Id to create pdf">
                      </div>

                      
                      <button type="submit" class="btn-hg btn-3d btn-green btn-greenh" id="btnsubmit" name="btnsubmit">Submit</button>
                      
                    
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
