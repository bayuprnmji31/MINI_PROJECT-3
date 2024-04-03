<?php
require("includes/common.php");

session_start();

if(isset($_SESSION['user_id'])) {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $item_id = $_GET["id"]; 
        $user_id = $_SESSION['user_id'];
        
        $query = "DELETE FROM user_item WHERE item_id='$item_id' AND user_id='$user_id' AND status= 1";
        $res = mysqli_query($con, $query) or die(mysqli_error($con));
        
        header("location:cart.php");
        exit;
    } else {
        echo "ID item tidak valid.";
    }
} else {
    header("location: login.php");
    exit;
}
?>
