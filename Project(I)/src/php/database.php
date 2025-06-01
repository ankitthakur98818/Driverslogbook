 <?php
// Database connection 
include_once('./databasecon.php');


// $con = mysqli_connect('localhost','root','','project1(dlb)');
// if(!$con){
//     echo "connection to database failed".mysqli_connect_errno();
//     die;
// }




// Collect form data
// $name = $_POST['fullnameH'];
// $username =$_POST['usernameH'];
// $email= $_POST['emailH'];
// $phone = $_POST['phoneH'];
// $password = $_POST['passwordH'];
// $confirmpassword =$_POST['confirmpasswH'];




// // Validation patterns
// $namePattern = "/^[a-zA-Z\s]{3,40}$/";
// $usernamePattern = "/^[a-zA-Z]+[0-9]+$/";
// $emailPattern = "/^[a-zA-Z0-9._%+-]+@gmail\.com$/";
// $phonePattern = "/^[0-9]{10}$/";
// $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/";

// // Server-side validation
// if (
//     preg_match($namePattern, $name) &&
//     preg_match($usernamePattern, $username) &&
//     preg_match($emailPattern, $email) &&
    
//     preg_match($passwordPattern, $password)
// ) {
//     // Insert data into the database
//     $ins ="Insert into registration (Fullname, Username, Email, PhoneNumber, password, 	Confirmpass)
//     values('$fullname', '$username', '$email','$phone','$password','$confirmpassword')";
//     $res = mysqli_query($con, $ins);

//     if (!$res) {
//         echo "Insertion Failed";
//     } else {
//         echo "Successful Insertion";
//     }
// } else {
//     echo "Invalid form data. Please try again.";
// }






// collecting info from reg-form   

$fullname = $_POST['fullnameH'];
 $username = $_POST['usernameH'];
 $email = $_POST['emailH'];
 $phoneNumber= $_POST['phoneH'];
 $passwordJ = $_POST['passwordH'];
 $confirmpassword = $_POST['confirmpasswH'];

 $checkemail =" Select * from registration where Email='$email'";
 $result=$con->query($checkemail);

 if($result->num_rows>0){
    echo '<script>alert("email already exists")</script>';
    
 }

 else{
    $insertQuery ="Insert into registration (Fullname, Username, Email, PhoneNumber, password, 	Confirmpass)
    values('$fullname', '$username', '$email','$phoneNumber','$passwordJ','$confirmpassword')";

    if($con->query($insertQuery)==True){
        echo '<script>alert("Registration successful")</script>';
        header("Location: ../login/login.html");

    }
    else{
        echo "error".$con->error;
    }
    }

   
// }




?>