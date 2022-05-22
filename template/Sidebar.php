<!--sidebar start-->
<aside>
  <div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
      <li class="">
        <a class="" href="../dashboard/dashboard.php">
          <i class="icon_house_alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="">
          <i class="icon_document_alt"></i>
          <span>Master Data</span>
          <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
          <li><a class="" href="../poin/data_poin.php">Data Poin</a></li>
          <li><a class="" href="../guru/data_guru.php">Data Guru</a></li>
          <?php 
            if($_SESSION['status'] != 'siswa'){?>
              <li><a class="" href="../kelas/data_kelas.php">Data Kelas</a></li>
              <li><a class="" href="../siswa/data_siswa.php">Data Siswa</a></li>
          <?php } ?>
        </ul>
      </li>
      <?php if($_SESSION['status'] != 'siswa'){?>
          <li>
            <a class="" href="../pelanggaran/data_pelanggaran.php">
              <i class="icon_genius"></i>
              <span>Pelanggaran</span>
            </a>
          </li>
        <?php } ?>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
