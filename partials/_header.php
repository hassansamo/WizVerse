<?php
session_start();
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../wizverse">
            <img src="img/logo.png" alt="website logo" style="width: 115px; height: 35px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="../wizverse">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../wizverse/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Top Categories </a>
                    <ul class="dropdown-menu">';
$sql = "SELECT category_name, category_id FROM `categories` LIMIT 5";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li><a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
}
echo '</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../wizverse/contact.php">Contact</a>
                </li>
            </ul>

            <!-- Search Section -->
            <form class="d-flex input-group" role="search" style="width: 20%;" method="GET" action="search.php">
                <input class="form-control" type="search" placeholder="Search" name="query" required>
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <!-- Login/Logout and Signup Buttons -->';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $imgOf = "headshot";
    $orientation = "squarish";
    include 'partials/_unsplash.php';
    echo '<a href="#" data-bs-toggle="tooltip" data-bs-title="Welcome, ' . ucwords(substr($_SESSION['useremail'], 0, strpos($_SESSION['useremail'], '@'))) . '" data-bs-placement="bottom"><img src="' . $imageUrl . '" alt="user image" class="rounded-circle mx-3 img-thumbnail" width="50px"></a>';
    echo '<a class="btn btn-danger" href="./partials/_logout.php" role="button">Logout</a>';
} else {
    echo '<button class="btn btn-success me-2 ms-4" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>';
}
echo '</div></div></nav>';
?>
<?php require '_login.php' ?>
<?php require '_signup.php' ?>
<?php
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '
    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <i class="bi bi-check-circle-fill me-1"></i><strong>Success!</strong> You can login now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-1"></i><strong>Error!</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if (isset($_GET['loggedin']) && $_GET['loggedin'] == "false") {
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-1"></i><strong>Error!</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if (isset($_GET['query']) && $_GET['query'] == "posted") {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Your message has been sent!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}

?>