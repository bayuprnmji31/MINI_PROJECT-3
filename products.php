<?php
require("includes/common.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Produk | Air Minum G-24</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        <div class="container" id="content">
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Selamat Datang Pelanggan G-24!</h1>
                <p>Nikmati pelayanan kami dengan handal, kami memberikan pelayanan terbaik!</p>

            </div>
            <hr>
            <div class="row text-center" id="">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/dc.jpeg" alt="">
                        <div class="caption">
                            <h3>DC original 19 Liter </h3>
                            <p>Harga: Rp 28.000,-/botol </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(1)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>



                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/aqua.jpg" alt="">
                        <div class="caption">
                            <h3>AQUA Original 19 Liter </h3>
                            <p>Harga: Rp 48.000,-/botol </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="2">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(2)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/isi.jpeg" style="height: 225px;" alt="">
                        <div class="caption">
                            <h3>Air G-24 19 Liter</h3>
                            <p>Harga: Rp 7.000,-/botol</p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="3">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(3)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/alkaline.jpg" style="height: 225px;" alt="">
                        <div class="caption">
                            <h3>Air Alkaline 19 Liter</h3>
                            <p>Harga: Rp 61.000,-/botol</p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(4)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="watches">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/kgn.jpeg" style="height: 253px;" alt="">
                        <div class="caption">
                            <h3>Kangen Water 19 Liter </h3>
                            <p>Harga: Rp. 80.000,-/botol </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(5)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/leminerale.jpeg" style="height: 253px;" alt="">
                        <div class="caption">
                            <h3>Lee Minerale 19 Liter</h3>
                            <p>Harga: Rp. 20.000,-/botol</p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(6)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/club.jpg" alt="">
                        <div class="caption">
                            <h3>Air Galon CLUB 19 Liter</h3>
                            <p>Harga: Rp. 20.000,-/botol </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(7)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="images/vit.jpg" alt="">
                        <div class="caption">
                            <h3>Air Galon VIT 19 Liter</h3>
                            <p>Harga: Rp. 96.000,-/botol </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Beli Sekarang</a></p>
                            <?php } else { ?>
                            <form action="cart-add.php" method="POST">
                                <input type="hidden" name="product_id" value="1">
                                <div class="form-group">
                                    <label for="quantity">Jumlah:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <?php if (check_if_added_to_cart(8)) { ?>
                                    <button type="button" class="btn btn-block btn-success" disabled>Ditambahkan ke keranjang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-block btn-primary" name="add_to_cart">Tambah ke keranjang</button>
                                <?php } ?>
                            </form>
                            <?php } ?>
                            </a>
                        </div>
                    </div>




                </div>
            </div>
            <hr>
        </div>

        <?php include("includes/footer.php"); ?>
    </body>

</html>