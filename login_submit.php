<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['captcha_answer']) && isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha_answer']) {
        require("includes/common.php");

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password = md5($password);
        $query = "SELECT id, email, role FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $error = "Silakan periksa email dan password Anda, apakah sudah benar?";
            setcookie('login_error', $error, time() + 60);
            header('location: login.php');
            exit;
        } else {
            $row = mysqli_fetch_array($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            setcookie('email', $row['email'], time() + (86400 * 30), '/');
            setcookie('user_id', $row['id'], time() + (86400 * 30), '/');

            if($row['role'] == 0) { 
                header('location: products.php');
                exit;
            } elseif($row['role'] == 1) {
                header('location: admin_dashboard.php');
                exit;
            } elseif($row['role'] == 2) {
                header('location: super_admin_dashboard.php');
                exit;
            }
        }

    } else {
        $error = "Jawaban CAPTCHA tidak benar. Silakan coba lagi.";
        setcookie('login_error', $error, time() + 60);
        header('location: login.php');
        exit;
    }
} else {
    header('location: login.php');
    exit;
}
?>

<!-- Place this part in your login.php file -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login_submit.php" method="POST">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" autofocus="on" name="email" required="true">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="true">
        </div>
        <div class="form-group">
            <label for="captcha">CAPTCHA:</label>
            <input type="text" class="form-control" id="captcha" name="captcha" required="true" placeholder="Enter the result of <?php echo $captcha_question; ?>">
            <small>Enter the result of <?php echo $captcha_question; ?>:</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
    </form><br/>

    <?php
    // Display login error alert if set
    if (isset($_COOKIE['login_error'])) {
        echo "<script>alert('" . $_COOKIE['login_error'] . "');</script>";
        setcookie('login_error', '', time() - 3600); // Delete cookie after use
    }
    ?>
</body>
</html>
