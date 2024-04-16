<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php">Air Minum <span>G-24</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $query = "SELECT role FROM users WHERE id='$user_id'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
                $role = $row['role'];
                
                if($role == 0) { 
                    ?>
                    <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Pesan </a></li>
                    <li><a href = "settings.php"><span class = "glyphicon glyphicon-user"></span> Pengaturan</a></li>
                    <li><a href = "orderhistory.php"><span class = "glyphicon glyphicon-file"></span> Riwayat Pemesanan</a></li>
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    <?php
                } elseif($role == 1) {
                    ?>
                    <li><a href = "admin_dashboard.php"><span class = "glyphicon glyphicon-dashboard"></span> Dashboard Admin </a></li>
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    <?php
                } elseif($role == 2) {
                    ?>
                    <li><a href="super_admin_dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard Super Admin </a></li>
                    <li><a href="etalase.php"><span class="glyphicon glyphicon-list-alt"></span> Barang </a></li>
                    <li><a href="logout_script.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    <?php
                    }
                    
            } else {
                ?>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Daftar Akun</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="aboutus.php"><span class="glyphicon glyphicon-tasks"></span> Tentang</a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span> Kontak</a></li>
                <?php
            }
            ?>
            </ul>
        </div>
    </div>
</div>