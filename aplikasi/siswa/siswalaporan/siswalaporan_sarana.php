      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Tagihan Uang Sarana Prasarana</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Uang Sarana Prasarana</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
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
                  $Querytampil = mysqli_query($konek,"SELECT a.id_tag_saranaprasarana, a.nis, a.keterangan,a.tgl,b.`nama_angsuran`,b.`jumlah`,c.`nama_siswa`
                  FROM tb_tag_saranaprasarana a
                  LEFT JOIN `detail_tag_sarana` b ON a.`id_detail_sarana`=b.`id_detail_sarana` 
                  LEFT JOIN `tb_siswa` c ON a.`nis`=c.`nis` WHERE a.nis='$_GET[nis]'");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_tag_saranaprasarana'];
                  $varNis  = $tampiltabel['nis'];
                  $varNamaSiswa  = $tampiltabel['nama_siswa'];
                  $varKeterangan  = $tampiltabel['keterangan'];
                  $varTgl  = $tampiltabel['tgl'];
                  $varJml  = $tampiltabel['jumlah'];
                  $varAngsuran  = $tampiltabel['nama_angsuran'];                
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNamaSiswa ?></td>
                    <td><?php echo $varAngsuran ?></td>
                    <td><?php echo $varJml ?></td>
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