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

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];

                $query = "UPDATE items SET name='$name', price='$price' WHERE id='$item_id'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));

                header("location: etalase.php");
                exit;
            }

            $query = "SELECT * FROM items WHERE id='$item_id'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "Item tidak ditemukan.";
                exit;
            }
        } else {
            header("location: etalase.php");
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Edit Item</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nama Barang:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Harga:</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
