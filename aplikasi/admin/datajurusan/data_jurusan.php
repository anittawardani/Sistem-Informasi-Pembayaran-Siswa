<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from tb_jurusan where id_jurusan='".$_GET['id']."'");
    echo"<script>alert('Data Jurusan berhasil di Hapus');window.location.href='beranda.php?halaman=admindatajurusan';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Jurusan</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Jurusan</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahjurusan">Tambah Jurusan</a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Jurusan</th>
                      <th>Nama Jurusan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT * FROM tb_jurusan");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_Jurusan     = $tampiltabel['id_jurusan'];
                  $varNamaJurusan    = $tampiltabel['nama_jurusan'];
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_Jurusan ?></td>
                    <td><?php echo $varNamaJurusan ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahjurusan&id=<?php echo $varId_Jurusan ?>">Ubah</a> 
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=admindatajurusan&id=<?php echo $varId_Jurusan ?>">Hapus</a>
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