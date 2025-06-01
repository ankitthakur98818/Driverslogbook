<?php
require('./databasecon.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find user with matching username and password
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login success: Fetch the user and set session variables
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email'];  // Store username in session
        header("Location: ../dashboard/admindash/dashadmin.html");  // Redirect to dashboard
        exit();
    } else {
        // Invalid credentials
        $_SESSION['msg'] = "Invalid email or password!";
        header("Location: ../adminlogin/adminlogin.html");
        exit();
    }
}
?>