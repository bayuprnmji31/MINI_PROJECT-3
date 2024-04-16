<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 1) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];

            $delete_query = "DELETE FROM user_item WHERE id='$order_id'";
            $delete_result = mysqli_query($con, $delete_query) or die(mysqli_error($con));

            header("location: admin_dashboard.php");
            exit;
        } else {
            header("location: admin_dashboard.php");
            exit;
        }
    } else {
        header("location: admin_dashboard.php");
        exit;
    }
} else {
    header("location: login.php");
    exit;
}
?>
