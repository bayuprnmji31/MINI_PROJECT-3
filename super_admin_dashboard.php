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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h1 class="text-center">Super Admin Dashboard</h1>
    <div class="text-right mb-3">
        <a href="tambah_pelanggan.php" class="btn btn-success">Tambah Pelanggan</a>
    </div>
    <h2>Data Pelanggan</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM users WHERE role = 0";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die("Query error: " . mysqli_error($con));
            }
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
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


