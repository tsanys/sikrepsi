<?php
include "../pengaturan/koneksi.php";
include "../template/Header.php";

if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $query = "UPDATE tb_siswa893 SET nis='$nis', nama_siswa='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jk='$jk', id_kelas='$kelas' WHERE nis='$id'";
    $hasil = mysqli_query($konek, $query);

    if ($hasil) {
        echo "<script>alert('Data siswa berhasil diubah!');window.location='data_siswa.php';</script>";
        echo '<meta http-equiv="refresh" content="1; url=data_siswa.php">';
    } else {
        echo mysqli_error($konek);
    }

} else {
    $id = $_GET['id'];
    $q = mysqli_query($konek, "SELECT * FROM tb_siswa893 WHERE nis='$id'");
    $row = mysqli_fetch_array($q);
?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between my-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" area-current="page">Data Siswa</li>
        </ol>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" name="nis" value="<?php echo $row['nis']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_siswa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="L" <?php if ($row['jk'] == 'L') echo 'checked'; ?>>
                                <label class="form-check-label" for="jk">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="P" <?php if ($row['jk'] == 'P') echo 'checked'; ?>>
                                <label class="form-check-label" for="jk">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"><?php echo $row['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control">
                                <?php
                                $q = mysqli_query($konek, "SELECT * FROM tb_kelas893");
                                while ($data = mysqli_fetch_array($q)) {
                                
                                    if ($data['id_kelas'] == $row['id_kelas']) {
                                        echo "<option value='$data[id_kelas]' selected>$data[nama_kelas]</option>";
                                    } else {
                                        echo "<option value='$data[id_kelas]'>$data[nama_kelas]</option>";
                                    }
                                }
                                ?>
                            </select>
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