<?php
include "../template/Header.php";
include "../template/Sidebar.php";
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Pelanggaran</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-bars"></i>Data Pelanggaran</li>
                <li><i class="fa fa-square-o"></i>Tampil Data</li>
            </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Pelanggaran MAN 1 Banjarmasin
                    </div>
                    <div class="panel-body">
                        <?php if($_SESSION['status'] == 'admin') { ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                            </button>
                        <?php } ?>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nama Guru</th>
                                    <th>Pelanggaran</th>
                                    <th>Poin</th>
                                    <th>Status</th>
                                    <?php if($_SESSION['status'] == 'kesiswaan') { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php
                                include "../pengaturan/koneksi.php";
                                $query = "SELECT * FROM view_pelanggaran";
                                $data = mysqli_query($konek, $query);
                                while($d = mysqli_fetch_array($data)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $d['no']; ?></td>
                                    <td><?php echo $d['nis']; ?></td>
                                    <td><?php echo $d['nama_siswa']; ?></td>
                                    <td><?php echo $d['nama_kelas']; ?></td>
                                    <td><?php echo $d['nama_lengkap']; ?></td>
                                    <td><?php echo $d['deskripsi']; ?></td>
                                    <td><?php echo $d['poin']; ?></td>
                                    <td><?php echo $d['status']; ?></td>
                                    <?php if($_SESSION['status'] == 'kesiswaan') {?>
                                        <?php if($d['status'] == 'Diajukan') {?>
                                            <td>
                                                <a href="status_pelanggaran.php?id=<?php echo $d['no']; ?>&status=Disetujui" class="btn btn-success">Disetujui</a>
                                                <a href="status_pelanggaran.php?id=<?php echo $d['no']; ?>&status=Dibatalkan" onclick="return confirm('Batalkan pelanggaran ini?')" class="btn btn-danger">Dibatalkan</a>
                                            </td>
                                        <?php } else { ?>
                                            <td>-</td>
                                        <?php } ?>
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
        Tamabah pelanggaran
    </div>
    <form action="tambah_pelanggaran.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label for="nis">Tanggal</label>
            <input type="date" autocomplete="off" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
        </div>
        <div class="form-group">
            <label for="pelanggaran">Pilih Siswa</label>
            <select class="form-control" id="siswa" name="siswa">
                <?php
                    include "../pengaturan/koneksi.php";
                    $query = "SELECT * FROM view_siswa";
                    $data = mysqli_query($konek, $query);
                    while($d = mysqli_fetch_array($data)){
                ?>
                <option value="<?php echo $d[0]; ?>"><?php echo $d['nama_siswa']; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pelanggaran">Pilih Pelanggaran</label>
            <select class="form-control" id="pelanggaran" name="pelanggaran">
                <?php
                    include "../pengaturan/koneksi.php";
                    $query = "SELECT * FROM tb_poin893";
                    $data = mysqli_query($konek, $query);
                    while($d = mysqli_fetch_array($data)){
                ?>
                <option value="<?php echo $d[0]; ?>"><?php echo $d['deskripsi']; ?></option>
                <?php
                    }
                ?>
            </select>
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