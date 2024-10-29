<?php
include 'components/config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

include 'components/add_cart.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Online</span>
                        <h3>Delicious Pizza</h3>
                        <a href="menu.php" class="btn">See Menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-1.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Online</span>
                        <h3>Cheezy Hamburger</h3>
                        <a href="menu.php" class="btn">See Menus</a>
                    </div>
                    <div class="image">
                        <img src="images/home-img-2.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
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

            <div class="swiper-pagination"></div>

        </div>
    </section>
    <!-- Home Section End -->

    <!-- Home Category Section Starts -->
    <section class="home-category">
        <h1 class="title">Food Category</h1>

        <div class="box-container">
            <a href="category.php?category=fast food" class="box">
                <img src="images/cat-1.png" alt="">
                <h3>Fast Food</h3>
            </a>
            <a href="category.php?category=Main Dish" class="box">
                <img src="images/cat-2.png" alt="">
                <h3>Main Dish</h3>
            </a>
            <a href="category.php?category=drinks" class="box">
                <img src="images/cat-3.png" alt="">
                <h3>Drinks</h3>
            </a>
            <a href="category.php?category=desserts" class="box">
                <img src="images/cat-4.png" alt="">
                <h3>Desserts</h3>
            </a>
        </div>
    </section>
    <!-- Home Category Section Ends -->

    <!-- Home Products Section Starts -->
    <section class="products">
        <h1 class="title">Latest Food</h1>
        <div class="box-container">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="" method="POST" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['name']; ?>">
                        <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                        <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" class="image" alt="">
                        <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                        <div class="name"><?= $fetch_products['name']; ?></div>
                        <div class="flex">
                            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                            <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<div class="empty">No Products Added Yet!</div>';
            }
            ?>

        </div>

        <div class="more-btn">
            <a href="menu.php" class="btn">Load More</a>
        </div>

    </section>
    <!-- Home Products Section Ends -->

    <!-- Footer Section Starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer Section Starts -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link -->
    <script src="js/script.js"></script>

    <script>
        var swiper = new Swiper(".home-slider", {
            effect: "flip",
            grabCursor: true,
            loop: true,
            pagination: {
                clickable: true,
                el: ".swiper-pagination",
            },
        });
    </script>

</body>

</html>