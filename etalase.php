<?php
require("includes/common.php");

if(isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    
    if($role == 2) {
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
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Daftar Barang</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="add_item.php" class="btn btn-success">Tambah Barang</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM items";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_item.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_item.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
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
