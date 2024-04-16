<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 2) {
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $item_id = $_GET['id'];
            
            $query = "DELETE FROM items WHERE id='$item_id'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            
            header("location: etalase.php");
            exit;
        } else {
            header("location: etalase.php");
            exit;
        }
    } else {
        header("location: super_admin_dashboard.php");
        exit;
    }
} else {
    header("location: login.php");
    exit;
}
?>