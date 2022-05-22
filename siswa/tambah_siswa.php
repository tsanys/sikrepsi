<?php
include "../pengaturan/koneksi.php";

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

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

    $queryCreate = "INSERT INTO tb_user893 (id_user, username, password, status) VALUES ('$id_user', '$nis', '$password', 'siswa')";

    $hasil2 = mysqli_query($konek, $queryCreate);

    if ($hasil2) {
        $query = "INSERT INTO tb_siswa893 (nis, nama_siswa, tempat_lahir, tanggal_lahir, alamat, jk, id_kelas, id_user) VALUES ('$nis', '$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jk', '$kelas', '$id_user')";
        $hasil3 = mysqli_query($konek, $query);

        if ($hasil3) {
            echo "<script>alert('Data siswa berhasil disimpan!');window.location='data_siswa.php';</script>";
            echo '<meta http-equiv="refresh" content="1; url=data_siswa.php">';
        } else {
            echo mysqli_error($konek);
        }
    } else {
        echo mysqli_error($konek);
    }

}