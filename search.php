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

    <!-- Search Results -->
    <div class="container my-4" style="min-height: 80vh;">
        <?php
        $search = $_GET['query'];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_body) against ('$search') LIMIT 5";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            echo '<h1 class="text-center">Search results for <em>"' . $_GET['query'] . '"</em></h1><hr class="mb-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="result mb-4">
                        <h3 class="fs-4"><a href="./thread.php?threadid=' . $row['thread_id'] . '" class="link-light link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover">' . $row['thread_title'] . '</a></h3>
                        <p>' . $row['thread_body'] . '</p>
                    </div>';
            }
        } else {
            echo '<h1 class="text-center mt-5">No search results found for <em>"' . $_GET['query'] . '"</em><h1>';
        }


        ?>
        <!-- template
    -->

    </div>
    <?php require 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>