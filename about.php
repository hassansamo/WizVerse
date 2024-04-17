<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpeg">


</head>

<body data-bs-theme="dark">
    <?php require 'partials/_dbconnect.php' ?>
    <?php require 'partials/_header.php' ?>
    <h1 class="text-center mt-4 fw-bold">About Us</h1>
    <div class="container py-2">

        <!-- About Us -->
        <div class="container">
            <div class="imgBox rounded mb-2" style="height:500px;">
                <?php
                $imgOf = "office,building";
                $filter = "&content_filter=low";
                $orientation = "landscape";
                include 'partials/_unsplash.php';
                echo '<img src="' . $imageUrl . '" alt="office building" class="object-fit-fill" style="height:100%; width:100%">';
                ?>
            </div>
            <p style="text-align: justify;" class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis doloremque commodi ipsa consequatur tempora deleniti, deserunt repudiandae a nulla illum repellendus voluptate in eaque hic veniam mollitia et culpa reiciendis, quis repellat accusamus quisquam ut quos! Quisquam expedita necessitatibus deleniti repudiandae, perspiciatis deserunt eum placeat ea dolore minima aliquam velit.</p>
        </div>

        <hr class="my-4">

        <!-- Our Motivation -->
        <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0">
                <?php
                $imgOf = "corporate,office";
                $filter = "&content_filter=high";
                $orientation = "squarish";
                include 'partials/_unsplash.php';
                echo '<img src="' . $imageUrl . '" class="rounded-start" alt="corporate image" style="width: 225px">';
                ?>
            </div>
            <div class="flex-grow-1 ms-4" style="text-align: justify;">
                <p class="fs-3 fw-semibold mb-0">Our Motivation</p> sit amet consectetur adipisicing elit. Nisi, quas. Soluta tenetur ducimus assumenda pariatur inventore quas iure illo? Doloremque possimus, architecto repellat, eveniet at quos maiores animi quidem ratione, placeat perferendis. Reiciendis quas iusto in assumenda ipsum deleniti ipsam itaque numquam eaque quos perferendis sed aperiam laudantium nisi exercitationem quaerat iste, vero repellendus ex? Corrupti incidunt recusandae quos, doloremque blanditiis quod quisquam sequi sit nostrum quia iste. Asperiores illo qui ratione facilis fugiat dolor dolore eligendi a non amet aperiam itaque vel recusandae beatae ducimus nulla, sed ipsum unde tenetur! Dolor deleniti quo harum perspiciatis, tempora in similique voluptatem eaque doloribus autem eveniet sint, provident ut earum! Autem dolore nobis minus quas reprehenderit aliquam numquam commodi porro veniam harum. Et, incidunt accusantium?
            </div>
        </div>
        <!-- Our Vision -->
        <div class="d-flex align-items-center mb-4">
            <div class="flex-grow-1 me-4" style="text-align: justify;">
                <p class="fs-3 fw-semibold mb-0">Our Vision</p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem at aperiam asperiores corporis facere suscipit quibusdam rerum nulla dignissimos consectetur aut obcaecati eveniet, cum error reiciendis dolorum fugiat laborum deserunt sit, autem tenetur? Autem dolore, distinctio doloribus incidunt vero voluptatum possimus quasi quia, minima fugiat vitae perspiciatis culpa quam pariatur odio fuga voluptate officiis perferendis aliquam. Dolore accusamus quidem illum ratione blanditiis modi error, nostrum impedit iure ipsa omnis consequatur velit ex est recusandae nam vero nulla nihil? Ea totam ab a ullam vero eius, autem dolor. Vero dolor similique deserunt veniam cum quos accusantium, tempore ut voluptates accusamus praesentium!
            </div>
            <div class="flex-shrink-0">
                <?php
                $imgOf = "employer,employee";
                $filter = "&content_filter=high";
                $orientation = "squarish";
                include 'partials/_unsplash.php';
                echo '<img src="' . $imageUrl . '" class="rounded-end" alt="employees" style="width: 225px">';
                ?>
            </div>
        </div>
        <!-- About CEO  -->
        <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0">
                <?php
                $imgOf = "headshot,male,formal";
                $filter = "&content_filter=low";
                $orientation = "squarish";
                include 'partials/_unsplash.php';
                echo '<img src="' . $imageUrl . '" class="rounded-start" alt="CEO" style="width: 225px">';
                ?>
            </div>
            <div class="flex-grow-1 ms-4" style="text-align: justify;">
                <p class="fs-3 fw-semibold mb-0">Mr.Wiz</p> sit amet consectetur adipisicing elit. Nisi, quas. Soluta tenetur ducimus assumenda pariatur inventore quas iure illo? Doloremque possimus, architecto repellat, eveniet at quos maiores animi quidem ratione, placeat perferendis. Reiciendis quas iusto in assumenda ipsum deleniti ipsam itaque numquam eaque quos perferendis sed aperiam laudantium nisi exercitationem quaerat iste, vero repellendus ex? Corrupti incidunt recusandae quos, doloremque blanditiis quod quisquam sequi sit nostrum quia iste. Asperiores illo qui ratione facilis fugiat dolor dolore eligendi a non amet aperiam itaque vel recusandae beatae ducimus nulla, sed ipsum unde tenetur! Dolor deleniti quo harum perspiciatis, tempora in similique voluptatem eaque doloribus autem eveniet sint, provident ut earum! Autem dolore nobis minus quas reprehenderit aliquam numquam commodi porro veniam harum. Et, incidunt accusantium?
            </div>
        </div>

        <div class="fw-semibold lh-base mb-5" style="text-align: justify;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure possimus quas ipsa amet. Ab a doloribus, laboriosam dicta delectus libero velit deserunt expedita neque harum error laudantium, dignissimos cum necessitatibus magni quo amet eaque, ex aliquam suscipit optio? Cumque placeat, voluptates labore pariatur sed ea numquam asperiores expedita dicta dolorum alias quam ex in praesentium nemo ut unde modi tempora itaque non beatae tempore explicabo dolor autem? Distinctio quae iusto eaque assumenda dolore unde, quibusdam reprehenderit voluptas excepturi adipisci id quis pariatur ipsam provident odio quidem neque perferendis? Voluptas voluptatum necessitatibus beatae optio eveniet corporis. Molestias laborum, libero quas fugiat explicabo aspernatur. Aliquam iste laborum molestias vitae excepturi cupiditate ut dolorem blanditiis delectus saepe obcaecati soluta corporis enim repudiandae illum accusantium, est tempore culpa. Id sit dolores dolorum nobis minima accusamus reprehenderit perferendis autem necessitatibus!
        </div>
    </div>
    <?php require 'partials/_footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>