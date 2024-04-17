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
    $threadid = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $threadid";
    $result = mysqli_query($conn, $sql);

    // Posting Comment
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $showAlert = true;
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        $user = $_SESSION['useremail'];
        $sqlUser = "SELECT sno FROM `users` WHERE user_email = '$user'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $sno = $rowUser['sno'];

        $sql = "INSERT INTO `comments` (`comment`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$threadid', '$sno', current_timestamp());";
        mysqli_query($conn, $sql);
    }
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>Your comment has been posted.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="px-5 py-4 bg-body-tertiary border rounded-3">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $user = $row['thread_user_id'];
                $sqlUser = "SELECT user_email FROM `users` WHERE sno = $user";
                $resultUser = mysqli_query($conn, $sqlUser);
                $rowUser = mysqli_fetch_assoc($resultUser);
                echo '<h2 class="display-4">' . $row['thread_title'] . '</h2>
                        <p class="lead">' . $row['thread_body'] . '</p>
                        <span class="badge text-bg-primary rounded-pill" style="font-size: .9rem;">Posted by: <em>' . ucwords(substr($rowUser['user_email'], 0, strpos($rowUser['user_email'], '@')))  . '</em></span>';
            }
            ?>
        </div>
    </div>

    <!-- Comments Section starts here -->
    <div class="container">
        <h1 class="mt-5 mb-4">Discussions</h1>
        <?php
        $sql = "SELECT * FROM `comments` WHERE thread_id = $threadid";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $imgOf = "headshot";
            include 'partials/_unsplash.php';
            $noResult = false;
            $commentTime = date("F j, Y \a\\t g:ia", strtotime($row['comment_time']));

            $user = $row['comment_by'];
            $sqlUser = "SELECT user_email FROM `users` WHERE sno = $user";
            $resultUser = mysqli_query($conn, $sqlUser);
            $rowUser = mysqli_fetch_assoc($resultUser);

            echo '<div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img src="' . $imageUrl . '" alt="user image" class="rounded-circle" width="50px">
                    </div>
                    <div class="flex-grow-1 ms-3 text-secondary-emphasis">
                        <h6 class="fw-bold mb-0 text-light-emphasis">' . ucwords(substr($rowUser['user_email'], 0, strpos($rowUser['user_email'], '@'))) . ' 
                        <span class="fw-normal text-secondary">posted on ' . $commentTime . '</span></h6>' . $row['comment'] . '
                    </div>                
                </div>';
        }
        if ($noResult) {
            echo '<div class="alert alert-light" role="alert"><i class="bi bi-info-circle-fill me-2"></i><strong>No Comments Found! </strong>Be the first person to comment.</div>';
        }
        ?>
    </div>

    <hr class="my-4">

    <!-- Posting Comment Section starts here -->
    <?php
    echo '<div class="container"><h1 class="mb-3">Post a Comment</h1>';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Type your comment</label>
                        <textarea class="form-control" id="comment" rows="4" name="comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </form>';
    } else {
        echo '<div class="alert alert-light" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <strong>Please Login! </strong> to post a comment.
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