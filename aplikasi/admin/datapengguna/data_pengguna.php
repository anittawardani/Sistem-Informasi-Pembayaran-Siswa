<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from tb_pengguna where id_pengguna='".$_GET['id']."'");
    echo"<script>alert('Data Pengguna berhasil di Hapus');window.location.href='beranda.php?halaman=admindatapengguna';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Pengguna</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Pengguna</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahpengguna">Tambah Pengguna </a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Pengguna</th>
                      <th>Nama Pengguna</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
  
                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT * FROM tb_pengguna");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_pengguna      = $tampiltabel['id_pengguna'];
                  $varNama_pengguna    = $tampiltabel['nama_pengguna'];
                  $varUsername         = $tampiltabel['username'];
                  $varLevel            = $tampiltabel['level'];
                                     
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_pengguna ?></td>
                    <td><?php echo $varNama_pengguna ?></td>
                    <td><?php echo $varUsername ?></td>
                    <td><?php echo $varLevel ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahpengguna&id=<?php echo $varId_pengguna ?>">Ubah</a> 
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=admindatapengguna&id=<?php echo $varId_pengguna ?>">Hapus</a>
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