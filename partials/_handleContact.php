<?php
// $_SESSION['useremail'];
$queryAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '_dbconnect.php';
    $inquirer_name = $_POST['userName'];
    $inquirer_email = $_POST['userEmail'];
    $query = $_POST['message'];
    $query = str_replace("<", "&lt;", $query);
    $query = str_replace(">", "&gt;", $query);

    $sql = "INSERT INTO `queries` (`inquirer_name`, `inquirer_email`, `query`, `query_issue_dt`) VALUES ('$inquirer_name', '$inquirer_email', '$query', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $queryAlert = true;
        header("location: ../contact.php?query=posted");
        exit;
    }
}
