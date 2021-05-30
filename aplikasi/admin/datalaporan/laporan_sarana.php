     <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Laporan Data Siswa</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Cetak Data siswa</div>


            <div class="card-body">
                <div class="table-responsive bordered">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Nama Angsuran</th>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php 
                    $sqlBayar = mysqli_query($konek, "SELECT a.id_tag_saranaprasarana, a.nis, a.keterangan,a.tgl,b.`nama_angsuran`,b.`jumlah`,c.`nama_siswa`
                  FROM tb_tag_saranaprasarana a
                  LEFT JOIN `detail_tag_sarana` b ON a.`id_detail_sarana`=b.`id_detail_sarana` 
                  LEFT JOIN `tb_siswa` c ON a.`nis`=c.`nis`");
                    $no=1;
                    $total = 0;
                    while ($tampilTabel=mysqli_fetch_array($sqlBayar)) {
                      $varTgl           = $tampilTabel['tgl'];
                      $varNis           = $tampilTabel['nis'];
                      $varNamaSiswa     = $tampilTabel['nama_siswa'];
                      $varNamaAngsuran  = $tampilTabel['nama_angsuran'];
                      $varKeterangan    = $tampilTabel['keterangan'];
                      $varJumlah        = $tampilTabel['jumlah'];
                      ?>

                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $varTgl ?></td>
                        <td><?php echo $varNis ?></td>
                        <td><?php echo $varNamaSiswa ?></td>
                        <td><?php echo $varNamaAngsuran ?></td>
                        <td><?php echo $varKeterangan ?></td>
                        <td><?php echo $varJumlah ?></td>
                      </tr>

                      <?php
                      $no++;
                      $total += $tampilTabel['jumlah'];}
                      ?>

                    <tr>
                      <td colspan="6" align="right"> Total</td>
                      <td align="right"><b><?php echo $total; ?></b></td>
                    </tr>
                  
                  </tbody>
                </table>
                
               
                <center>
                <a href="#" class="btn btn-primary" onclick="window.print();"> Cetak/Print </a>
                </center>
              
            
          </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>