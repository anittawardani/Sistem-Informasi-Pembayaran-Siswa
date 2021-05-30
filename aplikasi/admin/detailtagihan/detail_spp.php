<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from detail_tag_spp where id_detail_spp='".$_GET['id']."'");
    echo"<script>alert('Data Tagihan SPP berhasil di Hapus');window.location.href='beranda.php?halaman=detailspp';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Tagihan SPP</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tagihan SPP</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahdetailspp">Tambah Tagihan SPP </a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Bulan</th>
                      <th>Jumlah</th> 
                      <th>Aksi</th>                  
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT id_detail_spp,nama_bulan,jumlah FROM detail_tag_spp");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_detail_spp'];
                  $varNamaBulan     = $tampiltabel['nama_bulan'];
                  $varJumlah        = $tampiltabel['jumlah'];                                     
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNamaBulan ?></td>
                    <td><?php echo $varJumlah ?></td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahdetailspp&id=<?php echo $varId ?>">Ubah</a>
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=detailspp&id=<?php echo $varId ?>">Hapus</a>
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