<?php
include "../pengaturan/koneksi.php";
include "../template/Header.php";

if (isset($_POST['edit'])) {
    $id_kelas = $_GET['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $q = mysqli_query($konek, "UPDATE tb_kelas893 SET nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas'");
    if ($q) {
        echo "<script>alert('Data berhasil diubah!');window.location='data_kelas.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_kelas.php">';
    } else {
        echo mysqli_error($konek);
    }
} else {
    $id_kelas = $_GET['id_kelas'];
    $q = mysqli_query($konek, "SELECT * FROM tb_kelas893 WHERE id_kelas='$id_kelas'");
    $row = mysqli_fetch_array($q);
?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between my-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" area-current="page">Data Kelas</li>
        </ol>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kelas</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $row['nama_kelas']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php
}
include "../template/Footer.php";
?>