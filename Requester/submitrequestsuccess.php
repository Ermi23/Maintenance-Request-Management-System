<?php
define('TITLE', 'Success');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
  $rEmail = $_SESSION['rEmail'];

}
else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
}
$sql = "SELECT * FROM submitrequest_tb WHERE requester_email = {$_SESSION['rEmail']}";
$result = $conn->query($sql);

//while($row = mysqli_fetch_assoc($result))

if($result->num_rows == 1)
  {
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
            <table class='table'>
              <tbody>
                <tr>
                  <th>Request ID</th>
                  <td>".$row['request_id']."</td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td>".$row['requester_name']."</td>
                </tr>
                <tr>
                  <th>Mobile Number</th>
                  <td>".$row['requester_mobile']."</td>
                </tr>
                <tr>
                  <th>Campus</th>
                  <td>".$row['requester_campus']."</td>
                </tr>
                <tr>
                  <th>Email ID</th>
                  <td>".$row['requester_email']."</td>
                </tr>
                <tr>
                  <th>Request Info</th>
                  <td>".$row['request_info']."</td>
                </tr>
                <tr>
                  <th>Request Description</th>
                  <td>".$row['request_desc']."</td>
                </tr>
              </tbody>
            </table> 
          </div>";
  }
else {
  echo "Failed";
}
?>
<?php
  include('includes/footer.php'); 
  $conn->close();
?>