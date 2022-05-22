<?php

include '../pengaturan/koneksi.php';

session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM tb_user893 WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($konek, $query);

if(mysqli_num_rows($result) > 0) {
    $datas = mysqli_fetch_array($result);

    $_SESSION['status'] = $datas['status'];

    if($datas['status'] == 'guru' || $datas['status'] == 'kesiswaan') {
        $sql = "SELECT * FROM tb_guru893 WHERE id_user = '$datas[0]'";
        $res = mysqli_query($konek, $sql);
        $data = mysqli_fetch_array($res);
        $_SESSION['id'] = $data['id_guru'];
        $_SESSION['nama'] = $data['nama_lengkap'];
    } else if($datas['status'] == 'siswa') {
        $sql = "SELECT * FROM tb_siswa893 WHERE id_user = '$datas[0]'";
        $res = mysqli_query($konek, $sql);
        $data = mysqli_fetch_array($res);
        $_SESSION['id'] = $data['id_siswa'];
        $_SESSION['nama'] = $data['nama_siswa'];
    } else if($datas['status'] == 'admin') {
        $_SESSION['id'] = $datas[0];
        $_SESSION['nama'] = 'Admin';
    }

    header("location:../index.php");
    echo "<script>alert('Login Berhasil!');</script>";
} else {
    echo '<script>alert("Username atau password salah!"); window.location = "../login/halaman_login.php";</script>';
}

?>