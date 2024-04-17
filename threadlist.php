<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to WizVerse - Wisdom Realm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpeg">


</head>

<body data-bs-theme="dark">
    <?php require 'partials/_dbconnect.php' ?>
    <?php require 'partials/_header.php' ?>
    <?php
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $catid";
    $result = mysqli_query($conn, $sql);
    ?>
    <?php
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $showAlert = true;
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);
        $body = str_replace("<", "&lt;", $body);
        $body = str_replace(">", "&gt;", $body);

        $user = $_SESSION['useremail'];
        $sqlUser = "SELECT sno FROM `users` WHERE user_email = '$user'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $sno = $rowUser['sno'];
        $sql = "INSERT INTO threads (thread_title, thread_body, thread_cat_id, thread_user_id, timestamp) VALUES ('$title', '$body', '$catid', '$sno', current_timestamp())";
        mysqli_query($conn, $sql);
    }
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><strong>Success! </strong> Your thread has been added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>
    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="p-5 bg-body-tertiary border rounded-3">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h2 class="display-4">Welcome to ' . $row['category_name'] . ' forums</h2>
                        <p class="lead">' . $row['category_description'] . '</p>';
            }
            ?>
            <hr class="my-4">
            <p class="mb-0">This is a peer to peer forum so: </p>
            <ul>
                <li>No Spam / Advertising / Self-promote in the forums is not allowed.</li>
                <li>Do not post copyright-infringing material.</li>
                <li>Do not post "offensive" posts, links, or images.</li>
                <li>Remain respectful of other members at all times.</li>
            </ul>
            <button class="btn btn-success" type="button">Learn More</button>
        </div>
    </div>

    <!-- Questions Section starts here -->
    <div class="container">
        <h1 class="mt-5 mb-4">Browse Questions</h1>
        <?php
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $catid";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $imgOf = "headshot";
            include 'partials/_unsplash.php';
            $noResult = false;
            $commentTime = date("F j, Y \a\\t g:ia", strtotime($row['timestamp']));

            $user = $row['thread_user_id'];
            $sqlUser = "SELECT user_email FROM `users` WHERE sno = $user";
            $resultUser = mysqli_query($conn, $sqlUser);
            $rowUser = mysqli_fetch_assoc($resultUser);
            echo '<div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img src="' . $imageUrl . '" alt="user image" class="rounded-circle" width="50px">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <h6 class="fw-bold mb-0 text-light-emphasis">' . ucwords(substr($rowUser['user_email'], 0, strpos($rowUser['user_email'], '@'))) . ' <span class="fw-normal text-secondary-emphasis">posted on ' . $commentTime . '</span></h6>
                    <h5 class="mb-1"><a class = "link-light link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover" href="./thread.php?threadid=' . $row['thread_id'] . '">' . $row['thread_title'] . '</a></h5>' . $row['thread_body'] . '
                    </div>
                </div>';
        }
        if ($noResult) {
            echo '<div class="alert alert-light" role="alert"><i class="bi bi-info-circle-fill me-2"></i><strong>No Threads Found! </strong>Be the first person to ask a question.</div>';
        }
        ?>
    </div>

    <hr class="mt-5 mb-4">

    <!-- Post Thread Section starts here -->
    <?php
    echo '<div class="container"><h1 class="mb-4">Start a Discussion</h1>';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div id="titleHelp" class="form-text">Keep the problem title as concise as possible.</div>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Elaborate the problem</label>
                    <textarea class="form-control" id="body" rows="4" name="body" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>';
    } else {
        echo '<div class="alert alert-light" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <strong>Please Login! </strong> to start a Discussion.
            </div>';
    }
    echo '</div>';
    ?>

    <?php require 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>