<?php
define('TITLE', 'Add New Store Manager');
define('PAGE', 'Storemanager');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['reqsubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['r_name'] == "") || ($_REQUEST['r_address'] == "") || ($_REQUEST['r_phone'] == "") || ($_REQUEST['r_sex'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "") || ($_REQUEST['regdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  $sql = "SELECT r_email FROM storemanager WHERE r_email='".$_REQUEST['r_email']."'";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
    $msg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Exist </div>';
  }else {
   // Assigning User Values to Variable
   $rname = $_REQUEST['r_name'];
   $address = $_REQUEST['r_address'];
   $phone = $_REQUEST['r_phone'];
   $sex = $_REQUEST['r_sex'];
   $rEmail = $_REQUEST['r_email'];
   $rPassword = $_REQUEST['r_password'];
   $rPassword2=md5($rPassword);
   $regdate = $_REQUEST['regdate'];
   $sql = "INSERT INTO storemanager (r_name, r_email, r_password, s_address, s_phone, s_sex, regdate) VALUES ('$rname', '$rEmail', '$rPassword2', '$address', '$phone', '$sex', '$regdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Registered Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Register </div>';
   }
 }
 }
}
?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Registration Form</h3>
  <form action="" method="POST">
  <?php if(isset($msg)) {echo $msg; } ?>
    <div class="form-group">
      <label for="r_name">Full Name</label>
      <input type="text" class="form-control" id="r_name" name="r_name">
    </div>
    <div class="form-group">
      <label for="r_address">Address</label>
      <input type="text" class="form-control" id="r_address" name="r_address">
    </div>
    <div class="form-group">
      <label for="r_phone">Phone Number</label>
      <input type="number" class="form-control" id="r_phone" name="r_phone">
    </div>
    <div class="form-group">
      <label for="r_sex">Sex</label>
      <input type="text" class="form-control" id="r_sex" name="r_sex">
    </div>
    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="email" class="form-control" id="r_email" name="r_email">
    </div>
    <div class="form-group">
      <label for="r_password">Password</label>
      <input type="password" class="form-control" id="r_password" name="r_password">
    </div>
    <div class="form-group">
      <label for="regdate">Registration Date</label>
      <input type="date" class="form-control" id="regdate" name="regdate">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
      <a href="Storemanager.php" class="btn btn-secondary">Close</a>
    </div>
    
  </form>
</div>

<?php
include('includes/footer.php'); 
?>