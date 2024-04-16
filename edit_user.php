<?php
require("includes/common.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        
        $query = "UPDATE users SET name='$name', email='$email' WHERE id='$user_id'";
        mysqli_query($con, $query) or die(mysqli_error($con));
        
        header("location: super_admin_dashboard.php");
        exit;
    }

    $query = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    if(!$row) {
        header("location: super_admin_dashboard.php");
        exit;
    }
} else {
    header("location: super_admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?? ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?? ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="super_admin_dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
