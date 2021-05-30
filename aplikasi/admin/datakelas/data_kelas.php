<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from tb_kelas where id_kelas='".$_GET['id']."'");
    echo"<script>alert('Data Kelas berhasil di Hapus');window.location.href='beranda.php?halaman=admindatakelas';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Kelas</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Kelas</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahkelas">Tambah Kelas</a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Kelas</th>
                      <th>Nama Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT * FROM tb_kelas");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_Kelas      = $tampiltabel['id_kelas'];
                  $varNamaKelas     = $tampiltabel['nama_kelas'];
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_Kelas ?></td>
                    <td><?php echo $varNamaKelas ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahkelas&id=<?php echo $varId_Kelas ?>">Ubah</a> 
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=admindatakelas&id=<?php echo $varId_Kelas ?>">Hapus</a>
                    </td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>