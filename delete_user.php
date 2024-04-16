<?php
require("includes/common.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    $query = "DELETE FROM users WHERE id='$user_id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    
    header("location: super_admin_dashboard.php");
    exit;
} else {
    header("location: super_admin_dashboard.php");
    exit;
}
?>
