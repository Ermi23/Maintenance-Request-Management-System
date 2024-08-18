<?php
define('TITLE', 'Rejected Requests');
define('PAGE', 'viewrejected');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5">
  <?php 
 $sql = "SELECT * FROM submitrequest_tb WHERE Approval='rejected' ";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Request Info</th>
      <th scope="col">Description</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["request_desc"].'</td>
   <td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-success" name="approve" value="approve"><i class="fa fa-check "></i>Approve</button></form></td>
  
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "No Rejected Requests Found";
  }
 if(isset($_REQUEST['approve'])){
   $sql = "UPDATE submitrequest_tb SET Approval='Approved' WHERE request_id = {$_REQUEST['id']}";
   if($conn->query($sql) === TRUE){
 echo "Request Approved Successfully";
      // below code will refresh the page after deleting the record
     echo '<meta http-equiv="refresh" content= "0;URL=?Approved" />';
          } else {
       echo "Unable to Approve";
       }
     }
  ?>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>