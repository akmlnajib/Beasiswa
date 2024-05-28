<?php
include "../koneksi.php";

$randomIpk = rand() / getrandmax(); // Generate random float between 0 and 1
$randomIpkInRange = $randomIpk * 4; // Scale to the desired range (0 to 4)
$ipk = number_format($randomIpkInRange, 2); // Format to 2 decimal places

// Array semester
$semester = ['1', '2', '3', '4', '5', '6', '7', '8'];

// Array Beasiswa
$listBeasiswa = ['Beasiswa Akademik', 'Beasiswa Non Akademik'];

// ID Daftar Otomatis
// Mengambil ID daftar paling besar dari database
$sql = mysqli_query($conn, "SELECT max(id_daftar) as id_daftar FROM tbl_daftar");
$data = mysqli_fetch_array($sql);
$id_daftar = $data['id_daftar'];
// dan diubah ke integer dengan (int)
$angka = (int) substr($id_daftar, 3, 3);
$angka++;
$abjad = "BEA";

// Membuat ID Daftar baru dengan menggabungkan $huruf dan $angka
$id_daftar = $abjad . sprintf("%03s", $angka);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubhara Jaya</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--- Header --->
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="../assets/gambar/logo.png" class="bi me-2" width="50" height="50">
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="../index.php" class="nav-link text-secondary mt-3">
                                Pilihan Beasiswa
                            </a>
                        </li>
                        <li>
                            <a href="daftar.php" class="nav-link text-white mt-3">
                                Daftar
                            </a>
                        </li>
                        <li>
                            <a href="hasil.php" class="nav-link text-secondary mt-3">
                                Hasil
                            </a>
                        </li>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!--- Header END --->

    <div class="container mt-5">
        <?php
        if ($ipk < 3) { ?>
        <div class="alert alert-warning" role="alert">
            Untuk saat ini kamu tidak dapat mendaftar, Semangat belajar dan raih IPK 3.
        </div>
        <?php } ?>
        <form action="../proses/proses_daftar.php" method="post" enctype='multipart/form-data'>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th colspan="3">Registrasi Beasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-active">ID Daftar</th>
                        <th>
                            :
                        </th>
                        <td>
                            <input type="text" id="id_daftar" name="id_daftar" class="form-control"
                                value="<?php echo $id_daftar ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Masukkan Nama</th>
                        <th>:</th>
                        <td><input type="text" name="nama" size="50" class="form-control"
                                placeholder="Masukkan Nama Lengkap">
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Masukkan Email</th>
                        <th>:</th>
                        <td><input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Nomor Telepon</th>
                        <th>:</th>
                        <td><input type="number" name="no_tlp" size="100" class="form-control"
                                placeholder="Masukkan Nomor Telpon"></td>
                    </tr>
                    <tr>
                        <th class="table-active">Semester saat ini</th>
                        <th>:</th>
                        <td>
                            <select name="semester" id="semester" class="form-control">
                                <option value="BLANK" selected="selected">-Pilih Semester-</option>
                                <?php
                                //Panggil Array
                                foreach ($semester as $row) { ?>
                                <option value='<?php echo $row ?>'><?php echo $row ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </tr>
                    <tr>
                        <th class="table-active">IPK Terakhir</th>
                        <th>:</th>
                        <td>
                            <input type="number" step="0.01" name="ipk_akhir" id="ipk_akhir" size="30"
                                value="<?php echo $ipk; ?>" class="form-control" readonly>
                        </td>
                    </tr>
                    <tr>
                        
                        <?php
                        if ($ipk < 3) { ?>
                        <td class="table-active">Pilih Beasiswa</td>
                        <td>:</td>
                        <td>
                            <select name="beasiswa" id="beasiswa" class="form-control" required>
                                <option value="BLANK" selected="selected">Pilihan Belum Tersedia</option>
                            </select>
                        </td>
                        <?php } else { 

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['beasiswa'])) {
                            $beasiswa = $_POST['beasiswa'];
                                ?>
                        <td class="table-active">Pilih Beasiswa</td>
                        <td>:</td>
                        <td>
                            <input type="text" id="beasiswa" name="beasiswa" class="form-control"
                                value="<?php echo "$beasiswa"; ?>" readonly></td>
                                <?php
                            }
                        }

                        ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        if ($ipk < 3) {
                            ?>
                            <th class="table-active">Upload Berkas Syarat</th>
                            <th>:</th>
                            <td>
                                <input type="text" name="berkas" value="Upload Berkas Tidak Tersedia" class="form-control"
                                    readonly>
                                <?php
                        } else { ?>
                            <th class="table-active">Upload Berkas Syarat</th>
                            <th>:</th>
                            <td>
                                <input type="file" name="berkas" class="form-control">
                                <?php
                        }
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            if ($ipk < 3) { ?>
                <a href="../index.php" class="btn btn-dark container mt-3 mb-3">Batal</a>
                <?php
            } else { ?>
                <input type='submit' value='Daftar' name='daftar' id='daftar' class="btn btn-dark container mt-3">
                <br>
                <a href="../index.php" class="btn btn-dark container mt-3 mb-3">Batal</a>
            <?php }
            ?>
        </form>
    </div>

    <footer class="px-3 py-2 bg-dark">
        <p class="text-center text-white border-bottom">
            <?php echo date('Y'); ?> &copy; Ubharajaya.ac.id
        </p>
        <center>
            <img src="../assets/gambar/logo.png" class="me-6 me-lg-auto" width="50" height="50">
        </center>
    </footer>
</body>

</html>