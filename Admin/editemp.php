<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['empupdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['Mobile'] == "") || ($_REQUEST['techaddress'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $eId = $_REQUEST['empId'];
    $eName = $_REQUEST['r_name'];
    $eemail = $_REQUEST['r_email'];
    $epassword = $_REQUEST['r_password'];
    $epassword2=md5($epassword);
    $eMobile = $_REQUEST['Mobile'];
    $eaddress = $_REQUEST['techaddress'];
  $sql = "UPDATE experts SET r_name = '$eName', r_email = '$eemail', r_password='$epassword2', Mobile = '$eMobile', techaddress = '$eaddress' WHERE r_login_id = '$eId'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Experts Detail</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM experts WHERE r_login_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="empId">Expert ID</label>
      <input type="text" class="form-control" id="empId" name="empId" value="<?php if(isset($row['r_login_id'])) {echo $row['r_login_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" id="Name" name="r_name" value="<?php if(isset($row['r_name'])) {echo $row['r_name']; }?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="r_email" value="<?php if(isset($row['r_email'])) {echo $row['r_email']; }?>">
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input type="password" class="form-control" id="pass" name="r_password" value="<?php if(isset($row['r_password'])) {echo $row['r_password']; }?>" required>
    </div>
    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="Mobile" value="<?php if(isset($row['Mobile'])) {echo $row['Mobile']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="techaddress" value="<?php if(isset($row['techaddress'])) {echo $row['techaddress']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
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