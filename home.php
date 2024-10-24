<?php
include 'components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Home</title>
</head>
<body>

    <!-- Header Section Starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- Header Section Ends -->

    <!-- Home Section Starts -->
    <section class="home">
        <div class="home-slider">
            <div class="w">
                <div class="slide">
                    <div class="content">
                        <span>Order Online</span>
                        <h3>Delicious Pizza</h3>
                        <a href="menu.php" class="btn">See Menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-1.png" alt="">
                    </div>
                </div>

                <div class="slide">
                    <div class="content">
                        <span>Order Online</span>
                        <h3>Cheezy Hamburger</h3>
                        <a href="menu.php" class="btn">See Menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-2.png" alt="">
                    </div>
                </div>

                <div class="slide">
                    <div class="content">
                        <span>Order Online</span>
                        <h3>Roasted Chicken</h3>
                        <a href="menu.php" class="btn">See Menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section Starts -->

    <!-- Footer Section Starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer Section Starts -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- Custom JS File Link -->
    <script src="script.js"></script>

</body>
</html>