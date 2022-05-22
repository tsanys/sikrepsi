<?php
include "../pengaturan/koneksi.php";
$id = $_GET['id_poin'];
$q = mysqli_query($konek, "DELETE FROM tb_poin893 WHERE id_poin='$id'");
if ($q) {
    echo "<script>alert('Data berhasil dihapus!');window.location='data_poin.php';</script>";
    echo '<meta http-equiv="refresh" content="1; url=data_poin.php">';
} else {
    echo mysqli_error($konek);
}
?>