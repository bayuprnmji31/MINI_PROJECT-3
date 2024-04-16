<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 2) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO users (name, email, password, contact, address, city, role) VALUES ('$name', '$email', '$password', '$contact', '$address', '$city', 0)";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die("Query error: " . mysqli_error($con));
            }
            
            header("location: super_admin_dashboard.php");
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Tambah Pelanggan</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="contact">Kontak:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">Kota:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <a href="super_admin_dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
    } else {
        header("location: index.php");
        exit;
    }
} else {
    header("location: login.php");
    exit;
}
?>