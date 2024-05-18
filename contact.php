<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpeg">


</head>

<body data-bs-theme="dark">
    <?php require 'partials/_dbconnect.php' ?>
    <?php require 'partials/_header.php' ?>
    <?php
    ?>
    <h1 class="text-center mt-4 fw-bold">Contact Us</h1>
    <div class="container py-4 mb-5" style="min-height: 70vh;">
        <form class="row g-3" method="POST" action="./partials/_handleContact.php">
            <div class="col-md-6">
                <label for="userName" class="form-label">Username</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>
            <div class="col-md-6">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
            </div>
            <div class="col-12">
                <label for="message" class="form-label">What can we help you with?</label>
                <textarea class="form-control" id="message" rows="8" name="message" required></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <?php require 'partials/_footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>