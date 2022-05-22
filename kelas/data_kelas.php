<?php
include "../template/Header.php";
include "../template/Sidebar.php";
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Kelas</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-bars"></i>Data Kelas</li>
                <li><i class="fa fa-square-o"></i>Tampil Data</li>
            </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Kelas MAN 1 Banjarmasin
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
                                    <th>ID Kelas</th>
                                    <th>Nama Kelas</th>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php
                               include "../pengaturan/koneksi.php";
                               $query = "SELECT * FROM tb_kelas893";
                               $data = mysqli_query($konek, $query);
                               while($d = mysqli_fetch_array($data)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?= $d['id_kelas']; ?></td>
                                    <td><?= $d['nama_kelas']; ?></td>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <td>
                                            <div class="btn-row">
                                                <div class="btn-group">
                                                    <a href="edit_kelas.php?id_kelas=<?= $d['id_kelas']; ?>" class="btn btn-warning">Edit</a>
                                                    <a href="hapus_kelas.php?id_kelas=<?= $d['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
        Tamabah Kelas
    </div>
    <form action="tambah_kelas.php" method="post">
      <div class="modal-body">
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
            </div>
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