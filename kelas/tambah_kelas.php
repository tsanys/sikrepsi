<?php
include "../pengaturan/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_kelas = $_POST['nama_kelas'];

    $query = "INSERT INTO tb_kelas893 (nama_kelas) VALUES ('$nama_kelas')";
    $hasil = mysqli_query($konek, $query);

    if ($hasil) {
        echo "<script>alert('Data berhasil disimpan!');window.location='data_kelas.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_kelas.php">';
    } else {
        echo mysqli_error($konek);
    }
}