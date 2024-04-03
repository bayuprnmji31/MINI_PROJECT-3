<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak | Air Minum G-24</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container" id="content">
    <div class="row">
        <div class="col-lg-6">
            <img src="img/contact.png" class="img-fluid float-right" alt="Contact Image">
            <h1>Hubungi Kami</h1>
            <p class="p1">
                Halo, kami siap membantu Anda.<br>
                Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan tentang produk, pembayaran, atau pengiriman pesanan.<br>
                Terkait pembayaran, kami hanya akan menerima pesanan yang telah dibayar di muka, untuk menghindari pembayaran tunai dan menjaga jarak sosial.<br>
                Terkait keterlambatan pengiriman pesanan, harap dicatat bahwa kami berusaha keras untuk mengirimkan pesanan Anda tepat waktu, namun pesanan Anda mungkin mengalami keterlambatan karena situasi saat ini (atau keadaan yang tidak terduga). Namun demikian, kami pastikan pesanan Anda akan segera dikirimkan.<br>
                Jika Anda memiliki pertanyaan lain, silakan isi formulir di bawah ini, dan tim kami akan menghubungi Anda dalam waktu 24 jam.<br>
                Anda juga dapat menghubungi nomor yang tertera di bawah ini untuk segera berbicara dengan petugas layanan pelanggan kami.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <h1>Informasi Perusahaan</h1>
                <p class="p1">Samarinda, Indonesia</p>
                <p class="p1">Phone : +628 1220009575</p>
                <p class="p1">Email : support@airminumg24.com</p>
            </div>
            <h1>Hubungi kami</h1>
            <div class="float-left">
                <form action="mailto:bayupurnamaaji3@gmail.com" method="post" enctype="text/plain">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" autofocus class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" name="message" placeholder="Message" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
