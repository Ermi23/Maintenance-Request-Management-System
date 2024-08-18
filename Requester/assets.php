<?php
define('TITLE', 'Assests');
define('PAGE', 'assets');
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
  <!--Table-->
  <p class=" bg-dark text-white p-2">Facility Details</p>
  <?php
    $sql = "SELECT * FROM assets_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Facility ID</th>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Available</th>
        <th scope="col">Total</th>
        <th scope="col">Original Cost Each</th>
        <th scope="col">Brand Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo '<tr>
        <th scope="row">'.$row["pid"].'</th>
        <td>'.$row["pname"].'</td>
        <td>'.$row["pdop"].'</td>
        <td>'.$row["pava"].'</td>
        <td>'.$row["ptotal"].'</td>
        <td>'.$row["poriginalcost"].'</td>
        <td>'.$row["psellingcost"].'</td>
        <td>
          <form action="editproduct.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["pid"] .'><button type="submit" class="btn btn-info" name="view" value="View">Update</button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["pid"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete">Delete</button></form>
          
        </td>
      </tr>';
    }
    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>

<a class="btn btn-danger box" href="addproduct.php">Register Facility</a>
</div>

<?php
include('includes/footer.php'); 
?>