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
    <title>Keranjang | Air Minum G-24</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid" id="content">
        <?php include 'includes/header.php'; ?>
        <div class="col-lg-4 col-md-6 ">
            <img src="img/confirmorder.png" style="float: left;">
        </div>
        <div class="row decor_bg">
            <div class="col-md-6">
                <table class="table table-striped">
                    <?php
                    $sum = 0;
                    $item=0;
                    $id='';
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT items.price AS Price, items.id AS id, items.name AS Name, user_item.jumlah_barang AS jumlah_barang 
                                FROM user_item 
                                JOIN items ON user_item.item_id = items.id 
                                WHERE user_item.user_id='$user_id' AND `status`=1";
                    $result = mysqli_query($con, $query)or die(mysqli_error($con));
                    if (mysqli_num_rows($result) >= 1) {
                        ?>
                        <thead>
                            <tr>
                                <th>Nomor Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $subtotal = $row["Price"] * $row["jumlah_barang"];
                                $item += $row["jumlah_barang"];
                                $sum += $subtotal;
                                $id .= $row["id"] . ", ";
                                echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["jumlah_barang"] . "</td><td>Rp " . $subtotal . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'>Remove</a></td></tr>";
                            }
                            $id = rtrim($id, ", ");
                            echo "<tr><td></td><td>Total</td> " . "<td>" . $item . "</td></td><td>Rp " . $sum . "</td><td><a href='success.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
                            ?>
                        </tbody>
                        <?php
                    } else {
                        echo "<tr><td colspan='5'>Keranjang Anda Kosong. Harap tambahkan barang ke dalam keranjang terlebih dahulu!</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
