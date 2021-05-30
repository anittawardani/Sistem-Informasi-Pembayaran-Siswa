<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from tb_guru where id_guru='".$_GET['id']."'");
    echo"<script>alert('Data Guru berhasil di Hapus');window.location.href='beranda.php?halaman=admindataguru;</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Guru</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Guru</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahguru">Tambah Guru </a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Guru</th>
                      <th>Nama Guru</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT * FROM tb_guru ORDER BY id_guru ASC");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_guru      = $tampiltabel['id_guru'];
                  $varNamaGuru     = $tampiltabel['nama_guru'];
                                     
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_guru ?></td>
                    <td><?php echo $varNamaGuru ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahguru&id=<?php echo $varId_guru ?>">Ubah</a> 
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=admindataguru&id=<?php echo $varId_guru ?>">Hapus</a>
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