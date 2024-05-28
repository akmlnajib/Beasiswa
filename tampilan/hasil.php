<?php
include "../koneksi.php";

//Nomor pada tabel
$no = 1;

// Memanggil database untuk ditampilkan
$query = "SELECT * FROM tbl_daftar";
$result = $conn->query($query);
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
                            <a href="daftar.php" class="nav-link text-secondary mt-3">
                                Daftar
                            </a>
                        </li>
                        <li>
                            <a href="hasil.php" class="nav-link text-white mt-3">
                                Hasil
                            </a>
                        </li>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="container mt-5 mb-3">
    <a href="../index.php" class="btn btn-secondary mb-3" >Kembali</a>
        <table class="table table-success table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Daftar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Semester</th>
                    <th scope="col">IPK Terakhir</th>
                    <th scope="col">Beasiswa</th>
                    <th scope="col">Berkas</th>
                    <th scope="col">Status Ajuan</th>
                </tr>
            </thead>
            <?php
            foreach ($result as $row) {
                // Untuk melihat berkas
                if (empty($row['berkas']) or ($row['berkas'] == '-'))
                $berkas = "-";
            else
                $berkas = $row['berkas'];
            ?>
                <tbody>
                    <td>
                        <?php echo $no ?>
                    </td>
                    <td>
                        <?php echo $row['id_daftar'] ?>
                    </td>
                    <td>
                        <?php echo $row['nama'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['no_tlp'] ?>
                    </td>
                    <td>
                        <?php echo $row['semester'] ?>
                    </td>
                    <td>
                        <?php echo $row['ipk_akhir'] ?>
                    </td>
                    <td>
                        <?php echo $row['nama_beasiswa'] ?>
                    </td>
                    <td>
                        <!---Untuk melihat berkas yang diupload --->
                    <a href="../berkas/<?php echo $berkas; ?>" target='_blank' class="btn btn-info" > <?php echo $row['berkas'] ?></a>
                    </td>
                    <td>
                        <?php if ($row['hasil'] == 0) { ?>
                            <button type="button" class="btn btn-warning">Belum Diverifikasi</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-success">Terverifikasi</button>
                            <?php
                        }
                        ?>
                    </td>
                    <?php
                    $no++;
            }
            ?>
            </tbody>
        </table>
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