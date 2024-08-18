<?php
define('TITLE', 'Work Report');
define('PAGE', 'storeworkreport');
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
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div> <span> to </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
  <?php
 if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM assets_tb WHERE pdop BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
     echo '
  <p class=" bg-dark text-white p-2 mt-4">Report</p>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Facility ID</th>
      <th scope="col">Name</th>
      <th scope="col">Available</th>
      <th scope="col">Total</th>
      <th scope="col">Brand Number</th>
      <th scope="col">Date</th>
      <th scope="col">Reason</th>
     
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["pid"].'</th>
    <td>'.$row["pname"].'</td>
    <td>'.$row["pava"].'</td>
    <td>'.$row["ptotal"].'</td>
    <td>'.$row["psellingcost"].'</td>
    <td>'.$row["pdop"].'</td>
    <td>'.$row["Reason"].'</td>
    
 
      </tr>';
    }
    echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found On The Date You Specified ! </div>";
  }
 }
  ?>
</div>
</div>
</div>

<?php
include('includes/footer.php'); 
?>