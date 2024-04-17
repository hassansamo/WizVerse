<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    // Checking whether if the email even exists
    $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            header("location: ../index.php?loggedin=true");
            exit;
        } else {
            $showError = "Invalid Password.";
        }
    } else {
        $showError = "Email doesn't exist.";
    }
    header("location: ../index.php?loggedin=false&error=$showError");
    exit;
}
