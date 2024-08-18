
<?php
define('TITLE', 'Feedback');
define('PAGE', 'requesters');
include('includes/header2.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitfeedback'])){
  // Checking for Empty Fields
  if(($_REQUEST['sendername'] == "") || ($_REQUEST['senderemail'] == "") || ($_REQUEST['senderphone'] == "") || ($_REQUEST['senderlocation'] == "") || ($_REQUEST['feedbackdate'] == "") || ($_REQUEST['sendermessage'] == "") || ($_REQUEST['position'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $rname = $_REQUEST['sendername'];
    $remail = $_REQUEST['senderemail'];
    $rphone = $_REQUEST['senderphone'];
    $rlocation = $_REQUEST['senderlocation'];
    $rdate = $_REQUEST['feedbackdate'];
    $rmess = $_REQUEST['sendermessage'];
    $rpos = $_REQUEST['position'];
    
    $sql = "INSERT INTO feedback(FullName, Email, Phone, fedLocation, fedDate, fedMessage, Position) VALUES ('$rname','$remail','$rphone', '$rlocation', '$rdate', '$rmess', '$rpos')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $genid = mysqli_insert_id($conn);
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Feedback Submitted Successfully Your' . $genid .' </div>';
     //session_start();
     //$_SESSION['myid'] = $genid;
     //echo "<script> location.href='feedbacksuccess.php'; </script>";
    
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your feedback </div>';
    }
  }
 }
?>


<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="givefeedback.php" method="POST">
  <?php if(isset($msg)) {echo $msg; } ?>
    <div class="form-group">
      <label for="Full Name">Full Name</label>
      <input type="text" class="form-control" id="Full Name" placeholder="Enter Full Name" name="sendername">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="senderemail">
    </div>
   
    <div class="form-group ">
        <label for="inputphone">Phone Number</label>
        <input type="text" class="form-control" id="inputphone" placeholder="Enter Phone Number" name="senderphone">
    </div> 

    <div class="form-group ">
        <label for="inputlocation">Location</label>
        <input type="text" class="form-control" id="inputlocation" placeholder="Enter Block and Room Number" name="senderlocation">
    </div>
   
    
    <div class="form-group col-md-6">
        <label for="inputdate">Date</label>
        <input type="date" class="form-control" id="inputdate" name="feedbackdate">   
    </div>

    <div class="form-group">
        <label for="inputposition">Position</label>
        <input type="text" class="form-control" id="inputposition" name="position" placeholder="Enter your work position on orginization">   
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputmessage">Message <br>
        <textarea name="sendermessage" cols="80" rows="5" id="inputmessage" placeholder="Enter your message here"></textarea></label>
      </div> 
    </div>

    

    <button type="submit" class="btn btn-primary" name="submitfeedback">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
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
$conn->close();
?>
