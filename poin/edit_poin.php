<?php
include "../pengaturan/koneksi.php";
include "../template/Header.php";

if (isset($_POST['edit'])) {
    $id_poin = $_GET['id_poin'];
    $deskripsi = $_POST['deskripsi'];
    $poin = $_POST['poin'];
    $q = mysqli_query($konek, "UPDATE tb_poin893 SET deskripsi='$deskripsi', poin='$poin' WHERE id_poin='$id_poin'");
    if ($q) {
        echo "<script>alert('Data berhasil diubah!');window.location='data_poin.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_poin.php">';
    } else {
        echo mysqli_error($konek);
    }
} else {
    $id_poin = $_GET['id_poin'];
    $q = mysqli_query($konek, "SELECT * FROM tb_poin893 WHERE id_poin='$id_poin'");
    $row = mysqli_fetch_array($q);
?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between my-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data poin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" area-current="page">Data poin</li>
        </ol>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data poin</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $row['deskripsi']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="poin">Poin</label>
                            <input type="text" class="form-control" id="poin" name="poin" value="<?= $row['poin']; ?>">
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