      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Tagihan Uang Pengembangan</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Uang Pengembangan</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Nama Angsuran</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT a.id_tag_pengembangan,a.tgl,b.nis,b.`nama_siswa`,c.nama_angsuran,c.`jumlah`,a.keterangan
                    FROM `tb_tag_pengembangan` a 
                    LEFT JOIN `tb_siswa` b ON a.`nis`=b.`nis`
                    LEFT JOIN `detail_tag_pengembangan` c ON a.`id_detail`=c.`id_detail` where b.nis='$_GET[nis]'");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId               = $tampiltabel['id_tag_pengembangan'];
                  $varNamaSiswa        = $tampiltabel['nama_siswa'];
                  $varNis              = $tampiltabel['nis'];
                  $varTgl              = $tampiltabel['tgl'];
                  $varNamaAngsuran     = $tampiltabel['nama_angsuran'];
                  $varJumlah           = $tampiltabel['jumlah'];
                  $varKeterangan       = $tampiltabel['keterangan'];
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNamaSiswa ?></td>
                    <td><?php echo $varNamaAngsuran ?></td>
                    <td><?php echo $varJumlah ?></td>
                    <td><?php echo $varTgl ?></td>
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