<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wizverse";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("An error has occurred: " . mysqli_connect_error());
}
