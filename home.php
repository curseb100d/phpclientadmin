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
    
    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Home</title>
</head>
<body>

    <!-- Header Section Starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- Header Section Ends -->

    <!-- Footer Section Starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer Section Starts -->
    
    <!-- Custom JS File Link -->
    <script src="script.js"></script>

</body>
</html>