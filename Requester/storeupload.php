<?php
define('TITLE', 'Upload Files');
define('PAGE', 'storeupload');
include('includes/header3.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_login'])){
  $aEmail = $_SESSION['rEmail'];
 } else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
 }
 if(isset($_POST['upload'])){
    // Checking for Empty Fields
    if(($_REQUEST['file'] == " ")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $rname=$_POST['name'];
      $email=$_POST['email'];
      $rpos=$_POST['position'];
      $rdesc=$_POST['desc'];
      $rdate=$_POST['date'];
      
      $pdf = $_FILES['file']['name'];
      $pdf_type = $_FILES['file']['type'];
      $pdf_size = $_FILES['file']['size'];
      $pdf_loc = $_FILES['file']['tmp_name'];
      $pdf_store="../Reports/".$pdf;
if (move_uploaded_file($pdf_loc,$pdf_store)) {
  $sql = "INSERT INTO report_tb(pdf, fname, position, descr, datee) VALUES ('$pdf', '$rname', '$rpos', '$rdesc', '$rdate')";
  if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $genid = mysqli_insert_id($conn);
   $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Report Uploaded Successfully </div>';

  
  }
}
      
      
      else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to upload your report </div>';
      }
    }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload files</title>
</head>
<body>
<div class="col-sm-6 mt-5">
  <form action="upload.php" class="mx-5" method="POST" upload_max_filesize=10M post_max_size=11M enctype="multipart/form-data">
    <?php if(isset($msg)) {echo $msg; } ?>
  <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>

    
    <div class="form-group">
      <label for="pos">Position</label>
      <input type="text" class="form-control" id="pos" name="position" required placeholder="Store Manager">
    </div>
    <div class="form-group">
      <label for="input">Report Description</label>
      <input type="text" class="form-control" id="input" name="desc" required>
    </div>
    <div class="form-group">
      <label for="input">Date</label>
      <input type="date" class="form-control" id="input" name="date" required>
    </div>

    <div class="form-group">
      <label for="inputfile">Choose Your Report</label>
      <input type="file" class="form-control" id="inputfile" name="file" accept="pdf" value=" " required>
    </div>
    <button type="submit" class="btn btn-danger" name="upload">Upload</button>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
</body>
</html>

<?php
include('includes/footer.php'); 
?>