<!DOCTYPE html>
<html>
<head>
    <title>View Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 600px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View Messages</h2>
        <?php
        
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mrms_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



include('includes/header.php'); 
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }


        // Retrieve messages from the database
        $sql = "SELECT * FROM message";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Full Name</th><th>Email</th><th>Message</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['full_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<div class="no-messages">No messages found.</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>