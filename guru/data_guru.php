<?php
include "../template/Header.php";
include "../template/Sidebar.php";
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Guru</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-bars"></i>Data Guru</li>
                <li><i class="fa fa-square-o"></i>Tampil Data</li>
            </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Guru MAN 1 Banjarmasin
                    </div>
                    <div class="panel-body">
                        <?php if($_SESSION['status'] == 'admin') {?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                            </button>
                            <a href="cetak_data.php" target="_blank" class="btn btn-success">Cetak Data</a>
                        <?php } ?>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>NIP</th>
                                    <th>Alamat</th>
                                    <th>No Telpon</th>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php
                               include "../pengaturan/koneksi.php";

                               $cekKesiswaan = mysqli_query($konek, "SELECT * FROM tb_user893 WHERE status = 'kesiswaan'");

                                if(mysqli_num_rows($cekKesiswaan) > 0) {
                                    $dataKesiswaan = mysqli_fetch_array($cekKesiswaan);
                                    $userKesiswaan = $dataKesiswaan['username'];
                                } else {
                                    $userKesiswaan = "";
                                }

                                $query = "SELECT * FROM tb_guru893";
                                $data = mysqli_query($konek, $query);
                                while($d = mysqli_fetch_array($data)){

                                if($d['nip'] != $userKesiswaan) {
                                    $btn = "<a href='jadi_kesiswaan.php?id=$d[nip]' class='btn btn-info'>Jadikan Kesiswaan</a>";
                                } else {
                                    $btn = "<a href='#' class='btn btn-info disabled'>Kesiswaan</a>";
                                }
                            ?>
                            <tbody>
                                <tr>
                                    <td><?= $d['nama_lengkap']; ?></td>
                                    <td><?= $d['tempat_lahir']; ?>, <?= date("d F Y", strtotime($d['tanggal_lahir'])) ?></td>
                                    <td><?= $d['nip']; ?></td>
                                    <td><?= $d['alamat']; ?></td>
                                    <td><?= $d['no_telepon']; ?></td>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <td>
                                            <div class="btn-row">
                                                <div class="btn-group">
                                                    <a href="edit_guru.php?id=<?= $d['id_guru']; ?>" class="btn btn-warning">Edit</a>
                                                    <a href="hapus_guru.php?id=<?= $d['id_guru']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                                    <?php echo $btn ?>
                                                </div>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                            <?php
                               }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        Tamabah guru
    </div>
    <form action="tambah_guru.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label for="nama_guru">Nama</label>
            <input type="text" class="form-control" id="nama_guru" name="nama" placeholder="Nama guru">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
        </div>
        <div class="form-group">
            <label for="no_telpon">No Telpon</label>
            <input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="No Telpon">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<?php
include "../template/Footer.php";
?>