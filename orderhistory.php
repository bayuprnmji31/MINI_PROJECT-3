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
    <title>Riwayat Pemesanan | Air Minum G-24</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid" id="content">
        <?php include 'includes/header.php'; ?>
        <div class="col-lg-4 col-md-6 ">
            <img src="img/cart.jpg" style="float: left;">
        </div>
        <div class="row decor_bg">
            <div class="col-md-6">
                <table class="table table-striped">
                    <?php
                    $totalItems = 0;
                    $totalPrice = 0;
                    $sum = 0;
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT items.price AS Price, items.id AS id, items.name AS Name, user_item.jumlah_barang AS JumlahBarang  
                                FROM user_item 
                                JOIN items ON user_item.item_id = items.id 
                                WHERE user_item.user_id='$user_id' AND user_item.status=2";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    if (mysqli_num_rows($result) >= 1) {
                        ?>
                        <h1 style="margin-bottom: 20px; font-weight: 20;"><center>Riwayat Pemesanan</center></h1>
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Waktu pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $subtotal = $row["Price"] * $row["JumlahBarang"];
                                $totalItems += $row["JumlahBarang"];
                                $totalPrice += $subtotal;
                                $sum += $totalPrice;
                                echo '<tr>';
                                echo '<td><a href="order.php">' . $row["Name"] . '</a></td>';
                                echo '<td>' . $row["JumlahBarang"] . '</td>';
                                echo '<td>Rp. ' . $subtotal . '</td>';
                                $query_time = "SELECT date_time FROM user_item WHERE item_id='" . $row['id'] . "' AND user_id='$user_id' AND status=2";
                                $result_time = mysqli_query($con, $query_time) or die(mysqli_error($con));
                                $time_row = mysqli_fetch_array($result_time);
                                echo '<td>' . $time_row["date_time"] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <td colspan="1"><b>Total</b></td>
                                <td><?php echo $totalItems; ?></td>
                                <?php echo '<td>Rp. ' . $sum . '</td>'; ?>
                                <td></td>
                            </tr>
                        </tbody>
                        <?php
                    } else {
                        echo "<tr><td colspan='4'>Anda tidak memiliki riwayat pemesanan</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
