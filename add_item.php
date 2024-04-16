<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 2) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $query = "INSERT INTO items (name, price) VALUES ('$name', '$price')";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));

            header("location: etalase.php"); 
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Tambah Item</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nama Barang:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Harga:</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Barang</button>
                <a href="etalase.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
    } else {
        header("location: etalase.php");
        exit;
    }
} else {
    header("location: login.php");
    exit;
}
?>