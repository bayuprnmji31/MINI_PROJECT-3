<?php
session_start();

$operators = array('+', '-', '*');
$operator = $operators[array_rand($operators)];
$num1 = rand(1, 10);
$num2 = rand(1, 10);
switch ($operator) {
    case '+':
        $captcha_question = "$num1 + $num2";
        $captcha_answer = $num1 + $num2;
        break;
    case '-':
        $captcha_question = "$num1 - $num2";
        $captcha_answer = $num1 - $num2;
        break;
    case '*':
        $captcha_question = "$num1 * $num2";
        $captcha_answer = $num1 * $num2;
        break;
}

$_SESSION['captcha_answer'] = $captcha_answer;

$login_time = time();
setcookie('login_time', $login_time,  time() + (86400 * 30),"/");

if (isset($_SESSION['email']) && isset($_COOKIE['login_time'])) {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Air Minum G-24</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div id="content">
        <div class="container-fluid decor_bg" id="login-panel">
            <div class="col-lg-4 col-md-6">
                <img src="images/bk1.jpeg" style="max-width:1650%; height:auto;">
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>LOGIN</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning"><i>Login untuk melakukan pemesanan</i></p>
                            <?php
                            if (isset($_GET['error'])) {
                                echo "<p class='text-danger'>{$_GET['error']}</p>";
                            }
                            ?>
                            <form action="login_submit.php" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" autofocus="on" name="email" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="captcha">CAPTCHA:</label>
                                    <input type="text" class="form-control" id="captcha" name="captcha" required="true">
                                    <small>Enter the result of <?php echo $captcha_question; ?>:</small>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                            </form><br />
                        </div>
                        <div class="panel-footer">
                            <p>Apakah anda tidak memiliki akun? <a href="signup.php">Daftar Akun</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>