<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from detail_tag_pengembangan where id_detail_pengembangan='".$_GET['id']."'");
    echo"<script>alert('Detail Uang Pengembangan berhasil di Hapus');window.location.href='beranda.php?halaman=detailpengembangan';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Detail Uang Pengembangan</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Detail Tabel Pengembangan</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahdetailpengembangan">Tambah Detail Pengembangan </a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Nama Angsuran</th>
                      <th>Jumlah</th> 
                      <th>Aksi</th>                  
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT id_detail, nama_angsuran, jumlah
                  FROM detail_tag_pengembangan");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_detail'];
                  $varNamaAngsuran  = $tampiltabel['nama_angsuran'];
                  $varJumlah        = $tampiltabel['jumlah'];
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNamaAngsuran ?></td>
                    <td><?php echo $varJumlah ?></td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahdetailpengembangan&id=<?php echo $varId ?>">Ubah</a>
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=detailpengembangan&id=<?php echo $varId ?>">Hapus</a>
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