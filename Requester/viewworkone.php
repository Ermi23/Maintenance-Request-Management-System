<?php
define('TITLE', 'Assigned Tasks');
define('PAGE', 'viewworkone');
include('includes/header2.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>
<div class="col-sm-6 mt-5  mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="task">Enter your Email: </label> 
      <input type="text" class="form-control ml-3" id="task" name="task">
    </div>
    <button type="submit" class="btn btn-danger" name="task">View</button>
  </form>
    <?php
    if (isset($_REQUEST['task'])) {
        $task = $_REQUEST['task'];

        $sql = "SELECT * FROM assignwork_tb WHERE expertemail = '$rEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            ?>
            <h3 class="text-center mt-5">Tasks</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Request Info</th>
                        <th>Request Description</th>
                        <th>Name</th>
                        <th>Block Number</th>
                        <th>Room Number</th>
                        <th>Block Type</th>
                        <th>Campus</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Assigned Date</th>
                        <th>Expert Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo isset($row['request_id']) ? $row['request_id'] : ''; ?></td>
                            <td><?php echo isset($row['request_info']) ? $row['request_info'] : ''; ?></td>
                            <td><?php echo isset($row['request_desc']) ? $row['request_desc'] : ''; ?></td>
                            <td><?php echo isset($row['requester_name']) ? $row['requester_name'] : ''; ?></td>
                            <td><?php echo isset($row['requester_add1']) ? $row['requester_add1'] : ''; ?></td>
                            <td><?php echo isset($row['requester_add2']) ? $row['requester_add2'] : ''; ?></td>
                            <td><?php echo isset($row['requester_block']) ? $row['requester_block'] : ''; ?></td>
                            <td><?php echo isset($row['requester_campus']) ? $row['requester_campus'] : ''; ?></td>
                            <td><?php echo isset($row['requester_email']) ? $row['requester_email'] : ''; ?></td>
                            <td><?php echo isset($row['requester_mobile']) ? $row['requester_mobile'] : ''; ?></td>
                            <td><?php echo isset($row['assign_date']) ? $row['assign_date'] : ''; ?></td>
                            <td><?php echo isset($row['assign_tech']) ? $row['assign_tech'] : ''; ?></td>
                            <td>
                                <form class="d-print-none d-inline" action="viewworkone.php">
                                    <input class="btn btn-secondary" type="submit" value="Close">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo '<div class="alert alert-dark mt-4" role="alert"> No tasks assigned for you </div>';
        }
    }
    ?>
</div>
<!-- Only Number for input fields -->
<?php
include('includes/footer.php');
?>