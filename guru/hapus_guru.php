<?php
include "../pengaturan/koneksi.php";
$id = $_GET['id'];
if (isset($id))
{
    $query = "DELETE FROM tb_guru893 WHERE id_guru='$id'";
    $hasil = mysqli_query($konek, $query);
    
    if($hasil)
    {
        $sql = "DELETE FROM tb_user893 WHERE id_user='$id'";
        mysqli_query($konek, $sql);
        echo "<script>alert('Data berhasil dihapus!');window.location='data_guru.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_guru.php">';
    }
    else
    {
        echo mysqli_error($konek);
    }
}
?>