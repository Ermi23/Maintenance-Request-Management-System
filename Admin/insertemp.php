<?php
define('TITLE', 'Add New Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['empsubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['empName'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "") || ($_REQUEST['Mobile'] == "") || ($_REQUEST['sex'] == "") || ($_REQUEST['address'] == "") || ($_REQUEST['profes'] == "") || ($_REQUEST['regdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  $sql = "SELECT r_email FROM experts WHERE r_email='".$_REQUEST['email']."'";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
    $msg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Exist </div>';
  }else {
   // Assigning User Values to Variable
   $eName = $_REQUEST['empName'];
   $eemail = $_REQUEST['email'];
   $epass = $_REQUEST['password'];
   $epass2=md5($epass);
   $eMobile = $_REQUEST['Mobile'];
   $sex = $_REQUEST['sex'];
   $eaddress = $_REQUEST['address'];
   $profes = $_REQUEST['profes'];
   $regdate = $_REQUEST['regdate'];
   $sql = "INSERT INTO experts (r_name, r_email, r_password, Mobile, sex, techaddress, profession, regdate) VALUES ('$eName', '$eemail','$epass2','$eMobile', '$sex', '$eaddress', '$profes', '$regdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Registered Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
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
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input type="password" class="form-control" id="pass" name="password">
    </div>
    <div class="form-group">
      <label for="Mobile">Mobile</label>
      <input type="text" class="form-control" id="Mobile" name="Mobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="sex">Sex</label>
      <input type="text" class="form-control" id="sex" name="sex" placeholder="Male / Female">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
      <label for="profession">Profession</label>
      <input type="text" class="form-control" id="profession" name="profes">
    </div>
    <div class="form-group">
      <label for="regdate">Registration Date</label>
      <input type="date" class="form-control" id="regdate" name="regdate">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Register</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>