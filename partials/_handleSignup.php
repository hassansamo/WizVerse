<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '_dbconnect.php';
    $email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupCPassword'];

    // Checking whether if the email already exists
    $existSQL = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $existSQL);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $showError = "Email already in use.";
    } else {
        if ($pass != $cpass) {
            $showError = "Passwords do not match.";
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$email', '$pass', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location: ../index.php?signupsuccess=true");
                exit;
            }
        }
    }
    header("location: ../index.php?signupsuccess=false&error=$showError");
    exit;
}
