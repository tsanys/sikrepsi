<?php
include "../pengaturan/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];

    $password = md5(date('d F Y', strtotime($tanggal_lahir)));

    //get last user id from table tb_user893 if not exist, set id to 1 if exist set id to last id + 1
    $query = "SELECT MAX(id_user) AS id_user FROM tb_user893";
    $hasil1 = mysqli_query($konek, $query);
    $data1 = mysqli_fetch_array($hasil1);
    $id_user = $data1['id_user'];

    if ($id_user == NULL) {
        $id_user = 1;
    } else {
        $id_user = $id_user + 1;
    }

    $queryCreate = "INSERT INTO tb_user893 (id_user, username, password, status) VALUES ('$id_user', '$nip', '$password', 'guru')";

    $hasil2 = mysqli_query($konek, $queryCreate);

    if ($hasil2) {
        $query = "INSERT INTO tb_guru893 (nama_lengkap, tempat_lahir, tanggal_lahir, nip, alamat, no_telepon, id_user) VALUES ('$nama_lengkap', '$tempat_lahir', '$tanggal_lahir',  '$nip','$alamat', '$no_telpon', '$id_user')";
        $hasil3 = mysqli_query($konek, $query);

        if ($hasil3) {
            echo "<script>alert('Data guru berhasil disimpan!');window.location='data_guru.php';</script>";
            echo '<meta http-equiv="refresh" content="1; url=data_guru.php">';
        } else {
            echo mysqli_error($konek);
        }
    } else {
        echo mysqli_error($konek);
    }

}