<?php

function check_if_added_to_cart($item_id) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
        require("common.php");

        $query = "SELECT * FROM user_item WHERE item_id=? AND user_id=? AND status=1;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ii", $item_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) >= 1) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

?>
