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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Siswa</th>
                      <th>Nama Angsuran</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th>Status</th>
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
                    <td> 
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=transaksiujian&id=<?php echo $varId ?>&nis=<?php echo $varNis ?>&bayar=bayar">Bayar</a>
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=transaksiujian&id=<?php echo $varId ?>&nis=<?php echo $varNis ?>&batal=batal">Batal</a>
                    </td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
                    
                  </tbody>
                </table>

                <?php 
                     if (isset($_GET['id']) && $_GET['id']!=''&& isset($_GET['bayar']) && $_GET['bayar']!='') {
                        $idTransaksi      = $_GET['id'];
                        $tglBayar = date('Y-m-d');
                        mysqli_query($konek, "UPDATE `tb_tag_ujian` SET keterangan='Lunas',
                          tgl='$tglBayar'
                          WHERE `id_tag_ujian`='$idTransaksi'");
                      echo"<script>alert('Data berhasil dirubah');window.location='beranda.php?halaman=transaksiujian&nis=".$varNis."';</script>";
                      } 

                      if (isset($_GET['id']) && $_GET['id']!=''&& isset($_GET['batal']) && $_GET['batal']!='') {
                        $idTransaksi      = $_GET['id'];
                        $tglBayar = date('Y-m-d');
                        mysqli_query($konek, "UPDATE `tb_tag_ujian` SET keterangan='Belum Lunas',
                          tgl='0000-00-00'
                          WHERE `id_tag_ujian`='$idTransaksi'");
                        echo"<script>alert('Data berhasil dirubah');window.location='beranda.php?halaman=transaksiujian&nis=".$varNis."';</script>";
                      }
                 ?>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>