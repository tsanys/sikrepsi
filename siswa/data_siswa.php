<?php
include "../template/Header.php";
include "../template/Sidebar.php";
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Siswa</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-bars"></i>Data Siswa</li>
                <li><i class="fa fa-square-o"></i>Tampil Data</li>
            </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Siswa MAN 1 Banjarmasin
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenkel</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php
                               include "../pengaturan/koneksi.php";
                               $query = "SELECT * FROM view_siswa";
                               $data = mysqli_query($konek, $query);
                               while($d = mysqli_fetch_array($data)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $d['nis']; ?></td>
                                    <td><?php echo $d['nama_siswa']; ?></td>
                                    <td><?php echo $d['tempat_lahir']; ?>, <?php echo date("d F Y", strtotime($d['tanggal_lahir'])) ?></td>
                                    <td><?php echo $d['jk']; ?></td>
                                    <td><?php echo $d['nama_kelas']; ?></td>
                                    <td><?php echo $d['alamat']; ?></td>
                                    <?php if($_SESSION['status'] == 'admin') {?>
                                        <td>
                                            <a href="edit_siswa.php?id=<?php echo $d['nis']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="hapus_siswa.php?id=<?php echo $d['nis']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
        Tamabah siswa
    </div>
    <form action="tambah_siswa.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" max="6" name="nis" id="nis" placeholder="NIS">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
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
            <label for="jk">Jenis Kelamin</label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" id="jk1" value="L" checked>
            <label class="form-check-label" for="jk1">
                Laki-laki
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" id="jk2" value="P">
            <label class="form-check-label" for="jk2">
                Perempuan
            </label>
            </div>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-control" name="kelas" id="kelas">
                <?php
                    include "../pengaturan/koneksi.php";
                    $query = "SELECT * FROM tb_kelas893";
                    $data = mysqli_query($konek, $query);
                    while($d = mysqli_fetch_array($data)){
                ?>
                <option value="<?php echo $d['id_kelas']; ?>"><?php echo $d['nama_kelas']; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
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