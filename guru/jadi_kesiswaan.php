<?php

include "../pengaturan/koneksi.php";

if(isset($_GET['id'])) {
    $nip = $_GET['id'];
    $query = "SELECT * FROM tb_user893 WHERE status = 'kesiswaan'";
    $query2 = "SELECT * FROM tb_user893 WHERE username = '$nip'";

    $result = mysqli_query($konek, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);

        $username = $data['username'];

        mysqli_query($konek, "UPDATE tb_user893 SET status= 'guru' WHERE username = '$username'");
    }

    $res = mysqli_query($konek, "UPDATE tb_user893 SET status = 'kesiswaan' WHERE username = '$nip'");

    if ($res) {
        echo "<script>alert('Data guru berhasil disimpan!');window.location='data_guru.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_guru.php">';
    } else {
        echo mysqli_error($konek);
    }
}