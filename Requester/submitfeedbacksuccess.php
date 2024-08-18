<?php
define('TITLE', 'Success');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
  $rEmail = $_SESSION['rEmail'];
} else {
   echo "<script> location.href='RequesterLogin.php'; </script>";
}
$sql = "SELECT * FROM feedback WHERE ID = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
   $row = $result->fetch_assoc();
   echo "<div class='ml-5 mt-5'>
   <table class='table'>
     <tbody>
        <tr>
         <th>Feedback ID</th>
         <td>".$row['ID']."</td>
        </tr>
        <tr>
          <th>Full Name</th>
          <td>".$row['FullName']."</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>".$row['Email']."</td>
        </tr>
        <tr>
          <th>Phone Number</th>
          <td>".$row['Phone']."</td>
        </tr>
        <tr>
          <th>Location</th>
          <td>".$row['fedLocation']."</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>".$row['fedDate']."</td>
        </tr>
        <tr>
          <th>Position</th>
          <td>".$row['Position']."</td>
        </tr>
        <tr>
          <th>Message</th>
          <td>".$row['fedMessage']."</td>
        </tr>
        <tr>
          <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
        </tr>
      </tbody>
    </table> 
  </div>
 ";

} else {
  echo "Failed";
}
?>


<?php
include('includes/footer.php'); 
$conn->close();
?>