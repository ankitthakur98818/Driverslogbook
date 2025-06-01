<?php

$con = mysqli_connect('localhost','root','','project1(dlb)');
if(!$con){
    echo "connection to database failed".mysqli_connect_errno();
}


session_start(); // Ensure session is started if using session variables

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find user with matching email and password
    $query = "SELECT * FROM admin WHERE email = '$email' AND Password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) { // Check if at least one record matches
        // Login success: Fetch the user and set session variables
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email']; // Store email in session
        header("Location: ../dashboard/admindash/dashadmin.html"); // Redirect to dashboard
        exit();
    } else {
        // Invalid credentials
        $_SESSION['msg'] = "Invalid email or password!";
        header("Location: ../login/admilogin/adminlogin.html");
        exit();
    }
} else {
    // If email or password not set, redirect back to login page
    $_SESSION['msg'] = "Please provide both email and password!";
    header("Location: ../login/admilogin/adminlogin.html");
    exit();
}
?>

