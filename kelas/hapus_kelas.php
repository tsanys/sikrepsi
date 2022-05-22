<?php
include "../pengaturan/koneksi.php";
$id = $_GET['id_kelas'];
$q = mysqli_query($konek, "DELETE FROM tb_kelas893 WHERE id_kelas='$id'");
if ($q) {
    echo "<script>alert('Data berhasil dihapus!');window.location='data_kelas.php';</script>";
    echo '<meta http-equiv="refresh" content="1; url=data_kelas.php">';
} else {
    echo mysqli_error($konek);
}
?>