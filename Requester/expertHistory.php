<?php
define('TITLE', 'History');
define('PAGE', 'History');
include('includes/header2.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_login'])){
  $aEmail = $_SESSION['rEmail'];
 } else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5">
  <?php 
 $sql = "SELECT * FROM submitrequest_tb WHERE requester_email='$aEmail'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Date</th>
      <th scope="col">Approval</th>
      <th scope="col">Assigned</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["request_date"].'</td>
    <td>'.$row["Approval"].'</td>
    <td>'.$row["Assigned"].'</td>
    <td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-success" name="remove" value="remove">Remove</button></form></td>
  
   
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "Your Request History Is Appear Here";
  }
  if(isset($_REQUEST['remove'])){
    $sql = "UPDATE submitrequest_tb SET trash='seen' WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
  echo "Request Removed Successfully";
       // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?Removed" />';
           } else {
        echo "Unable to Remove";
        }
      }
  ?>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>