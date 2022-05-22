<?php
session_start();
if(!isset($_SESSION['id'])) {
  header('location: ../index.php');
}
include "../pengaturan/koneksi.php";

if(isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $siswa = $_POST['siswa'];
    $pelanggaran = $_POST['pelanggaran'];
    $guru = $_SESSION['id'];

    if($_SESSION['status'] == 'kesiswaan') {
        $status = 'Disetujui';
    } else {
        $status = 'Diajukan';
    }

    $query = "INSERT INTO tb_pelanggaran893 (tanggal,id_siswa,id_guru,id_poin,status) VALUES('$tanggal','$siswa','$guru','$pelanggaran','$status')";

    if(mysqli_query($konek, $query)) {
        echo "<script>alert('Data berhasil disimpan!');window.location='data_pelanggaran.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_pelanggaran.php">';
    } else {
        echo mysqli_error($konek);
    }
}