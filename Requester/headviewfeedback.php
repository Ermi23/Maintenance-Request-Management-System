<?php
define('TITLE', 'View Feedback');
define('PAGE', 'headviewfeedback');
include('includes/header1.php'); 
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
 $sql = "SELECT * FROM feedback";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Feedback ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Location</th>
      <th scope="col">Date</th>
      <th scope="col">Message</th>
      <th scope="col">Position</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["ID"].'</th>
    <td>'.$row["FullName"].'</td>
    <td>'.$row["Email"].'</td>
    <td>'.$row["Phone"].'</td>
    <td>'.$row["fedLocation"].'</td>
    <td>'.$row["fedDate"].'</td>
    <td>'.$row["fedMessage"].'</td>
    <td>'.$row["Position"].'</td>
    <td>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["ID"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM feedback WHERE ID = {$_REQUEST['id']}";
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