<?php
session_start();

// Periksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah jawaban CAPTCHA benar
    if (isset($_SESSION['captcha_answer']) && isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha_answer']) {
        // Jawaban CAPTCHA benar, lanjutkan dengan login
        require("includes/common.php");

        // Escape input pengguna untuk keamanan
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password = md5($password); // Gunakan md5 untuk enkripsi password (perhatikan, metode ini tidak disarankan karena keamanannya yang rendah)

        // Query untuk memeriksa kredensial pengguna
        $query = "SELECT id, email FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $num = mysqli_num_rows($result);

        if ($num == 0) {
            $error = "Silakan periksa email dan password Anda, apakah sudah benar?";
            setcookie('login_error', $error, time() + 60); // Simpan pesan error dalam cookie selama 60 detik
            header('location: login.php');
            exit;
        } else {
            $row = mysqli_fetch_array($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location: products.php');
            exit;
        }
    } else {
        // Jawaban CAPTCHA salah, arahkan kembali ke halaman login
        $error = "Jawaban CAPTCHA tidak benar. Silakan coba lagi.";
        setcookie('login_error', $error, time() + 60); // Simpan pesan error dalam cookie selama 60 detik
        header('location: login.php');
        exit;
    }
} else {
    // Jika formulir tidak disubmit, arahkan kembali ke halaman login
    header('location: login.php');
    exit;
}
?>