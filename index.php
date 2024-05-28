<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubhara Jaya</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="assets/gambar/logo.png" class="bi me-2" width="50" height="50">
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="index.php" class="nav-link text-white mt-3">
                                Pilihan Beasiswa
                            </a>
                        </li>
                        <li>
                            <a href="tampilan/daftar.php" class="nav-link text-secondary mt-3">
                                Daftar
                            </a>
                        </li>
                        <li>
                            <a href="tampilan/hasil.php" class="nav-link text-secondary mt-3">
                                Hasil
                            </a>
                        </li>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="container mt-5 mb-3">
        <form method="post" action="tampilan/daftar.php">
            <div class="row">
                <div class="col md-7 mb-7">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h3 class="card-title">
                                <center>Selamat Datang Di Sistem Pengajuan Beasiswa</center>
                            </h3>
                        </div>
                        <h5 class="card-tittle"> Silakan pilih beasiswa yang diinginkan.</h5>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col md-7 mb-7">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h3 class="card-title">
                                <center>Akademik</center>
                            </h3>
                        </div>
                        <img src="assets/gambar/akademik.jpg " class="card-img-top" alt="" width="100" height="300">
                        <form method="post" action="tampilan/daftar.php">
                            <input type="hidden" name="beasiswa" value="Beasiswa Akademik">
                            <center>
                            <button type="submit" class="btn btn-dark">Daftar Sekarang</button>
                            </center>
                        </form>
                    </div>
                </div>
                <div class="col md-7 mb-7">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h3 class="card-title">
                                <center>Non Akademik</center>
                            </h3>
                        </div>
                        <img src="assets/gambar/non_akademik.jpg " class="card-img-top" alt="" width="100" height="300">
                        <form method="post" action="tampilan/daftar.php">
                            <input type="hidden" name="beasiswa" value="Akademik Non Akademik">
                            <center>
                            <button type="submit" class="btn btn-dark">Daftar Sekarang</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer class="px-3 py-2 bg-dark">
        <p class="text-center text-white border-bottom">
            <?php echo date('Y'); ?> &copy; Ubharajaya.ac.id
        </p>
        <center>
            <img src="assets/gambar/logo.png" class="me-6 me-lg-auto" width="50" height="50">
        </center>
    </footer>
</body>

</html>