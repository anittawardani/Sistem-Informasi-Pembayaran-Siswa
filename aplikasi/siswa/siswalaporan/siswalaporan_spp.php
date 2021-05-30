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
              Data Tabel Tagihan SPP</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Siswa</th>
                      <th>SPP Bulan</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT a.id_tag_spp, a.nis, a.keterangan,a.tgl,c.`nama_bulan`,c.`jumlah`,b.`nama_siswa`
                  FROM tb_tag_spp a 
                  LEFT JOIN `tb_siswa` b ON a.`nis`=b.`nis` 
                  LEFT JOIN `detail_tag_spp` c ON a.`id_detail_spp`=c.`id_detail_spp`
                  WHERE a.nis='$_GET[nis]'");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_tag_spp'];
                  $varNis           = $tampiltabel['nis'];
                  $varKeterangan    = $tampiltabel['keterangan'];
                  $varTgl           = $tampiltabel['tgl'];
                  $varBulan         = $tampiltabel['nama_bulan'];
                  $varJumlah        = $tampiltabel['jumlah'];
                  $varNama          = $tampiltabel['nama_siswa'];
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNama ?></td>
                    <td><?php echo $varBulan ?></td>
                    <td><?php echo $varTgl ?></td>
                    <td><?php echo $varJumlah ?></td>
                    <td><?php echo $varKeterangan ?></td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
                  
                  </tbody>
                </table>

              </div>
            </div>
          </div>
          <center>
            <a href="#" class="btn btn-primary" onclick="window.print();"> Cetak/Print </a>
          </center>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>