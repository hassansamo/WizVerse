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

    <!-- Slider starts here -->
    <div id="carouselIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" style="background-color: white;"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" style="background-color: white;"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" style="background-color: white;"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/slider-img/slider-img-1.jpeg" class="d-block w-100" alt="slider image 1" height="600">
            </div>
            <div class="carousel-item">
                <img src="./img/slider-img/slider-img-2.jpeg" class="d-block w-100" alt="slider image 2" height="600">
            </div>
            <div class="carousel-item">
                <img src="./img/slider-img/slider-img-3.jpeg" class="d-block w-100" alt="slider image 3" height="600">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" style="filter: none;"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" style="filter: none;"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts here -->
    <div class="container my-3">
        <h2 class="text-center my-3">WizVerse - Browse Categories</h2>
        <div class="row py-4">
            <!-- Fetching all the categories and traversing each of them -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-3">
                        <div class="card mb-5" style="width: 18rem;">
                            <img src="./img/card-img/' . $row['category_id'] . '.png" class="card-img-top" alt="' . $row['category_name'] . '">
                            <div class="card-body">
                                <h5 class="card-title"><a href="./threadlist.php?catid=' . $row['category_id'] . '" class="link-light link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover">' . $row['category_name'] . '</a></h5>
                                <p class="card-text">' . substr($row['category_description'], 0, 60) . '...</p>
                                <a href="./threadlist.php?catid=' . $row['category_id'] . '" class="btn btn-primary">View Threads</a>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>