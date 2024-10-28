<?php

include 'components/config.php';

session_start();

if(isset($_SESSION['user_id'])) {
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
    <title>Category</title>
</head>
<body>
    <!-- Header Section Starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- Header Section Ends -->

    <!-- Home Products Section Starts -->
    <section class="products">
        <h1 class="title">Food Category</h1>
        <div class="box-container">
            <?php
                $category = $_GET['category'];
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
                $select_products->execute([$category]);
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC))
                    {
            ?>
            <form action="" method="POST" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_products['name']; ?>">
                <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
                <img src="uploaded_img/<?= $fetch_products['image']; ?>" class="image" alt="">
                <div class="name"><?= $fetch_products['name']; ?></div>
                <div class="flex">
                    <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                    <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
                </div>
            </form>
            <?php
            }
                }else{
                    echo '<div class="empty">No Products Added Yet!</div>';
                }
            ?>

        </div>

    </section>
    <!-- Home Products Section Ends -->

    <!-- Footer Section Starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer Section Starts -->

    <!-- Custom JS File Link -->
    <script src="script.js"></script>

</body>
</html>