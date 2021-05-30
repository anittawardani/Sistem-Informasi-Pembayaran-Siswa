    <div id="wrapper">

      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="beranda.php">
            <i class="fas fa-fw fa fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>

        <?php if(isset($_SESSION['level'])){ ?>

        <?php if ($_SESSION['level']=='admin') { 
        ?>

        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatapengguna">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Pengguna</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatasiswa">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Siswa</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindataguru">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Guru</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatakelas">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Kelas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatajurusan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Jurusan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatatagihan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Detail Tagihan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatatransaksi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Transaksi</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=admindatalaporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
        </li>

        <?php }else if ($_SESSION['level']=='siswa') { ?>

        <li class="nav-item">
          <a class="nav-link" href="beranda.php?halaman=siswadatalaporan">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Keuangan Siswa</span></a>
        </li>
        <?php }} ?>
      </ul>
      