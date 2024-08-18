<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header1.php'); 
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
  <p class=" bg-dark text-white p-2">List of Experts</p>
  <?php
    $sql = "SELECT * FROM experts";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Experts ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Mobile Number</th>
    <th scope="col">Address</th>
   
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["r_login_id"].'</th>';
    echo '<td>'. $row["r_name"].'</td>';
    echo '<td>'.$row["r_email"].'</td>';
    echo '<td>'.$row["Mobile"].'</td>';
    echo '<td>'.$row["techaddress"].'</td>';
    
    echo '</tr>';
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}

?>
</div>
</div>

</div>

<?php
include('includes/footer.php'); 
?>