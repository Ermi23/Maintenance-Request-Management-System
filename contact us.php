<!DOCTYPE html>
<html>
<head>
    <title>Contact Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
        }
        textarea {
            height: 100px;
        }
        .submit-btn {
            background-color: white;
            color: red;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <?php
        // Check if the form is submitted
        if(isset($_POST['submit'])){
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

            // Get form data
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Prepare and execute the SQL query to insert the data into the database
            $sql = "INSERT INTO message (full_name, email, message) VALUES ('$fullname', '$email', '$message')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="success-msg">Message saved successfully!</div>';
            } else {
                echo '<div class="error-msg">Error: ' . $sql . '<br>' . $conn->error . '</div>';
            }

            // Close the database connection
            $conn->close();
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" name="submit" class="submit-btn">Submit</button>
           
        </form>
    </div>
    <a href="index.php"> <button>Back to home</button> </a>
</body>
</html>
