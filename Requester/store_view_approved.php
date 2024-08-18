<?php
define('TITLE', 'ViewApprovedRequests');
define('PAGE', 'store_view_approved');
include('includes/header3.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_login'])){
  $aEmail = $_SESSION['rEmail'];
 } else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
<p class=" bg-dark text-white p-2">Approved Requests</p>
  <?php 
 $sql = "SELECT * FROM submitrequest_tb where Approval='Approved' AND storeview='unseen'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
    <th scope="col">Request ID</th>
    <th scope="col">Request Info</th>
      <th scope="col">Requester Name</th>
      <th scope="col">Date</th>
      <th scope="col">Location</th>
      <th scope="col">Approval</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["request_date"].'</td>
    <td>'.$row["requester_block"].'</td>
    <td>'.$row["Approval"].'</td>
    <td>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete">Remove</i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "UPDATE submitrequest_tb SET storeview='seen' WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>