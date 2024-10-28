<?php

include 'components/config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Quick View</title>
</head>

<body>
    <!-- Header Section Starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- Header Section Ends -->

    <!-- Quick View Starts -->
    <section class="quick-view">
        <h1 class="title">Quick View</h1>
        <?php
        $pid = $_GET['pid'];
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $select_products->execute([$pid]);
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <form action="" method="POST" class="box">
                    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                    <input type="hidden" name="price" value="<?= $fetch_products['name']; ?>">
                    <input type="hidden" name="image" value="<?= $fetch_products['name']; ?>">
                    <img src="uploaded_img/<?= $fetch_products['image']; ?>" class="image" alt="">
                    <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                    <div class="name"><?= $fetch_products['name']; ?></div>
                    <div class="flex">
                        <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                        <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
                    </div>
                    <button type="submit" name="add_to_cart" class="cart-btn">Add to Cart</button>
                </form>
        <?php
            }
        } else {
            echo '<div class="empty">No Products Found!</div>';
        }
        ?>
    </section>
    <!-- Quick View Ends -->

    <!-- Footer Section Starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer Section Starts -->

    <!-- Custom JS File Link -->
    <script src="script.js"></script>
</body>

</html>