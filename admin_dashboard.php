<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 1) {
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </head>
        <body>
        <?php include 'includes/header.php'; ?>
            <h2>Daftar Pesanan Pelanggan</h2>
            <div class="mb-3 text-right">
                <a href="add_order.php" class="btn btn-success">Tambah Pemesanan </style></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Barang</th>
                        <th>Total Harga</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status Pesanan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT user_item.*, users.name AS customer_name, users.address AS customer_address, items.name AS item_name, items.price AS item_price FROM user_item 
                    JOIN users ON user_item.user_id = users.id 
                    JOIN items ON user_item.item_id = items.id";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $i = 1;
                    $total_price = 0;
                    $total_quantity = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $total_price += $row['item_price'] * $row['jumlah_barang'];
                        $total_quantity += $row['jumlah_barang'];
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['customer_address']; ?></td>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['jumlah_barang']; ?></td>
                            <td><?php echo $row['item_price']; ?></td>
                            <td><?php echo $row['item_price'] * $row['jumlah_barang']; ?></td>
                            <td><?php echo $row['date_time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="edit_order.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <form method="post" action="delete_order.php">
                                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="text-right"><b>Total</b></td>
                        <td><b><?php echo $total_quantity; ?></b></td>
                        <td colspan="2"><b><?php echo $total_price; ?></b></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>
        <?php
    } else {
        header("location: admin_dashboard.php");
        exit;
    }
} else {
    header("location: login.php");
    exit;
}
?>
