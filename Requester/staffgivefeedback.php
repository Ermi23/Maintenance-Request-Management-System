
<?php
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('includes/header.php'); 
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
     //echo "<script> location.href='submitfeedbacksuccess.php'; </script>";
     // include('submitrequestsuccess.php');
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your feedback </div>';
    }
  }
 }
?>


<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="staffgivefeedback.php" method="POST">
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

<!--
<html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  
 </title>
 Bootstrap CSS
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 Font Awesome CSS 
 <link rel="stylesheet" href="../css/all.min.css">

  Custome CSS -->
 <!--<link rel="stylesheet" href="../css/custom.css">
 <link rel="stylesheet" href="stylefeedback.css">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">Feedback Page</a>
 </nav>
<br>
<br>

 <div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="text-center mt-5 font-weight-bold" >Feedback</h2>
        <hr class="bg-white">
        <h5 class="text-center">Please Enter feedback below</h5><br>

      <form action="" method="POST">
        </div>
          </div>
        <div class="row">
        <div class="col-md-2"></div>
        <label class="col-md-4 font-weight-bold" >Full Name <br>
        <input type="text" id="text" name="sendername" required=" " placeholder="Daniel Yismaw">
        </label>
        <label class="col-md-4 font-weight-bold">Email <br>
        <input type="email" id="text" name="senderemail" required=" " placeholder="Provider@gmail.com">
        </label>
          </div>

          <div class="row">
        <div class="col-md-2"></div>
        
        <label class="col-md-4 font-weight-bold">Phone Number <br>
        <input type="text" id="text" name="senderphonenumber" required=" " placeholder="+25194612...." onkeypress="isInputNumber(event)">
        </label>
        <label class="col-md-4 font-weight-bold">Location <br>
        <input type="text" id="text" name="senderlocation" required=" " placeholder="Enter Block and Room Number">
        </label>
          </div>
          <div class="row">
          <div class="col-md-2"></div>  
        <label class="col-md-4 font-weight-bold">Date <br>
        <input type="date" id="text" name="feedbackdate" required=" ">
        </label>
        </div>

          
          <div class="row">
        <div class="col-md-2"></div>
        <label class="col-md-8 font-weight-bold">Message <br>
        <textarea  id="message" cols="48" rows="5" name="sendermessage" required=" " placeholder="Enter your message here"></textarea>
        </label></div>
      
        <div class="row">
        <div class="col-md-2"></div>
        
      
      
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 shadow-sm font-weight-bold" name="submitfeedback" >Submit</button>
            <a class="btn btn-primary ml-3 shadow-sm font-weight-bold" href="RequesterProfile.php">Back to Home</a></div>
      </form>
   
 </div>
</body>
</html>
-->