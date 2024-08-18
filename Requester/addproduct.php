<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
include('includes/header3.php'); 
include('../dbConnection.php');
session_start();

if(isset($_SESSION['is_login'])){
  $aEmail = $_SESSION['rEmail'];
} else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
}

if(isset($_REQUEST['psubmit'])){
  // Checking for Empty Fields
  if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
  } else {
    // Assigning User Values to Variable
    $SMEmail = $aEmail;
    $pname = $_REQUEST['pname'];
    $pdop = $_REQUEST['pdop'];
    $pava = $_REQUEST['pava'];
    $ptotal = $_REQUEST['ptotal'];
    $poriginalcost = $_REQUEST['poriginalcost'];
    $psellingcost = $_REQUEST['psellingcost'];
    $Reason = $_REQUEST['reason'];
    $sql = "INSERT INTO assets_tb (SMEmail, pname, pdop, pava, ptotal, poriginalcost, psellingcost, Reason) VALUES ('$SMEmail', '$pname', '$pdop','$pava', '$ptotal', '$poriginalcost', '$psellingcost', '$Reason')";
    if($conn->query($sql) == TRUE){
      // below msg display on form submit success
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
    } else {
      // below msg display on form submit failed
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    }
  }
}
?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Facility</h3>
  <form action="" method="POST">
    <?php if(isset($msg)) {echo $msg; } ?>

    <div class="form-group">
      <label for="pname">Email</label>
      <input type="text" class="form-control" id="email" value=" <?php echo $aEmail ?>" readonly>
    </div>

    <div class="form-group">
      <label for="pname">Facility Name</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="form-group">
      <label for="pdop">Date of Registration</label>
      <input type="date" class="form-control" id="pdop" name="pdop">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Brand Number</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="pname">Reason</label>
      <input type="text" class="form-control" id="reason" name="reason">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Post</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
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