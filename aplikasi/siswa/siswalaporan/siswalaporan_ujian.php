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
                      <th>ID</th>
                      <th>Nama Siswa</th>
                      <th>Nama Angsuran</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT a.id_tag_ujian,a.nis,a.keterangan,a.id_detail_ujian,a.tgl,b.`nama_siswa`,c.`nama_angsuran`,c.`jumlah`
                  FROM tb_tag_ujian a 
                  LEFT JOIN `tb_siswa` b ON a.`nis`=b.`nis`
                  LEFT JOIN `detail_tag_ujian` c ON a.`id_detail_ujian`=c.`id_detail_ujian` 
                  WHERE a.nis='$_GET[nis]'");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_tag_ujian'];
                  $varNis           = $tampiltabel['nis'];
                  $varKeterangan    = $tampiltabel['keterangan'];  
                  $varTgl           = $tampiltabel['tgl'];
                  $varNama          = $tampiltabel['nama_siswa'];
                  $varAngsuran      = $tampiltabel['nama_angsuran'];
                  $varJumlah        = $tampiltabel['jumlah'];                  
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNama ?></td>
                    <td><?php echo $varAngsuran ?></td>
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