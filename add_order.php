<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $status = $_POST['status'];
        $date_time = $_POST['date_time'];
        $jumlah_barang = $_POST['jumlah_barang'];
        
        
        $query = "INSERT INTO user_item (user_id, item_id, status, date_time, jumlah_barang) 
                  VALUES ('$user_id', '$item_id', '$status', '$date_time', '$jumlah_barang')";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Query error: " . mysqli_error($con));
        }
        
        header("location: admin_dashboard.php");
        exit;
    }
    
    $user_query = "SELECT * FROM users WHERE role = 0"; 
    $user_result = mysqli_query($con, $user_query) or die(mysqli_error($con));

    $item_query = "SELECT * FROM items";
    $item_result = mysqli_query($con, $item_query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemesanan</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Tambah Pemesanan</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="user_id">Nama Pelanggan:</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">Pilih Pelanggan</option> <!-- Opsi default kosong -->
                        <?php while($user_row = mysqli_fetch_assoc($user_result)): ?>
                            <option value="<?php echo $user_row['id']; ?>"><?php echo $user_row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="item_id">Nama Barang:</label>
                    <select class="form-control" id="item_id" name="item_id" required>
                        <option value="">Pilih Barang</option> 
                        <?php while($item_row = mysqli_fetch_assoc($item_result)): ?>
                            <option value="<?php echo $item_row['id']; ?>"><?php echo $item_row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status Pesanan:</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
                <div class="form-group">
                    <label for="date_time">Tanggal dan Waktu Pemesanan:</label>
                    <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang:</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Pemesanan</button>
                <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php } else {
    header("location: login.php");
    exit;
} ?>
