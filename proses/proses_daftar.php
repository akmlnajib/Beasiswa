<?php
//Memanggil database dari file koneksi
include "../koneksi.php";

//
$id_daftar = $_POST['id_daftar'];
$nama = $_POST["nama"];
$email = $_POST["email"];
$no_tlp = $_POST["no_tlp"];
$semester = $_POST["semester"];
$ipk_akhir = $_POST["ipk_akhir"];
$id_beasiswa = $_POST['beasiswa'];

if (isset($_POST['daftar'])) {
    extract($_POST);
    $nama_file = $_FILES['berkas']['name'];
    if (!empty($nama_file)) {
        // Baca lokasi file sementara dan nama file dari form daftar
        $lokasi_file = $_FILES['berkas']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_dokumen = $id_daftar . "." . $tipe_file;

        // Tentukan folder untuk menyimpan file yaitu folder berkas
        $folder = "../berkas/$file_dokumen";
        // Apabila file berhasil di upload maka akan dipindahkan ke folder berkas
        move_uploaded_file($lokasi_file, "$folder");
    } else
        $file_dokumen = "-";

    //Menyimpan data ke dalam database beasiswa dengan table daftar
    $query = "INSERT INTO tbl_daftar VALUES('$id_daftar','$nama','$email','$no_tlp', '$semester','$ipk_akhir', '$id_beasiswa', '$file_dokumen', 0)";
    $result = mysqli_query($conn, $query);

    echo "<script>location='../tampilan/hasil.php';</script>";
}
?>