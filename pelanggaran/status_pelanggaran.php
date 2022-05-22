<?php 
include "../pengaturan/koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE tb_pelanggaran893 SET status = '$status' WHERE no = '$id'";
    if(mysqli_query($konek, $query)) {
        echo "<script>alert('Data berhasil diubah!');window.location='data_pelanggaran.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_pelanggaran.php">';
    } else {
        echo mysqli_error($konek);
    }
}