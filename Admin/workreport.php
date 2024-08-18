<?php
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
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
 $sql = "SELECT * FROM report_tb WHERE seen='unseen'";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">File ID</th>
      <th scope="col">Name</th>
      <th scope="col">Name</th>
      <th scope="col">Position</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">File</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
     ?><tr>
    <td scope="row"><?php echo $row["report_id"]?></td>
    <td scope="row"><?php echo $row["fname"]?></td>
    <td scope="row"><?php echo $row["Email"]?></td>
    <td scope="row"><?php echo $row["position"]?></td>
    <td scope="row"><?php echo $row["descr"]?></td>
    <td scope="row"><?php echo $row["datee"]?></td>
    <td scope="row"><?php echo $row['pdf']?></td>
    <td>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["report_id"] .'><a href="../Reports/<?php echo $row["pdf"]?>"><button type="button" class="btn btn-danger" name="view" value="view">View</button></a></form>
    </td>
    
    
    </tr><?php
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Result";
  }
  // if(isset($_REQUEST['remove'])){
  //   $sql = "UPDATE report_tb SET seen='seen' WHERE report_id = {$_REQUEST['id']}";
  //   if($conn->query($sql) === TRUE){
  //     // echo "Record Deleted Successfully";
  //     // below code will refresh the page after deleting the record
  //     echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
  //     } else {
  //       echo "Unable to Remove Data";
  //     }
  //   }
  ?>
</div>
</div>
</div>

<?php
include('includes/footer.php'); 
?>

