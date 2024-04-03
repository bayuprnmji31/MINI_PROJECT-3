<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pemesanan | Air Minum G-24</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Pesanan Anda telah berhasil. Terima kasih telah berlangganan dengan kami.</h3><hr>
                      <p align="center">Pesanan Anda akan dikirim dalam 2 hari</p><hr>
                    <p align="center">Klik <a href="products.php">di sini</a> untuk membeli barang lain.</p>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php");
        ?>
    </body>
</html>
</html>