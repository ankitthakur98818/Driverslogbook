<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $location = $_POST['location'];
    $km = $_POST['km'];
    $duration = $_POST['duration'];

    // Connect to database (update with your DB details)
    $con = mysqli_connect('localhost','root','','project1(dlb)');
    if(!$con){
        echo "connection to database failed".mysqli_connect_errno();
    }
    

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into logs table
    $sql = "INSERT INTO log (date, location, km, duration) VALUES ('$date', '$location', '$km', '$duration')";

    if ($con->query($sql) === TRUE) {
        echo '<script> alter ("New log saved successfully")</script>';
        header("Location: ../dashboard/dash.html");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
