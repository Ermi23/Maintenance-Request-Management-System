<?php    
if(session_id() == '') {
  session_start();
}
if(isset($_SESSION['is_adminlogin'])){
 $aEmail = $_SESSION['aEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
}
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_REQUEST['approve'])){
  // Checking for Empty Fields
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requesterblock'] == "") || ($_REQUEST['requestercampus'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") ){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $rid = $_REQUEST['request_id'];
    $rinfo = $_REQUEST['request_info'];
    $rdesc = $_REQUEST['requestdesc'];
    $rname = $_REQUEST['requestername'];
    $radd1 = $_REQUEST['address1'];
    $radd2 = $_REQUEST['address2'];
    $rblock = $_REQUEST['requesterblock'];
    $rcampus = $_REQUEST['requestercampus'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
  
    $sql = "UPDATE submitrequest_tb SET Approval = 'Approved' WHERE request_id = '$rid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Approved Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Approve Request </div>';
    }
  }
  }
 

  if(isset($_REQUEST['reject'])){
    // Checking for Empty Fields
    if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requesterblock'] == "") || ($_REQUEST['requestercampus'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") ){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $rid = $_REQUEST['request_id'];
      // $rinfo = $_REQUEST['request_info'];
      // $rdesc = $_REQUEST['requestdesc'];
      // $rname = $_REQUEST['requestername'];
      // $radd1 = $_REQUEST['address1'];
      // $radd2 = $_REQUEST['address2'];
      // $rblock = $_REQUEST['requesterblock'];
      // $rcampus = $_REQUEST['requestercampus'];
      // $remail = $_REQUEST['requesteremail'];
      // $rmobile = $_REQUEST['requestermobile'];
    
      $sql = "UPDATE submitrequest_tb SET Approval = 'rejected' WHERE request_id = '$rid'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Rejected Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Reject Request </div>';
      }
    }
    }
 ?>
<div class="col-sm-5 mt-5 jumbotron">
  <!-- Main Content area Start Last -->
  <form action="" method="POST">
  <?php if(isset($msg)) {echo $msg; } ?>
    <h5 class="text-center">Request Approval Form</h5>
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="request_info">Request Info</label>
      <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>"readonly>
    </div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?>"readonly>
    </div>
    <div class="form-group">
      <label for="requestername">Name</label>
      <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>"readonly>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Block Number</label>
        <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>"readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="address2">Room Number</label>
        <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>"readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">Block Type</label>
        <input type="text" class="form-control" id="requestercity" name="requesterblock" value="<?php if(isset($row['requester_block'])) {echo $row['requester_block']; }?>"readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">Campus</label>
        <input type="text" class="form-control" id="requesterstate" name="requestercampus" value="<?php if(isset($row['requester_campus'])) { echo $row['requester_campus']; } ?>"readonly>
      </div>
      
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>"readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>"
          onkeypress="isInputNumber(event)"readonly>
      </div>
    </div>
    <div class="float-right">

      <button type="submit" class="btn btn-success" name="approve">Approve</button>
      <button type="submit" class="btn btn-secondary" name="reject">Reject</button>
      
    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>