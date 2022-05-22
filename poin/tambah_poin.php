<?php
include "../pengaturan/koneksi.php";

if (isset($_POST['simpan'])) {
    $deskripsi = $_POST['deskripsi'];
    $poin = $_POST['poin'];

    $query = "INSERT INTO tb_poin893 (deskripsi, poin) VALUES ('$deskripsi', '$poin')";
    $hasil = mysqli_query($konek, $query);

    if ($hasil) {
        echo "<script>alert('Data berhasil disimpan!');window.location='data_poin.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_poin.php">';
    } else {
        echo mysqli_error($konek);
    }
}