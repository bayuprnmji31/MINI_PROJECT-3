<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $order_id = $_POST['order_id'];
        $jumlah_barang = $_POST['jumlah_barang'];
        $item_id = $_POST['item_id'];

        $query = "UPDATE user_item SET jumlah_barang='$jumlah_barang', item_id='$item_id' WHERE id='$order_id'";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Query error: " . mysqli_error($con));
        }
        
        header("location: admin_dashboard.php");
        exit;
    }
    else {
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $order_id = $_GET['id'];

            $query = "SELECT user_item.*, items.name AS item_name 
                      FROM user_item 
                      JOIN items ON user_item.item_id = items.id 
                      WHERE user_item.id='$order_id'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                header("location: admin_dashboard.php");
                exit;
            }
        } else {
            header("location: admin_dashboard.php");
            exit;
        }
    }
}
else {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Edit Pemesanan</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="item_id">Nama Barang:</label>
                    <select class="form-control" id="item_id" name="item_id" required>
                        <option value="">Pilih Barang</option>
                        <?php 
                        $item_query = "SELECT * FROM items";
                        $item_result = mysqli_query($con, $item_query) or die(mysqli_error($con));
                        while($item_row = mysqli_fetch_assoc($item_result)): ?>
                            <option value="<?php echo $item_row['id']; ?>"><?php echo $item_row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang:</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo isset($row['jumlah_barang']) ? $row['jumlah_barang'] : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            </form>
        </div>
    </div>
</div>
</body>
</html>
