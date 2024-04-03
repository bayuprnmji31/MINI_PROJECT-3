<?php
require("includes/common.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_SESSION['user_id'])) {
    if (isset($_POST['product_id']) && is_numeric($_POST['product_id']) && isset($_POST['quantity']) && is_numeric($_POST['quantity'])) {
        $item_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];



        $query = "INSERT INTO `user_item`(`user_id`, `item_id`, `status`, `jumlah_barang`) VALUES($user_id, $item_id, 1, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $_POST['quantity']);
        mysqli_stmt_execute($stmt) or die(mysqli_error($con));
        
        header('location: products.php');
        exit;
    }
} else {
    header('location: login.php');
    exit;
}
?>
