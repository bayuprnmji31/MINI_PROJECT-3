<?php

require("includes/common.php");

if (isset($_SESSION['email'])) {
  header('location: products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selamat Datang Air Minum G-24</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px;">
        <?php
        include 'includes/header.php';
        ?>
        <div id="content">
            <div id = "banner_image">
                <div class="container"> 
                    <center>
                        <div id="banner_content">
                            <h1>Selamat Datang G-24ners.</h1>
                            <p>Nikmati setitik air untuk sejuta umat! </p>
                            <br/>
                            <a href="products.php" class="btn btn-danger btn-lg active">Pesan Sekarang</a>
                        </div>
                    </center>
                </div>
            </div>
            
            <div class="container">
                <div class="row text-center" id="item_list">
                    <style>
                    .row {
                        display: flex;
                        flex-wrap: wrap;
                    }
                    .col-sm-4 {
                        margin-bottom: 20px;
                    }
                    </style>
                    <div class="col-sm-4">
                        <a href="login.php" >
                            <div class="thumbnail">
                                <img src="images/aqua.jpg">
                                <div class="caption">
                                    <h3>AQUA Original</h3>
                                    <p>Terasa Dingin Alami</p>
                                </div>
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="login.php" >
                            <div class="thumbnail">
                                <img src="images/dc.jpeg" style= "height: 274px;">
                                <div class="caption">
                                    <h3>DC Original</h3>
                                    <p>Lokal, Handal, dan Halal.</p>
                                </div>
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="login.php" >
                            <div class="thumbnail">
                                <img src="images/isi.jpeg" style="height: 274px;">
                                <div class="caption">
                                    <h3>Air G-24</h3>
                                    <p>Nikmatnya setitik air untuk sejuta umat.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'includes/footer.php';
        ?>
    </body> 
</html>